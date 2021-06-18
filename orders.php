<?php
session_start();

if(empty($_SESSION)){
	header('Location:login_form.php');
}else{
	$is_logged_in = 1;
}
?>

<?php include("includes/header.php"); ?>

<div class="container">
	<div class="row">
		
		<div class="col-6">
			<h2 class="mt-5">My Orders</h2><br>
			
				
						<?php
						include "includes/dbhelper.php";
						$user_id = $_SESSION['user_id'];

						$query = "SELECT * FROM orders WHERE user_id=$user_id";
						$result = mysqli_query($conn,$query);
						while($row = mysqli_fetch_assoc($result)){
							echo '<div class="card mb-3">
							<div class="card-body">
									<div class="row">
										<div class="col-12 mb-3">
										<p>
											Order ID - <b>'.$row['order_id'].'</b>
											<span style="float: right">Date - <b>'.$row['date'].'</b></span>
										</p><hr>
									</div>';
									$curr_order_id = $row['order_id'];
									$query2 = "SELECT * FROM order_details od JOIN products p ON od.product_id = p.product_id WHERE od.order_id = '$curr_order_id'";

									$result2 = mysqli_query($conn,$query2);
									while($row2 = mysqli_fetch_assoc($result2)){
										$str = explode(",", $row2['bg'])[0];
										$str = substr($str, 2,strlen($str)-3);
										echo '<div class="col-3 mb-3">
										<img src="'.$str.'" style="width: 100%;height: 50px">
									</div>
									<div class="col-9"><h5><a href="details.php?id='.$row2['product_id'].'">'.$row2['name'].'</a><br><span class="lead" style="font-size: 16px">Rs '.$row2['price'].'</span></h5>
									</div>';
									}
									
									echo '
									<div class="col-12">
										<p>Amount Paid - <b>Rs '.$row['amount'].'</b></p>
									</div>
									</div>
				</div>
				</div>';
						}
						?>
						
					
			
		</div>
	</div>
</div>