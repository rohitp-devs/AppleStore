<?php
include './themepart/connection.php';
session_start();


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    unset($_SESSION['productcart'][$id]);
    unset($_SESSION['qtycart'][$id]);
}
?>
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
                                <h2>Card List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->

        <!--================Cart Area =================-->
        <section class="cart_area section_padding">
            <div class="container">
                <div class="cart_inner">


                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <?php
                            if (isset($_SESSION['productcart']) && !empty($_SESSION['productcart'])) {
//    echo "<table align='center' width='50%'>";
//    echo "<th>#</th>";
//    echo "<th>Name</th>";
//    echo "<th>detail</th>";
//     echo "<th>Price</th>";
//    echo "<th>Image</th>";
//    echo "<th>Qty</th>"; 
//      echo "<th>Total</th>";

                                $i = 0;
                                $subtotal = array();
                                $grandtotal = array();
                                foreach ($_SESSION['productcart'] as $key => $value) {
                                    $i++;
                                    $q = mysqli_query($conn, "select * from product where product_id='{$value}'")or die("Error in query" . mysqli_error($conn));
                                    $pro = mysqli_fetch_array($q);
                                    $qty = $_SESSION['qtycart'][$key];

                                    $subtotaltemp = $pro ['product_price'] * $qty;
//        echo"<tr>";
//        echo"<td>$i</td>";
//        echo"<td>{$pro['product_name']}</td>";
//        echo"<td>{$pro['product_detail']}</td>";
//         echo"<td>{$pro['product_price']}</td>";
//        echo "<td><img style='width:80px' height:'70px' src='upload/{$pro['product_image']}'</td>";
//        echo "<td>$qty</td>";
//        echo "<td>Rs $subtotaltemp </td>";
//        echo "<td><a href='?id=$key'>Remove</a></td>";
//        echo"</tr>";
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
        <?php
        echo "<img src='upload/{$pro['product_image']}'";
        ;
        ?>
                                                    </div>
                                                    <div class="media-body">
                                                        <p><?php
                                                echo"<b>{$pro['product_name']}</b> ";
                                                echo"{$pro['product_detail']}";
        ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5><?php echo"<b>{$pro['product_price']}</b> "; ?></h5>
                                            </td>
                                            <td>
                                                <div class="product_count">

                                                    <h5><?php echo $qty; ?></h5>
                                                </div>
                                            </td>
                                            <td>
                                                <h5><?php echo $subtotaltemp; ?></h5>
                                                <?php  echo "<td><button><a href='?id=$key'>Remove</a></button></td>"; ?>
                                            </td>
                                        </tr>
                                        <tr class="bottom_button">
<!--                                            <td>
                                                <a class="btn_1" href="#">Update Cart</a>
                                            </td>-->
                                            <td></td>
                                            <td></td>
                                            <td>
<!--                                                <div class="cupon_text float-right">
                                                    <a class="btn_1" href="#">Close Coupon</a>
                                                </div>-->
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                            
        <?php
        $grandtotal[] = $subtotaltemp;
    }
    $finalsum = array_sum($grandtotal);
    ?>
                                            <td></td>
                                            <td></td><td>
                                                <h5>Subtotal</h5>
                                            </td>
                                        <td>
                                            <h5><?php echo $finalsum; ?></h5>
                                        </td>
                                        
                                          
                                    </tr>
                                    <tr class="shipping_area">
                      <!--                <td></td>
                                      <td></td>
                                      <td>
                                        <h5>Shipping</h5>
                                      </td>-->
                      <!--                <td>
                                        <div class="shipping_box">
                                          <ul class="list">
                                            <li>
                                              Flat Rate: $5.00
                                              <input type="radio" aria-label="Radio button for following text input">
                                            </li>
                                            <li>
                                              Free Shipping
                                              <input type="radio" aria-label="Radio button for following text input">
                                            </li>
                                            <li>
                                              Flat Rate: $10.00
                                              <input type="radio" aria-label="Radio button for following text input">
                                            </li>
                                            <li class="active">
                                              Local Delivery: $2.00
                                              <input type="radio" aria-label="Radio button for following text input">
                                            </li>
                                          </ul>
                                          <h6>
                                            Calculate Shipping
                                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                                          </h6>
                                          <select class="shipping_select">
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                            <option value="4">Pakistan</option>
                                          </select>
                                          <select class="shipping_select section_bg">
                                            <option value="1">Select a State</option>
                                            <option value="2">Select a State</option>
                                            <option value="4">Select a State</option>
                                          </select>
                                          <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                                          <a class="btn_1" href="#">Update Details</a>
                                        </div>
                                      </td>-->
                                    </tr>
                                </tbody>
                            </table>
                            <div class="checkout_btn_inner float-right">
                                <a class="btn_1" href="product_list.php">Continue Shopping</a>
                                <a class="btn_1" href="shipping-info.php">Proceed To CheckOut</a>
    <?php
} else {
    echo "Your Cart is Empty";
    //    echo "<a href='index.php'>Buy Products | </a>";

?>
                                <a class="btn_1 checkout_btn_1" href="product_list.php">Buy Products</a>
<?php } ?>
   </div>
                    </div>
                </div>
        </section>


        
        <!--================End Cart Area =================-->

        <footer>
            <!-- Footer Start-->
            <div class="footer-area footer-padding2">
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

        <!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
        <script src="./assets/js/jquery.sticky.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

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