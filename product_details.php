<?php
include './header.php';
include './bottom-header.php';
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="forntend_assets/img/breadcrumb.jpg"
    style="background-image: url(&quot;forntend_assets/img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Vegetable’s Package</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumb Section End -->


                    <?php
                        $product_id = $_GET['pid'];
                        // echo $product_id;
                        $db = new Database;
                        $db->select('products','*',null,"product_id = $product_id");
                      $productRes = $db->getResult()[0];

                        // print_r($db->getResult()[0]);
                        ?>
<!-- Product Details Section Begin -->

<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="admin/product_images/<?= $productRes['featured_image'];?>" alt="" width="300" height="300">
                    </div>
                    <div class="product__details__pic__slider owl-carousel owl-loaded owl-drag">

                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-575px, 0px, 0px); transition: all 1.2s ease 0s; width: 1725px;">
                                <?php
                                $db->select('products','gallery_image,image_path'," gallery_images ON products.product_id = gallery_images.product_id","products.product_id = {$product_id}");
                                $gallery_images = $db->getResult();
                                // print_r($gallery_images);
                                ?>
                                <?php
                                foreach ($gallery_images as $gallery_image):
                                ?>
                                <div class="owl-item cloned" style="width: 123.75px; margin-right: 20px;"><img
                                        data-imgbigurl="<?= $gallery_image['image_path'];?>"
                                        src="<?= $gallery_image['image_path'];?>" alt=""></div>
                                <?php
                                endforeach;
                                ?>
                              
                            </div>
                        </div>

                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                    aria-label="Previous">‹</span></button><button type="button" role="presentation"
                                class="owl-next"><span aria-label="Next">›</span></button></div>
                        <div class="owl-dots disabled"><button role="button"
                                class="owl-dot active"><span></span></button></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $productRes['product_title'];?></h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price">$<?= $productRes['product_price'];?></div>
                    <p><?= html_entity_decode($productRes['product_desc']);?></p>
                    

    <!--                   <div class="product__details__quantity">
        <?php
                      $user_id = $_SESSION['user_id'];
                      $db = new Database;
                      $db->select('cart','*',"products ON cart.product_id=products.product_id JOIN user ON user.user_id = cart.user_id","cart.user_id={$user_id} AND cart.product_id = {$product_id}",'cart.id DESC',null);
                    $cartResult = $db->getResult();
                    // echo $cartResult[0] != null ? 'null':'not null';
                    ?> -->
<!--                         <div class="quantity" style="display:<?= !$cartResult[0] && $cartResult[0] != null ? 'block':'none'?>" id="pd-details-cart">
                            <div class="pro-qty">
                                    <i data-cart-id="<?= $cartResult[0]['id'];?>" class="fa fa-minus decrement-count" aria-hidden="true"></i>

                                    <input data-cart-price="<?= $cartResult[0]['product_price'] * $cartResult[0]['quantity'];?>" 
                                        data-cart-id="<?= $cartResult[0]['id'];?>" class="count-value" type="text" value="<?=$cartResult[0]['quantity'];?>">
                                        
                                    <i data-cart-id="<?= $cartResult[0]['id'];?>" class="fa fa-plus increment-count" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
 -->
                    
                     
                    <a href="#" data-product-price="<?= $productRes['product_price'];?>" data-product-id="<?= $productRes['product_id'];?>" class="primary-btn add-to-cart">ADD TO CARD</a>
                    <a href="javascript:void()" class="add-to-wishlist btn btn-outline-success" data-id="<?= $productRes['product_id'];?>" class="heart-icon"><i class="fa fa-heart" aria-hidden="true"></i></a>
                    <ul>
                        <li><b>Availability</b> <span>In Stock</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Weight</b> <span>0.5 kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-desc" role="tab"
                                aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-info" role="tab"
                                aria-selected="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-review" role="tab"
                                aria-selected="false">Reviews <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Description</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                    suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                    vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                    accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                    pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                    elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                    et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                    vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                    Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                    porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                    sed sit amet dui. Proin eget tortor risus.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-info" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-review" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Review</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->


<?php
include 'footer.php';
?>