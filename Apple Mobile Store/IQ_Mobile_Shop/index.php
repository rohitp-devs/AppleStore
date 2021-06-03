<?php
session_start();
if (!isset($_SESSION['customerid'])) {
    header("location:login.php");
}
?>

<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>IQ Mobiles</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

        <!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/slicknav.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body>

        <!-- Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <img src="assets/img/logo/logoiq.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Preloader Start -->

        <header>
            <!-- Header Start -->
<?php include './themepart/header.php'; ?>
            <!-- Header End -->
        </header>

        <main>

            <!-- slider Area Start -->
<?php include './themepart/headerslider.php'; ?>
            <!-- slider Area End-->
            <!-- Category Area Start-->
<?php // include './themepart/categoryarea.php';   ?>
            <!-- Category Area End-->
            <!-- Latest Products Start -->
            <section class="latest-product-area padding-bottom">
                <div class="container">
                    <div class="row product-btn d-flex justify-content-end align-items-end">
                        <!-- Section Tittle -->
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <div class="section-tittle mb-30">
                                <h2>Our Latest Products</h2>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7">
                            <div class="properties__button f-right">
                                <!--Nav Button  -->
                                <nav>                                                                                                
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Featured</a>
                                        <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Offer</a>
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <!-- Nav Card -->


                    <div class="tab-content" id="nav-tabContent">

                        <!-- card one -->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                            <div class="row">
