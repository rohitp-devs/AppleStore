<?php
session_start();

if(!isset($_SESSION['customerid']))
{
    header("location:signin.php");
}

?>
<?php
include './themepart/connection.php';
$cust_id=$_SESSION['customerid'];
$pid=$_GET['pid'];  
$cust_id=$_SESSION['customerid'];
$product= mysqli_query($conn,"select * from product where product_id='{$pid}'");
$count= mysqli_num_rows($product);
if($count<1)
{
    header("location:index.php");   
}
$productdetails= mysqli_fetch_array($product);
echo "<td>{$productdetails['product_name']}</td>";
echo "<img src='upload/{$productdetails['product_image']}' style='width:50px;'>";
echo "<br/><b>Details:</b>".$productdetails['product_detail']."</h3>";
echo "<br/><b>Price:</b>".$productdetails['product_price']."</h3>";


?>

<form method="get" action="cart-process.php">
    <input type="hidden" name="product_id" value="<?php echo $pid;  ?>">
    Qty:<input type="number" name="qty" min="1" max="10"> 
    <input type="submit" value="Add to Cart">
</form>