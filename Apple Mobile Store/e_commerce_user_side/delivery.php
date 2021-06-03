
<?php
include './themepart/connection.php';
session_start();

foreach ($_SESSION['productcart'] as $key => $value) {
    
        $q1 = mysqli_query($conn, "select * from product where product_id='{$value}'")or die("Error in query" . mysqli_error($conn));
        $pro = mysqli_fetch_array($q1);
 
       $orderdetailsq= mysqli_query($conn,"insert into delivery () values ()")or die("Error in vorder_details query".mysqli_error($conn));
}
?>