<!DOCTYPE HTML>
<?php
include '../db/connection.php';

if(isset($_GET['edit_pro'])){

	$get_id = $_GET['edit_pro'];

	$get_pro = "SELECT * FROM products where product_id='$get_id'";

		$run_get = mysqli_query($con, $get_pro);


		$row_pro = mysqli_fetch_array($run_get);

			$pro_id = $row_pro['product_id'];
			$pro_title = $row_pro['product_title'];
			$pro_img = $row_pro['product_image'];
			$pro_price = $row_pro['product_price'];
			$product_desc = $row_pro['product_desc'];
			$product_keywords = $row_pro['product_keywords'];
			$pro_cat = $row_pro['product_category'];

			$get_cat = "select * from categories where category_id='$pro_cat'";
			$run_cat = mysqli_query($con, $get_cat);

			$row_cat = mysqli_fetch_array($run_cat);

			$category_title = $row_cat['category_title'];




	}
		

?>
<html>
	<head>
		<title>Test Site</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="../css/custom.css">

	</head>
<body>

		<div class="insert_form">
			<h2>Edit Product</h2>
			<hr>
			<p>
			<form class="form-horizontal" name="frm" action="" method = "post" enctype ="multipart/form-data">
				
				<div class="form-group">
				    <label for="title">Product Title</label>
				    <input type="text" name="product_title" class="form-control" id="title" value="<?php Echo $pro_title; ?>"> 
			  	</div>
			  	<div class="form-group">
				    <label for="category">Product Category</label>
				    <select type="text" name="product_category" class="form-control" id="category" > 
				    	<option><?php Echo $category_title; ?></option>
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
				    <input type="text" name="product_price" class="form-control" id="price" value="<?php Echo $pro_price; ?>" >
			  	</div>
			  	<div class="form-group">
				    <label for="desc">Product Description</label>
				    <textarea type="text" class="form-control" id="desc" name="product_desc"><?php echo $product_desc; ?></textarea>
			  	</div>

			  	<div class="form-group">
				    <label for="image">Image</label>
				    <img src="product_images/<?php echo $pro_img; ?>" width="60px;">
				    <input type="file" name="product_image" class="form-control" id="image" value="<?php echo $pro_img; ?>"> 

			  	</div>
			  
			  	<div class="form-group">
				    <label for="keywords">KeyWords</label>
				    <input type="text" name="product_keywords" class="form-control" id="keywords" value="<?php echo $product_keywords; ?>" > 
			  	</div>
			  	<div class="form-group">
			  		

				    <button class="btn btn-success" type="submit" name="update_pro">Update</button>
			  	</div>
			</form>
				    

		</p>
		</div>


		
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.js"></script>
</body>
</html>

<?php
include '../db/connection.php';

if(isset($_POST['update_pro'])){
		

		$get_pro = "SELECT * FROM products where product_id='$get_id'";

		$run_get = mysqli_query($con, $get_pro);


		$row_pro = mysqli_fetch_array($run_get);

			$pro_id = $row_pro['product_id'];

		$update_id = $pro_id;
		$product_title = $_POST['product_title'];
		$product_category = $_POST['product_category'];
		$product_price = $_POST['product_price'];
		// $product_description = $_POST['product_description'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];

		//getting the image from the input field
		$product_image = $_FILES['product_image'] ['name'];
		$product_image_tmp = $_FILES['product_image'] ['tmp_name'];


		
		move_uploaded_file($product_image_tmp, "product_images/$product_image");
		
		$update_product = "UPDATE products SET product_category='$product_category', product_title='$product_title',
		 product_price='$product_price', product_image='$product_image', 
		product_desc='$product_desc', product_keywords='$product_keywords' WHERE product_id='$update_id'";

			
			$run_update_product = mysqli_query($con, $update_product);

			if($run_update_product){
				echo "<script>alert('The product was updated successfully')</script>";
				echo "<script>window.open('index.php?view_products', '_self')</script>";
			}


	}

?>