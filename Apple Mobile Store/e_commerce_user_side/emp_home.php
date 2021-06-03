<?php
include './themepart/connection.php';
session_start();
$empid=$_SESSION['empid'];
 echo "<b>".$_SESSION['empname']."</b>";   
$e= mysqli_query($conn, "select * from delivery where emp_id='{$_SESSION['empid']}' ")or die("Error in delivery 1st query".mysqli_query($conn, $query));
$a= mysqli_fetch_array($e);
    if($empid==$a['emp_id'])
    {
        $a= mysqli_query($conn, "select * from delivery where emp_id='{$_SESSION['empid']}'")or die(mysqli_error($conn));
//        $a1= mysqli_fetch_array($a);
//        $order= mysqli_query($conn, "select order_id from delivery where order_id='{$a1['order_id']}'")or die(mysqli_error($conn));
//        $order1= mysqli_fetch_array($order);
//        $master= mysqli_query($conn,"select * from order_master where order_id='{$order1['order_id']}'")or die(mysqli_error($conn));
//        $d= mysqli_fetch_array($master);
//        echo "1   ".$d[0]."</br>";
//  echo "2  ".$d[1]."<br/>";
//    echo "3  ".$d[2]."<br/>";
//      echo "4  ".$d[3]."<br/>";
//        
$count= mysqli_num_rows($a);
        echo " You have<b> ".$count." </b>Orders";
        echo "<table border='1'>";
       echo "<th>Delivery Id</th>";
        echo "<th>Employee Id</th>";
         echo "<th>Order Id</th>";
        while($emp= mysqli_fetch_array($a))
                
        {
            echo "<tr>";
             echo "<td>".$emp['0']."</td>";
             echo "<td>".$emp['1']."</td>";
              echo "<td>".$emp['2']."</td>";
              echo"</tr>";
        }
        
       echo "</table>";     
           
    }
 else {
        echo" You have No Orders Right Now";
    }


?>