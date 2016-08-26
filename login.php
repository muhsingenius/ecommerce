<?php


include_once('db/connection.php');

if(isset($_POST['login'])){

	global $con;	

	$customer_email=strip_tags($_POST['email']);
	$customer_password=strip_tags($_POST['password']);

	$customer_email=stripslashes($customer_email);
	$customer_password=stripcslashes($customer_password);

	$customer_email=mysqli_real_escape_string($con, $customer_email);
	$customer_password=mysqli_real_escape_string($con, $customer_password);

	$hashed_customer_password=md5($customer_password);

	$sql  = "SELECT * FROM customers WHERE customer_email = '$customer_email'";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($query);


	//echo $_password, "//////", $customer_password;
	$id= $row['customer_id']; 
	$email=$row['customer_email'];
	$db_customer_password = $row['customer_password'];

	//echo $email, "////", $customer_email;

//	echo $db_customer_password, "///////", $hashed_customer_password;


	if($db_customer_password == $hashed_customer_password){
		session_start();
		$_SESSION['customer_email'] = $customer_email;
		$_SESSION['customer_id']= $id;

		header("Location:index.php");

		}else 
		{
			echo "<h2 style='margin-left:450px; margin-top:100px; font-size:20px; color:red;'>Your email/password is not correct.</h2>";
			
		}
	
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Products</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body class="container">
<div style="width:70%; margin:0 auto; background:white; height:50px; padding:30px; font-size:30px; margin-bottom:20px"><h2 style="text-align:center; color:red"><?php echo @$_GET['not_login']?></h2></div>
		<div class="jumbotron insert_form">

			<h2>Login Into the site</h2>
			<hr>
			<p>
			<form class="form-horizontal" action="login.php" method = "post" enctype ="multipart/form-data">
				
			  	<div class="form-group">
				    <label for="email">Email</label>
				    <input type="text" name="email" class="form-control" id="email" placeholder="Enter Your Email" value="<?php $customer_password; ?> " required> 
			  	</div>

			  	<div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
			  	</div>

			  	<div class="form-group">
				    
				    <button class="btn btn-success" type="submit" name="login">Login</button>
			  	</div>

			  	
			</form>

			<div class="row">
			  		<div class="col-xs-6">
			  			<h2>can not login?</h2>
			  			<button class="btn btn-danger" type="submit">Forgot Password</button>

			  		</div>

			  		<div class="col-xs-6">
			  			<h2>New Customer</h2>
			  			<a style="color:white;" href="admin/register.php"><button class="btn btn-success btn-success">Register Here</button></a>

					</div>
				</div>
		</p>
		</div>

</body>
</html>
