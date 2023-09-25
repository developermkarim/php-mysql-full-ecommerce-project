<?php
include './config.php';
if(isset($_POST['order_status'])){
    $current_status = $_POST['current_status'];
    $order_details_id = $_POST['order_details_id'];
    $db = new Database();
    if($current_status == 'Pending'){
        $db->update("orders",['status'=>'Processing'],"id = {$order_details_id}");
    }
    if($current_status == 'Processing'){
        $db->update("orders",['status'=>'Shipped'],"id = {$order_details_id}");
    }
    if($current_status == 'Shipped'){
        $db->update("orders",['status'=>'Delivered'],"id = {$order_details_id}");
    }
     
    $updated = $db->getResult();
           if(!empty($updated)){
            $db->select('orders','status',null,"id = {$order_details_id}");
            $updated_status = $db->getResult();
            $status = $updated_status[0]['status'];
            echo json_encode(['success'=>'Order Status is Now Updated','status'=>$status]);
           }else{
            echo json_encode(['error'=>'Order Status is Not Updated']);exit;
           }

   


}