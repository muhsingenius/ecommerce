<?php


include_once('../db/connection.php');

if(isset($_POST['login'])){

	global $con;	

	$email=strip_tags($_POST['email']);
	$password=strip_tags($_POST['pass']);

	$email=stripslashes($email);
	$password=stripcslashes($password);

	$email=mysqli_real_escape_string($con, $email);
	$password=mysqli_real_escape_string($con, $password);

	$password=md5($password);

	$sql  = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($query);
	$id= $row['id']; 
	$db_customer_password = $row['pwd'];

	if($password = $db_customer_password){
		session_start();
		$_SESSION['email'] = $email;
		$_SESSION['id']= $id;

		header("Location:index.php");

		}else 
		{
			echo "<h2 style='margin-left:450px; margin-top:100px'>Your email/password is not correct.</h2>";
			
		}
	
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Products</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body style="background:black">

		<div style="width:400px; margin:0 auto; margin-top:100px;">
			<h2><?php echo @$_GET['not_admin']?></h2>
			<h2 style="color:white;">Admin</h2>
			<hr>
			<p>
			<form class="form-horizontal" action="admin_login.php" method = "post" enctype ="multipart/form-data">
				
			  	<div class="form-group" style="color:white;">
				    <label for="email">Email</label>
				    <input type="text" name="email" class="form-control" id="email" required> 
			  	</div>

			  	<div class="form-group" style="color:white;">
				    <label for="password">Password</label>
				    <input type="password" name="pass" class="form-control" id="password" required>
			  	</div>

			  	<div class="form-group">
				    
				    <button class="btn btn-success" type="submit" name="login">Login</button>
			  	</div>

			  	
			</form>
		</p>
		</div>

</body>
</html>
