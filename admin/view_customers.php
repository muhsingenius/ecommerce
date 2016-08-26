<!DOCTYPE HTML>
<?php
include '../db/connection.php';



	if(!isset($_SESSION['email'])){

		echo "<script>window.open('admin_login.php?not_admin=You have to login', '_self')</script>";
	}
	else{


?>
<html>
	<head>
		<title>Register Customer</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="../css/custom.css">

	</head>
<body>

		<table class="table">
			<tr align="center">
				<td colspan="6">Vieww All Customers</td>

			</tr>
			<tr align="center" bgcolor="skyblue">
				<td>S.N</td>
				<td>Name</td>
				<td>Email</td>
				<td>Image</td>
			</tr>

			<?php
				$get_c = "SELECT * FROM Customers";
				$run_c = mysqli_query($con, $get_c);

				$i = 0;

				while ($row_c = mysqli_fetch_array($run_c)){
					$c_id = $row_c['customer_id'];
					$c_name = $row_c['customer_name'];
					$c_email = $row_c['customer_email'];
					$c_img = $row_c['customer_image'];


					$i++;
			?>

			<tr align="center">
				<td><?php echo $i; ?></td>
				<td><?php echo $c_name; ?></td>
				<td><?php echo $c_email; ?></td>
				<td><img src="../customer_images/<?php echo $c_img ?>" width="60"></td>
			
			</tr>
			<?php } ?>
		</table>


		
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.js"></script>
</body>
</html>


<?php  } ?>