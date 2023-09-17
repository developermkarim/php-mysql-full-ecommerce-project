<?php
if (session_status()==PHP_SESSION_NONE) {
    session_start();
}
include 'config.php';
include './header.php';

include './bottom-header.php';
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="forntend_assets/img/breadcrumb.jpg" style="background-image: url(&quot;forntend_assets/img/breadcrumb.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form id="billingForm">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="first_name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input name="last_name" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input name="country" type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input name="address_street" type="text" placeholder="Street Address" class="checkout__input__add">
                                <input name="address_apartment" type="text" placeholder="Apartment, suite, unite ect (optinal)">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input name="city" type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input name="state" type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input name="postcode" type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input name="phone" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email">
                                    </div>
                                </div>


                            </div>

                            <div class="checkout__input__checkbox">
                                <label for="diff-shipping-address">
                                    Ship to a different address?
                                    <?php
                                    
                                    if (isset($_SESSION['shipped']) == true) {
                                        echo '<input type="checkbox"  checked>';
                                    }else{
                                        echo '<input type="checkbox" class="ship-box" id="diff-shipping-address">';
                                    }
                                    ?>
                                    
                                    <span class="checkmark"></span>
                                </label>
               
                            </div>

                            <div class="checkout__input__checkbox">
                                <label for="credit-cart-box">
                                   Want to Payment With Credit Cart ?
                                    <input type="checkbox" class="credit-box" id="credit-cart-box">
                                    
                                    <span class="checkmark"></span>
                                </label>
               
                            </div>

             <div class="row" id="credit-cart" style="display:none;">
           
                    <div class="col-md-5">
                        <input type="radio" name="card-type" value="mastercard" id="mastercard" checked>
                        <label for="mastercard">MasterCard <i class="fa fa-cc-mastercard" aria-hidden="true"></i> </label>
                    </div>
                    <div class="col-md-5">
                        <input type="radio" name="card-type" value="visa" id="visa">
                        <label for="visa">Visa  <i class="fa fa-cc-visa" aria-hidden="true"></i> </label>
                    </div>
                    <div class="col-md-5">
                        <label for="card-number">Card Number:</label>
                        <input type="text" class="form-control" id="card-number" name="card-number" placeholder="Card Number">
                    </div>
                    <div class="col-md-5">
                        <label for="cardholder-name">Cardholder Name:</label>
                        <input type="text" class="form-control" id="cardholder-name" name="cardholder-name" placeholder="Cardholder Name">
                    </div>
                    <div class="col-md-5">
                        <label for="expiration-date">Expiration Date:</label>
                        <input type="text" class="form-control" id="expiration-date" name="expiration-date" placeholder="MM/YY">
                    </div>
                    <div class="col-md-5">
                        <label for="cvv">CVV:</label>
                        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV">
                    </div>
                 
          
        </div>

                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input name="order_notes" type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <?php

                                $user_id = $_SESSION['user_id'];
                                $total = $_GET['total'];
                                $sub_total = $_GET['subtotal'];

                                $db->select('cart','*'," products ON products.product_id=cart.product_id","cart.user_id = {$_SESSION['user_id']}");
                                $cartRes = $db->getResult();
                                // print_r($cartRes);
                                
                                ?>
                                <input type="hidden" value="<?=$total;?>" name="total">
                                <input type="hidden" value="<?=$subtotal;?>" name="subtotal">

                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul> 
                                    <?php
                                    foreach ($cartRes as $key => $cart):
                                    ?> 
                                    <li> <?= strlen($cart['product_title']) > 18 ? substr($cart['product_title'],0,18) . '...' : $cart['product_title'];?> <span>  &nbsp; <?= $cart['quantity'] . ' <i class="fa fa-times" aria-hidden="true"></i> ' . $cart['price'] . ' = ';?> &nbsp;   $ <?= $cart['price'] *  $cart['quantity'];?> </span></li>

                                    <?php
                                    endforeach;
                                    ?>
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>$ <?= $_GET['subtotal'];?></span></div>
                                <div class="checkout__order__total">Total <span>$<?= $_GET['total'];?></span></div>
                                <div>
                                    <h5 class="text-center">Please Select A Payment Method</h5>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="cashPayment">
                                        Cash On Delivery
                                        <input type="radio" name="payment-method" id="cashPayment" value="cash">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                  
                                <label for="paypal">
                                        Paypal / master-card  <img src="./forntend_assets/img/transactions/paypal-logo-C83095A82C-seeklogo.com.png" alt="" width="25" height="20">
                                        <input type="radio"  name="payment-method" id="paypal" value="paypal">
                                        <span class="checkmark"></span>
                                    </label> <br>

                                    <label for="Bkash">
                                        Bkash  <img src="./forntend_assets/img/transactions/1656227518bkash-logo-png.png" alt="" width="25" height="20">
                                        <input type="radio" name="payment-method" id="Bkash" value="bkash">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p style="display: none;"  class="bkash">Bkash No : 01647113581</p>
                                    <br>

                                    <label for="Nagad">
                                        Nagad  <img src="./forntend_assets/img/transactions/1679248787Nagad-Logo.png" alt="" width="25" height="20">
                                        <input type="radio" name="payment-method" id="Nagad" value="nagad">
                                       
                                        <span class="checkmark"></span>
                                    </label>

                                    <p style="display: none;" class="nagad">Nagad No : 01647113581</p>

                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<?php
               $db->select('products','cart.quantity * cart.price as cart_product_price, cart.product_id as cart_product_id, products.product_title as cart_product_title, cart.quantity as cart_product_quantity, orders.id as product_order_id'," cart ON cart.product_id = products.product_id JOIN orders ON orders.user_id = cart.user_id","orders.user_id = {$_SESSION['user_id']}");
               $cart_wise_products_arr = $db->getResult();
               print_r($cart_wise_products_arr);
?>
    </section>
    <!-- Checkout Section End -->

     <!-- Shipping form Here  -->
       <!-- Bootstrap Modal -->
       <div class="modal fade" id="shippingModal" tabindex="-1" aria-labelledby="shippingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Shipping Address</h5>
                <button type="button" class="close ship-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                </div>

                <div class="modal-body">
                <form id="shippingForm">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country" required>
                        </div>
                        <div class="mb-3">
                            <label for="address_street" class="form-label">Street Address</label>
                            <input type="text" class="form-control" id="address_street" name="address_street" required>
                        </div>
                        <div class="mb-3">
                            <label for="address_apartment" class="form-label">Apartment, Suite, etc. (Optional)</label>
                            <input type="text" class="form-control" id="address_apartment" name="address_apartment">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" required>
                        </div>
                        <div class="mb-3">
                            <label for="postcode" class="form-label">Postcode / ZIP</label>
                            <input type="text" class="form-control" id="postcode" name="postcode" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="close ship-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">Close</span>
                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Payment Form Here -->

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Payment Information</h5>
                    <button type="button" class="payment-close close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Payment form -->
                   <!--  <form method="POST" action="">
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="text" class="form-control" id="amount" name="amount">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Payment</button>
                    </form> -->

                    
<!-- <form method="post" action="process_payment.php">
    <input type="text" name="card_number" placeholder="Card Number">
    <input type="text" name="expiry_date" placeholder="Expiry Date (MM/YYYY)">
    <input type="text" name="cvv" placeholder="CVV">
    <input type="submit" value="Pay Now">
</form> -->
                </div>
            </div>
        </div>
    </div>
</div>

    <?php
include './footer.php';
?>