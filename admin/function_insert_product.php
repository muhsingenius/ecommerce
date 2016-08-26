<?php

	
	include '../db/connection.php';

	if(isset($_POST['insert_post'])){
		//get the data from form and set them to local variables.
		$product_title = $_POST['product_title'];
		$product_category = $_POST['product_category'];
		$product_price = $_POST['product_price'];
		// $product_description = $_POST['product_description'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];

		//getting the image from the input field
		$product_image = $_FILES['product_image'] ['name'];
		$product_image_tmp = $_FILES['product_image'] ['tmp_name'];

		//upload images to  a folder
		move_uploaded_file($product_image_tmp, "product_images/$product_image");
		//insert query
		$insert_product = "insert into products
		(product_title, product_category, product_price, product_desc, product_image, product_keywords) 
			values ('$product_title', '$product_category', '$product_price', '$product_desc', 
				'$product_image', '$product_keywords')";
			
			$Insert_pro = mysqli_query($con, $insert_product);

			if($Insert_pro){
				echo "<script>alert('The product was inserted successfully')</script>";
				echo "<script>window.open('index.php?add_product', '_self')</script>";
			}


	}



?>