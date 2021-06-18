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
			<h3 class="mt-5 mb-5">Your Addresses</h3>
			<form action="select_payment_mode.php" method="POST">
			<?php
			include "includes/dbhelper.php";
			$user_id = $_SESSION['user_id'];
			$query = "SELECT * FROM address WHERE user_id = $user_id";
			$result = mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				echo '<input type="radio" name="x" class="mr-3" value="'.$row['address_id'].'"><span>
							'.$row['street_address'].' 
							'.$row['landmark'].'<br>
							'.$row['city'].', '.$row['state'].' 
							'.$row['pin'].'<br>
							'.$row['contact_number'].'</span><br><br>
						';
			}
			?>
			<input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>">
			<input type="submit" value="Select Address" name="" style="float: right" class="btn btn-primary btn-lg">
			</form>
			<hr>

		</div>
		<div class="col-6">
			<button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-lg mt-5">Add new Address</button>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add_address.php" method="POST">
        	<label>Street Address</label><br>
        	<textarea name="street_address" class="form-control"></textarea><br>
        	<label>Landmark</label><br>
        	<textarea name="landmark" class="form-control"></textarea><br>
        	<label>City</label><Br>
        	<input class="form-control" type="text" name="city"><br>
        	<label>State</label><br>
        	<input class="form-control" type="text" name="state"><br>
        	<label>Pincode</label><br>
        	<input class="form-control" type="text" name="pin"><br>
        	<label>Contact Number</label><br>
        	<input class="form-control" type="text" name="contact"><br><br>
        	<input type="submit" value="Add Address" class="btn btn-primary" name="">
        </form>
      </div>
    </div>
  </div>
</div>
</div>

</body>
</html>