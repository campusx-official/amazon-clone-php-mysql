<?php
include "includes/dbhelper.php";
session_start();

$payment_method = $_POST['x'];
$order_id = $_POST['order_id'];
$user_id = $_SESSION['user_id'];
// update the payment mode in orders table
// confirm the order --> order status --> success(1)
$query = "UPDATE orders SET status=1,payment_method='$payment_method' WHERE order_id='$order_id'";
if(mysqli_query($conn,$query)){
	// empty cart
	$query1 = "DELETE FROM cart WHERE user_id=$user_id";
	if(mysqli_query($conn,$query1)){
		header('Location:success.php');
	}else{
		header('payment_mode.php?order_id='.$order_id);
	}
	// show success page
}


?>