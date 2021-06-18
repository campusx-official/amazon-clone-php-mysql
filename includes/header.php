<!DOCTYPE html>
<html>
<head>
	<title>Amazon</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>
<body>

	<nav class="navbar bg-nav">
		<img src="img/logo.png" style="width: 100px;height: 50px">
		<?php
			if($is_logged_in){
				echo '<div class="dropdown" style="margin-right:50px">
						  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    '."Hi ".$_SESSION['name'].'
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						  	<a class="dropdown-item" href="cart.php">My Cart</a>
						    <a class="dropdown-item" href="wishlist.php">Wishlist</a>
						    <a class="dropdown-item" href="orders.php">Orders</a>
						    <a class="dropdown-item" href="#">Settings</a>
						    <a class="dropdown-item" href="logout.php">Logout</a>
						  </div>
						</div>';
			}else{
				echo '<a href="login_form.php"><p class="text-white"><small>Hello, Signin</small><br><b>Accounts and Lists</b></p></a>';
			}
		?>
		
	</nav>
