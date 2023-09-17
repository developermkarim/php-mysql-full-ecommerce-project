<?php
if (session_status()==PHP_SESSION_NONE) {
    session_start();
}
include 'config.php';
include './header.php';

include './bottom-header.php';
?>

 <section class="breadcrumb-section set-bg" data-setbg="forntend_assets/img/breadcrumb.jpg" style="background-image: url(&quot;forntend_assets/img/breadcrumb.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


    <!-- Shopping Cart Section Begin -->
    <section class="shoping-cart spad">
    <?php
     if (isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];
      $db = new Database;
      $db->select('cart','*',"products ON cart.product_id=products.product_id JOIN user ON user.user_id = cart.user_id","cart.user_id={$user_id}",'cart.id DESC',null);
        $cartResult = $db->getResult();
    
        //  print_r($cartResult);
         if(count($cartResult) > 0):
        ?>
        <div class="container">
            <div class="row table-row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                          
                            <tbody>
                                <?php
                            //    $product_price = 0 ;
                                foreach ($cartResult as $key => $cart): 
                                        
                                ?>
                                <tr>

                                    <td class="shoping__cart__item">
                                        <img src="./admin/product_images/<?= $cart['featured_image'];?>" alt="" width="100" height="100">
                                        <h5> <?= $cart['product_title'];?> </h5>
                                    </td>

                                    <td class="shoping__cart__price">
                                        <?= $cart['product_price'];?>
                                    </td>

                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <i data-cart-id="<?= $cart['id'];?>" class="fa fa-minus decrement-count" aria-hidden="true"></i>

                                                <input data-cart-price="<?= $cart['product_price'] * $cart['quantity'];?>" 
                                                 data-cart-id="<?= $cart['id'];?>" class="count-value" type="text" value="<?=$cart['quantity'];?>">
                                                 
                                                <i data-cart-id="<?= $cart['id'];?>" class="fa fa-plus increment-count" aria-hidden="true"></i>
                                           </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total" data-cart-id="<?= $cart['id'];?>">
                                    <?= $cart['product_price'] * $cart['quantity'];?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span data-cart-id="<?= $cart['id'];?>" class="icon_close"></span>
                                    </td>
                                </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>

                       
                    </div>
                </div>
            </div>
            <div class="row cart-row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>

                <?php
                $db = new Database;
                $db->select('cart','* , count(id) as totalRow, SUM(quantity * price) as subTotal',null,"user_id = {$_SESSION['user_id']}",null,null);

                $cartResult = $db->getResult();
                $subTotal = $cartResult[0]['subTotal'];
                $totalCarts = $cartResult[0]['totalRow'];
                $delivery_charge = 69;
                $allTotal = 0;
                foreach ($cartResult as $key => $value) {
                //    $subTotal += $value['quantity'] * $value['price'];
                   $delivery_charge *= $value['totalRow'];
                };
                ?>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                           
                        <form id="apply-coupon">
                            <h5 class="coupon-title">Discount Codes</h5>
                            <?php
                            
                             if (!isset($_SESSION['coupon-session'])) {
                            ?>

                            <input type="hidden" value="<?= $value['totalRow'];?>" name="userCartCount" id="userCartCount">

                            <?php
                            $db->select('coupons','title,code',NULL,'title = "SILVER"');
                            $coupon = $db->getResult();

                             if ($value['totalRow'] > 1):
                             ?>
                            <p class="code-text">Coupon Code (<?= $coupon[0]['title'];?>) : <?= $coupon[0]['code'];?></p>
                            <input type="hidden" value="<?= $coupon[0]['code'];?>" id="hidden_code" name="hidden_code">
                            
                            <?php endif; ?>

                            <?php
                            $db->select('coupons','title,code',NULL,'title = "GOLD"');
                            $coupon = $db->getResult();
                            if($value['totalRow'] > 2):
                            
                            ?>
                            <p class="code-text">Coupon Code (<?= $coupon[0]['title'];?>) : <?= $coupon[0]['code'];?></p>
                            <input type="hidden" value="<?= $coupon[0]['code'];?>" id="hidden_code" name="hidden_code">
                            <?php
                            endif;
                            ?>

                            <?php
                            $db->select('coupons','title,code',NULL,'title = "PLATINUM"');
                            $coupon = $db->getResult();
                            if ($value['totalRow'] > 3):
                            
                            ?>
                            <p class="code-text">Coupon Code (<?= $coupon[0]['title'];?>) : <?= $coupon[0]['code'];?></p>
                            <input type="hidden" value="<?= $coupon[0]['code'];?>" id="hidden_code" name="hidden_code">
                            <?php
                            endif;
                            ?>
                            
                            <div id="coupon-input-id">
                                <input type="text" name="apply_coupon" id="coupon-code" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn apply-coupon-btn">APPLY COUPON</button>
                                
        
                            </div>
                            <div id="coupon-message"></div>
                            <?php
                             }
                             else if($totalCarts <= 1){

                         echo   "<p class='text-danger'>  <strong>Sorry!</strong> You Are Not Eligible for Coupon Price!</p>";
                             }else {
                                echo "<p class='text-danger applied-text'>  <strong>Sorry!</strong> You have already Applied this coupon!</p>";
                             }
                            ?>
                            </form>

                        </div>
                    </div>
                </div>




                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span id="sub-total">$ <?= $subTotal;?> </span></li>
                            <li id="deliver_li">delivery Charge <span id="delivery-charge">$ <?= $delivery_charge;?></span></li>

                            <?php if (isset($_SESSION['coupon-price']) && $totalCarts > 1):?>
                                <li id="coupon-charge">Coupon Charge : <span id=""><?= $_SESSION['coupon-price'];?></span></li>

                                <li>Total <span id="total">$ <?= $subTotal + $delivery_charge - $_SESSION['coupon-price'];?> </span></li>
                                <?php else: ;?>
                            <li>Total <span id="total">$ <?= $subTotal + $delivery_charge;?> </span></li>
                            <?php endif;?>
                        </ul>

                        <?php if (isset($_SESSION['coupon-price']) && $totalCarts > 1):?>

                        <a href="sslecommerz-checkout.php?total=<?= urlencode($subTotal + $delivery_charge - $_SESSION['coupon-price']);?>&subtotal=<?= urlencode($subTotal);?>" class="">Payment With SSLECOMMERZ</a>
                        <a href="checkout.php?total=<?= urlencode($subTotal + $delivery_charge - $_SESSION['coupon-price']);?>&subtotal=<?= urlencode($subTotal);?>"  class="primary-btn">PROCEED TO CHECKOUT</a>

                        <?php else:  $encoded_total = urlencode($subTotal + $delivery_charge);
                                      $encoded_subtotal = urlencode($subTotal);?>

                        <a href="sslecommerz-checkout.php?total=<?= $encoded_total;?>&subtotal=<?=$encoded_subtotal ?>" class="">>Payment With SSLECOMMERZ</a>

                        <a href="checkout.php?total=<?= $encoded_total;?>&subtotal=<?=$encoded_subtotal;?>" class="primary-btn">PROCEED TO CHECKOUT</a>
                        <?php
                        endif;
                        ?>

                    </div>
                </div>
            </div>

            <?php
                 else:
             ?>
                       <div class="shoping__cart__btns text-center">
                        <a href="#" class="primary-btn cart-btn">No Cart Is Available Here</a>
                    </div>

                    
                    <?php
                    endif;

                    }else{

                 ?>  
                    
                 <div class="shoping__cart__btns text-center">
                 <a href="#" class="primary-btn cart-btn"  data-toggle="modal" data-dismiss="modal" data-target="#user_login_form">Please Go to Login before Add To Cart</a>
                    </div> 
                    <?php
                    }
                    ?>

        </div>
    </section>
    <!-- Shopping Cart Section End -->


<?php
include './footer.php';
?>