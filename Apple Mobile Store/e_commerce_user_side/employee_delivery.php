<?php
include './themepart/connection.php';
session_start();
if(isset($_POST['submit']))
{
    $emp_email=$_POST['emp_email'];
     $emp_pass=$_POST['emp_pass'];
$q= mysqli_query($conn, "select * from employee where emp_email='{$emp_email}' and emp_pass='{$emp_pass}'")or die(mysqli_error($conn));
$count= mysqli_num_rows($q);
$row= mysqli_fetch_array($q);
if($row>0)
{
    $_SESSION['empid']=$row['emp_id'];
    $_SESSION['empname']=$row['emp_name'];
    header("location:emp_home.php");
}
else
{
   echo "<script>alert('Email and password incorrect');</script>"; 
}

}

?>
<html>
    <body>
        <form method="post">
            <h1>Employee Login</h1>
                
            Email:<input type="email" name="emp_email"  placeholder="Please Enter Valid Email Id.. Which You Provide" required="true">
            <br/>
            Password:<input type="password" name="emp_pass"   placeholder="Please Enter Valid Password Which You Provide" required="true">
            <br/>
            <input type="submit" name="submit">
        </form>
    </body>
</html>