<?php
include'./themepart/connection.php';
$q = mysqli_query($conn, "select * from product ")or die("Error in select query" . mysqli_error($conn));
while ($prow = mysqli_fetch_array($q)) {

//    echo $prow['product_detail'] . "<br/>";
//    echo"<br/><br/><a href='product_details.php?pid={$prow['product_id']}'>Buy Now</a><br/><br/>";
    ?>
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single-product mb-60">                                    
                                            <div class="product-img">
                        <?php echo"<img style='width:100px' height:'150px' src='upload/{$prow['product_image']}'"; ?>
                                                <img src="assets/img/categori/product1.png" alt="">
                                                <div class="new-product">
                                                    <!--<span>New</span>-->
                                                </div>
                                            </div>
                                            <div class="product-caption">
                                                <div class="product-ratting">
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star low-star"></i>
                                                    <i class="far fa-star low-star"></i>
                                                </div>
                                                <h4><a href="#"><?php echo "<b>" . $prow['product_name'] . "</b>"; ?></a></h4>
                                                <div class="price">
                                                    <ul>
                                                        <li><?php echo "Rs " . $prow['product_price']; ?></li>
                                                        <li class="discount">$60.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php } ?>
                            </div>
                        </div>
                        <!-- Card two -->

                    </div>
                    <!-- End Nav Card -->
                </div>
            </section>
            <!-- Latest Products End -->
            <!-- Best Product Start -->
            <div class="best-product-area lf-padding" >
                <div class="product-wrapper bg-height" style="background-image: url('assets/img/categori/card.png')">
                    <div class="container position-relative">
                        <div class="row justify-content-between align-items-end">
                            <div class="product-man position-absolute  d-none d-lg-block">
                                <img src="#" alt="">
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 d-none d-lg-block">
                                <div class="vertical-text">
                                    <span>Apple</span>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8">
                                <div class="best-product-caption">
                                    <h2>Find The Best Product<br> from Our Shop</h2>
                                    <p>.</p>
                                    <a href="product_list.php" class="black-btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Shape -->
                <div class="shape bounce-animate d-none d-md-block">
                    <img src="assets/img/categori/apple.png" alt="">
                </div>
            </div>
            <!-- Best Product End-->
            <!-- Best Collection Start -->
            <div class="best-collection-area section-padding2">
                <div class="container">
                    <div class="row d-flex justify-content-between align-items-end">
                        <!-- Left content -->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="best-left-cap">
                                <h2>Best Collection of This Month</h2>
                                <p>Designers who are interesten crea.</p>
                                <a href="#" class="btn shop1-btn">Shop Now</a>
                            </div>
                            <div class="best-left-img mb-30 d-none d-sm-block">
                                <img src="assets/img/collection/collection1.png" alt="">
                            </div>
                        </div>
                        <!-- Mid Img -->
                        <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                            <div class="best-mid-img mb-30 ">
                                <img src="assets/img/collection/collection2.png" alt="">
                            </div>
                        </div>
                        <!-- Riht Caption -->
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="best-right-cap ">
                                <div class="best-single mb-30">
                                    <div class="single-cap">
                                        <h4>Menz Winter<br> Jacket</h4>
                                    </div>
                                    <div class="single-img">
                                        <img src="assets/img/collection/collection3.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="best-right-cap">
                                <div class="best-single mb-30">
                                    <div class="single-cap active">
                                        <h4>Menz Winter<br>Jacket</h4>
                                    </div>
                                    <div class="single-img">
                                        <img src="assets/img/collection/collection4.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="best-right-cap">
                                <div class="best-single mb-30">
                                    <div class="single-cap">
                                        <h4>Menz Winter<br> Jacket</h4>
                                    </div>
                                    <div class="single-img">
                                        <img src="assets/img/collection/collection5.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- Best Collection End -->
            <!-- Latest Offers Start -->
            <div class="latest-wrapper lf-padding">
                <div class="latest-area latest-height d-flex align-items-center" data-background="assets/img/collection/latest-offer.png">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-5 col-lg-5 col-md-6 offset-xl-1 offset-lg-1">
                                <div class="latest-caption">
                                    <h2>Get Our<br>Latest Offers News</h2>
                                    <p>Subscribe news latter</p>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6 ">
                                <div class="latest-subscribe">
                                    <form action="#">
                                        <input type="email" placeholder="Your email here">
                                        <button>Shop Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- man Shape -->
                    <div class="man-shape">
                        <img src="assets/img/collection/latest-man.png" alt="">
                    </div>
                </div>
            </div>
            <!-- Latest Offers End -->
            <!-- Shop Method Start-->
            <div class="shop-method-area section-padding30">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-package"></i>
                                <h6>Free Shipping Method</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-unlock"></i>
                                <h6>Secure Payment System</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div> 
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-reload"></i>
                                <h6>Secure Payment System</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shop Method End-->
            <!-- Gallery Start-->
            <div class="gallery-wrapper lf-padding">
                <div class="gallery-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="gallery-items">
                                <img src="https://source.unsplash.com/250x200/?iphone" alt="">
                            </div> 
                            <div class="gallery-items">
                                <img src="https://source.unsplash.com/250x200/?mobile,iphone" alt="">
                            </div>
                            <div class="gallery-items">
                                <img src="https://source.unsplash.com/250x200/?mobile,iwatch alt="">
                            </div>
                            <div class="gallery-items">
                                <img src="https://source.unsplash.com/250x200/?iphone,macbook" alt="">
                            </div>
                            <div class="gallery-items">
                                <img src="https://source.unsplash.com/250x200/?macbook,iphone" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Gallery End-->

        </main>
        <footer>

            <!-- Footer Start-->
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo">
                                        <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Quick Links</h4>
                                    <ul>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#"> Offers & Discounts</a></li>
                                        <li><a href="#"> Get Coupon</a></li>
                                        <li><a href="#">  Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>New Products</h4>
                                    <ul>
                                        <li><a href="#">Woman Cloth</a></li>
                                        <li><a href="#">Fashion Accessories</a></li>
                                        <li><a href="#"> Man Accessories</a></li>
                                        <li><a href="#"> Rubber made Toys</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Support</h4>
                                    <ul>
                                        <li><a href="#">Frequently Asked Questions</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Report a Payment Issue</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer bottom -->
<?php include './themepart/footer.php'; ?>
                </div>
            </div>
            <!-- Footer End-->

        </footer>

        <!-- JS here -->

        <!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
        <!-- Jquery, Popper, Bootstrap -->
        <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

        <!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>

        <!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
        <script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

        <!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
        <script src="./assets/js/jquery.sticky.js"></script>

        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

        <!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>

    </body>
</html>