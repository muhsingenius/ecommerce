<?php
	session_start();

	if(!isset($_SESSION['email'])){

		echo "<script>window.open('admin_login.php?not_admin=You have to login', '_self')</script>";
	}
	else{


?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>This is test</title>
		<!--<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">-->
		<link rel="stylesheet" type="text/css" href="../css/custom.css">
	</head>
	<body class="adminbody">

		<nav class="mynav">
			
	  			<a href="index.php"><b>MYSHOP</b></a><span>Content Administration</span> 

			
  			
		</nav>
		
			<div class="content">
				<div class="left">
						<div class="left-heading"><h2>Manage Content</h2></div>
					
						<ul>
			  				<li><a href="index.php?add_cats">Add Products Category</a></li>
			  				<li><a href="index.php?view_cats">View Products Category</a></li>
			  				<li><a href="index.php?add_product">Add New Products</a></li>
			  				<li><a href="index.php?view_products">View All Products</a></li>
			  				<li><a href="index.php?view_customers">View Customers</a></li>
			  				<li><a href="admin_logout.php">Log Out</a></li>
		  				
		  				</ul>

					<ul>
			  				<li><a href="index.php">Reload</a></li>
			  				
		  				
		  				</ul>	  				
  				</div>
			

				<div class="right">
					<?php
						if(isset($_GET['add_product'])){
							include 'insert_product.php';
						}

						if(isset($_GET['view_products'])){
							include 'view_products.php';
						}

						if(isset($_GET['edit_pro'])){
							include 'edit_pro.php';
						}
						if(isset($_GET['add_cats'])){
							include 'insert_cat.php';
						}

						if(isset($_GET['view_cats'])){
							include 'view_cats.php';
						}

						if(isset($_GET['edit_cat'])){
							include 'edit_cat.php';
						}

						if(isset($_GET['view_customers'])){
							include 'view_customers.php';
						}
					?>

				</div>
			</div>
	

		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>

	</body>


</html>

<?php


}

?>