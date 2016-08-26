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
				    <button class="btn btn-danger" type="submit" name="yes">Yes, Delete My Accounts</button> 
				    <button class="btn btn-success" type="submit" name="no">No, Let me think again</button>

			  	</div>
			</form>
		</p>
		</div>

		<?php

			$user = $_SESSION['customer_email'];

			if(isset($_POST['yes'])){

				$delete_customer = "DELETE FROM customers WHERE customer_email='$user'";

				$run_delete = mysqli_query($con, $delete_customer);

				echo "<script>alert('Your Customer Account has been deleted')</script>";
				echo "<script>window.open('logout.php', '_self')</script>";

			}

			if(isset($_POST['no'])){
				echo "<script>window.open('account.php', '_self')</script>";
			}
		?>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>

</body>
</html>