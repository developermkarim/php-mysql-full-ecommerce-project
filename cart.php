<?php
if (session_status()==PHP_SESSION_NONE) {
    session_start();
}
include 'config.php';
include './header.php';

include './bottom-header.php';
?>

 <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg"          style="background-image: url(&quot;img/breadcrumb.jpg&quot;);">
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
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$454.98</span></li>
                            <li>Total <span>$454.98</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
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