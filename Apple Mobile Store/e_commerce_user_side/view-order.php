<h1>My Orders</h1>

<form method="post">
    <?php
    session_start();
    include'./themepart/connection.php';
    if (!isset($_SESSION['customerid'])) {
        header("location:signin.php");
    }
    if (isset($_GET['cid'])) {
        $cid = $_GET['cid'];

        $delivery = mysqli_query($conn, "select * from order_master where order_id='{$cid}'")or die("Error in delivery variable query" . mysqli_error($conn));
        $odelivery = mysqli_fetch_array($delivery);
        if ($odelivery['order_status'] == 'confirmed') {
            $del = mysqli_query($conn, "delete from order_details where order_id='{$cid}'")or die(mysqli_error($conn));
            if ($del) {
                $del1 = mysqli_query($conn, "delete from order_master where order_id='{$cid}'")or die(mysqli_error($conn));
                if ($del1) {
                    echo "<script>alert('Your order is cancelled');</script>";
                }
            }
        } else {
            echo "<script>alert('Sorry');</script>";
        }
    }


    $q = mysqli_query($conn, "select * from order_master where cust_id='{$_SESSION['customerid']}'")or die(mysqli_error($conn));



    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Order Date</th>";
    echo "<th>Status</th>";
    echo "<th>Product</th>";
// echo "<th>Product name</th>";
// echo "<th>Product Price</th>";

    echo "</tr>";


    while ($row = mysqli_fetch_array($q)) {
        echo "<tr>";

        echo "<td>{$row['order_id']}</td>";
        echo "<td>{$row['order_date']}</td>";
        echo "<td>{$row['order_status']} </td>";
        echo "<td><a href='view-order.php?cid={$row['order_id']}'>cancel</a></td>";





//$a= mysqli_fetch_array($q);
//$prodetails= mysqli_query($conn, "select * from order_details where order_id='{$row['order_id']}'")or die(mysqli_error($conn));
//while($pdetail= mysqli_fetch_array($prodetails))
//{
//
//$products= mysqli_query($conn, "select * from product where product_id='{$pdetail['product_id']}'")or die(mysqli_error($conn));
//
//while($pd= mysqli_fetch_array($products))
//{   
//        
//     echo "<td>{$pd['1']}</td>";
//     echo "<td>{$pd['3']}</td>";
//    
//
//
//}
//  



        if ($row['order_status'] == 'delivered') {


            echo "<br/>Please Share Your Valuable Feedback With Us!😊😊";
            if (isset($_POST['submit'])) {
                $f_name = $_POST['f_name'];
                $cust_id = $_SESSION['customerid'];
                $q1 = mysqli_query($conn, "insert into feedback (f_name,cust_id) values ('{$f_name}','{$cust_id}')")or die(mysqli_error($conn));
                if ($q1) {
                    echo "<script>alert('Thank you for sharing your personal experience with us');</script>";
                }
            }


            echo "<input type='text' name='f_name'> <br/>";
            echo "<input type='submit' name='submit' value='Give Feedback'> | ";
        }
    }

    echo "</table>";


    if (isset($_POST['emoji'])) {
        $emoji = $_POST['emoji'];
        $cust_id = $_SESSION['customerid'];
        $q = mysqli_query($conn, "insert into feedback (emoji,cust_id) values ('{$emoji}','{$cust_id}')")or die(mysqli_error($conn));
        if ($q) {
            echo "<script>alert('Thanks For Sharing Your Feedback');</script>";
        }
    }
    ?>

    <a href="index.php"><input type="button" value="Back To Menu"></a><br/>
    <button value="5" name="emoji">😍</button><button value="4" name="emoji">😊</button><button value="3" name="emoji">🙂</button><button value="2" name="emoji">😐</button><button value="1" name="emoji">😣</button>
</form>