
<?php
include './themepart/connection.php';
session_start();
if(isset($_POST['submit']))
{
    $cust_email=$_POST['cust_email'];
$cust_pass=$_POST['cust_pass'];

$q= mysqli_query($conn, "select * from customer where cust_email='{$cust_email}' and cust_pass='{$cust_pass}'")or die("Error in select query". mysqli_errno($conn));
$count= mysqli_num_rows($q);
$row= mysqli_fetch_array($q);

if($row>0)
{
    $_SESSION['customerid']=$row['cust_id'];
    $_SESSION['customer_name']=$row['cust_name'];
    header("location:home.php");
}
 else {
    echo "<script>alert('Email and password incorrect');</script>";    ;
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
<title>E commerce</title>
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
		<h1><a href="index.html">E-Commerce  </a></h1>
		<div class="login-bottom">
			<h2>Login</h2>
			
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" placeholder="Email" name="cust_email" required="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" name="cust_pass" required="">
					<i class="fa fa-lock"></i>
				</div>
				 
			
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" name="submit" value="login">
					</label>
                            <a href="signup.php"><p>Do not have an account?</p></a>
				<a href="signup.php" class="hvr-shutter-in-horizontal">Signup</a>
			</div>
			
			<div class="clearfix"> </div>
			</form>
	
                </div>
	</div>
    </form>
		<!---->
<?php
include './themepart/footer.php';
?><!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

