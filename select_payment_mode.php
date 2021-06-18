<?php

session_start();
include "includes/dbhelper.php";
// update the address in orders table
$address_id = $_POST['x'];
$order_id = $_POST['order_id'];

$query = "UPDATE orders SET address=$address_id WHERE order_id='$order_id'";
if(mysqli_query($conn,$query)){
	header('Location:payment_mode.php?order_id='.$order_id);
}else{
	echo $query;
	//header('Location:show_address.php?order_id='.$order_id);
}
// redirect to the payment page

?>