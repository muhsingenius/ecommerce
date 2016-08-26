
<!DOCTYPE HTML>

<?php

session_start();

if(!isset($_SESSION['customer_email'])){

		echo "<script>window.open('login.php?not_login=You have to login', '_self')</script>";
	}
	else{

include 'functions/getCats.php';
include 'admin/getPro.php';
include 'admin/display_cats.php';
include 'admin/function_wishlist.php';
?>
<html>
	<head>
		<title>This is test</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
	</head>
	<body class="container">
		

		<!--<div class="row top">
			<div class="col-sm-3">
				<div class="top-left"></div>
			</div>
			<div class="col-sm-6">
				<div class="logo"><img src="git.png"></div>
			</div>
			<div class="col-sm-3">
				<div class="top-right"></div>
			</div>
		</div>-->
		<div class="header"><img src="headimg.png"></div>	
		<nav class="navbar navbar-default"><!--nav starts  here-->

			<div class="navbar-header">
	     		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				    <span class="sr-only">Toggle navigation</span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				</button>
      			
   			</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			    <ul class="nav navbar-nav">
			        <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
			        <li><a href="all_products.php">All Products</a></li>
			        <li><a href="#">About</a></li>
			        <li><a href="#">Contact</a></li>
			        <li><a href="#">FAQ</a></li>
			    </ul>
		 	     
			    <ul class="nav navbar-nav navbar-right">
			    	<?php
			    	if(!isset($_SESSION['customer_email'])){
			    		echo "<li><a href='login.php'>Login</a></li>";
			    		echo "<li><a href='admin/register.php'>Register</a></li>";
			    	}
			    	else{
			    		
			    		echo "<li><a href='account.php'>Account</a></li>";
			    		echo "<li><a href='logout.php'>logout</a></li>";

			    	}
			        
			        ?>
					
			    </ul>
			</div><!-- /.navbar-collapse -->							
		</nav><!--nav ends here-->

		<div class="panel panel-default">
  			<div class="panel-body">
  				<div class="row">
  					<div class="col-sm-9">
  						<?php
		  					if( isset($_SESSION['customer_email'])){
		  						echo "<b>Welcome: </b>" . $_SESSION['customer_email'];
		  					}else{
		  							echo "<p>Welcome Guest</p>";
			  					}
  						?>
  					</div>
  					<div class="col-sm-3">
  						<a href="wishlist.php"><button class="btn btn-primary" type="button">
 						 Wishlist <span class="badge">Items 
 						 <?php 
 						 if(isset($_SESSION['customer_email'])){
 						 	totalItems();
 						 }else
 						 {
 						 	echo "0";
 						 }

 						  ?> (GHC <?php 
 						  	if(isset($_SESSION['customer_email'])){
 						  	totalPrice();	
 						  	}
 						  	else{
 						  		echo "0";
 						  	}
 						   ?>.00)</span></button></a>
  					</div>  					 
  					


  				</div>
  				


  			</div>

		</div>

		<!--content area-->
		<div class="well">
			
			<div class="row">
				<div class="col-sm-3">
					<div class="well category_box">
						<h1 style="font-size:30px; text-align:center;padding-bottom:10px; margin-bottom:10px; border-bottom:2px solid blue">Categories</h1>
							
						<ul class="nav nav-pills nav-stacked">
							<?php getCats(); ?>
							<!--<form method="post" action="results.php" enctype="multipart/form-data">
								
							    <div class="input-group">
							      <input type="text" class="form-control" id="exampleInputAmount" name= "user_query" placeholder="Search">
							      <input class="btn btn-info" type="submit" name="search" value="Search">
							     						  
							    </div>-->
							</form>

						</ul>

					</div>
				</div>
				

				<!--content area starts here-->
				<div class="col-sm-9">
					<form action="" method="post" enctype="multipart/form-data">

						<table class="table">
							<tr>
								<td>Romove</td>
								<td>Products</td>
								<td class="danger">Price</td>
							</tr>

							<?php
							

									$total=0;

									global $con;

									$email = getEmail();

									$select_price = "select * from wishlist where customer_email = '$email'";

									$run_price = mysqli_query($con, $select_price);

									while($p_price=mysqli_fetch_array($run_price)){

										$pro_id = $p_price['product_id'];

										$pro_price = "select * from products where product_id='$pro_id'";

										$run_pro_price = mysqli_query($con, $pro_price);

										while($pp_price=mysqli_fetch_array($run_pro_price)){

											$product_price=array($pp_price['product_price']);

											$product_title=$pp_price['product_title'];
 
											$product_image=$pp_price['product_image'];

											$single_product=$pp_price['product_price'];	

											$values= array_sum($product_price);

											$total += $values;				

							?>

							<tr>
								<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
								<td><?php echo $product_title; ?><br>
								<img src="admin/product_images/<?php echo $product_image; ?>" width="60px" height="60px"></td>
								<!--<td><input type="text" size="4" name="quantity" value="<?php //echo $_SESSION['quantity']; ?>"></td>-->
								<?php  
									/*if(isset($_POST['update_wishlist'])) {

										$quantity=$_POST('quantity');

										$update_quantity="update into wishlist set quantity='$quantity'";
										$run_quantity=mysqli_query($con, $update_quantity);

										$_SESSION['quantity'] = $quantity;

										$total=$total*$quantity;

									}*/
								?>
								<td class="danger"><?php echo "GHC " . $single_product; ?></td>
							</tr>
							

							<?php  	}}  ?>

								<tr>
									<td>   </td>
									
								<td><b></b></td>
								
								
								

								 <td class="danger"><b> <?php echo "GHC " . $total; ?></b> </td>
							</tr>

							<tr>
								<td><input class="btn btn-primary" type="submit" name="update_wishlist" value="Update Wishliset"></td>
								<td><input class="btn btn-primary" type="submit" name="continue" value="Continue Shopping"></td>

							</tr>
						</table>


					</form>
					<?php

					//$ip=getIp();

					$email = $_SESSION['customer_email'];

					if(isset($_POST['update_wishlist'])){

						foreach ($_POST['remove'] as $remove_id) {
							
						$delete_product="delete from wishlist where product_id='$remove_id' AND customer_email='$email'";

						$run_delete = mysqli_query($con, $delete_product);

						if($run_delete){
							echo "<script>window.open('wishlist.php', '_self')</script>";
						}

						}
					}

					if(isset($_POST['continue'])){
						echo "<script>window.open('index.php', '_self')</script>";
					}

				

			


					?>
				</div><!--content area ends here-->
			</div>
			
		</div>

		<footer class="navbar navbar-default">
			<p>this is the footer</p>
		</footer>
		

			


			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.js"></script>
	

		

	</body>
</html>
<?php  } ?>