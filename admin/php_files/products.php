<?php
include './config.php';
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
   
    else{

        /* Featured Image Here Start */

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
    'product_status' => $db->escapeString($_POST['product_status']),
    'featured_product'=>$db->escapeString($_POST['featured_product']),

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
    move_uploaded_file($file_temp,"../product_images/".$latest_file);

            /* Multiple Gallery Image Here To Optimize Start */
if (isset($_FILES['product_gallery_images']) && !empty($_FILES['product_gallery_images'])) {
        
    $gallery_images = $_FILES['product_gallery_images'];
    foreach($gallery_images['name'] as $key => $gallery_image){

        $image_name = $gallery_image;
        $image_type = $gallery_images['type'][$key];
        $image_temp = $gallery_images['tmp_name'][$key];
        $image_size = $gallery_images['size'][$key];

        $img_arr = ['png','jpeg','jpg','webp','gif'];
        $gallery_separate = explode('.',$image_name);
        $gallery_path = strtolower(end($gallery_separate));
        $optimize_gallery = str_replace([' ','_',','],'-',$image_name);

        $gallery_error = [];
        if(!in_array($gallery_path,$img_arr)) {
            $gallery_error[] = '<div class="alert alert-danger" role="alert">Gallery Image Only jpg, png,jpeg and webp are allowed</div>';
        }if ($image_size > 2097152) {
            $gallery_error[] = '<div class="alert alert-danger" role="alert">Gallery Image File Size is to long, Size must be below 2 mb </div>';
        }

        if(empty($gallery_error)){
           
            $final_gallery = 'gallery_img-' . rand(19,999) .'-'. $_POST['product_title'] .'.'. $gallery_path;
            $destination_image  = "../product_images/" . $final_gallery;
            
            if(move_uploaded_file($image_temp,$destination_image)){

            }else{
                $gallery_error[] = '<div class="alert alert-danger" role="alert">Sorry, Gallery Image not uploaded to Path</div>';
            }
            
        }

        if(!empty($gallery_error)){
            echo json_encode($gallery_error);exit;

        }else{

        // echo $hostname;exit;
        $db = new Database;
        // product_id	product_name	image_url	gallery_image
        $db->select('products','product_id,product_title',null,"product_title = '{$params['product_title']}'",null,null);
        $product_id = $db->getResult()[0];

        $gallery_params = [
            'product_id'=> $product_id['product_id'],
            'product_name'=> $product_id['product_title'],
            'image_path'=> 'admin/product_images/' . $final_gallery,
            'gallery_image'=> $final_gallery,
        ];

        $db->insert('gallery_images',$gallery_params);
        $gellary_inserted = $db->getResult();
        if(!empty($gellary_inserted)){

        }else{
            echo json_encode(['error'=>"Gallery Image Not saved in database"]);exit;
        }

        }
    }
}
    /* Multiple Gallery Image Here To Optimize End */

    echo json_encode(array('success'=>$result));exit;

      }
     }
    }
  }
};

