<?php
include './themepart/connection.php';
session_start();
if (!isset($_SESSION['customerid'])) {
    header("location:signin.php");
}
if (isset($_POST['submit'])) {

    $name = $_POST['text1'];
    $mobile = $_POST['text2'];
    $address = $_POST['text3'];
    $cid = $_SESSION['customerid'];

    $currentdate = date('d-m-y');
    $ordermasterq = mysqli_query($conn, "insert into order_master(order_date,cust_id,order_status,shippingname,shippingmobile,shippingaddress)values('$currentdate','$cid','pending','$name','$mobile','$address') ")or die(mysqli_error($conn));
    $orderid = mysqli_insert_id($conn);

    foreach ($_SESSION['productcart'] as $key => $value) {

        $q1 = mysqli_query($conn, "select * from product where product_id='{$value}'")or die("Error in query" . mysqli_error($conn));
        $pro = mysqli_fetch_array($q1);
        $qty = $_SESSION['qtycart'][$key];
        $orderdetailsq = mysqli_query($conn, "insert into order_details (order_id,product_id,qty,product_price) values ('$orderid','$value','$qty','{$pro['product_price']}')")OR die("Error in vorder_details query" . mysqli_error($conn));

        if ($orderdetailsq) {

            $o = mysqli_query($conn, "insert into delivery (order_id) values ('{$orderid}')")or die("Error in delivery query" . mysqli_error($conn));
            if ($o) {
                echo "Delivery TABLE DATA INSERTED";
            }
        }
    }
    unset($_SESSION['productcart']);
    unset($_SESSION['counter']);
    unset($_SESSION['qtycart']);
    echo "<script>alert('😍Thank you Your Order Is Placed😍');window.location='index.php';</script>";
}
?>

<html>
    <body>
        <h1>Shipping Info</h1>
        <form method="post">
            Name:<input type="text" name="text1"><br/>
            Mobile:<input type="text" name="text2"><br/>
            Address:<textarea name="text3"></textarea><br/>
            <input type="submit" name="submit" value="Confirm Order">
        </form>
    </body>
</html>