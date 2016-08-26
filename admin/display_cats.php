<?php 


include './db/connection.php';

function getProCat(){

	if(isset($_GET['category'])){
		$cat_id = $_GET['category'];

	global $con;

	$get_cat_pro = "select * from products WHERE product_category = '$cat_id'";

	$run_cat_pro = mysqli_query($con, $get_cat_pro);
	$count_cats = mysqli_num_rows($run_cat_pro);

if($count_cats==0){

		echo "<h2 class='well'>Sorry! No products are found in this category...</h2>";

	}
	

	while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
		
		$pro_id = $row_cat_pro['product_id'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_desc = $row_cat_pro['product_desc'];
		$pro_category = $row_cat_pro['product_category'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_image = $row_cat_pro['product_image'];

		


		 
		 echo "
		 <div class='well single_box'>
			 <div class='row'>
			 	<div class='col-sm-5'>	
			 			
					 	<div class='thumbnail'>

					 		<img src='admin/product_images/$pro_image'>

					 		<div class-'thumbnail-footer'>

					 		
					 		</div>
					 	</div>
					 	
				 </div>

				 <div class='col-sm-7' style='margin-top:50px;'>
				 <h3 style='float:left; margin-right:15px;'>$pro_title</h3>
					 	<h3>GHC $pro_price</h3>

				 		<hr>
					 	
						 	<div class='row' style='margin-top:15px;'>
						 		
							 	<div class='col-xs-6'> 
							 		<a href='details.php?pro_id=$pro_id'><button class='btn btn-primary'>Details</button></a>
							 	</div>
							 	<div class='col-xs-6'> 
							 		<a href='index.php?pro_id=$pro_id'><button class='btn btn-success'>Add to Wishlist</button></a>
							 	</div>
						 	</div>
					 	<hr>
					 	
					 	
					 </div>

			 </div>
		 </div> ";
		
	}

}
}


?>