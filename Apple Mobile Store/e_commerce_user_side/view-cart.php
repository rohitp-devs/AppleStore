

<h1><center>Your  Cart</center></h1><br>
<?php

include './themepart/connection.php';
session_start();

if(!isset($_SESSION['customerid']))
{
    header("location:signin.php");
}

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    unset($_SESSION['productcart'][$id]);
    unset($_SESSION['qtycart'][$id]);
}
if (isset($_SESSION['productcart']) && !empty($_SESSION['productcart'])) {
    echo "<table align='center' width='50%'>";
    echo "<th>#</th>";
    echo "<th>Name</th>";
    echo "<th>detail</th>";
     echo "<th>Price</th>";
    echo "<th>Image</th>";
    echo "<th>Qty</th>"; 
      echo "<th>Total</th>";

    $i = 0;
    $subtotal=array();
    $grandtotal=array();
    foreach ($_SESSION['productcart'] as $key => $value) {
        $i++;
        $q = mysqli_query($conn, "select * from product where product_id='{$value}'")or die("Error in query" . mysqli_error($conn));
        $pro = mysqli_fetch_array($q);
        $qty = $_SESSION['qtycart'][$key];
        
        $subtotaltemp=$pro ['product_price'] * $qty;
        echo"<tr>";
        echo"<td>$i</td>";
        echo"<td>{$pro['product_name']}</td>";
        echo"<td>{$pro['product_detail']}</td>";
         echo"<td>{$pro['product_price']}</td>";

        echo "<td><img style='width:80px' height:'70px' src='upload/{$pro['product_image']}'</td>";
        echo "<td>$qty</td>";
        echo "<td>Rs $subtotaltemp </td>";
        echo "<td><a href='?id=$key'>Remove</a></td>";
        echo"</tr>";
        
        $grandtotal[]=$subtotaltemp;
       
    }
    $finalsum= array_sum($grandtotal);
    echo "<tr>";
    
    echo "<td></td>";
    echo "<td></td>"; echo "<td></td>"; echo "<td></td>";echo "<td></td>";echo "<td></td>";
    echo "<td><b>Total </b>$finalsum</td>";
    
    echo "</tr>";
    echo "</table>";
     echo "<a href='index.php'>Buy Products       |        </a>";
} else {
    echo "Cart is Empty";
    echo "<a href='index.php'>Buy Products | </a>";
}
if(isset($_SESSION['customerid']))
{
    echo "<a href='shipping-info.php'>         Check Out | </a>";
    
}
else
{
    echo "<a href='signin.php'>Please Login To Place Order</a>";
}
?>