<?php
include './database.php';
 if (isset($_POST['category'])) {
  $categoryName = $_POST['category_name'];
  if(!isset($categoryName) || empty($categoryName)){
    echo json_encode(array('error'=>'Write any kind of Category'));
 
  }
  else{

   $db = new Database();
   $cat_title = $db->escapeString($categoryName);
   $db->select('categories','cat_title',null,"cat_title='{$cat_title}'",null,null);

   $pre_category = $db->getResult();
  //  echo $pre_category;exit;
   
if(!empty($pre_category)){
echo json_encode(array('error'=>'category name is already exists.'));
  }else{
    $db->insert('categories',array('cat_title'=>$cat_title));
    $response = $db->getResult();
    if(!empty($response)){
      echo json_encode(array('success'=>$response));

      }  
    }
  }
};

/* Category Update */
if(isset($_POST['cate_update'])){
  $db = new Database();

   $categoryName =  $db->escapeString($_POST['update_category_name']);
   $category_id = $db->escapeString($_POST['cat_id']);
  if(!isset($categoryName) || empty($categoryName)){
    echo json_encode(array('error'=>'Write any kind of Category'));
 
  }else{

    $db->select('categories','cat_title',null,"cat_title='{$categoryName}'",null,null);

    $result = $db->getResult();
// print_r($result);
    if(!empty($result)){
      echo json_encode(array('error'=>'Category is already exists','category_name'=>$result));
    }
    else{

      // $db->insert('categories',array('cat_title'=>$categoryName));

      $db->update('categories',array('cat_title'=>$categoryName),"cat_id={$category_id}");

      $response = $db->getResult();

      if(!empty($response)){
        echo json_encode(array('success'=>$response));
      }else{
        echo json_encode(array('error'=>'sorry,category is not inserted'));
      }
    }
  }

}

/* Delete Category Server Code */
if(isset($_POST['delete_id'])){
  $db = new Database();
  $id = $db->escapeString($_POST['delete_id']);

  $db->delete('categories',"cat_id='{$id}'");
  $response = $db->getResult();
  if(!empty($response)){
    echo json_encode(array('success'=>'data deleted successfully'));
    exit;
  }
  else{
    echo json_encode(['error'=>'data not deleted']);
    exit;
  }
}
?>