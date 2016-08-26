
<!DOCTYPE HTML>
<?php
include '../db/connection.php';

?>
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

	//function to get user email
	function getEmail(){
		global $con;

		$sql = "SELECT * FROM customers";

		$run_sql = mysqli_query($con, $sql);

		$row = mysqli_fetch_array($run_sql);

		$customer_email = $row['customer_email'];
		$id = $row['customer_id'];
		$_SESSION['customer_email'] = $customer_email;
		$_SESSION['customer_id']= $id;

		return $customer_email;
	}

	$error_name="";
	$error_email="";
	$error_password="";
	$error_password_match="";
	$error_phone="";

	

	if(isset($_POST['register'])){

		

		$customer_name=$customer_email=$customer_phone="";

		//$customer_ip = getIp();
		//$email = $_SESSION['customer_email'];

		$customer_name = $_POST['customer_name'];
		$customer_email = $_POST['customer_email'];
		$customer_password = $_POST['customer_password'];
		$confirm_password = $_POST['confirm_password'];
		$customer_phone = $_POST['customer_phone'];

		/*if($customer_password = $confirm_password){
			echo "yes";
		}
		else

		{
			echo "Oh No";
		}*/
		$customer_password=($customer_password);
		$confirm_password=($confirm_password);

		if(empty($customer_name)){
			$error_name="<font color='red'>Cant be empty</font>";
		}
		elseif(!preg_match("/^[a-zA-Z ]*$/", $customer_name)){
			$error_name="<font color='red'>Only Alphabet or White space is allowd</font>";
		}
		elseif(empty($customer_email)){
			$error_email="<font color='red'>Cant be empty</font>";
		}
		elseif(!filter_var($customer_email, FILTER_VALIDATE_EMAIL)){
			$error_email="<font color='red'>Invalid Email formt(Email should be like: 'joe@example.com')</font>";
		} 
		elseif(empty($customer_password)){
			$error_password="<font color='red'>Password can not be empty</font>";
		}
		elseif($customer_password != $confirm_password){
			$error_password_match="<font color='red'>Passwords does not match</font>";
		}
		

		else{

		$find_email = "SELECT customer_email FROM customers Where customer_email='$customer_email'";

		$run_find = mysqli_query($con, $find_email);

		$found_email = mysqli_num_rows($run_find);

		if($found_email==0){

		$insert_customer = "insert into customers 
		(customer_name, customer_email, customer_password, customer_phone) 
		values ('$customer_name', '$customer_email', MD5('$customer_password'), '$customer_phone')";

		$run_customer = mysqli_query($con, $insert_customer);

		if($run_customer){

			echo "<script>alert('Your registration was successful')</script>";
			echo "<script>window.open('../login.php', '_self')</script>";

			}
		}else{
			echo "<script>alert('A user is already registered with this email')</script>";
			echo "<script>window.open('register.php', '_self')</script>";
		}
		}
	}
?>
<html>
	<head>
		<title>Register Customer</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="../css/custom.css">

		<!--<script type="text/javascript">

			function confirmPassword{
				if (frm.customer_password.value==""){
					alert('Enter Password.');
					frm.customer_password.focus();
					return false;
				}
				if((frm.customer_password.value).length < 4){
					alert('Password length should be a minimum of 4 characters.');
					frm.customer_password.focus();
					return false;	
				}
				if(frm.confirm_password.value = ""){
					alert('You have to enter confirm Password.');
					return false;
				}
				if(frm.confirm_password.value != frm.customer_password.value){
					alert('Passwords do not Match.');
					return false;
				}

				return true;
			}


		</script>-->
		<!--<script type="text/javascript">
			

			function validatePassword(){
				var password = document.getElementById("password")
				var confirmPassword = document.getElementById("confirmPassword");
			  if(password.value != confirmPassword.value) {
			    confirmPassword.setCustomValidity("Passwords Don't Match");
			  } else {
			    confirmPassword.setCustomValidity('');
			  }
			}

			password.onchange = validatePassword;
			confirmPassword.onkeyup = validatePassword;


		</script>-->
	</head>
<body class="container">

		<div class="jumbotron insert_form">
			<h2>New Customer Registration</h2>
			<hr>
			<p>
			<form class="form-horizontal" name="frm" action="register.php" method = "post" enctype ="multipart/form-data" onSubmit="validatePassword();">
				
				<div class="form-group">
				    <label for="name">Name*</label>
				    <?php echo $error_name; ?>
				    <input type="text" name="customer_name" class="form-control" id="name" > 
			  	</div>
			  	<div class="form-group">
				    <label for="email">Email*</label>
				    <?php echo $error_email; ?>
				    <input type="text" name="customer_email" class="form-control" id="email" > 
			  	</div>
			  	<div class="form-group">
				    <label for="password">Password*</label>
				     <?php echo $error_password; ?>
				    <input type="password" name="customer_password" class="form-control" id="password">
			  	</div>
			  	<div class="form-group">
				    <label for="confirmPassword">Confirm Password*</label>
				    <?php echo $error_password_match; ?>
				    <input type="password" class="form-control" id="confirmPassword" name="confirm_password">
			  	</div>
			  
			  	<div class="form-group">
				    <label for="phone">Phone</label>
				    
				    <input type="text" name="customer_phone" class="form-control" id="phone" > 
			  	</div>
			  	<div class="form-group">
			  		 <h><i>Fields marked * are required.</i></h>

				    <h5><i><b>By clickin REGISTER, you have agreed to Terms and Conditions</b></i></h5>

				    <button class="btn btn-success" type="submit" name="register" onclick="; ">Register</button>
			  	</div>
			</form>
				    <a href="../login.php"><button class="btn btn-info">Login</button></a>

		</p>
		</div>


		
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.js"></script>
</body>
</html>

