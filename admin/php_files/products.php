<?php
include './database.php';
if(isset($_POST['cat_id'])){
    $cat = $_POST['cat_id'];
    $db = new Database();
    $db->select('sub_categories','*',null,"cat_parent = $cat",null,null);
    $sub_category = $db->getResult();
    // print_r($result);
     $output = [];
    if($sub_category > 0){
        
        $output['sub_category'] = $sub_category;
    }

    $db->select('brands','*',null,"brand_cat = $cat",null,null);
    $brands = $db->getResult();

    if($brands > 0){

        $output['brands'] = $brands;
    }

    echo json_encode($output);

}



 if (isset($_POST['create'])) {
    
    if(!isset($_POST['product_title']) || empty($_POST['product_title'])){
        echo json_encode(array('error'=>'Product title must be filled'));
        exit;
    }
    
    elseif(!isset($_POST['product_cat']) || empty($_POST['product_cat'])){
        echo json_encode(array('error'=>'Product title must be filled'));
        exit;
    }
    elseif(!isset($_POST['product_sub_cat']) || empty($_POST['product_sub_cat'])) {
        echo json_encode(array('error'=>'product_sub_category must be filled'));
        exit;
    }
    elseif(!isset($_POST['product_desc']) || empty($_POST['product_desc'])) {
        echo json_encode(array('error'=>'product_desc must be filled'));
        exit;
    }
   
    elseif(!isset($_POST['product_price']) || empty($_POST['product_price'])) {
        echo json_encode(array('error'=>'product_price must be filled'));
        exit;
    }
    elseif(!isset($_POST['product_qty']) || empty($_POST['product_qty'])) {
        echo json_encode(array('error'=>'product_qty  must be filled'));
        exit;
    }
    elseif(!isset($_POST['product_status']) || empty($_POST['product_status'])) {
        echo json_encode(array('error'=>'product_status  must be filled'));
        exit;
    }
    elseif(!isset($_FILES['featured_img']['name']) || empty($_FILES['featured_img']['name'])){
		echo json_encode(array('error'=>'Image Field is Empty.')); exit;
    }
    else{

    $file_name = $_FILES['featured_img']['name'];
    $file_type = $_FILES['featured_img']['type'];
    $file_temp = $_FILES['featured_img']['tmp_name'];
    $file_size = $_FILES['featured_img']['size'];

    $file_name = str_replace(array(' ',','),'',$file_name);
    $fileSplit = explode('.',$file_name);
    $file_extension = strtolower(end($fileSplit));
    $extensions = array('jpeg','png','webp','jpg');
$errors = array();
    if(in_array($file_extension,$extensions) === false){
$errors[] = '<div class="alert alert-danger" role="alert">Only jpg, png,jpeg and webp are allowed</div>';
    }
    if($file_size > 2097152){
        $errors[] = '<div class="alert alert-danger" role="alert">file size expect to maximum 2 mb</div>';
    }
    if(!empty($errors)){
        echo json_encode($errors);
        exit;
    }

    else{

        $file_valid = str_replace(array(' ','_'),'-',$file_name);
        $newFile = time() . $file_valid;
         $latest_file = $newFile; 

   

    if(isset($_POST['product_brand']) || !empty($_POST['product_brand'])){

        $product_brand = $_POST['product_brand'];

    }else{
        $product_brand = 0;
    }

    $db = new Database;
   $params = [
    'product_title' => $db->escapeString($_POST['product_title']),
    'product_code' => uniqid(),
    'product_cat' => $db->escapeString($_POST['product_cat']),
    'product_sub_cat' => $db->escapeString($_POST['product_sub_cat']),
    'product_brand' => $db->escapeString($product_brand),
    'featured_image' => $db->escapeString($latest_file),
    'product_desc' => $db->escapeString($_POST['product_desc']),
    'product_price' => $db->escapeString($_POST['product_price']),
    'qty' => $db->escapeString($_POST['product_qty']),
    'product_status' => $db->escapeString($_POST['product_status'])

   ];

   $db->select('products','product_title',null,"product_title = '{$params['product_title']}'",null,null);

   $exist_title = $db->getResult();
   if(!empty($exist_title)){

    echo json_encode(array('error'=>'product title already exist'));
    exit;
   }

else{
  
   $db->insert('products',$params);
  
   $db->sql("UPDATE sub_categories SET cat_products = cat_products + 1 WHERE sub_cat_id = {$params['product_sub_cat']}");
   $result = $db->getResult();
  
   if(!empty($result)){
    move_uploaded_file($file_temp,"../../product_images/".$latest_file);
    echo json_encode(array('success'=>$result));
   
exit;
      }

     }

    }

  }

}
?>