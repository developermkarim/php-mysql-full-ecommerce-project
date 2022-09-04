<?php
include 'database.php';

 if (isset($_POST['login'])) {
    
     if (!isset($_POST['user']) || empty($_POST['user'])) {
        
        echo json_encode(array('error'=>'Username Empty'));exit;
      }
      elseif(!isset($_POST['pass']) || empty($_POST['pass'])){
      echo  json_encode(array('error'=>'Password is empty'));exit;
       
      }
      else{
        $db = new Database(); 
        $username = $db->
        $password = md5($db->escapeString($_POST["pass"])); 

        $db->select('admin','admin_name',null,"username = '$username' AND password = '$password'",null,0); 
        $result = $db->getResult();
             print_r($result);
        if (!isset($result)) {
            echo json_encode(array('error'=>"Data not found"));
        }else{
            $_SESSION['adminName'] = $result['admin_name'];
            $_SESSION['adminrole'] = "Admin";
            echo json_encode(array('success'=>"Data found"));
        }
      }

  }
?>