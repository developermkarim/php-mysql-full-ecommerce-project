<?php
include './database.php';

 if (isset($_POST['coupon_id'])) {
    
    $db = new Database;

    $status = isset($_POST['coupon_status']) ? $_POST['coupon_status'] : 0;
    
    $coupon_id = $_POST['coupon_id'];

/*     if ($status == '1') {
        $db->update('coupons',['status'=>'0'],"id = {$coupon_id}");
    }elseif($status == '0'){
        $db->update('coupons',['status'=>'1'],"id = {$coupon_id}");
    } */
    $db->update('coupons',['status'=>$status],"id = {$coupon_id}");
    $updated  = $db->getResult();
    if (!empty($updated)) {
     echo 'true';exit; 
    }else{
    
    }

  }

   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {

      $db = new Database;
      $title = $db->escapeString($_POST['coupon_title']);
      $code = $db->escapeString($_POST['coupon_code']);
      $value = $db->escapeString($_POST['coupon_value']);
      $status = $db->escapeString($_POST['status']);

      $db->select('coupons','code',NULL,"code = '{$code}'");
      $existTitleCode = $db->getResult();
      if (!empty($existTitleCode)) {
        echo json_encode(['error'=>"Coupon Tile and Code already Exist"]);exit;
      }else {
        $params = [
            'title'=>$title,
            'code'=>$code,
            'value'=>$value,
            'status'=>$status,
        ];
        $db->insert('coupons',$params);
        $isInserted = $db->getResult();
        if (!empty($isInserted)) {
            echo json_encode(['success'=>'Coupon added Successfully']);
        }else{
            echo json_encode(['error'=>'Something went wrong,Error occured']);
        }
      }
    }

    /* Coupon Update here */
     if (isset($_POST['update'])) {
        $db = new Database;
        $coupon_Update_id = $db->escapeString($_POST['coupon_update_id']);
        $title = $db->escapeString($_POST['coupon_title']);
        $code = $db->escapeString($_POST['coupon_code']);
        $value = $db->escapeString($_POST['coupon_value']);
        $status = $db->escapeString($_POST['status']);
  
        $db->select('coupons','code',NULL,"code = '{$code}' AND id != {$coupon_Update_id}");
        $existCode = $db->getResult();
        if (!empty($existCode)) {
          echo json_encode(['error'=>"Coupon Tile and Code already Exist"]);exit;
        }else {
          $params = [
              'title'=>$title,
              'code'=>$code,
              'value'=>$value,
              'status'=>$status,
          ];
          $db->update('coupons',$params,"id = $coupon_Update_id");
          $isUpdated = $db->getResult();
          if (!empty($isUpdated)) {
              echo json_encode(['success'=>'Coupon Updated Successfully']);
          }else{
              echo json_encode(['error'=>'Something went wrong,Error occured']);
          }
        }

      }


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_coupon']) && isset($_POST['id'])) {
        
        $db = new Database;
        $coupon_id = $db->escapeString($_POST['id']);

        $db->delete('coupons',"id = {$coupon_id}");
        $isDeleted = $db->getResult();
        if (!empty($isDeleted)) {
            echo json_encode(array('success'=>$isDeleted));exit;
        }else{
            echo json_encode(['error'=>'Sorry, coupon data not deleted']);
        }
    }

?>