<?php
include './database.php';

 if (isset($_POST['sub_category'])) {
    $sub_cate_title = $_POST['sub_cat_name'];
    $parent_cate = $_POST['parent_cat'];

    if(!isset($sub_cate_title) || empty($sub_cate_title)){
        echo json_encode(array('error'=>'please,write sub category title'));
        exit;
    }
    elseif(!isset($parent_cate) || empty($parent_cate)){
        echo json_encode(array('error'=>'please,select at least one category '));
        exit;
    }

    else{

        $db = new Database;
        $sub_cate_title = $db->escapeString($sub_cate_title);
        $parent_cate = $db->escapeString($parent_cate);

        $db->select('sub_categories',"sub_cat_title",null,"sub_cat_title='{$sub_cate_title}'",null,null);
        $previous_sub_cate = $db->getResult();
        if(!empty($previous_sub_cate)){
            echo json_encode(array('error'=>'sorry,the sub category is already exist'));
        }
        else{

            $db->insert('sub_categories',array('sub_cat_title'=>$sub_cate_title,'cat_parent'=>$parent_cate));
            $result = $db->getResult();
            if(!empty($result)){
                echo json_encode(array('success'=>$result));
            }
        }
    }


  }

  /* SHow header server response */

   if (isset($_POST['show_header'])) {
      
    $status = $_POST['show_header'];
    $id = $_POST['id'];

    $db = new Database;

    $db->update('sub_categories',array('show_in_header'=>$status),"sub_cat_id={$id}");
    $result =  $db->getResult();

    if(!empty($result)){
        echo 'true'; exit;
    }

    }
      /* SHow header server response */

      if (isset($_POST['show_footer'])) {
        $status = $_POST['show_footer'];
        $id = $_POST['id'];
        $db = new Database;
        $db->update('sub_categories',array('show_in_footer'=>$status),"sub_cat_id={$id}");
        $result2 = $db->getResult();
        if(!empty($result2)){
            echo 'true';exit;
        }
      }

      if (isset($_POST['update_sub_cateogry'])) {
        $sub_cat_id = $_POST['sub_cat_id'];
        $sub_cat = $_POST['sub_category_name'];
        $update_cat = $_POST['parent_sub_cat'];

        if(!isset($sub_cat) || empty($sub_cat)){
            echo json_encode(array('error'=>'plz,Write Sub category title'));
            exit;
        }elseif(!isset($update_cat) || empty($update_cat)){
            echo json_encode(array('error'=>'plz,Select one of a category'));exit;
        }
        else{

        $db = new Database;
       $sub_cat_title = $db->escapeString($sub_cat);
       $update_cat = $db->escapeString($update_cat);
      /*  $db->select('sub_categories','sub_cat_title',null,"sub_cat_title='{$sub_cat_title}'",null,null,null);
       $exist_sub_cat = $db->getResult();
       if (!empty($exist_sub_cat)) {
        echo json_encode(array('error'=>'sorry, the sub category is already exist'));
       }
       else{ */
        $db->update('sub_categories',array('sub_cat_title'=>$sub_cat_title,'cat_parent'=>$update_cat),"sub_cat_id={$sub_cat_id}");
        $update_result = $db->getResult();
        if(!empty($update_result)){
            echo json_encode(array('success'=>'Congrates! sub Category is updated'));exit;
        }

       }

      }

     if (isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        $db = new Database;
        $db->select('sub_categories','cat_parent',null,"sub_cat_id={$delete_id}",null,null);
        $count = $db->getResult();
        if($count[0]['cat_parent'] > '0'){
            echo json_encode(array('error'=>'Not Deleted SUb Category'));exit;
        }else{
        $db->delete('sub_categories',"sub_cat_id={$delete_id}");
        $isDeleted = $db->getResult();
        if(!empty($isDeleted)){
            echo json_encode(array('success'=>$isDeleted));exit;
        }else{
            echo json_encode(array('error'=>'Sorry! Sub Category is deleted.Something went wrong'));
        }
      }
    }
?>