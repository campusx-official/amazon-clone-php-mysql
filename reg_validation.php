<?php

/*
1. connect to the database
2. receive user input from registration_form.php
3. run sql query and add the user to our database
*/
session_start();
//step1 
$conn = mysqli_connect("localhost","root","","amazon");

// step2
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// step3
$query = "INSERT INTO users VALUES (NULL,'$name','$email','$password')";

// check if the user already exists
$query1 = "SELECT * FROM users WHERE email LIKE '$email'";
$result = mysqli_query($conn,$query1);
$num_rows = mysqli_num_rows($result);

if($num_rows == 0){
	// run query
	if(mysqli_query($conn,$query)){
		// fetch details of the registered user
		$query2 = "SELECT * FROM users WHERE email LIKE '$email'";
		$result2 = mysqli_query($conn,$query2);
		$result2_arr = mysqli_fetch_assoc($result2);

		$_SESSION['name'] = $result2_arr['name'];
		$_SESSION['user_id'] = $result2_arr['user_id'];
		header('Location:index.php');
	}else{
		header('Location:registration_form.php?error=0');
	}
}else{
	header('Location:registration_form.php?error=1');
}

/*

*/

?>