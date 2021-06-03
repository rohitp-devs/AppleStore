
<div class="header-area">
    <div class="main-header ">
        <div class="header-top top-bg d-none d-lg-block">
            <div class="container-fluid">
                <div class="col-xl-12">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="header-info-left d-flex">
                            <div class="flag">
                                <!--<img src="assets/img/icon/header_icon.png" alt="">-->
                            </div>
                            <div class="select-this">
                                <form action="#">
                                    <div class="select-itms">
                                        <select name="select" id="select1">
                                            <option value="">India</option>

                                        </select>
                                    </div>
                                </form>
                            </div>
                            <ul class="contact-now">     
                                <li>+91 8153846692</li>
                            </ul>
                        </div>
                        <div class="header-info-right">
                            <ul>                                          
                                <li><a href="login.php">My Account </a></li>
                                <!--<li><a href="product_list.html">Wish List  </a></li>-->
                                <li><a href="my-orders.php">My Orders</a></li>
                                <li><a href="view-cart.php">Cart</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom  header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo/logoiq.png" alt=""></a>Mobiles
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">                                                                                                                                     
                                    <li><a href="index.php">Home</a></li>
                                    <!--<li><a href="Catagori.html">Category</a></li>-->
                                    <li class="hot"><a href="#">Latest</a>
                                        <ul class="submenu">
                                            <li><a href="product_list.php"> Product list</a></li>

                                        </ul>
                                    </li>

                                        <li><a href="#">Account</a>
                                        <ul class="submenu">
                                            <li><a href="logout.php">Log Out</a></li>

                                        </ul>
                                    </li>

                                    <li><a href="blog.html">Blog</a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="single-blog.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <!--                                            <li><a href="#">Pages</a>
                                                                                    <ul class="submenu">
                                                                                        <li><a href="login.html">Login</a></li>
                                                                                        <li><a href="cart.html">Card</a></li>
                                                                                        <li><a href="elements.html">Element</a></li>
                                                                                        <li><a href="about.html">About</a></li>
                                                                                        <li><a href="confirmation.html">Confirmation</a></li>
                                                                                        <li><a href="cart.html">Shopping Cart</a></li>
                                                                                        <li><a href="checkout.html">Product Checkout</a></li>
                                                                                    </ul>
                                                                                </li>-->
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div> 
                    <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                        <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                            <li class="d-none d-xl-block">
                                <div class="form-box f-right ">
                                    <input type="text" name="Search" placeholder="Search products">
                                    <div class="search-icon">
                                        <i class="fas fa-search special-tag"></i>
                                    </div>
                                </div>
                            </li>
                        
                            <li>
                                <div class="shopping-card">
                                    <a href="view-cart.php"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </li>
                            <?php if (isset($_SESSION['customerid'])) {
                                ?>
                                <li class="d-none d-lg-block" > <a href="#" class="btn header-btn" readonly="true"><?php echo $_SESSION['customer_name']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>