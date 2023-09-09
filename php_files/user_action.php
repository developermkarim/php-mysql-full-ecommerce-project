<?php
include './../admin/php_files/config.php';
 if (isset($_POST['create'])) {

     if (!isset($_POST['f_name']) || empty($_POST['f_name'])) {
        echo json_encode(array('error'=>'First Name is Empty'));exit;
    }else if(!isset($_POST['l_name']) || empty($_POST['l_name'])){
        echo json_encode(array('error'=>'Last Name Field Empty.')); exit;
    }else if(!isset($_POST['username']) || empty($_POST['username'])){
        echo json_encode(array('error'=>'Username Field Empty.')); exit;
    }else if (!filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) {
          echo json_encode(array('error'=>'Please Enter Correct Email Address.')); exit;
    }else if(!isset($_POST['password']) || empty($_POST['password'])){
        echo json_encode(array('error'=>'Password Field Empty.')); exit;
    }else if(!isset($_POST['mobile']) || empty($_POST['mobile'])){
        echo json_encode(array('error'=>'Mobile Number Field Empty.')); exit;
    }else if(!isset($_POST['address']) || empty($_POST['address'])){
        echo json_encode(array('error'=>'Address Field Empty.')); exit;
    }else if(!isset($_POST['city']) || empty($_POST['city'])){
        echo json_encode(array('error'=>'City Field Empty.')); exit;
    }else{

    $db = new Database();
    $params = [
        'f_name' => $db->escapeString($_POST['f_name']),
        'l_name' => $db->escapeString($_POST['l_name']),
        'username' => $db->escapeString($_POST['username']),
        'password' => md5($db->escapeString($_POST['password'])),
        'mobile' => $db->escapeString($_POST['mobile']),
        'address' => $db->escapeString($_POST['address']),
        'city' => $db->escapeString($_POST['city'])
     ];
    $db->select('user','username,mobile',null,"username='{$_POST['username']}' AND mobile='{$_POST['mobile']}'");
    $existing = $db->getResult();
    if(!empty($existing)){
        echo json_encode(array('error'=>'sorry, This user is already registered'));

    }else{

        $db->insert('user',$params);
        $userResult = $db->getResult();
        if(is_numeric($userResult[0])){
            session_start();
            $_SESSION['user_id'] = $userResult[0]; // userid of user session.
            $_SESSION['username'] = $params['f_name'];
            $_SESSION['user_role'] = 'user'; // user is user role for checking role is available.
            echo json_encode(array('success'=>'User Registered succcessfully'));exit;
        }else{
            echo json_encode(array('error'=> $userResult));
        }
    }

  }

 }

  if (isset($_POST['login'])) {
   
      if (!isset($_POST['username']) || empty($_POST['username'])) {
         echo json_encode(array('error'=>'Username is Empty'));exit;
       }elseif(!isset($_POST['password']) || empty($_POST['password'])){
        echo json_encode(array('error'=>'password is Empty'));exit;
       }
       else{
        $db = new Database();

        $username = $db->escapeString($_POST['username']);
        $password = md5($db->escapeString($_POST['password']));
        

        $db->select('user','user_id,username,f_name,l_name',null,"username = '{$username}' AND password = '{$password}'",null,null);
        $response = $db->getResult();
        if(!empty($response)){
            if(count($response[0]) > 1){
                /* Start the session */
                session_start();
                /* Set session variables */
                foreach($response as $row){
                    $_SESSION["user_id"] = $row['user_id']; /* userid of the user */
                    $_SESSION["username"] = $row['f_name'];
                    $_SESSION["user_role"] = 'user'; /* for user */
                }
                
                echo json_encode(array('success'=>'Logged In Successfully.')); exit;
            }else{
                echo json_encode(array('error'=>'Username and Password not matched.')); exit;
            }
        }else{
            echo json_encode(array('error'=>'Username and Password not matched.')); exit;
        }

       }

   }

    if (isset($_POST['logout'])) {
        session_start();
        /* remove all session variables */
       session_unset();
          /* destroy the session */
       session_destroy();
       echo 'true'; // Change this to your desired destination
       exit();
     }

 if (isset($_POST['update'])) {
    
    if (isset($_POST['f_name']) || empty($_POST['f_name'])) {
        echo json_encode(array('error'=>'First Name is Empty'));exit;
    }else if(!isset($_POST['l_name']) || empty($_POST['l_name'])){
        echo json_encode(array('error'=>'Last Name Field Empty.')); exit;
    }else if(!isset($_POST['username']) || empty($_POST['username'])){
        echo json_encode(array('error'=>'Username Field Empty.')); exit;
    }else if(!isset($_POST['mobile']) || empty($_POST['mobile'])){
        echo json_encode(array('error'=>'Mobile Number Field Empty.')); exit;
    }else if(!isset($_POST['address']) || empty($_POST['address'])){
        echo json_encode(array('error'=>'Address Field Empty.')); exit;
    }else if(!isset($_POST['city']) || empty($_POST['city'])){
        echo json_encode(array('error'=>'City Field Empty.')); exit;
    }
    else{

        $db = new Database;

        $params = [
            'f_name' => $db->escapeString($_POST['f_name']),
            'l_name' => $db->escapeString($_POST['l_name']),
            'username' => $db->escapeString($_POST['username']),
            'password' => md5($db->escapeString($_POST['password'])),
            'mobile' => $db->escapeString($_POST['mobile']),
            'address' => $db->escapeString($_POST['address']),
            'city' => $db->escapeString($_POST['city'])
        ];

        if(!session_id()){
            session_start();
        }
        $db->update('user',$params,"user_id='{$_SESSION['user_id']}'");
        $updateResult = $db->getResult();
        if(!empty($updateResult)){
            echo json_encode(array('success'=>$updateResult));exit;
        }else{
            echo json_encode(array('error'=>"User Data updated successfully"));exit;
        }
    }
  }

   if (isset($_POST['ModifyPass'])) {
    
    if (isset($_POST['old_password']) || empty($_POST['old_password'])) {
        echo json_encode(array('error'=>'old_password is Empty'));exit;
    }else if(!isset($_POST['new_password']) || empty($_POST['new_password'])){
        echo json_encode(array('error'=>'New password Field Empty.')); exit;
    
    }else{

        if(!session_id()){
            session_start();
        };

        $user = $_SESSION['user_id'];
        $db = new Database;
        $old_password = md5($db->escapeString($_POST['old_password']));
        $new_password = md5($db->escapeString($_POST['new_password']));

        $db->select('user','*',null,"password='{$_POST['old_password']}' AND user_id='{$user}'",null,null);

        $existUser = $db->getResult();
        if(!empty($existing)){

            $db->update('user',['password'=>$new_password],"user_id='{$user}' AND password='{$old_password}'");

            $updateResult = $db->getResult();

            if (!empty($updateResult)) {
                echo json_encode(array('success'=>'User Password Updated Successfully'));exit;
            }else{
                echo json_encode(array('error'=>'User Password not Updated'));exit;
            }
        }else{
            echo json_encode(array('error'=>'Old Password dos\'nt  matched'));exit;
        }
        
    }

}

