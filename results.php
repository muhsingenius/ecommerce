<!DOCTYPE HTML>
<?php
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
			        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
			        <li><a href="all_products.php">All Products</a></li>
			        <li><a href="#">About</a></li>
			        <li><a href="#">Contact</a></li>
			        <li><a href="#">FAQ</a></li>
			    </ul>
		 	     
			    <ul class="nav navbar-nav navbar-right">
			        <li><a href="#">Login</a></li>
					<li><a href="#">Register</a></li>
			    </ul>
			</div><!-- /.navbar-collapse -->							
		</nav><!--nav ends here-->

		<div class="panel panel-default">
  			<div class="panel-body">
  				<div class="row">

  					<p>Welcome Guest</p>
  					
  					<button class="btn btn-primary" type="button">
 						 Wishlist <span class="badge">(<?php totalItems(); ?>)- GHC()</span></button>

  				</div>
  				


  			</div>
		</div>

		<!--content area-->
		<div class="well">
			
			<div class="row">
				<div class="col-sm-3">
					<div class="well category_box">
						<h1>Categories</h1>
							
						<ul class="nav nav-pills nav-stacked">
							<?php getCats(); ?>
							<form method="get" action="results.php" enctype="multipart/form-data">
								
							    <div class="input-group">
							      <input type="text" class="form-control" id="exampleInputAmount" name="user_query" placeholder="Search">
							      	<input class="btn btn-info" type="submit" name="search" value="Search">
							      						  
							    </div>
							</form>

						</ul>

					</div>
				</div>
				

				<!--content area starts here-->
				<div class="col-sm-9">
					<?php searchResults(); ?>
					<?php getProCat(); ?>
					<?php wishList(); ?>
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