<?php
include 'database.php';

 if (isset($_POST['login'])) {
    
     if (!isset($_POST['user']) || empty($_POST['user'])) {
        
        echo json_encode(array('error'=>'Username Empty'));exit;
      }
      elseif(!isset($_POST['pass']) || empty($_POST['pass'])){
      echo json_encode(array('error'=>'Password is empty'));exit;
       
      }
      else{
        $db = new Database(); 
        $username = $db->escapeString($_POST['user']);
        $password = md5($db->escapeString($_POST["pass"])); 

        $db->select('admin','admin_name',null,"username = '$username' AND password = '$password'",null,0); 
        $result = $db->getResult();
        if (!empty($result)){
          session_start();
           $_SESSION['adminName'] = $result[0]['admin_name'];
            $_SESSION['admin_role'] = "Admin";
            echo json_encode(array('success'=>'true'));exit;
        }else{
            
            echo json_encode(array('error'=>'false'));exit;
        }
      }

  }
?>