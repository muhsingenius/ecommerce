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
				<td colspan="6">Vieww All Products</td>

			</tr>
			<tr align="center" bgcolor="skyblue">
				<td>S.N</td>
				<td>Title</td>
				<td>Image</td>
				<td>Price</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>

			<?php
				$get_pro = "SELECT * FROM products";
				$run_get = mysqli_query($con, $get_pro);

				$i = 0;

				while ($row_pro = mysqli_fetch_array($run_get)){
					$pro_id = $row_pro['product_id'];
					$pro_title = $row_pro['product_title'];
					$pro_img = $row_pro['product_image'];
					$pro_price = $row_pro['product_price'];


					$i++;
			?>

			<tr align="center">
				<td><?php echo $i; ?></td>
				<td><?php echo $pro_title; ?></td>
				<td><img src="product_images/<?php echo $pro_img ?>" width="60"></td>
				<td><?php echo $pro_price?></td>
				<td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
				<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id; ?>">Delete</a></td>
			</tr>
			<?php } ?>
		</table>


		
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.js"></script>
</body>
</html>


<?php  } ?>