
<?php
include_once 'header.php';
?>


    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <?php
                            $db->select('categories');
                            $categories = $db->getResult();
                          
                            if($categories > 0):
                                foreach($categories as $category):
                            ?>
                            <li><a href="#"><?= $category['cat_title'];?></a></li>
                            <?php
                            endforeach;
                        endif;
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><?= $header['contact_phone'];?></h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="./forntend_assets/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->



    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-1.jpg">
                            <h5><a href="#">Fresh Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-2.jpg">
                            <h5><a href="#">Dried Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-3.jpg">
                            <h5><a href="#">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-4.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <?php
    // $db->select('products',)
/*     $db->select('products','categories.cat_title,products.product_code,products.product_id,categories.cat_id,sub_categories.sub_cat_id,sub_categories.sub_cat_title','categories ON products.product_cat=categories.cat_id JOIN sub_categories ON products.product_sub_cat=sub_categories.sub_cat_id',null,"categories.cat_id DESC",0); */
$db->select('categories','*');
    $allResults = $db->getResult();
    ?>
    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                           <?php
                            foreach ($allResults as $key => $category) :
                            ?> 
                            <li data-filter=".<?= $category['cat_title'];?>"> <?= $category['cat_title'];?> </li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- This message will show before going to login modal -->
          

            <div class="row featured__filter">
                <?php
                $db->select('categories','*');
                $categoryWiseProduct = $db->getResult();
                ?>
            <?php
            foreach ($categoryWiseProduct as $key => $category):
                
            
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?= $category['cat_title'];?>">
                    <?php
                    $db->select('products','*',null,"product_cat={$category['cat_id']} AND featured_product=1","product_id DESC",null);
                    $cate_wise_products = $db->getResult();
                    ?>
                    <?php
                    foreach ($cate_wise_products as $key => $product):
                    ?>
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="./admin/product_images/<?= $product['featured_image'];?>">
                          
                            <ul class="featured__item__pic__hover">
                                <li><a href="javascript:void()" class="add-to-wishlist" data-id="<?= $product['product_id'];?>"><i class="fa fa-heart"></i></a></li> <!-- Product Wishlist -->
                                <li><a href="compare_product.php?pid=<?= $product['product_id'];?>"><i class="fa fa-retweet"></i></a></li> <!-- Compare Product -->
                                <li><a href="product_details.php?pid=<?= $product['product_id'];?>"><i class="fa fa-eye"></i></a></li> <!-- SHow Product -->
                                <li><a href="#" data-product-price="<?= $product['product_price'];?>" data-product-id="<?= $product['product_id'];?>" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li> <!-- Add To Cart -->
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?= $product['product_title'];?></a></h6>
                            <h5>$<?= $product['product_price'];?></h5>
                        </div>
                    </div>
                    <?php
                    endforeach;
                    ?>
                </div>
                
               <?php
               
               endforeach;
               ?>
               
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->
<?php
$db = new Database;
$db->select('products','*',null,null,"product_id DESC",null);
$latestProducts = $db->getResult();

//  print_r($latestProducts[0]);
/* $dbn = new Database;
$dbn->select('products','*',null,null,"product_id DESC",3,3);
$nextLatestProduct = $dbn->getResult();
print_r($nextLatestProduct); */
?>
    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php
                                foreach ($latestProducts as $key => $value):

                              if ($key <= 2):
                                
                           
                                ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./admin/product_images/<?= $value['featured_image'];?>" alt="" width="100" height="auto">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $value['product_title'];?></h6>
                                        <span>$<?= $value['product_price'];?></span>
                                    </div>
                                </a>
                                <?php
                                endif;
                            endforeach;
                                ?>
                              
                            </div>

                         <div class="latest-prdouct__slider__item">
                                <?php
                               
                              
                                
                               foreach ($latestProducts as $key => $value):
                                
                                   if ($key >= 2 && $key < 5):
                                ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./admin/product_images/<?= $value['featured_image'];?>" alt="" width="100" height="auto">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $value['product_title'];?></h6>
                                        <span>$<?= $value['product_price'];?></span>
                                    </div>
                                </a>
                                <?php
                             endif;
                             endforeach; 
                             
                                ?>
                              
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $db = new Database;
                $db->select('products','*',null,null,"product_views DESC",null);
                $popularProducts = $db->getResult();
                // print_r($popularProducts);
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Popular Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php
                                foreach ($popularProducts as $key => $value) :

                                    if($key <= 2):
                                ?>
                                  <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./admin/product_images/<?= $value['featured_image'];?>" alt="" width="100" height="auto">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $value['product_title'];?></h6>
                                        <span>$<?= $value['product_price'];?></span>
                                    </div>
                                </a>
                                <?php
                             endif;
                             endforeach; 
                             
                                ?>
                              
                            </div>
                            <div class="latest-prdouct__slider__item">

                            <?php
                                foreach ($popularProducts as $key => $value) :

                                    if($key > 2 && $key <= 5):
                                ?>

                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./admin/product_images/<?= $value['featured_image'];?>" alt="" width="100" height="auto">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $value['product_title'];?></h6>
                                        <span>$<?= $value['product_price'];?></span>
                                    </div>
                                </a>
                                <?php
                             endif;
                             endforeach; 
                             
                                ?>
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

<?php
include_once 'footer.php';
?>
