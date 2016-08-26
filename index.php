<!DOCTYPE HTML>
<?php
session_start();
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
	     		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNav" aria-expanded="false">
				    <span class="sr-only">Toggle navigation</span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				</button>
      			
   			</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="myNav">
			    <ul class="nav navbar-nav">
			        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
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
						<h1 style="font-size:30px; text-align:center;padding-bottom:10px; margin-bottom:10px; border-bottom:2px solid blue">Categories</h1>
							
						<ul class="nav nav-pills nav-stacked">
							<?php getCats(); ?>
							<!--<form method="post" action="results.php" enctype="multipart/form-data">
								
							    <div class="input-group">
							      <input type="text" class="form-control" id="exampleInputAmount" name= "user_query" placeholder="Search">
							      <input class="btn btn-info" type="submit" name="search" value="Search">
							     						  
							    </div>
							</form>-->

						</ul>

					</div>
				</div>
				

				<!--content area starts here-->
				<div class="col-sm-9">
					<?php  getPro(); ?>
					<?php getProCat(); ?>

					<?php wishList(); ?>
					<!--<?php searchResults(); ?>-->
				</div><!--content area ends here-->
			</div>
			
		</div>

		<footer class="navbar navbar-default">
			<p>this is the footer</p>
			<p>this is the footer</p>
			
		</footer>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>

	</body>
</html>