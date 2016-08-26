<?php 

include './db/connection.php';

	function getDetails(){
		global $con;

		if(isset($_GET['pro_id'])){

						$product_id = $_GET['pro_id'];
							$get_pro = "select * from products WHERE product_id = '$product_id'";

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
										 		<p>$pro_desc</p>
											 	
												 	<div class='row' style='margin-top:15px;'>
												 		
													 	<div class='col-xs-6'> 
													 		<a href='index.php'><button class='btn btn-primary'>Go Back</button></a>
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