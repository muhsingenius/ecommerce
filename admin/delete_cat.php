<?php
	session_start();

	if(!isset($_SESSION['email'])){

		echo "<script>window.open('admin_login.php?not_admin=You have to login', '_self')</script>";
	}
	else{

include '../db/connection.php';


if (isset($_GET['delete_cat'])){

$delete_id=$_GET['delete_cat'];

$delete_cat = "delete from categories where category_id = '$delete_id'";
$run_delete = mysqli_query($con, $delete_cat);

if($run_delete){
	echo "<script>alert('The category has been deleted')</script>";
	echo "<script>window.open('index.php?view_cats', '_self')</script>";

}

}

}


?>