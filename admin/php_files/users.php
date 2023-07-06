<?php

include 'database.php';

 if (isset($_POST['user_id'])) {
    $db = new Database;
    $db->select('user','*',null,"user_id='{$_POST['user_id']}'",null,null);
    $user_result = $db->getResult();

    if(!empty($user_result)){
        echo json_encode(array('success'=>$user_result));exit;
    }else{
        echo json_encode(array('error'=>'No User Data is Found'));
    }

  }



 if (isset($_POST['user_role'])) {
   
   // $user_id = $db->escapeString($_POST['user_id']);
       $user_id = $_POST['user_id'];
   // $user_role = $db->escapeString($_POST['user_role']);
       $user_role = $_POST['user_role'];

       $db = new Database();
    if ($user_role == '1') {
        $db->update('user',['user_role'=>'0'],"user_id='{$user_id}'");
        // $active_result = $db->getResult();
       
    }
    else{
        $db->update('user',['user_role'=>'1'],"user_id='{$user_id}'");
    }

    $active_result = $db->getResult();
    if(!empty($active_result)){
        echo json_encode(array('success'=>'success'));
    }
  }

 if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    $db = new Database;

    $db->delete('user',"user_id={$user_id}");

    $result = $db->getResult();
    if(!empty($result)){
        echo json_encode(array('success'=>'User is Deleted'));
    }else{
        echo json_encode(array('error'=>'User not Deleted'));
    }
  }

?>