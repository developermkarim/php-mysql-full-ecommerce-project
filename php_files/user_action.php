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
            echo json_encode(['success'=>'Add To cart Successfully, Go To <a href="cart.php" class="text-primary">Cart</a>','cart_count'=>count($cartResult)]);

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
            
            $db->select('cart',"*, COUNT(id) as user_cart_count, SUM(quantity*price) as subTotal",null,"user_id = {$user_id}");
            $cartRes = $db->getResult();
            $cartCount = $cartRes[0]['user_cart_count'];
            $sub_total = $cartRes[0]['subTotal'];
/*         $_SESSION['coupon-session'] = 'coupon_applied';
           $_SESSION['coupon-price'] = $coupon_price; */

            if ($cartCount <= 1 ) {
                unset($_SESSION['coupon-session']);
                unset($_SESSION['coupon-price']);
            }

            echo json_encode(['success'=>'Cart Removed Successfully','cart_count'=>$cartCount,'subTotal'=>$sub_total]);

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
              }elseif ($_POST['userCartCount'] <= 1) {
                echo json_encode(['error'=>"Sorry Your cart(One) are Not Valid For Coupon"]);exit;
              }
              else {
                
              

            $db = new Database;
            $coupon_code = $db->escapeString($_POST['apply_coupon']);
            $hidden_code = $db->escapeString($_POST['hidden_code']); // same with the apply_coupon

            $db->select('coupons','value,title,code',null,"code = '{$coupon_code}' AND code = '{$hidden_code}'");
            $coupon_data = $db->getResult();

            /* Cart Wise Coupon State Here */
            $user_id = $_SESSION['user_id'];
            $db->select('cart','COUNT(id) as TotalCart, SUM(quantity * price) as sub_total',null,"user_id = $user_id");
            $carts = $db->getResult();
            if(!empty($coupon_data)){

                /* Session Set for Whether session set or not */
                $_SESSION['coupon-session'] = 'coupon_applied';
                $sub_total = $carts[0]['sub_total'];
               /*  echo $sub_total; */
                $coupon_price = ($sub_total * $coupon_data[0]['value']) / 100;
         /*         echo $coupon_price; */
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

            echo json_encode(['success'=>'Coupon Is Successfully applied','subTotal'=>$sub_total,'rowCount'=>$rowCount,'coupon_price'=>$coupon_price,'coupon_value'=>$coupon_data[0]['value'],'silver_coupon'=>$silver_coupon[0]['value'],'gold_coupon'=>$gold_coupon[0]['value'],'platinum_coupon'=>$platinum_coupon[0]['value']]);


            }else{
                echo json_encode(['error'=>"Coupon Code not Found"]);
            }

        }

    }

    if(!session_status() == PHP_SESSION_NONE){
        session_start();
    }
   
     if (isset($_POST['shipping'])) {
        
            // Initialize an array to store the response data
    $response = array();

    // Check if each input exists, and if not, set an error message
    if (!isset($_POST['first_name']) || empty($_POST['first_name'])) {
        $response['error'] = 'First Name is required.';
    } elseif (!isset($_POST['last_name']) || empty($_POST['last_name'])) {
        $response['error'] = 'Last Name is required.';
    } elseif (!isset($_POST['country']) || empty($_POST['country'])) {
        $response['error'] = 'Country is required.';
    } elseif (!isset($_POST['address_street']) || empty($_POST['address_street'])) {
        $response['error'] = 'Street Address is required.';

    } else {
    
            $db = new Database;
            $user_id = $_SESSION['user_id'];

           $params = [
            'user_id' => $user_id,
            "first_name" => $db->escapeString($_POST['first_name']),
           "last_name" => $db->escapeString($_POST['last_name']),
           "country" => $db->escapeString($_POST['country']),
           "address_street" => $db->escapeString($_POST['address_street']),
           "address_apartment" => $db->escapeString($_POST['address_apartment']),
           "city" => $db->escapeString($_POST['city']),
           "state" => $db->escapeString($_POST['state']),
           "postcode" => $db->escapeString($_POST['postcode']),
           "phone" => $db->escapeString($_POST['phone'])
    ];
    // 	id	user_id	first_name	last_name	country	address_street	address_apartment	city	state	postcode	phone	created_at	
            $db->insert('shipping_addresses',$params);

            $isShipped = $db->getResult();

               if(!empty($isShipped)){

                $_SESSION['shipped'] = true;

                $response['success'] = "Customer Shipping address added";
               }
               else{
                $response['error'] = "Sorry, Customer Shipping Data not Inserted,Something Went Wrong";
               }

               echo json_encode($response);
    }

      }


/* Billing Response generate Here */

