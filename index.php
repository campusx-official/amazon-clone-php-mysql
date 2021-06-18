<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","amazon");

	if(!empty($_SESSION)){
		$is_logged_in = 1;
	}else{
		$is_logged_in = 0;
	}
?>
<?php include("includes/header.php"); ?>

	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="z-index: 0 !important">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img class="d-block w-100" src="https://images-eu.ssl-images-amazon.com/images/G/31/img21/Fashion/Gateway/Flip/Essentials_Experience_May21/Revised_EE_Graphics/GW_PC_BUNK_1500x600._CB668893605_.jpg" alt="First slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="https://images-eu.ssl-images-amazon.com/images/G/31/AmazonVideo/2021/X-site/SingleTitle/Supergirl/1500x600_Hero-Tall_JPN._CB667341638_.jpg" alt="Second slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="https://images-eu.ssl-images-amazon.com/images/G/31/img19/AmazonPay/Avatar/HeroPC_1500x600_SVA._CB667240774_.jpg" alt="Third slide">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>

	<div class="container">
		<h1 class="mt-5">Sports and Fitness</h1>
		<div class="row mt-2 mb-5">
		<?php
		$query = "SELECT * FROM products WHERE category LIKE '%Sports & Fitness%'";
		$result = mysqli_query($conn,$query);
		while($row = mysqli_fetch_assoc($result)){
			$str = explode(",", $row['bg'])[0];
			$str = substr($str, 2,strlen($str)-3);
			echo '<div class="col-3">
					<div class="card">
						<div class="card-body">
							<img src="'.$str.'" class="card-img-top" style="height:200px">
							<a href="details.php?id='.$row['product_id'].'"><h5 class="card-title">'.$row['name'].'</h5></a>
							<p class="card-text">Rs '.$row['price'].'</p>
						</div>
					</div>
				</div>';
			

		}
		?>	
		</div>
	</div>

	<div class="container">
		<h1 class="mt-5">Clothing</h1>
		<div class="row mt-2 mb-5">
		<?php
		$query = "SELECT * FROM products WHERE category LIKE '%Clothing%'";
		$result = mysqli_query($conn,$query);
		$counter = 0;
		while($row = mysqli_fetch_assoc($result)){
			
			if($counter < 4)
			{
				$str = explode(",", $row['bg'])[0];
				$str = substr($str, 2,strlen($str)-3);
				echo '<div class="col-3">
						<div class="card">
							<div class="card-body">
								<img src="'.$str.'" class="card-img-top" style="height:200px">
								<a href="details.php?id='.$row['product_id'].'"><h5 class="card-title">'.$row['name'].'</h5></a>
								<p class="card-text">Rs '.$row['price'].'</p>
							</div>
						</div>
					</div>';
				$counter++;
			}

			
			

		}
		?>	
		</div>
	</div>

	<div class="container">
		<h1 class="mt-5">Footwear</h1>
		<div class="row mt-2 mb-5">
		<?php
		$query = "SELECT * FROM products WHERE category LIKE '%Footwear%'";
		$result = mysqli_query($conn,$query);
		$counter = 0;
		while($row = mysqli_fetch_assoc($result)){
			
			if($counter < 4)
			{
				$str = explode(",", $row['bg'])[0];
				$str = substr($str, 2,strlen($str)-3);
				echo '<div class="col-3">
						<div class="card">
							<div class="card-body">
								<img src="'.$str.'" class="card-img-top" style="height:200px">
								<a href="details.php?id='.$row['product_id'].'"><h5 class="card-title">'.$row['name'].'</h5></a>
								<p class="card-text">Rs '.$row['price'].'</p>
							</div>
						</div>
					</div>';
				$counter++;
			}

			
			

		}
		?>	
		</div>
	</div>

</body>
</html>