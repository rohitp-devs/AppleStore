


<!DOCTYPE HTML>
<html>
<head>
<title>E-commerce By Rohit Pahuja</title>
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
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>

<!----->

<!--pie-chart--->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>
<div id="wrapper">

<!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <?php
             include './themepart/header.php';
             ?>
     
       
            <!-- Brand and toggle get grouped for better mobile display -->
		 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		   		           
		    	<!-- /.navbar-collapse -->
			<div class="clearfix">
       
     </div>
	  
		<?php
                include'./themepart/sidebar.php';
                ?>
                             </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 
 	<!--banner-->	
		   <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Product</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
        <?php
include './themepart/connection.php';
if(isset($_GET['editid']))
{
$editid=$_GET['editid'];
$q= mysqli_query($conn, "select * from product where product_id='{$editid}'");
$rowfromdb= mysqli_fetch_array($q);

}
?>
<?php
include './themepart/connection.php';
if(isset($_POST['submit']))
{
    $product_id=$_POST['product_id'];
    $product_name=$_POST['product_name'];
    $product_detail=$_POST['product_detail'];
    $category_id=$_POST['category_id'];
    $brand_id=$_POST['brand_id'];
    $product_image=$_POST['product_image'];
    $q= mysqli_query($conn, "update  product set product_id='{$product_id}',product_name='{$product_name}',product_detail='{$product_detail}',category_id='{$category_id}',brand_id='{$brand_id}',product_image='{$product_image}' where product_id='{$product_id}'") or die("Error in update query.". mysqli_error($conn));
    if($q)
    {
        echo"<script>alert('record Updated');window.location='d_product.php';</script>";
    }
}

?>

 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
        <center><h1>Product Table</h1></center>    
        <form method="post">
         	<div class="vali-form">
       <div class="col-md-9 form-group1">
              <label class="control-label">Product Id</label>
              <input type="text" placeholder="Enter Id.." readonly="true" value="<?php echo $rowfromdb['product_id']; ?>"  name="product_id" required="">
            </div>
                    
                    <div class="col-md-9 form-group1">
              <label class="control-label">Product Name</label>
              <input type="text" placeholder="Enter  Name.." value="<?php echo $rowfromdb['product_name']; ?>"  name="product_name" required="">
            </div>

                    
                               <div class="col-md-9 form-group1">
              <label class="control-label">Product Details</label>
              <input type="text" placeholder="Enter Details.." value="<?php echo $rowfromdb['product_detail']; ?>"  name="product_detail" required="">
            </div>

                               <div class="col-md-9 form-group1">
              <label class="control-label">Category Id </label>
              <input type="text" placeholder="Enter Id.." value="<?php echo $rowfromdb['category_id']; ?>"  name="category_id" required="">
            </div>

                               <div class="col-md-9 form-group1">
              <label class="control-label">Brand Id</label>
              <input type="text" placeholder="Enter Id .." value="<?php echo $rowfromdb['brand_id']; ?>"  name="brand_id" required="">
            </div>

                               <div class="col-md-9 form-group1">
              <label class="control-label">Product Image</label>
              <input type="text" placeholder="Enter Image .." value="<?php echo $rowfromdb['product_image']; ?>"  name="product_image" required="">
            </div>

             <div class="clearfix"> </div>
          <br/>
            <div class="col-md-12 form-group">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          <div class="clearfix"> </div>
        </form>
    
 	<!---->
 </div>

</div>
 	<!--//grid-->
		<!---->
<?php
include './themepart/footer.php';
?>
		</div>
		<div class="clearfix"> </div>
       </div>
     
<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>


