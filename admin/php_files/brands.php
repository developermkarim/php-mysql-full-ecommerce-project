<?php
include 'database.php';
 if (isset($_POST['create'])) {
     if (!isset($_POST['brand_name']) || empty($_POST['brand_name'])) {
        echo json_encode(array('error'=>'Title Field is Empty'));
      }
      elseif (!isset($_POST['brand_category']) || empty($_POST['brand_category'])) {
        echo json_encode(array('error'=>'Brand Category is Empty'));
      }
      else{
        $db = new Database();
        $title = $db->escapeString($_POST['brand_name']);
        $brand_cat = $db->escapeString($_POST['brand_category']);
        $db->select('brands','brand_title',null,"brand_title='{$title}' AND brand_cat='{$brand_cat}'",null,null);
        $exist = $db->getResult();
        if(!empty($exist)){
            echo json_encode(array('error'=>'this title already exists'));
        }else{
            $db->insert('brands',array('brand_title'=>$title,'brand_cat'=>$brand_cat));
            $response = $db->getResult();
            if(!empty($response)){
                echo json_encode(array('success'=>$response));
            }
        }
      }
  };

  /* Update Brand Here */
   if (isset($_POST['update'])) {
     if (!isset($_POST['brand_id']) || empty($_POST['brand_id'])) {
        echo json_encode(array('error'=>'brand id is empty'));exit;
      }
      elseif (!isset($_POST['brand_name']) || empty($_POST['brand_name'])) {
          echo json_encode(array('error'=>'Brand name is empty'));exit;
        }elseif(!isset($_POST['brand_category']) || empty($_POST['brand_category'])){
            echo json_encode(array('error'=>'Brand category is empty'));exit;
        }else {
            $db = new Database;
            $brand_id = $db->escapeString($_POST['brand_id']);
            $brand_title = $db->escapeString($_POST['brand_name']);
            $brand_cat = $db->escapeString($_POST['brand_category']);
            
            $db->update('brands',array('brand_title'=>$brand_title,'brand_cat'=>$brand_cat),"brand_id='{$brand_id}'");
            $response = $db->getResult();
            if(!empty($response)){
                echo json_encode(array('success'=>$response));exit;
            }
        }
      
    }

    /* Delete Brand Here */
     if (isset($_POST['delete_id'])) {
        
         $db = new Database;
         $delete_id = $db->escapeString($_POST['delete_id']);
         $db->delete('brands',"brand_id = '{$delete_id}'");
          $result = $db->getResult();
          if(!empty($result)){
            echo json_encode(array('success'=>$result));exit;
          }
         /*  else{
            echo json_encode(array('error'=>'Brand is not deleted'));
          } */
      }


