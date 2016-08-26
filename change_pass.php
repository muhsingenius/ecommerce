
<!DOCTYPE HTML>
<?php

include 'db/connection.php';

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
			<h2>Change Your Password</h2>
			<hr>
			<p>
			<form class="form-horizontal" action="" method = "post" enctype ="multipart/form-data">
				
				<div class="form-group">
				    <label for="oldPassword">Enter Current Password</label>
				    <input type="password" name="current_password" class="form-control" id="oldPassword" required> 
			  	</div>
			  	<div class="form-group">
				    <label for="newPassword">Enter New Password</label>
				    <input type="password" name="new_password" class="form-control" id="newPassword" required > 
			  	</div>
			  	
			  	<div class="form-group">
				    <label for="repeatNewpassword">Repeat Password</label>
				    <input type="password" name="repeat_new_password" class="form-control" id="repeatNewPassword" required > 
			  	</div>
			  

			  	<div class="form-group">
				    <button class="btn btn-success btn-lg" type="submit" name="change_pass">Change Password</button>
			  	</div>
			</form>
		</p>
		</div>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>

</body>
</html>

<?php



	if(isset($_POST['change_pass'])){

		$user = $_SESSION['customer_email'];


		$current_password = $_POST['current_password'];
		$new_password = $_POST['new_password'];
		$repeat_new_password = $_POST['repeat_new_password'];

		$select_password = "SELECT * FROM customers WHERE customer_password = '$current_password' AND customer_email='$user'";
		$run_password = mysqli_query($con, $select_password);
		$check_password = mysqli_fetch_array($run_password);

		if($check_password == 0){
			echo "<script>alert('Your current password is not correct')</script>";
			header('Location: account.php');
			exit();
			
		}
		if($new_password!=$repeat_new_password){

			echo "<script>alert('New and Confirm password do not match')</script>";
		}
		else{
			$update_password = "UPDATE customers SET customer_password = '$new_password' WHERE customer_email='$user' ";
			$run_update = mysqli_query($con, $update_password);

			echo "<script>alert('Password is updated successfuly')</script>";
			echo "<script>window.open('account.php', '_self')</script>";


		}
	}

?>