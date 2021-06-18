<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","amazon");

	if(!empty($_SESSION)){
		$is_logged_in = 1;
	}else{
		$is_logged_in = 0;
	}

	$product_id = $_GET['id'];

	//fetch details of the product
	$query = "SELECT * FROM products WHERE product_id = $product_id";
	$result = mysqli_query($conn,$query);
	$result = mysqli_fetch_assoc($result);
	//print_r($result);

	$img_path = explode(",", $result['bg'])[0];
	$img_path = substr($img_path, 2,strlen($img_path)-3);

	$user_id = $_SESSION['user_id'];
	// run a query
	$query2 = "SELECT * FROM wishlist WHERE user_id = $user_id AND product_id = $product_id";
	$result2 = mysqli_query($conn,$query2);
	$num_rows = mysqli_num_rows($result2);

	$query3 = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id";
	$result3 = mysqli_query($conn,$query3);
	$num_rows2 = mysqli_num_rows($result3);
?>
<?php include("includes/header.php"); ?>

	<div class="container mt-5">
		<div class="row">
			<div class="col-6">
				<img src="<?php echo $img_path; ?>" style="width: 100%;height: 400px">
			</div>
			<div class="col-6">
				<h1><?php echo $result['name']; ?></h1>
				<h4>Rs <?php echo $result['price']; ?></h4>
				<p><?php echo $result['details']; ?></p>
				<?php
				if($num_rows2){
					echo '<button class="btn btn-lg" style="background-color:red">Added to Cart</button>';
				}else{
					echo '<button id="cart-btn" class="btn btn-lg btn-primary">Add to Cart</button>';
				}

				if($num_rows){
					echo '<button class="btn btn-lg btn-dark" style="background-color:blue">Wishlisted</button>';
				}else{
					echo '<button id="wishlist-btn" class="btn btn-lg btn-dark">Wishlist</button>';
				}
				?>
				
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#wishlist-btn').click(function(){
			if($('#wishlist-btn').text() === 'Wishlist'){
				$.ajax({
					url: 'add_wishlist.php?product_id=' + <?php echo $product_id; ?>,
					method: 'GET',
					success: function(data){
						$('#wishlist-btn').text('Wishlisted');
						$('#wishlist-btn').css('background-color','blue');
						console.log(data);
					},
					error: function(error){
						console.log(error);
					}
				})
			}
			
		})

		$('#cart-btn').click(function(){
			// ajax -> to insert into cart table
			$.ajax({
				url: 'add_to_cart.php?product_id=' + <?php echo $product_id; ?>,
				method: 'GET',
				success: function(data){
					$('#cart-btn').text('Added to Cart');
					$('#cart-btn').css('background-color','red');
				},
				error: function(error){
					console.log(error)
				}
			})
		})
	})
</script>
</body>