if(!session_id()){
    session_start();

}
/* Wishlist server code Here */
 if(isset($_POST['wishlist_id'])) {

    if (!isset($_SESSION['user_id'])) {
        $response = array(
            "message" => "Please Login before add to Wishlist",
            "showModal" => true  // This could be a flag to indicate whether to show the modal
        );
        echo json_encode($response);
        exit;
    }

    $db = new Database;

    $p_id = $_POST['wishlist_id'];
    if(isset($_COOKIE['user_wishlist-'.$p_id])){
        echo json_encode(['error'=>'Already Added this product to wishlist']);exit;
        $user_wishlist = json_decode($_COOKIE['user_wishlist-'.$p_id]);
    }else{
        $user_wishlist = [];
    }
    if(!in_array($p_id,$user_wishlist)){
        array_push($user_wishlist,$p_id);
    }
/*     if(in_array($p_id,$user_wishlist)){
        echo json_encode(['success'=>'Already Added this product to wishlist']);
    } */

    

    $wishlist_count = count($user_wishlist);
    $u_wishlist = json_encode($user_wishlist);

    if(setcookie("user_wishlist-$p_id",$u_wishlist,time() + (180),'/','','',TRUE)){
        setcookie('wishlist_count',$wishlist_count,time() + (180),'/','','',TRUE);
        echo json_encode(['success'=>'added to wishlist successfully','wishlist_count'=>$wishlist_count]);
    }else{
        echo json_encode(['error'=>'cookie set successfully']);
    }

  };





