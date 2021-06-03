<?php
session_start();


if (!isset($_SESSION['customerid'])) {
    header("location:signin.php");
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Mobility by TEMPLATED</title>
        <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body>
        <form method="post">
<?php
include './themepart/header.php';
?><!-- end #header -->
            <?php
            include './themepart/menu.php';
            ?>
            <!-- end #menu -->
            <div id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        <div id="content">
                            <div class="post">
                                <h2 class="title"><a href="#">Welcome </a><b><?php echo $_SESSION['customer_name']; ?></b></h2>
                                <div class="entry">
                                    <p>
<?php
include'./themepart/connection.php';


$q = mysqli_query($conn, "select * from product ")or die("Error in select query" . mysqli_error($conn));

while ($prow = mysqli_fetch_array($q)) {


    echo "<b>" . $prow['product_name'] . "</b> <br/>";
    echo $prow['product_detail'] . "<br/>";
    echo "Rs " . $prow['product_price'] . "<br/>";
    echo"<img style='width:100px' height:'150px' src='upload/{$prow['product_image']}'";

    echo"<br/><br/><a href='product_details.php?pid={$prow['product_id']}'>Buy Now</a><br/><br/>";
}
?>
                                    </p>
                                    <p></p></div>
                            </div>

                            <div class="post">
                                <div class="entry">

    <!--<p><img src="images/img05.jpg" width="186" height="186" alt="" class="alignleft border" />Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus <a href="#">dapibus semper urna</a>. Pellentesque ornare, consectetuer nisl felis ac diam. Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. Mauris vitae nisl nec metus placerat consectetuer. </p>-->
                                </div>
                            </div>
                            <div style="clear: both;">&nbsp;</div>
                        </div>
                        </form>	<!-- end #content -->
<?php
include './themepart/sidebar.php';
?><!-- end #sidebar -->
                        <div style="clear: both;">&nbsp;</div>
                    </div>
                </div>
            </div>
            <!-- end #page -->
            </div>
<?php
include './themepart/footer.php';
?>
            <!-- end #footer -->
    </body>
</html>
