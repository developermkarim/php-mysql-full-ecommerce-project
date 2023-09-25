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
                        <img class="product__details__pic__item--large"
                            src="admin/product_images/<?= $productRes['featured_image'];?>" alt="" width="300"
                            height="300">
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


                    <a href="#" data-product-price="<?= $productRes['product_price'];?>"
                        data-product-id="<?= $productRes['product_id'];?>" class="primary-btn add-to-cart">ADD TO
                        CARD</a>
                    <a href="javascript:void()" class="add-to-wishlist btn btn-outline-success"
                        data-id="<?= $productRes['product_id'];?>" class="heart-icon"><i class="fa fa-heart"
                            aria-hidden="true"></i></a>
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
                        <div class="tab-pane" id="tabs-1" role="tabpanel">
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
                        <div class="tab-pane active" id="tabs-review" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Review</h6>

                                <div class="container">

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating-block">
                                                <h4>Average user rating</h4>
                                                <h2 class="bold padding-bottom-7">4.3 <small>/ 5</small></h2>
                                                <ul class="list-unstyled d-flex justify-content-left mb-0">
                                                    <li>
                                                        <i class="fa fa-star fa-sm text-warning"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star fa-sm text-warning"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star fa-sm text-warning"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star fa-sm text-warning"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star-half-full fa-sm text-warning"></i>
                                                    </li>
                                                </ul>
                                                <div>
                                                    <i class="fa fa-user" aria-hidden="true"></i> 1,050,008 total
                                                </div>
                                            </div>
                                        </div>


                                <div class="col-sm-3">
                                    <h4>Rating breakdown</h4>

                                    <div class="d-flex align-items-center my-2" style="line-height:0.5;">
                                    <span> <i class="fa fa-star" aria-hidden="true"></i> </span>&nbsp;
                                    <span> 5 </span> &nbsp; &nbsp;
                                    <div class="progress  w-100">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 80%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            80%
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center my-2" style="line-height:0.5;">
                                    <span> <i class="fa fa-star" aria-hidden="true"></i> </span>&nbsp;
                                    <span> 4 </span> &nbsp; &nbsp;
                                    <div class="progress w-100">
                                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 65%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            65%
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center my-2" style="line-height:0.5;">
                                    <span> <i class="fa fa-star" aria-hidden="true"></i> </span>&nbsp;
                                    <span> 3 </span> &nbsp; &nbsp;
                                    <div class="progress w-100">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 56%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            56%
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center my-2" style="line-height:0.5;">
                                    <span> <i class="fa fa-star" aria-hidden="true"></i> </span>&nbsp;
                                    <span> 2 </span> &nbsp; &nbsp;
                                    <div class="progress w-100">
                                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 30%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            30%
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center my-2" style="line-height:0.5;">
                                    <span> <i class="fa fa-star" aria-hidden="true"></i> </span>&nbsp;
                                    <span> 1 </span> &nbsp; &nbsp;
                                    <div class="progress w-100">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 15%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            15%
                                        </div>
                                    </div>
                                </div>


                                </div>

                                    </div>

                    <?php
                    $db->select('reviews','*',null,"product_id = {$_GET['pid']}","review_date DESC",3);
                    $reviewData = $db->getResult();
                    // $existReview = count($reviewData);
                    ?>
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <hr />
                                            <div class="review-block">
                                                <hr />
                                                <?php
                                               
                                                foreach ($reviewData as $key => $review):

                                                ?>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image"
                                                            class="img-rounded" width="20" height="20">
                                                     <p class="text-muted m-0"><?= $review['email'];?></p>
                                                        <div class="review-block-date">
                                                            <?php
                                                // Assuming the timestamps are in Dhaka timezone
                                                $date = new DateTime($review['review_date'], new DateTimeZone('Asia/Dhaka'));
                                                $currentDate = new DateTime('now', new DateTimeZone('Asia/Dhaka'));

                                                // Calculate the difference between the two dates in seconds
                                                $timeDifference = $currentDate->getTimestamp() - $date->getTimestamp();

                                                // Ensure the difference is positive
                                                $timeDifference = abs($timeDifference);

                                                if ($timeDifference < 60) {
                                                    // Less than a minute ago
                                                    $dateString = $timeDifference . ' second' . ($timeDifference !== 1 ? 's' : '') . ' ago';
                                                } elseif ($timeDifference < 3600) {
                                                    // Less than an hour ago
                                                    $minutesDifference = floor($timeDifference / 60);
                                                    $dateString = $minutesDifference . ' minute' . ($minutesDifference !== 1 ? 's' : '') . ' ago';
                                                } elseif ($timeDifference < 86400) {
                                                    // Less than a day ago
                                                    $hoursDifference = floor($timeDifference / 3600);
                                                    $dateString = $hoursDifference . ' hour' . ($hoursDifference !== 1 ? 's' : '') . ' ago';
                                                } else {
                                                    // Days ago
                                                    $daysDifference = floor($timeDifference / 86400);
                                                    $dateString = $daysDifference . ' day' . ($daysDifference !== 1 ? 's' : '') . ' ago';
                                                }

                                                // Format the date as "Month Day, Year"
                                                $date->setTimezone(new DateTimeZone('Asia/Dhaka'));
                                                $formattedDate = $date->format('F d, Y');
  
                                                ?>
                                                            <p class="text-muted"> <?= $dateString;?></p>
                                                            <p class="text-muted"> <?= $formattedDate;?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="review-block-rate">
                                                            <ul class="list-unstyled d-flex justify-content-left mb-0">
                                                                <li>
                                                                    <i class="fa  <?= $review['rating'] >= 1  ? 'fa-star ': 'fa-star-o';?>  fa-sm text-warning"></i>
                                                                </li>
                                                                <li>

                                                                <i class="fa <?= $review['rating'] >= 2  ? 'fa-star ': 'fa-star-o';?>  fa-sm text-warning"></i>

                                                                </li>
                                                                <li>

                                                                <i class="fa <?= $review['rating'] >= 3  ? 'fa-star ': 'fa-star-o';?>  fa-sm text-warning"></i>

                                                                </li>
                                                                <li>

                                                                <i class="fa <?= $review['rating'] >= 4  ? 'fa-star ': 'fa-star-o';?>  fa-sm text-warning"></i>

                                                                </li>

                                                                <li>
                                                              
                                                                <i class="fa <?= $review['rating'] >= 5  ? 'fa-star ': 'fa-star-o';?>  fa-sm text-warning"></i>

                                                                </li>
