<?php

session_start();
// connect to database
$conn = mysqli_connect("localhost","root","","amazon");

// fetch input from html
$email = $_POST['email'];
$password = $_POST['password'];

//run query
$query = "SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$password'";

$result = mysqli_query($conn,$query);
$result_arr = mysqli_fetch_assoc($result);
$num_rows = mysqli_num_rows($result);

if($num_rows == 1){
	$_SESSION['name'] = $result_arr['name'];
	$_SESSION['user_id'] = $result_arr['user_id'];
	header('Location:index.php');
}else{
	header('Location:login_form.php?error=1');
}


?>