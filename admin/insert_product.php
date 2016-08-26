<!DOCTYPE HTML>
<?php
//include '../db/connection.php';


	if(!isset($_SESSION['email'])){

		echo "<script>window.open('admin_login.php?not_admin=You have to login', '_self')</script>";
	}
	else{


?>
<html>
	<head>
		<title>Register Customer</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="../css/custom.css">

	</head>
<body>

		<div class="insert_form">
			<h2>Insert Product</h2>
			<hr>
			<p>
			<form class="form-horizontal" name="frm" action="function_insert_product.php" method = "post" enctype ="multipart/form-data" onSubmit="validatePassword();">
				
				<div class="form-group">
				    <label for="title">Product Title</label>
				    <input type="text" name="product_title" class="form-control" id="title" required> 
			  	</div>
			  	<div class="form-group">
				    <label for="category">Product Category</label>
				    <select type="text" name="product_category" class="form-control" id="category" required> 
				    	<option>Select Category</option>
				    	<?php 
				    	include '../db/connection.php';

				    		$query="SELECT * FROM categories";
				    		$run_query=mysqli_query($con, $query);

				    		
				    		while ($row=mysqli_fetch_array($run_query)){
				    			$pro_id=$row['category_id'];
				    			$cat=$row['category_title'];

				    			echo "<option value='$pro_id'> $cat </option>";
				    		}
				    		




				    	?>

				    </select>
			  	</div>
			  	<div class="form-group">
				    <label for="price">Price</label>
				    <input type="text" name="product_price" class="form-control" id="price" required>
			  	</div>
			  	<div class="form-group">
				    <label for="desc">Product Description</label>
				    <textarea type="text" class="form-control" id="desc" name="product_desc" required></textarea>
			  	</div>

			  	<div class="form-group">
				    <label for="image">Image</label>
				    <input type="file" name="product_image" class="form-control" id="image" > 
			  	</div>
			  
			  	<div class="form-group">
				    <label for="keywords">KeyWords</label>
				    <input type="text" name="product_keywords" class="form-control" id="keywords" > 
			  	</div>
			  	<div class="form-group">
			  		

				    <button class="btn btn-success" type="submit" name="insert_post" onclick="; ">Add</button>
			  	</div>
			</form>
				    

		</p>
		</div>


		
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.js"></script>
</body>
</html>

<?php  }  ?>