<!--                                                                 <li>
                                                                    <i
                                                                        class="fa fa-star-half-full fa-sm text-warning"></i>
                                                                </li> -->
                                                            </ul>
                                                        </div>
                                                        <div class="review-block-description"><blockquote class="blockquote">
                                                        <p><?= $review['message'];?></p>
                                                        <footer class="blockquote-footer"><?= $review['name'];?></footer>
                                                        </blockquote>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            endforeach;
                                            ?>
                                            </div>
                                            

                                        </div>
                                    </div>

                                    <?php
/*                                         $db->select('reviews','COUNT(id) as totalReview',null,"product_id = {$_GET['pid']}","review_date DESC");
                                        $reviewData = $db->getResult();
                                        if($reviewData[0]['totalReview'] >= 6){
                                            $existReview = $reviewData[0]['totalReview'];
                                         } else if($reviewData[0]['totalReview'] >= 3 ){
                                                $existReview = $reviewData[0]['totalReview'];
                                            }elseif($existReview = $reviewData[0]['totalReview'] >= 2){
                                                $existReview = $reviewData[0]['totalReview'];
                                            } */
                                    ?>
                                    
                                        <!-- Load More Button -->
                            <div class="mt-4 text-center" style="width:50%;">
                            
                                <button id="load-more-btn" data-product-id="<?= $_GET['pid'];?>" class="btn btn-primary btn-md">
                                    <i class="fa fa-chevron-down"></i> Load More
                                </button>

                                <p id="no-more-data"></p>
                                </div>

                                </div> <!-- /container -->

                                               
                                <div class="container">
                                    <div class="row">
            <div class="col-md-6 offset-md-3 text-center w-50 mt-2" style="margin:inherit;">
            <h2 class="font">Share Your Feedback</h2>
            <p class="lead">We value your opinion. Please tell us about your experience.</p>
            <hr>
        </div>
        
                                        <table width="50%" border="0">
                                            <div class="col-md-9 col-md-offset-0">
                                                <tr>
                                                    <td width="77%">
                                                        <div class="">
                                                            <form id="review-form" method="post">
                                                                <input type="hidden" id="product_id" value="<?= $_GET['pid'];?>" name="product_id">
                                                                <div class="form-group">
                                                                    <label for="name">Full Name</label>
                                                                    <input id="name" name="name" type="text"
                                                                        placeholder="Your name" class="form-control">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="email">Your E-mail</label>
                                                                    <input id="email" name="email" type="text"
                                                                        placeholder="Your email" class="form-control">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="message">Your message</label>
                                                                    <textarea class="form-control" id="message"
                                                                        name="message"
                                                                        placeholder="Please enter your feedback here..."
                                                                        rows="5"></textarea>
                                                                </div>

                                                                <div class="form-group d-flex justify-content-left">
                                                                    <label for="message"><strong>Your rating :</strong>
                                                                        &nbsp; &nbsp;</label>
                                                                    <ul
                                                                        class="list-unstyled d-flex justify-content-left mb-0 star-icon">
                                                                <li> <i class="fa fa-star-o fa-sm text-warning" data-value="1" id="star-1"></i> </li> &nbsp;
                                                                <li> <i class="fa fa-star-o fa-sm text-warning" data-value="2" id="star-2"></i> </li> &nbsp;

                                                                <li> <i class="fa fa-star-o fa-sm text-warning" data-value="3" id="star-3"></i> </li> &nbsp;

                                                                <li> <i class="fa fa-star-o fa-sm text-warning" data-value="4" id="star-4"></i> </li> &nbsp;

                                                                <li> <i class="fa fa-star-o fa-sm text-warning" data-value="5" id="star-5"></i> </li>

                                                                    </ul>
                                                                </div>

                                                                <div class="form-group">
                                                                <button type="submit" class="btn btn-primary btn-md">
                                                                    <i class="fa fa-check"></i> Submit
                                                                </button>
                                                                <button type="reset" class="btn btn-secondary btn-md">
                                                                    <i class="fa fa-refresh"></i> Clear
                                                                </button>
                                                            </div>
                                                            </form>
                                                        </div>
                                            </div>
                                            </td>
                                            </tr>
                                        </table>
                                    </div>
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