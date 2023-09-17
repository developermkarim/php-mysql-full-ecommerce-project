

<?php

include 'config.php';
session_start();



if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user'){
    
include './header.php';

$db = new Database;
$db->select('orders','*,order_details.price as product_price, user.mobile as vendor_phone,user.username as vendor_name',' order_details ON orders.id = order_details.order_id JOIN products ON order_details.product_id = products.product_id JOIN user ON orders.user_id = user.user_id',"orders.user_id = {$_SESSION['user_id']}");
$order_products = $db->getResult();
/* print_r($order_products); */
?>

<div class="track-container mx-5">
    <article class="track-card">
        <div class="d-flex justify-content-between">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="col-md-6 offset-md-3">
                <!-- Bootstrap-styled search input -->
                <div class="input-group m-3">
                    <input type="text" class="form-control" placeholder="Tracking Your Order" id="searchInput">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary mr-3" type="button" id="searchButton">Search</button>
                    </div>
                </div>
        </div>
      </div>


        <div class="card-body">
            <h6>Order ID: <?= $order_products[0]['order_code'];?></h6>
            <article class="tack-card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> <span class="vendor_name"> <?= $order_products[0]['vendor_name'];?></span> | <i class="fa fa-phone"></i><span class="vendor_phone"><?=$order_products[0]['vendor_phone'] ;?> </span> </div>
                    <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                    <div class="col"> <strong>Tracking #:</strong> <br>  <span class="tracking_id"> <?= $order_products[0]['tracking_id'];?></span> </div>
                </div>
            </article>
            <div class="track">
                <div class="step  active"> <span class="icon"> <i class="fa fa-clock-o" aria-hidden="true"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step "> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
            </div>
            <hr>
            <ul class="row">

                <?php
                foreach ($order_products as $key => $order_product):
                ?>

                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="https://i.imgur.com/iDwDQ4o.png" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <?php
                            $title_arr = explode(' ',$order_product['product_title']);
                            $slice_title = array_slice($title_arr,0,count($title_arr)-3);
/*                             echo  implode(" ",$slice_title);
                            echo implode($title_arr); */
                            $rest_slice = array_slice($title_arr,count($title_arr)-2,3);
                            ?>
                            <p class="track-title"><!-- Dell Laptop with 500GB HDD --> <?= strlen($order_product['product_title']) > 20 ? implode(" ",$slice_title) : $order_product['product_title'];?> <br><?= strlen($order_product['product_title']) > 20 ? implode(' ',$rest_slice) : '';?></p> <span class="text-muted">$ <?= $order_product['product_price'];?> </span>
                        </figcaption>
                    </figure>
                </li>
                <?php
                endforeach;
                ?>
            </ul>
            <hr>
            <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>

        <div class="search-result">

        </div>

    </article>
</div>


<?php
include './footer.php';
}
?>