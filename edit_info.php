
<!DOCTYPE HTML>
<?php
include 'db/connection.php';

		$user = $_SESSION['customer_email'];

		$get_customer = "SELECT * FROM customers WHERE customer_email = '$user'";

		$run_customer = mysqli_query($con, $get_customer);
		$row_customer = mysqli_fetch_array($run_customer);

		$customer_id = $row_customer['customer_id'];
		$customer_name = $row_customer['customer_name'];
		$customer_email = $row_customer['customer_email'];
		$customer_phone = $row_customer['customer_phone'];
		$customer_city = $row_customer['customer_city'];
		$customer_address = $row_customer['customer_address'];
		$customer_image = $row_customer['customer_image'];

		echo "<img src='customers_images/$customer_image'";

		
		

?>
<html>
	<head>
		<title>Test Site</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
	</head>
<body class="container">

		<div class="jumbotron">
			<h2>Edit Your Accounts Information</h2>
			<hr>
			<p>
			<form class="form-horizontal" action="edit_info.php?customer_id=<?php echo $customer_id ?>" method = "post" enctype ="multipart/form-data">
				
				<div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" name="customer_name" class="form-control" id="name" value=<?php echo $customer_name; ?> > 
			  	</div>
			  	<div class="form-group">
				    <label for="email">Eamil</label>
				    <input type="text" name="customer_email" class="form-control" id="email" value=<?php echo $customer_email; ?> > 
			  	</div>
			  	
			  
			  	<div class="form-group">
				    <label for="phone">Phone</label>
				    <input type="text" name="customer_phone" class="form-control" id="phone" value=<?php echo $customer_phone; ?>> 
			  	</div>
			  	<div class="form-group">
				    <label for="city">City</label>
				    <select type="text" name="customer_city" class="form-control" id="city" >
				    	<option> <?php echo $customer_city; ?></option>
				    	<option>Tamale</option>
				    	<option>Wa</option>
				    	<option>Bolgatanga</option>
				    	<option>Sunyani</option>
				    	<option>Takoradi</option>
				    	<option>Koforidua</option>
				    	<option>Kuamsi</option>
				    	<option>Capecoast</option>
				    	<option>Accra</option>
				    	<option>Ho</option>

				    </select> 
			  	</div>
			  	<div class="form-group">
				    <label for="address">Address</label>
				    <input type="text" name="customer_address" class="form-control" id="address" value=<?php echo $customer_address; ?>> 
			  	</div>
			  	<div class="form-group">
				    <label for="phone">Image</label>
				    <img src="customers_images/<?php echo $customer_image;?>">
				    <input type="File" name="customer_image" class="form-control" id="image" value=<?php echo $customer_image; ?>> 
			  	</div>

			  	<div class="form-group">
				    <button class="btn btn-success btn-lg" type="submit" name="update">Update Info</button>
			  	</div>
			</form>
		</p>
		</div>

</body>
</html>

<?php

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


	if(isset($_POST['update'])){

		//$customer_ip = getIp();
	
		$customer_id = $_GET['customer_id'];	
		$customer_name = $_POST['customer_name'];
		$customer_email = $_POST['customer_email'];
		$customer_phone = $_POST['customer_phone'];
		$customer_city = $_POST['customer_city'];
		$customer_address = $_POST['customer_address'];
		$customer_image = $_FILES['customer_image'] ['name'];
		$customer_image_tmp = $_FILES['customer_image'] ['tmp_name'];

		move_uploaded_file($customer_image_tmp, "customer_images/$customer_image");

		$update_customer = "UPDATE customers SET customer_name='$customer_name', customer_email='$customer_email',
		 customer_phone='$customer_phone', customer_city='$customer_city', customer_address='$customer_address', 
		 customer_image='$customer_image' WHERE customer_id='$customer_id'";

		$run_update = mysqli_query($con, $update_customer);

		if($run_update){
			echo "<script>alert('Your Account update was successful')</script>";
			echo "<script>window.open('account.php', '_self')</script>";

		}

		}
?>