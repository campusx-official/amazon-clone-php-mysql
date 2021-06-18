<?php
session_start();
include "includes/dbhelper.php";

$user_id = $_SESSION['user_id'];
$street_address = $_POST['street_address'];
$landmark = $_POST['landmark'];
$city = $_POST['city'];
$state = $_POST['state'];
$contact = $_POST['contact'];
$pin = $_POST['pin'];

$query = "INSERT INTO address VALUES (NULL,$user_id,'$street_address','$landmark','$city','$state','$pin','$contact')";

if(mysqli_query($conn,$query)){
	header('Location:show_address.php');
}else{
	echo "Some error occured";
}

?>