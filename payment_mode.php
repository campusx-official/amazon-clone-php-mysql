<?php
session_start();

if(empty($_SESSION)){
	header('Location:login_form.php');
}else{
	$is_logged_in = 1;
}
?>

<?php include("includes/header.php"); ?>

<div class="container mt-5">
	<h1>Select Payment Mode</h1>
	<div class="row mt-5">
		<div class="col-6">
			<form action="payment_confirmation.php" method="POST">
				<input type="radio" name="x" value="Credit Card">Credit Card<br><br><hr>
				<input type="radio" name="x" value="Debit Card">Debit Card<br><br><hr>
				<input type="radio" name="x" value="UPI">UPI<br><br><hr>
				<input type="radio" name="x" value="NETBanking">NETBanking<br><br><hr>
				<input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>">
				<input type="submit" class="btn btn-primary btn-lg" style="float: right" name="" value="Pay Now">
			</form>
		</div>
	</div>
</div>