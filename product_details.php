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

                                <?php
                                $db->select('reviews','*,SUM(rating) as total_ratings,AVG(rating) AS average_ratings',null,"product_id = {$_GET['pid']}");
                                $product_wise_reviews = $db->getResult();

                            
                                $db->sql('SELECT * FROM reviews');
                                $all_stars = $db->getResult();
                                // Initialize an array to store the count of each star rating
                                    $starCounts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];

                                    // Loop through the reviews and count each star rating
                                    foreach ($all_stars[0] as $review) {
                                        $rating = $review['rating'];
                                        if ($rating >= 1 && $rating <= 5) {
                                            // Increment the count for the corresponding star rating
                                            $starCounts[$rating]++;
                                        }
                                    }

                                    // Access the counts for each star rating
                                    $one_star = $starCounts[1];
                                    $two_star = $starCounts[2];
                                    $three_star = $starCounts[3];
                                    $four_star = $starCounts[4];
                                    $five_star = $starCounts[5];

                                    // Display the counts
/*                                     echo "One Star: $one_star<br>";
                                    echo "Two Stars: $two_star<br>";
                                    echo "Three Stars: $three_star<br>";
                                    echo "Four Stars: $four_star<br>";
                                    echo "Five Stars: $five_star<br>"; */

                                    $one_star_percentage = ($one_star / $product_wise_reviews[0]['total_ratings']) * 100;
                                    $two_star_percentage = ($two_star / $product_wise_reviews[0]['total_ratings']) * 100;
                                    $three_star_percentage = ($three_star / $product_wise_reviews[0]['total_ratings']) * 100;
                                    $four_star_percentage = ($four_star / $product_wise_reviews[0]['total_ratings']) * 100;
                                    $five_star_percentage = ($five_star / $product_wise_reviews[0]['total_ratings']) * 100;                                    
                                   
                                    // Echo the variables
                                    /* echo "One Star Percentage: $one_star_percentage%";
                                    echo "Two Star Percentage: $two_star_percentage%";
                                    echo "Three Star Percentage: $three_star_percentage%";
                                    echo "Four Star Percentage: $four_star_percentage%";
                                    echo "Five Star Percentage: $five_star_percentage%"; */

                                $average_ratings = $product_wise_reviews[0]['average_ratings'];
                                // echo ceil($average_ratings);
                                ?>
                                <div class="container">

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating-block">
                                                <h4>Average user rating</h4>
                                                <h2 class="bold padding-bottom-7"><?= number_format($average_ratings,2);?> <small>/ 5</small></h2>

                                                <?php
                                                $full_stars = floor($average_ratings);
                                               // Calculate whether to display a half star (if the decimal part of the rating is > 0 and < 0.5)
                                                $half_stars = ($average_ratings - $full_stars) > 0 && ($average_ratings - $full_stars) < 0.5;

                                                // Calculate the number of empty stars (5 - fullStars - halfStar)
                                                $emptyStars = 5 - $full_stars - ($half_stars ? 1 : 0);
                                                // Generate star icons based on the average rating

                                                $html_stars = '';
                                                
                                                    for ($i=0; $i < $full_stars; $i++) { 
                                               
                                                        $html_stars .= ' <li>
                                                        <i class="fa fa-star fa-sm text-warning"></i>
                                                    </li>';
                                                    }
                                                
                                                if($half_stars){
                                                    $html_stars .= '<li>
                                                    <i class="fa fa-star-half-full fa-sm text-warning"></i>
                                                </li>';
                                                }
                                                for ($i=0; $i < $emptyStars; $i++) { 
                                                    $html_stars .= '<li>
                                                    <i class="fa fa-star-o fa-sm text-warning"></i>
                                                </li>';
                                                }
                                                ?>
                                                <ul class="list-unstyled d-flex justify-content-left mb-0">
                                                   <?= $html_stars;?>
                                                </ul>
                                                <div>
                                                    <i class="fa fa-user" aria-hidden="true"></i> <?= $product_wise_reviews[0]['total_ratings'];?> total
                                                </div>
                                            </div>
                                        </div>


<div class="col-sm-3">
    <h4>Rating breakdown</h4>

    <?php
    // Use the calculated percentage values here
    $star_ratings = [5 => $five_star_percentage, 4 => $four_star_percentage, 3 => $three_star_percentage, 2 => $two_star_percentage, 1 => $one_star_percentage];

    // Define background colors for progress bars based on your preferences
    $progress_bar_colors = [
        5 => 'bg-success',
        4 => 'bg-primary',
        3 => 'bg-info',
        2 => 'bg-warning',
        1 => 'bg-danger'
    ];

    // Loop through each star rating and display the progress bar
    foreach ($star_ratings as $rating => $percentage) {
    ?>
    <div class="d-flex align-items-center my-2" style="line-height: 0.5;">
        <span> <i class="fa fa-star" aria-hidden="true"></i> </span>&nbsp;
        <span> <?= $rating ?> </span> &nbsp; &nbsp;
        <div class="progress w-100">
            <div class="progress-bar progress-bar-striped <?= $progress_bar_colors[$rating] ?>" role="progressbar" style="width: <?= $percentage ?>%" aria-valuenow="<?= $percentage ?>" aria-valuemin="0" aria-valuemax="100">
                <?= number_format($percentage, 2) ?>%
            </div>
        </div>
    </div>
    <?php
    }
    ?>

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