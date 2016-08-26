<?php 

include './db/connection.php';

function getPro(){

	if(!isset($_GET['category'])){


	global $con;

	$get_pro = "select * from products order by RAND() LIMIT 0,6";

	$run_pro = mysqli_query($con, $get_pro);

	while ($row_pro = mysqli_fetch_array($run_pro)) {
		
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_desc = $row_pro['product_desc'];
		$pro_category = $row_pro['product_category'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		 
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
							 		<a href='index.php?add_wishlist=$pro_id'><button class='btn btn-success'>Add to Wishlist</button></a>
							 	</div>
						 	</div>
					 	<hr>
					 	
					 	
					 </div>

			 </div>
		 </div> ";
	}

}
}

function getAllProducts(){

	if(!isset($_GET['category'])){


	global $con;

	$get_pro = "select * from products order by RAND()";

	$run_pro = mysqli_query($con, $get_pro);

	while ($row_pro = mysqli_fetch_array($run_pro)) {
		
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_desc = $row_pro['product_desc'];
		$pro_category = $row_pro['product_category'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		 
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
							 		<a href='index.php?add_wishlist=$pro_id'><button class='btn btn-success'>Add to Wishlist</button></a>
							 	</div>
						 	</div>
					 	<hr>
					 	
					 	
					 </div>

			 </div>
		 </div> ";
	}

}
}

//search function
/*function searchResults(){

	if(!isset($_GET['search'])){

	$search_query= $_GET['user_query'];

	global $con;

	$get_pro = "select * from products where product_keyords like '%$search_query%'";

	$run_pro = mysqli_query($con, $get_pro);

	while ($row_pro = mysqli_fetch_array($run_pro)) {
		
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_desc = $row_pro['product_desc'];
		$pro_category = $row_pro['product_category'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		 
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
							 		<a href='index.php?add_wishlist=$pro_id'><button class='btn btn-success'>Add to Wishlist</button></a>
							 	</div>
						 	</div>
					 	<hr>
					 	
					 	
					 </div>

			 </div>
		 </div> ";
	}

}
}*/
?>