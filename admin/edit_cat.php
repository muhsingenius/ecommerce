<?php


	if(!isset($_SESSION['email'])){

		echo "<script>window.open('admin_login.php?not_admin=You have to login', '_self')</script>";
	}
	else{

include '../db/connection.php';

if(isset($_GET['edit_cat'])){

	$cat_id=$_GET['edit_cat'];

	$get_cat= "select * from categories where category_id='$cat_id'";

	$run_cat = mysqli_query($con, $get_cat);

	$row_cat=mysqli_fetch_array($run_cat);

	$cat_id = $row_cat['category_id'];
	$category_title=$row_cat['category_title'];

}

}
?>

<html>
<head>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">


</head>
<div style="width:60%; margin:3%;">
			<h2>Insert Product Category</h2>
			<hr>
			<p>

			<form class="form-horizontal" action="" method = "post" enctype ="multipart/form-data" onSubmit="validatePassword();">
				
				<div class="form-group">
				    <label for="title">Category Title</label>
				    <input type="text" name="cat_title" class="form-control" id="title" value="<?php echo $category_title?>"> 
			  	</div>
			  	<div class="form-group">

				    <button class="btn btn-success" type="submit" name="update_cat">Add </button>
			  	</div>
			</form>
				    

		</p>
</div>
</html>

<?php

if(isset($_POST['update_cat'])){

	$update_id = $cat_id;

	$category_title= $_POST['cat_title'];

$update_cat  = "update categories set category_title='$category_title' where category_id='$update_id'";
$run_cat=mysqli_query($con, $update_cat);

if($run_cat){
				echo "<script>alert('The Category was updated successfully')</script>";
				echo "<script>window.open('index.php?view_cats', '_self')</script>";
			}

}


?>