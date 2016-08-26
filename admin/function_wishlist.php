<?php
include './db/connection.php';


// function to get user ip
	/*function getIp(){

		$ip = $_SERVER['REMOTE_ADDR'];

		if (!empty($_SERVER['HTTP_CLIENT_IP'])){

			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}

		return $ip;
	}*/

	//function to get user email
	function getEmail(){
		global $con;

		$sql = "SELECT * FROM customers";

		$run_sql = mysqli_query($con, $sql);

		while($row = mysqli_fetch_array($run_sql)){;

		$customer_email = $row['customer_email'];
		$id = $row['customer_id'];
		$customer_email = $_SESSION['customer_email'];
		$_SESSION['customer_id']= $id;

		return $customer_email;

	}
	}

//function to add product to wishlist
	function wishList(){

		if(isset($_GET['add_wishlist'])){

		if(isset($_SESSION['customer_email'])){
		  		global $con;


				$email = $_SESSION['customer_email'];

				$pro_id = $_GET['add_wishlist'];

				$check_pro = "SELECT * FROM wishlist WHERE customer_email = '$email' AND product_id = '$pro_id'";
				
				$run_check = mysqli_query($con, $check_pro);

				if(mysqli_num_rows($run_check) > 0){
					echo "<script>alert('This product has already been added to your wishlist')</script>";
					echo "<script>window.open('index.php','_self')</script>";
				}
				else
				{
					$insert_product = "insert into wishlist (product_id, customer_email) values ('$pro_id', '$email')";
					
					$run_pro = mysqli_query($con, $insert_product);

					echo "<script>window.open('index.php','_self')</script>";  
				}
		  	}
		  else{

			  	
				echo "<script>window.open('login.php?not_login=You have to login', '_self')</script>";

		 	}

			

		}
	}

//function to count number of items in wishlist

	function totalItems(){

		if(isset($GET['add_wishlist'])){

			global $con;

			//$email = getEmail();

			$get_items = "select * from wishList where customer_email='$email'";

			$run_items = mysqli_query($con, $get_items);

			$count_items = mysqli_num_rows($run_items);

		}
		else
		{

			global $con;

			//$email = getEmail();
			$email = $_SESSION['customer_email'];

			$get_items = "select * from wishList where customer_email = '$email'";

			$run_items = mysqli_query($con, $get_items);

			$count_items = mysqli_num_rows($run_items);
		}


		echo $count_items;
	}

//getting total price of items in wishlist

	function totalPrice(){

		$total=0;

		global $con;

		//$email = getEmail();
		$email = $_SESSION['customer_email'];

		$select_price = "select * from wishlist where customer_email = '$email'";

		$run_price = mysqli_query($con, $select_price);

		while($p_price=mysqli_fetch_array($run_price)){

			$pro_id = $p_price['product_id'];

			$pro_price = "select * from products where product_id='$pro_id'";

			$run_pro_price = mysqli_query($con, $pro_price);

			while($pp_price=mysqli_fetch_array($run_pro_price)){

				$product_price=array($pp_price['product_price']);

				$values = array_sum($product_price);

				$total +=$values;

			}
		}

		echo $total;
	}

		
?>
























