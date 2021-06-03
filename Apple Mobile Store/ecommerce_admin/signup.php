<?php
include './themepart/connection.php';
if(isset($_POST['submit']))
{
    $cust_name=$_POST['cust_name'];
    $cust_email=$_POST['cust_email'];
    $cust_pass=$_POST['cust_pass'];
    $cust_mobile=$_POST['cust_mobile'];
    $q= mysqli_query($conn, "insert into customer (cust_name,cust_email,cust_pass,cust_mobile)values('$cust_name','$cust_email','$cust_pass','$cust_mobile') ")or die(mysqli_error($conn));
    if($q)
    {
        echo "<script>alert('Registered Successfully');window.location='signin.php';</script>";
    }
}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Minimal an Admin Panel Category Flat Bootstrap Responsive Website Template | Signup :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
</head>
<body>
    <form method="post">
          
          
	<div class="login">
		<h1><a href="index.html">E Commerce </a></h1>
		<div class="login-bottom">
			<h2>Register</h2>
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" placeholder="name" name="cust_name" required="">
                                        <i class="fa fa-gg-circle"></i>

				</div>
				<div class="login-mail">
					<input type="text" placeholder="Email" name="cust_email" required="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder=" Password" name="cust_pass" required="">
					<i class="fa fa-lock"></i>
				</div>
                            
                            <div class="login-mail">
					<input type="text" placeholder=" Mobile" name="cust_mobile" required="">
				<i class="fa fa-mobile"></i>
				</div>
				  	
			</div>
                        <br/><br/><br/><br/><br/>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
                                    <input type="submit" name="submit" value="Submit">
					</label>
					<p>Already register</p>
				<a href="signin.php" class="hvr-shutter-in-horizontal">Login</a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
        </form>
		<!---->
<?php
include './themepart/footer.php';
?>
<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