if (isset($_POST['billing'])) {
        
        // Initialize an array to store the response data
$response = array();

/* $fieldsToCheck = [
    'first_name',
    'last_name',
    'country',
    'address_street',
    'address_apartment',
    'city',
    'state',
    'postcode',
    'phone',
    'email',
    'account_password',
    'order_notes',
];

foreach ($fieldsToCheck as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        $response['error'][$field] = ucfirst(str_replace('_', ' ', $field)) . ' is required.'; //  [first_name] => First name is required
    }
} */

$response = array();

if (!isset($_POST['first_name']) || empty($_POST['first_name'])) {
    $response['error'] = 'First Name is required.';
} elseif (!isset($_POST['last_name']) || empty($_POST['last_name'])) {
    $response['error'] = 'Last Name is required.';
} elseif (!isset($_POST['country']) || empty($_POST['country'])) {
    $response['error'] = 'Country is required.';
} elseif (!isset($_POST['address_street']) || empty($_POST['address_street'])) {
    $response['error'] = 'Street Address is required.';
} elseif (!isset($_POST['city']) || empty($_POST['city'])) {
    $response['error'] = 'City is required.';
} elseif (!isset($_POST['state']) || empty($_POST['state'])) {
    $response['error'] = 'State is required.';
} elseif (!isset($_POST['postcode']) || empty($_POST['postcode'])) {
    $response['error'] = 'Postcode is required.';
} elseif (!isset($_POST['phone']) || empty($_POST['phone'])) {
    $response['error'] = 'Phone is required.';
} elseif (!isset($_POST['email']) || empty($_POST['email'])) {
    $response['error'] = 'Email is required.';
} elseif (isset($_POST['ship_to_different_address']) && empty($_POST['order_notes'])) {
    $response['error'] = 'Order Notes are required when shipping to a different address.';
}

// Check if there are any errors
if (!empty($response['error'])) {
    // Handle the errors, e.g., return them as JSON
    echo json_encode($response);
    // You can exit or redirect here depending on your needs
    exit;
}
// If there are no errors, continue with processing the form data

 else {

        $db = new Database;

        $db->select('billing_addresses',"email",null,"email = '{$_POST['email']}'");
        $isBilled = $db->getResult();
               if(!empty($isBilled)){
             echo   $response['error'] = "Billing addres is already exist";exit;
               };


       $bill_info = [
       "first_name"  => $db->escapeString($_POST["first_name"]),
       "last_name"  => $db->escapeString($_POST["last_name"]),
       "country"  => $db->escapeString($_POST["country"]),
       "address_street"  => $db->escapeString($_POST["address_street"]),
       "address_apartment"  => $db->escapeString($_POST["address_apartment"]),
       "city"  => $db->escapeString($_POST["city"]),
       "state"  => $db->escapeString($_POST["state"]),
       "postcode"  => $db->escapeString($_POST["postcode"]),
       "phone"  => $db->escapeString($_POST["phone"]),
       "email"  => $db->escapeString($_POST["email"]),
       "order_notes"  => $db->escapeString($_POST["order_notes"])
     ];
// 	id	user_id	first_name	last_name	country	address_street	address_apartment	city	state	postcode	phone	created_at	
        $db->insert('billing_addresses',$bill_info);

        $isShipped = $db->getResult();

           if(!empty($isShipped)){

             if (isset($_POST['payment-method'])) {
                $selected_method = $_POST['payment-method'];
                if ($selected_method == 'paypal') {
                    $payment = 'paypal'; // paypal handle here
                }elseif($selected_method == 'nagad'){
                    $payment = 'nagad'; // actually handle the transaction system here of nagad
                }
                elseif($selected_method == 'bkash'){
                    $payment = 'bkash'; // bkash handle here
                }
                elseif($selected_method == 'cash'){
                    $payment = 'cash'; // bkash handle here
                }
              };
            

             // id	transaction_code	user_id	amount	description	status	payment_method	created_at	
            $transactions = [
                'transaction_code'=> strtoupper((uniqid())),
                'user_id' => $_SESSION['user_id'],
                'amount' => $_POST['total'],
                'description'=> isset($_POST['order_notes']) ? $_POST['order_notes'] : 'lorem ipusm dolor sit',
                'status'=>'pending',
                'payment_method'=> $payment,
            ];
            $db->select('transactions','transaction_code',null,"user_id = {$_SESSION['user_id']} AND transaction_code = '{$transactions['transaction_code']}'");
            $existedTransaction = $db->getResult();
                   if(!empty($existedTransaction)){
                    echo json_encode(['error'=>'Customer Billing address added but Your Payment already Paid']);exit;
                   };

            $db->insert('transactions',$transactions);
            $transactions_success = $db->getResult();
                   if(!empty($transactions_success)){

                    // name	email	phone	amount	address	status	transaction_id	currency	

                    $order_params = [
                        'name'=> $bill_info['first_name'] . ' ' . $bill_info['last_name'],
                        'email'=> $bill_info['email'],
                        'phone'=> $bill_info['phone'],
                        'amount'=> $_POST['total'],
                        'user_id'=> $_SESSION['user_id'],
                        'order_code'=> strtoupper('#' .substr(bin2hex(random_bytes(3)), 0, 6)),
                        'address'=> $bill_info['address_street'] . ',' . $bill_info['address_apartment'] . ',' . $bill_info['state'] . ',' . $bill_info['city'] . ',' . $bill_info['country'],
                        'status'=> 'pending',
                        'transaction_id'=> $transactions['transaction_code'],
                        'tracking_id'=> strtoupper(uniqid('',false)), // first param of empty string return 13 digits and second param true return 23 digit
                        'currency'=> 'BDT',
                    ];


                

                    $db->insert('orders',$order_params);
                    $orderInserted = $db->getResult();
                           if(!empty($orderInserted)){
                            $_SESSION['total'] = $_POST['total'];
                            $_SESSION['subtotal'] = $_POST['subtotal'];
                            $response['success'] = "$payment Payment Successful and Customer Billing address added and Order is Pending";

                            //  id	order_id	product_id	user_id	price	quantity	created_at	
                            /* Cart Order Details Here */
                      /* Product ID , name collect to store order , order_details, cart,transactions */
                $db->select('products','cart.quantity * cart.price as cart_product_price,cart.product_id as cart_product_id, products.product_title as cart_product_title, cart.quantity as cart_product_quantity, orders.id as product_order_id'," cart ON cart.product_id = products.product_id JOIN orders ON orders.user_id = cart.user_id","orders.user_id = {$_SESSION['user_id']} ");
                $cart_wise_products_arr = $db->getResult();
                
                // print_r($cart_wise_products_arr);
                            foreach ($cart_wise_products_arr as $key => $order_detail) {
                                $order_details_params = [
                                    'order_id' => $order_detail['product_order_id'],
                                    'product_id' => $order_detail['cart_product_id'],
                                    'user_id' => $_SESSION['user_id'],
                                    'price' => $order_detail['cart_product_price'],
                                    'quantity' => $order_detail['cart_product_quantity'],
                                ];

                            $db->insert('order_details',$order_details_params);
                             $isOrder_details_inserted =  $db->getResult();
                            };
                            
                         if(!empty($isOrder_details_inserted)){
                        
                          $db->delete('cart',"user_id = {$_SESSION['user_id']}");
                            $db->getResult();

                          }

                        }
                   $response['success'] = "$payment Payment Successful and Customer Billing address added";

                   }else{
                    $response['error'] = "Sorry, Payment Not Success but Customer Billing address added";
                   }

            $_SESSION['billed'] = true;

            $response['success'] = "Customer Billing address added and $payment Payment Successful";
           }
        
           else{
            $response['error'] = "$payment Payment Successful but Customer Billing Data not Inserted,Something Went Wrong";
           }

           echo json_encode($response);
}


}


