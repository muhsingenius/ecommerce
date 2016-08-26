<?php
	session_start();

	if(!isset($_SESSION['email'])){

		echo "<script>window.open('admin_login.php?not_admin=You have to login', '_self')</script>";
	}
	else{




include '../db/connection.php';


if (isset($_GET['delete_pro'])){

$delete_id=$_GET['delete_pro'];

$delete_qry = "delete from products where product_id = '$delete_id'";
$run_delete = mysqli_query($con, $delete_qry);

if($run_delete){
	echo "<script>alert('product has been deleted')</script>";
	echo "<script>window.open('index.php?view_products', '_self')</script>";

}

}
}


?>