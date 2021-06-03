
<!doctype html>
<html lang="zxx">


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
        

        <header>
            <!-- Header Start -->
            <?php include './themepart/header.php'; ?>
            <!-- Header End -->
        </header>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/colorfullapple.jpeg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <div class="col-xl-4 col-lg-5 col-md-5">
            <div class="section-tittle mb-30">
                <br/>      <center> <span class="badge badge-danger">New</span>         <h2>Product Details</h2>
                </center></div>
        </div>
        <!--================Single Product Area =================-->
        <?php
        ob_start();

        session_start();
        include './themepart/connection.php';
        $cust_id = $_SESSION['customerid'];
        $pid = $_GET['pid'];
        $product = mysqli_query($conn, "select * from product where product_id='{$pid}'");
        $count = mysqli_num_rows($product);
        if ($count < 1) {
            header("location:index.php");
        }
        $productdetails = mysqli_fetch_array($product);
        ob_clean();
        ?>

        <div class="product_image_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="product_img_slide owl-carousel">
                            <div class="single_product_img">
                                <?php echo "<img src='upload/{$productdetails['product_image']}' style='width:100; height:100'>";
                                ?>
                            </div>
                            <!--            <div class="single_product_img">
                                          <img src="assets/img/product/single_product.png" alt="#" class="img-fluid">
                                        </div>
                                        <div class="single_product_img">
                                          <img src="assets/img/product/single_product.png" alt="#" class="img-fluid">
                                        </div>-->
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="single_product_text text-center">
                            <h3>
                                <?php echo "<td>{$productdetails['product_name']}</td>"; ?>
                            </h3>
                            <p>
                                <?php echo $productdetails['product_detail'] . "</h3>";
                                ?>
                            </p>
        <form method="get" action="cart-process.php">                    
                                <div class="card_area">
                                    <div class="product_count_area">
                                        <p>Quantity</p>
                                        <div class="product_count d-inline-block">
                                            <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                            <input class="product_count_item input-number" type="text" value="1" name="qty" min="1" max="10">
                                            <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                        </div>
                                        <p><?php echo "Price:<b> Rs " . $productdetails['product_price'] . "</b></h3>";
                                ?></p>
                                    </div>
                                    
                                    <input type="hidden" name="product_id" value="<?php echo $pid; ?>">
                                    <div class="add_to_cart">
<input type="submit" value="add to cart">
</form>
                                        <!--                                        
<a href="#" class="btn_3">add to cart</a>-->
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->
        <!-- subscribe part here -->
        <section class="subscribe_part section_padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="subscribe_part_content">
                            <h2>Get promotions & updates!</h2>
                            <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                            <div class="subscribe_form">
                                <input type="email" placeholder="Enter your mail">
                                <a href="#" class="btn_1">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subscribe part end -->

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

        <!-- swiper js -->
        <script src="./assets/js/swiper.min.js"></script>
        <!-- swiper js -->
        <script src="./assets/js/mixitup.min.js"></script>
        <script src="./assets/js/jquery.counterup.min.js"></script>
        <script src="./assets/js/waypoints.min.js"></script>

                            </form>

    </body>

</html>