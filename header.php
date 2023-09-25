<?php
                            if (session_status() == PHP_SESSION_NONE) {
                                session_start();
                            }
                            ?>
<?php

include 'config.php';
$db = new Database;

$db->select('options', '*');
$result = $db->getResult();
$header = $result[0];

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="forntend_assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="forntend_assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="forntend_assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="forntend_assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="forntend_assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="forntend_assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="forntend_assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="forntend_assets/css/iziToast.min.css" type="text/css">
    <link rel="stylesheet" href="forntend_assets/css/style.css" type="text/css">

    <style>
        .cart-wishlist{
            background: #7fad39;
        }

    .popup {
    display: none;
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px;
    background-color: #333;
    color: #fff;
    border-radius: 5px;
    z-index: 1000;
}
.preloader {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
}

/* CSS for star scaling */
.star-scale {
    transform: scale(1.4); /* Increase the scale factor as needed */
    transition: transform 0.2s ease-in-out; /* Adjust the duration and easing as needed */
}
.star-icon li i.fa-star , .star-icon li i.fa-star-o{
    font-size:larger;
}

.blockquote {
  margin: 10px 0; /* Add margin for separation */
  font-style: italic; /* Apply italic style to the text */
}

.blockquote-footer {
  text-align: right; /* Align the author's name to the right */
}


    </style>
</head>

<body>
    <!-- Page Preloder -->
<div id="preloader" class="preloader">
    <img src="./forntend_assets/spinner.gif" alt="Loading...">
</div>


<div id="popup" class="popup">
    <span class="popup-message"></span>
</div>



    
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span class="wishlist-count"></span></a></li>
                 <li><a href="#"><i class="fa fa-shopping-bag"></i> <span class="cart-count"></span></a></li>
            </ul>
            <div class="header__cart__price">item: <span><?= $header['currency_format']; ?> 150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>

            </div>

        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="<?= $hostname;?>">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i><?= $header['contact_email']; ?></li>
                <li>Free Shipping for all Order of <?= $header['currency_format']; ?>99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> <?= $header['contact_email']; ?></li>
                                <li>Free Shipping for all Order of <?= $header['currency_format']; ?>99</li>


                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                       
                    <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                           
                            <?php
                            if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != null){                            
                            ?>
                                <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>Hellow, <?= $_SESSION['username'];?></div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a class="user_profile" href="user_profile.php">My Profile</a></li>
                                    <li><a class="user_logout" href="javascript:void()">Logout</a></li>
                                </ul>
                            </div>
                                <?php
                            }else{
                                ?>
                            <div class="header__top__right__auth">

                          <!--   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user_login_form" data-whatever="@mdo">Open modal for @mdo</button> -->

                                <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#user_login_form"><i class="fa fa-user"></i>Login</a> |
                                <a href="register.php">register</a>
                            </div>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="<?= $hostname;?>">Home</a></li>
                            <li><a href="./shop-grid.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                  
                    <div class="header__cart">
                        <ul>
                        <?php
                        if(isset($_SESSION['user_id'])){
                        $db->select('cart',"COUNT(id) AS cart_count",null,"user_id={$_SESSION['user_id']}",null,null);
                        $exist = $db->getResult();
                        // print_r($exist[0]['cart_count']);
                    ?>
                    <li><a href="#"><i class="fa fa-heart"></i> <span class="wishlist-count"></span></a></li>
                    <li><a href="cart.php"><i class="fa fa-shopping-bag"></i> <span class="cart-count <?= $exist[0]['cart_count'] == 0 ? '':'cart-wishlist';?>"><?= $exist[0]['cart_count']==0 ? '':$exist[0]['cart_count'];?></span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span><?= $header['currency_format']; ?>150.00</span></div>

                        <?php
                        }else {
                        ?>
                      <li><a href="#"><i class="fa fa-heart"></i> <span class="wishlist-count"></span></a></li>
                    <li><a href="cart.php"><i class="fa fa-shopping-bag"></i> <span class="cart-count"></span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span><?= $header['currency_format']; ?>150.00</span></div>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

   
    <!-- Login Modal Here -->

<!-- Modal -->
<div class="modal fade" id="user_login_form" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="user_login_form"  method="POST">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control username" id="username" placeholder="Enter your username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control password" id="password" placeholder="Enter your password">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
      <div class="modal-footer">
          <p class="mr-auto">Don't have an account? <a href="#">Sign up</a></p>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
    
  

 <!-- Register Modal Code -->

                            <!-- Modal -->
                            <div class="modal fade" id="user_register_form" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <div class="modal-body">
            <form id="user_register" class="signup_form" method="POST" autocomplete="off" enctype="multipart/form-data">
                <h2>register here</h2>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="f_name" class="form-control first_name" placeholder="First Name" requried="">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="l_name" class="form-control last_name" placeholder="Last Name" requried="">
                </div>
                <div class="form-group">
                    <label>Username / Email</label>
                    <input type="email" name="username" class="form-control user_name" placeholder="Email Address" requried="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control pass_word" placeholder="Password" requried="">
                </div>
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="phone" name="mobile" class="form-control mobile" placeholder="Mobile" requried="">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control address" placeholder="Address" requried="">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" class="form-control city" placeholder="City" requried="">
                </div>
                <input type="submit" name="register" class="btn" value="Sign Up"/>
                                    <span>Already Have an Account <a data-target="#user_login_form" data-toggle="modal" href="#">Login</a></span>
            </form>

                        </div>

                    </div>
                </div>
            </div>
            <!-- /Modal -->