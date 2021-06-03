
<?php
ob_start();
ob_clean();
include './themepart/connection.php';
session_start();
if (!isset($_SESSION['customerid'])) {
    header("location:login.php");
}
if (isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $cid = $_SESSION['customerid'];

    $currentdate = date('d-m-y');
    $ordermasterq = mysqli_query($conn, "insert into order_master(order_date,cust_id,order_status,first_name,last_name,mobile_number,email,address,city,zip)values('$currentdate','$cid','pending','$first_name','$last_name','$mobile_number','$email','$address','$city','$zip') ")or die(mysqli_error($conn));
    $orderid = mysqli_insert_id($conn);

    foreach ($_SESSION['productcart'] as $key => $value) {

        $q1 = mysqli_query($conn, "select * from product where product_id='{$value}'")or die("Error in query" . mysqli_error($conn));
        $pro = mysqli_fetch_array($q1);
        $qty = $_SESSION['qtycart'][$key];
        $orderdetailsq = mysqli_query($conn, "insert into order_details (order_id,product_id,qty,product_price) values ('$orderid','$value','$qty','{$pro['product_price']}')")OR die("Error in vorder_details query" . mysqli_error($conn));

        if ($orderdetailsq) {

            $o = mysqli_query($conn, "insert into delivery (order_id) values ('{$orderid}')")or die("Error in delivery query" . mysqli_error($conn));
   
        }
        unset($_SESSION['productcart']);
        unset($_SESSION['counter']);
        unset($_SESSION['qtycart']);

        echo "<script>alert('😍Thank you Your Order Is Placed😍');window.location='index.php';</script>";
    }
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
                                    <h2>Checkout</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- slider Area End-->

            <!--================Checkout Area =================-->
            <section class="checkout_area section_padding">
                <div class="container">
                    <!--      <div class="returning_customer">
                            <div class="check_title">
                              <h2>
                                Returning Customer?
                                <a href="#">Click here to login</a>
                              </h2>
                            </div>
                            <p>
                              If you have shopped with us before, please enter your details in the
                              boxes below. If you are a new customer, please proceed to the
                              Billing & Shipping section.
                            </p>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                              <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="name" name="name" value=" " />
                                <span class="placeholder" data-placeholder="Username or Email"></span>
                              </div>
                              <div class="col-md-6 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password" value="" />
                                <span class="placeholder" data-placeholder="Password"></span>
                              </div>
                              <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn_3">
                                  log in
                                </button>
                                <div class="creat_account">
                                  <input type="checkbox" id="f-option" name="selector" />
                                  <label for="f-option">Remember me</label>
                                </div>
                                <a class="lost_pass" href="#">Lost your password?</a>
                              </div>
                            </form>
                          </div>
                          <div class="cupon_area">
                            <div class="check_title">
                              <h2>
                                Have a coupon?
                                <a href="#">Click here to enter your code</a>
                              </h2>
                            </div>
                            <input type="text" placeholder="Enter coupon code" />
                            <a class="tp_btn" href="#">Apply Coupon</a>
                          </div>-->
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Payment</strong> This Site Accept Only COD (Cash On Delivery).
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="billing_details">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3>Billing Details</h3>
                                <form class="row contact_form" action="#" method="post">
                                    <div class="col-md-6 form-group p_star">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">First Name</span>
                                            </div>
                                            <input type="text" name="first_name" required="true" class="form-control" autocomplete="false" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group p_star">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Last Name</span>
                                            </div>
                                            <input type="text" name="last_name" required="true" class="form-control" autocomplete="true" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-sm" placeholder="Last Name">
                                        </div></div>
                                    <div class="col-md-6 form-group p_star">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Mobile</span>
                                            </div>
                                            <input type="number" autocomplete="true" class="form-control"name="mobile_number" required="true" id="number" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Mobile Number">
                                        </div>  </div>
                                    <div class="col-md-6 form-group p_star">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                                            </div>
                                            <input type="email" class="form-control" autocomplete="true" required="true" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Email">
                                        </div>  </div>
                                    <div class="col-md-6 form-group p_star">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Address</span>
                                            </div>
                                            <input type="text" class="form-control"  autocomplete="true" name="address" required="true" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Enter Address">
                                        </div>  </div>
                                    <div class="col-md-6 form-group p_star">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">City</span>
                                            </div>
                                            <input type="text" required="true" class="form-control" name="city" autocomplete="true"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Enter City">
                                        </div>  </div>
                                    <div class="col-md-6 form-group p_star">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Zip Code</span>
                                            </div>
                                            <input type="number" required="true" class="form-control" name="zip" autocomplete="true" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Enter Zip code..">
                                        </div>  </div>
                                    <div class="col-md-12 form-group">
                                        <div class="creat_account">
                        <!--                  <input type="checkbox" id="f-option2" name="selector" />
                                          <label for="f-option2">Create an account?</label>-->
                                        </div>
                                    </div>

                                    <div class="#" >
                                        <input type="submit" class="btn btn-outline-success"  name="submit" value="confirm order">

                                    </div>
                                </form>
                            </div>
                            <!--          <div class="col-lg-4">
                                        <div class="order_box">
                                          <h2>Your Order</h2>
                                          <ul class="list">
                                            <li>
                                              <a href="#">Product
                                                <span>Total</span>
                                              </a>
                                            </li>
                                            <li>
                                              <a href="#">Fresh Blackberry
                                                <span class="middle">x 02</span>
                                                <span class="last">$720.00</span>
                                              </a>
                                            </li>
                                            <li>
                                              <a href="#">Fresh Tomatoes
                                                <span class="middle">x 02</span>
                                                <span class="last">$720.00</span>
                                              </a>
                                            </li>
                                            <li>
                                              <a href="#">Fresh Brocoli
                                                <span class="middle">x 02</span>
                                                <span class="last">$720.00</span>
                                              </a>
                                            </li>
                                          </ul>
                                          <ul class="list list_2">
                                            <li>
                                              <a href="#">Subtotal
                                                <span>$2160.00</span>
                                              </a>
                                            </li>
                                            <li>
                                              <a href="#">Shipping
                                                <span>Flat rate: $50.00</span>
                                              </a>
                                            </li>
                                            <li>
                                              <a href="#">Total
                                                <span>$2210.00</span>
                                              </a>
                                            </li>
                                          </ul>
                                          <div class="payment_item">
                                            <div class="radion_btn">
                                              <input type="radio" id="f-option5" name="selector" />
                                              <label for="f-option5">Check payments</label>
                                              <div class="check"></div>
                                            </div>
                                            <p>
                                              Please send a check to Store Name, Store Street, Store Town,
                                              Store State / County, Store Postcode.
                                            </p>
                                          </div>
                                          <div class="payment_item active">
                                            <div class="radion_btn">
                                              <input type="radio" id="f-option6" name="selector" />
                                              <label for="f-option6">Paypal </label>
                                              <img src="img/product/single-product/card.jpg" alt="" />
                                              <div class="check"></div>
                                            </div>
                                            <p>
                                              Please send a check to Store Name, Store Street, Store Town,
                                              Store State / County, Store Postcode.
                                            </p>
                                          </div>
                                          <div class="creat_account">
                                            <input type="checkbox" id="f-option4" name="selector" />
                                            <label for="f-option4">I’ve read and accept the </label>
                                            <a href="#">terms & conditions*</a>
                                          </div>
                                          <a class="btn_3" href="#">Proceed to Paypal</a>
                                        </div>
                                      </div>-->
                        </div>
                    </div>
                </div>
            </section>
            <!--================End Checkout Area =================-->


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
                                            <a href="index.html"><img src="assets/img/logo/logoiq.png" alt=""></a>
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
    </form>
</body>

</html>