/* Update Product Here */
 if (isset($_POST['update'])){
     if (!isset($_POST['product_id']) || empty($_POST['product_id'])) {
        echo json_encode(array('error'=>'Product ID is Empty'));exit;
    }elseif(!isset($_POST['product_title']) || empty($_POST['product_title'])){
		echo json_encode(array('error'=>'Title Field is Empty.')); exit;
	}elseif(!isset($_POST['product_cat']) || empty($_POST['product_cat'])){
		echo json_encode(array('error'=>'Category Field is Empty.')); exit;
	}elseif(!isset($_POST['product_sub_cat']) || empty($_POST['product_sub_cat'])){
		echo json_encode(array('error'=>'Sub Category Field is Empty.')); exit;
	}elseif(!isset($_POST['product_desc']) || empty($_POST['product_desc'])){
		echo json_encode(array('error'=>'Description Field is Empty.')); exit;
	}elseif(!isset($_POST['product_price']) || empty($_POST['product_price'])){
		echo json_encode(array('error'=>'Price Field is Empty.')); exit;
	}elseif(!isset($_POST['product_qty']) || empty($_POST['product_qty'])){
        echo json_encode(array('error'=>'Quantity Field is Empty.')); exit;
    }elseif(!isset($_POST['product_status']) || empty($_POST['product_status'])){
		echo json_encode(array('error'=>'Status Field is Empty.')); exit;
      }elseif(empty($_POST['old_image']) && empty($_FILES['new_image']['name'])){
       echo json_encode(array('error'=>'Image Field is Empty'));exit;
      }

      else
      {
        if(!empty($_POST['old_image']) && empty($_FILES['new_image']['name'])){
            $file_name = $_POST['old_image'];
        }
        elseif(!empty($_POST['old_image']) && !empty($_FILES['new_image']['name'])){

            $errors = array();
            $file_name = $_FILES['new_image']['name'];
            $file_type = $_FILES['new_image']['type'];
            $file_size = $_FILES['new_image']['size'];
            $file_temp = $_FILES['new_image']['tmp_name'];
            $file_name = str_replace(array(',', ' '),'',$file_name);
            $file_seperate = explode('.',$file_name);
            $file_ext = strtolower(end($file_seperate));
            $img_extentions = array("jpeg","jpg","png","webp","gif");
            if(in_array($file_ext,$img_extentions) === false){
                $errors[] = "Extension not allowed, Please Choose a JPEG or PNG file";
            }
            if($file_size > 2097152){
                $errors[] = "File size must be excately 2 MB";
            }
            if(file_exists("../product_images/" . $_POST['old_image'])){
                unlink("../product_images/".$_POST['old_image']);
            }

            $file_name =  rand(500,999) .str_replace(array('_',' '),'-',$file_name);

        }

        elseif(empty($_POST['old_image']) && !empty($_FILES['new_image']['name'])){
            $errors = [];
            $file_name = $_FILES['new_image']['name'];
            $file_type = $_FILES['new_image']['type'];
            $file_size = $_FILES['new_image']['size'];
            $file_temp = $_FILES['new_image']['tmp_name'];
            // $file_name = str_replace(array(',',' '),'',$file_name);
            $file_seperate = explode('.',$file_name);
            $file_ext = strtolower(end($file_seperate));
            $img_extentions = array("jpeg","jpg","png","webp","gif");
            if(in_array($file_ext,$img_extentions) ===  false){
                $errors[] = "Extension not allowed, Please Choose a JPEG or PNG file";
            }
            if($file_size > 2097152){
                $errors[] = "File size must be excately 2 MB";
            }
           $file_name = rand(500,999) . str_replace(array('_',' '),'-',$file_name);
        }

        if(!empty($errors)){
            echo json_encode($errors);exit;
        }
        else{
            /* This is for Brand Check.Not Just brand , what will be optional,must be coded like this  */
            if(isset($_POST['product_brand']) && !empty($_POST['product_brand'])){
                $product_brand = $_POST['product_brand'];
            }else{
                $product_brand  = '0';
            }

            /* Main Update Program writing Here */
            $db = new Database();
            $params = [
                'product_title' => $db->escapeString($_POST['product_title']),
        		'product_cat' => $db->escapeString($_POST['product_cat']),
        		'product_sub_cat' => $db->escapeString($_POST['product_sub_cat']),
        		'product_brand' => $db->escapeString($product_brand),
        		'featured_image' => $db->escapeString($file_name),
        		'product_desc' => $db->escapeString($_POST['product_desc']),
        		'product_price' => $db->escapeString($_POST['product_price']),
                'qty' => $db->escapeString($_POST['product_qty']),
        		'product_status' => $db->escapeString($_POST['product_status']),
                'featured_product'=>$db->escapeString($_POST['featured_product']),
            ];

            $db->update('products',$params,"product_id='{$_POST['product_id']}'");
            $isUpdated = $db->getResult();
            if(!empty($isUpdated)){
                if (!empty($_FILES['new_image']['name'])){
                    move_uploaded_file($file_temp,"../product_images/" . $file_name); 
                }

            /* Multiple Gallery Image Here To Optimize Start */
            if (isset($_FILES['product_gallery_images']) && !empty($_FILES['product_gallery_images'])) {
        
                $gallery_images = $_FILES['product_gallery_images'];
            
                foreach($gallery_images['name'] as $key => $gallery_image){
            
                    $image_name = $gallery_image;
                    $image_type = $gallery_images['type'][$key];
                    $image_temp = $gallery_images['tmp_name'][$key];
                    $image_size = $gallery_images['size'][$key];
            
                    $img_arr = ['png','jpeg','jpg','webp','gif'];
                    $gallery_separate = explode('.',$image_name);
                    $gallery_path = strtolower(end($gallery_separate));
                    $optimize_gallery = str_replace([' ','_',','],'-',$image_name);
                    
                    $gallery_error = [];
                    if(!in_array($gallery_path,$img_arr)) {
                        $gallery_error[] = '<div class="alert alert-danger" role="alert">Gallery Image Only jpg, png,jpeg and webp are allowed</div>';
                    }if ($image_size > 2097152) {
                        $gallery_error[] = '<div class="alert alert-danger" role="alert">Gallery Image File Size is to long, Size must be below 2 mb </div>';
                    }
            
                    if(empty($gallery_error)){
            
                       
                        $final_gallery = 'gallery_img-' . rand(19,999) . $_POST['product_title'] .'.'. $gallery_path;
                        $destination_image  = "../product_images/" . $final_gallery;
                        
                        if(move_uploaded_file($image_temp,$destination_image)){
            
                        }else{
                            $gallery_error[] = '<div class="alert alert-danger" role="alert">Sorry, Gallery Image not uploaded to Path</div>';exit;
                        }
                        
                    }
            
                    if(!empty($gallery_error)){
                        echo json_encode($gallery_error);exit;
            
                    }else{
            
                        
                     /* End Update Here */

                    $db = new Database;
                    // product_id	product_name	image_url	gallery_image
                    $db->select('gallery_images','id,product_id,gallery_image,image_path',null,"product_id = {$_POST['product_id']}",null,null);
                    $product_id = $db->getResult();

                    $gallery_params = [
                        'product_id'=> $_POST['product_id'],
                        'product_name'=> $_POST['product_title'],
                        'image_path'=> 'admin/product_images/' . $final_gallery,
                        'gallery_image'=> $final_gallery, 
                    ];
               
                    if (empty($product_id[$key])) {
                       
                        $db->insert('gallery_images',$gallery_params);
                        $db->getResult();
                        echo json_encode(['success'=>"Gallery Image saved successfully in database"]);
                    }else{

                        if(file_exists('../product_images/' . $product_id[$key]['gallery_image'])){
                            // print_r($product_id[$key]['gallery_image']);exit; 
                         unlink('../product_images/' .$product_id[$key]['gallery_image']);
                        }
                        
                            // print_r($gallery_params);exit;
                        $db->update('gallery_images',$gallery_params,"id = {$product_id[$key]['id']}");
                        $gellary_updated = $db->getResult();
                        if(!empty($gellary_updated)){
                             
                        }else{
                            echo json_encode(['error'=>"Gallery Image Not saved in database"]);exit;
                        }
                    }
                   
                
            
                }

                }
            }
                /* Multiple Gallery Image Here To Optimize End */
            

                echo json_encode(array('success'=>$isUpdated[0]));exit;
            }

        }

      }

  }

   if (isset($_POST['delete_id'])) {     
     $db = new Database();

     $delete_id = $db->escapeString($_POST['deleted_id']);
     $product_sub_cat = $db->escapeString($_POST['product_sub_cat']);
     $db->delete('products',"product_id='{$_POST['delete_id']}'");
     $db->sql("UPDATE sub_categories SET cat_products = cat_products - 1 WHERE sub_cat_id = {$product_sub_cat}");
     $isDeleted = $db->getResult();
     if(!empty($isDeleted)){
        echo json_encode(array('success'=>"Productd Is deleted successfully"));exit;
     }else{
        echo json_encode(array('error'=>"SOrry! Something Went wrong ,Product is not deleted"));
     }
    }


     if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
        $db = new Database;

        $status = $db->escapeString($_POST['status']);
        $product_id = $db->escapeString($_POST['product_id']);
        $db->update('products',array('featured_product'=>$status),"product_id={$product_id}");

        $result = $db->getResult();

        if(!empty($result)){
            echo "true";
        }
      }