/* // Validate and sanitize user input
$card_number = $_POST['card_number'];
$expiry_date = $_POST['expiry_date'];
$cvv = $_POST['cvv'];
$amount = $_POST['amount'];

 Verify the payment (you'd need a payment processing service for this)
 $payment_successful = your_payment_verification_function($card_number, $expiry_date, $cvv, $amount);

// Insert the payment transaction into the database
if ($payment_successful) {
    $mysqli = new mysqli("localhost", "username", "password", "your_database");
    $query = "INSERT INTO payment_transactions (user_id, amount, status) VALUES (?, ?, 'completed')";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("id", $user_id, $amount);
    $user_id = 1; // Replace with the actual user ID
    $stmt->execute();
    $stmt->close();
    $mysqli->close();
} else {
    // Payment failed, handle accordingly
    echo "Payment failed. Please try again.";
} */
 if (isset($_POST['orderSerachText'])) {
    $db = new Database;
    $searchValue = $db->escapeString($_POST['orderSerachText']);

    $db->select('orders','*,order_details.price as product_price, user.mobile as vendor_phone,user.username as vendor_name',' order_details ON orders.id = order_details.order_id JOIN products ON order_details.product_id = products.product_id JOIN user ON orders.user_id = user.user_id',"orders.user_id = {$_SESSION['user_id']} AND  orders.tracking_id LIKE '$searchValue'");
    $order_product = $db->getResult();
           if(!empty($order_product)){
            echo json_encode(['success'=>$order_product]);
           }else{
            echo json_encode(['error'=> "Sorry, No data Matched in Search Of \"$searchValue\""]);
           }
  }