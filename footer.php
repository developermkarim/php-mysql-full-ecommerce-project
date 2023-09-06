<?php
  include_once './admin/php_files/database.php';
$db = new Database;

$db->select('options','*');
$result = $db->getResult();
$footer = $result[0];
?>

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: <?= $footer['contact_address'];?></li>
                            <li>Phone: <?= $footer['contact_email'];?></li>
                            <li>Email: <?= $footer['contact_phone'];?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#"_blank">Mahmodul Karim</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer Section End -->

    <!-- additional Code Here -->

    <!-- Success or Success Type Message Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="messageModalLabel">Message</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info" role="alert">
                    <p id="messageText" class="mb-0"></p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Login Redirect Modal Here -->

<div class="modal fade" id="loginMessageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger align-items-center text-white">
                <h5 class="modal-title" id="messageModalLabel"> Warning </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    <p id="loginMessageText" class="mb-0"></p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Error Modal Here -->

<div class="modal fade" id="ErrorMessageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger align-items-center text-white">
                <h5 class="modal-title" id="messageModalLabel"> Sorry! </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    <p id="ErrorMessageText" class="mb-0"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Additional Code Here End -->

    <!-- Js Plugins -->

    <script src="forntend_assets/js/jquery-3.3.1.min.js"></script>
 <!--    <script src="forntend_assets/js/jquery-1.10.2.min.js"></script> -->
    <script src="forntend_assets/js/bootstrap.min.js"></script>
    <script src="forntend_assets/js/jquery.nice-select.min.js"></script>
    <script src="forntend_assets/js/jquery-ui.min.js"></script>
    <script src="forntend_assets/js/jquery.slicknav.js"></script>
    <script src="forntend_assets/js/mixitup.min.js"></script>
    <script src="forntend_assets/js/owl.carousel.min.js"></script>
    <script src="forntend_assets/js/iziToast.min.js"></script>
    <script src="forntend_assets/js/script.js"></script>
    <script src="forntend_assets/js/user_action.js"></script>
</body>
</html>