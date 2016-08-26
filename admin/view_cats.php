

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
				<td colspan="6">Vieww All Categories</td>

			</tr>
			<tr align="center" bgcolor="skyblue">
				<td>Category ID</td>
				<td>Title</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>

			<?php
				$get_cats = "SELECT * FROM Categories";
				$run_cats = mysqli_query($con, $get_cats);

				$i = 0;

				while ($row_cats = mysqli_fetch_array($run_cats)){
					$cat_id = $row_cats['category_id'];
					$cat_title = $row_cats['category_title'];

					$i++;
			?>

			<tr align="center">
				<td><?php echo $i; ?></td>
				<td><?php echo $cat_title; ?></td>
				<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
				<td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
			</tr>
			<?php } ?>
		</table>


		
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.js"></script>
</body>
</html>

<?php  } ?>