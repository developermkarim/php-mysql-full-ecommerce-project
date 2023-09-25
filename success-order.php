<?php

include 'config.php';
session_start();


if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user'){
    
include './header.php';

$db = new Database;


// $db->select('orders','*',null,"user_id={$_SESSION['user_id']}");
/* $db->select('orders','order_details.price as product_price, user.mobile as vendor_phone,user.username as vendor_name,orders.status as order_status',' order_details ON orders.id = order_details.order_id JOIN products ON order_details.product_id = products.product_id JOIN user ON orders.user_id = user.user_id',"order_details.user_id = {$_SESSION['user_id']} and orders.id = order_details.order_id and orders.order_status = 'Pending'"); */
$db->sql("SELECT 
order_details.price AS product_price,
user.mobile AS vendor_phone,
user.username AS vendor_name,
orders.status AS order_status,
products.product_desc as product_desc,
products.product_title as product_title
FROM
orders
JOIN
order_details ON orders.id = order_details.order_id
JOIN
products ON order_details.product_id = products.product_id
JOIN
user ON orders.user_id = user.user_id
WHERE
order_details.user_id = {$_SESSION['user_id']}
AND orders.id = order_details.order_id
AND orders.status = 'Pending';
");

$order_products = $db->getResult();
// echo count($order_details);
 print_r($order_products);
 echo "<br>";
 echo count($order_products);
?>
<div class="card mt-50 mb-50">
    <div class="col d-flex"><span class="text-muted" id="orderno">order <?= $order_products[0]['order_code'];?></span></div>
    <div class="gap">
        <div class="col-2 d-flex mx-auto"> </div>
    </div>
    <div class="title mx-auto"> Thank you for your order! <?php
// Online PHP compiler to run PHP program online
// Print "Hello World!" message
/*  $random = strtoupper('#' .substr(bin2hex(random_bytes(3)), 0, 6));
echo $random; */
?> 
</div>
    <div class="main"> <span id="sub-title">
            <p><b>Payment Summary</b></p>
        </span>         
      <?php
      foreach ($order_products[0] as $key => $order_product):
      ?>
        <div class="row row-main">
            <div class="col-3 "> <img class="img-fluid" src="https://i.imgur.com/hOsIes2.png"> </div>
            <div class="col-6">
                <div class="row d-flex">
                    <p><b><?= $order_product['product_title'];?></b></p>
                </div>
                <div class="row d-flex">
                    <p class="text-muted"><?= strlen($order_product['product_desc']) > 15 ? substr($order_product['product_desc'],0,15) . '...' : $order_product['product_desc'];?></p>
                </div>
            </div>
            <div class="col-3 d-flex justify-content-end">
                <p><b>$<?= $order_product['product_price'];?></b></p>
            </div>
        </div>
        <?php
        endforeach;
        ?>
        <hr>
        <div class="total">
            <div class="row">
                <div class="col"> <b> Total:</b> </div>
                <div class="col d-flex justify-content-end"> <b>$ <?= $_SESSION['total'];?></b> </div>
            </div> <a href="order-tracking.php" class="btn btn-outline-dark text-center ml-5 my-3" style="cursor:pointer"> Track your order </a>
        </div>
    </div>
</div>


<?php
include './footer.php';
}
?>