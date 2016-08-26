<!DOCTYPE HTML>
<?php
session_start();
include 'functions/getCats.php';
include 'admin/getPro.php';
include 'admin/display_cats.php';
include 'admin/function_wishlist.php';


// this made sure that call  $_SESSION['customer_email']; is not regarded as 'undefine index';
		$_SESSION['customer_email'] = getemail(); 

		$email = $_SESSION['customer_email'];

		$get_img = "SELECT * FROM customers WHERE customer_email = '$email'";
		$run_img = mysqli_query($con, $get_img);
		$row_img = mysqli_fetch_array($run_img);

		$customer_name = $row_img['customer_name'];
		$customer_image = $row_img['customer_image'];
		$customer_email = $row_img['customer_email'];
		$customer_phone = $row_img['customer_phone'];

		?>
<html>
	<head>
		<title>This is test</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
	</head>
	<body class="container">
		

		<div class="row top">
			<div class="col-sm-3">
				<div class="top-left"></div>
			</div>
			<div class="col-sm-6">
				<div class="logo"><img src="git.png"></div>
			</div>
			<div class="col-sm-3">
				<div class="top-right"></div>
			</div>
		</div>
			
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

			    		echo "<li class='active'><a href='account.php'>Account</a></li>";
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
 						 Wishlist <span class="badge">Items: 
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
						<h1 style="font-size:30px; text-align:center;padding-bottom:10px; margin-bottom:10px; border-bottom:2px solid blue">My Account</h1>

							
						<ul class="nav nav-pills nav-stacked">


			       			 <li><a href="account.php?edit_info">Edit Information</a></li>
			       			 <li><a href="account.php?change_pass">Change Password</a></li>
			       			 <li><a href="account.php?delete_account">Delete My Account</a></li>
			       			 <hr>


						</ul>

					</div>
				</div>
				 

				<!--content area starts here-->
				<div class="col-sm-9">
					<div class="well account_info">

						<?php 
							if(!isset($_GET['edit_info'])){
								if(!isset($_GET['change_pass'])){
									if(!isset($_GET['delete_account'])){

										echo "<div style='float:left'><h2>User Account Information</h2><hr>
											<h3 style='margin-top:10px'><b>Name:</b> $customer_name</h3>
											<h3 style='margin-top:10px'><b>Email:</b> $customer_email</h3>
											<h3 style='margin-top:10px'><b>Contact:</b> $customer_phone</h3></div>
											<img src='customer_images/$customer_image' width='60px' height='70px' style='margin-top:70px; margin-left:20px'>";

									}
								}
							}
						?>

						


						<?php
							if(isset($_GET['edit_info'])){

								include 'edit_info.php';
							}

							if(isset($_GET['change_pass'])){
								include 'change_pass.php';
							}

							if(isset($_GET['delete_account'])){
								include 'delete_account.php';
							}

						?>
					</div>
					<!--<?php searchResults(); ?>-->
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