if (!session_id()){
    session_start();

}
/* add to cart  */
 if (isset($_POST['cart_product_id'])) {

    if (!isset($_SESSION['user_id'])) {
        $response = [
            'message'=>"Please Login before add to cart",
            "showModal"=>true,
        ];
        echo json_encode($response);exit;
      }

    $db = new Database;
    $product_id = $db->escapeString($_POST['cart_product_id']);
    $product_price = $db->escapeString($_POST['product_price']);
    $user_id = $_SESSION['user_id'];

    $cart_params = [
        'product_id'=>$product_id,
        'price'=>$product_price,
        'user_id'=>$user_id,
        'quantity'=>1,
    ];

    $db->select('cart',"product_id,user_id,id",null,"product_id={$product_id} AND user_id={$user_id}",null,null);

    $exist = $db->getResult();
  /*   $addedCart = $exist[0]['id']; */
    if (!empty($exist)) {

        echo json_encode(['error'=>"Product is already added to cart.Please Choose Another Cart"]);

    }else {
        
        $db->insert('cart',$cart_params);
         $isInserted = $db->getResult();
         

         if(!empty($isInserted)){

            /* Cart count Here */
            $carts = $db->select('cart','id',null,"user_id={$user_id}");
             $cartResult = $db->getResult();
            // $cartCount = $cartResult
            echo json_encode(['success'=>'Add To cart Successfully','cart_count'=>count($cartResult)]);

         }else{

            echo json_encode(['error'=>"Product is not added to cart,Please Try it again"]);

         }

    }


  };


   if(!session_id()) {
      session_start();
    }
     if(isset($_POST['cart_id'])) {
        
        $db = new Database;
        $cart_id = $db->escapeString($_POST['cart_id']);

      $user_id = $_SESSION['user_id'];

        $db->delete('cart',"id = $cart_id AND user_id = {$user_id}");
        $isDeleted = $db->getResult();

        if (!empty($isDeleted)) {
            
            $db->select('cart',"id = $cart_id AND user_id = {$user_id}");
            $cartCount = $db->getResult();

            echo json_encode(['success'=>'Cart Removed Successfully','cart_count'=>count($cartCount)]);

        }else {

            echo json_encode(['error'=>'Sorry, Cart Not Removed']);
        }

      }


      /* Increment Value By Counting */

       if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['cart_inc_id']) && isset($_POST['action'])) {

          $db = new Database;
          $countValue = $db->escapeString($_POST['increment_value']);
          $cart_id = $db->escapeString($_POST['cart_inc_id']);

          $action = $db->escapeString($_POST['action']);
          $user_id = $_SESSION['user_id'];

        $db->sql("UPDATE cart SET quantity = quantity + 1  WHERE id = $cart_id AND user_id = $user_id");

        $updated = $db->getResult();

        if (!empty($updated)) {
            $db->select('cart','quantity, price * quantity as total_price',null,"id={$cart_id} AND user_id = {$user_id}");

            $cart_result = $db->getResult();
            $newQuantity = $cart_result[0]['quantity'];
            $newPrice  = $cart_result[0]['total_price'];
            
            /* Sub Total Price of all carts with their all qauntities */
            $db->select('cart','SUM(quantity * price) AS subTotal, COUNT(id) as rowCount',null,"user_id = {$user_id}");
            $sbTotalRes = $db->getResult();
            $sub_total  = $sbTotalRes[0]['subTotal'];
            $rowCount  = $sbTotalRes[0]['rowCount'];

            
            echo json_encode(['success'=>'cart increment','newQuantity'=>$newQuantity,'total_price'=>$newPrice,'subTotal'=>$sub_total,'rowCount'=>$rowCount]);

        }else{

            echo json_encode(['error'=>'cart not incremented']);
        }

        }

    
              /* Increment Value By Counting */

       if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cart_dec_id']) && isset($_POST['action'])) {

        $db = new Database;
        $countValue = $db->escapeString($_POST['decrement_value']);
        $cart_id = $db->escapeString($_POST['cart_dec_id']);

        $action = $db->escapeString($_POST['action']);

        $user_id = $_SESSION['user_id'];

      $db->select('cart','quantity',null,"id={$cart_id} AND user_id = {$user_id}");
      $cart_qty = $db->getResult();
      $existQuantity = $cart_qty[0]['quantity'];
    //   $newPrice  = $cart_result[0]['total_price'];

      if($existQuantity < 1 || $existQuantity == 1){
        echo json_encode(['error'=>'count Value Does\'nt below 1']);exit;
      }

      $db->sql("UPDATE cart SET quantity = quantity - 1  WHERE id = $cart_id AND user_id = {$user_id}");
      $updated = $db->getResult();

      if (!empty($updated)) {
          $db->select('cart','quantity, price * quantity as total_price',null,"id={$cart_id} AND user_id = {$user_id}");
          $cart_result = $db->getResult();
          $newQuantity = $cart_result[0]['quantity'];
          $newPrice  = $cart_result[0]['total_price'];

            /* Sub Total Price of all carts with their all qauntities */
            $db->select('cart','SUM(quantity * price) AS subTotal, COUNT(id) as rowCount',null,"user_id = {$user_id}");
            $sbTotalRes = $db->getResult();
            $sub_total  = $sbTotalRes[0]['subTotal'];
            $rowCount  = $sbTotalRes[0]['rowCount'];

          echo json_encode(['success'=>'cart increment','newQuantity'=>$newQuantity,'total_price'=>$newPrice,'subTotal'=>$sub_total,'rowCount'=>$rowCount]);

      }else{

          echo json_encode(['error'=>'cart not incremented']);
      }

      }


        /* Cart Count By Live Input Search */

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && isset($_POST['cart_count_id'])){

            $db = new Database;
            $countValue = $db->escapeString($_POST['count_value']);
            $cart_id = $db->escapeString($_POST['cart_count_id']);
  
            $action = $db->escapeString($_POST['action']);
            $user_id = $_SESSION['user_id'];
            /* Count Update Here */

            $db->sql("UPDATE cart SET quantity = '$countValue' WHERE id = $cart_id AND user_id = $user_id");

            $updated = $db->getResult();

            if (!empty($updated)) {
                $db->select('cart','quantity, price * quantity as total_price',null,"id={$cart_id} AND user_id = {$user_id}");
                $cart_result = $db->getResult();
                $newQuantity = $cart_result[0]['quantity'];
                $newPrice  = $cart_result[0]['total_price'];
                
        /* Sub Total Price of all carts with their all qauntities */
            $db->select('cart','SUM(quantity * price) AS subTotal, COUNT(id) as rowCount',null,"user_id = {$user_id}");
            $sbTotalRes = $db->getResult();
            $sub_total  = $sbTotalRes[0]['subTotal'];
            $rowCount  = $sbTotalRes[0]['rowCount'];


                echo json_encode(['success'=>'cart increment','newQuantity'=>$newQuantity,'total_price'=>$newPrice,'subTotal'=>$sub_total,'rowCount'=>$rowCount]);
    
            }else{
    
                echo json_encode(['error'=>'cart not incremented']);
            }

        }
         if (isset($_POST['applied'])) {

             if (!isset($_POST['hidden_code']) && empty($_POST['hidden_code'])) {
                echo json_encode(['error'=>"Sorry You are Not Valid For Coupon"]);exit;
              }
              elseif($_POST['hidden_code'] != $_POST['apply_coupon'] || trim($_POST['apply_coupon']) == '') {
                echo json_encode(['error'=>"Sorry You are Not Valid For Coupon"]);exit;
              }
              else {
                
              

            $db = new Database;
            $coupon_code = $db->escapeString($_POST['apply_coupon']);
            $hidden_code = $db->escapeString($_POST['hidden_code']); // same with the apply_coupon

            $db->select('coupons','value,title,code',null,"code = '{$coupon_code}' AND code = '{$hidden_code}'");
            $coupon_data = $db->getResult();

            /* Cart Wise Coupon State Here */
            $user_id = $_SESSION['user_id'];
            $db->select('cart','COUNT(id) as TotalCart',null,"user_id = $user_id");
            if(!empty($coupon_data)){

                /* Session Set for Whether session set or not */
                $_SESSION['coupon-session'] = 'coupon_applied';

                $coupon_price = $coupon_data[0]['value'];

                $_SESSION['coupon-price'] = $coupon_price;

            /* Sub Total Price of all carts with their all qauntities */
            $db->select('cart','SUM(quantity * price) AS subTotal, COUNT(id) as rowCount',null,"user_id = {$user_id}");
            $sbTotalRes = $db->getResult();
            $sub_total  = $sbTotalRes[0]['subTotal'];
            $rowCount  = $sbTotalRes[0]['rowCount'];

            /* Title Wise Coupon Code For SILVER User */
            $db->select('coupons','value,title,code',null,"title = 'SILVER'");
            $silver_coupon = $db->getResult();

            /* Title Wise Coupon Code For GOLD User */
            $db->select('coupons','value,title,code',null,"title = 'GOLD'");
            $gold_coupon = $db->getResult();

             /* Title Wise Coupon Code For PLATINUM User */
            $db->select('coupons','value,title,code',null,"title = 'PLATINUM'");
            $platinum_coupon = $db->getResult();

            echo json_encode(['success'=>'Coupon Is Successfully applied','subTotal'=>$sub_total,'rowCount'=>$rowCount,'coupon_price'=>$coupon_price,'silver_coupon'=>$silver_coupon[0]['code'],'gold_coupon'=>$gold_coupon,'platinum_coupon'=>$platinum_coupon]);


            }else{
                echo json_encode(['error'=>"Coupon Code not Found"]);
            }

        }

          }