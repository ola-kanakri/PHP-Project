<?php
session_start();
include("includes/connection.php");
$add= $_GET['p_id'];
$b=$_SESSION['loggedIn'];
// $a=$_POST['product-quantity'];

 if(isset($_GET['addtc']))
 {
   $qu= "INSERT INTO `cart` (productID,customerID) VALUES ($add,$b)";
    mysqli_query($con,$qu);

    header('location:cart.php');

}
?>
