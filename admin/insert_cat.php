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
				    <input type="text" name="cat_title" class="form-control" id="title" required> 
			  	</div>
			  	<div class="form-group">

				    <button class="btn btn-success" type="submit" name="add_cat">Add </button>
			  	</div>
			</form>
				    

		</p>
</div>
</html>

<?php
include '../db/connection.php';

if(isset($_POST['add_cat'])){

	$new_cat= $_POST['cat_title'];

$Insert_cat  = "insert into categories (Category_title) values('$new_cat')";
$run_cat=mysqli_query($con, $Insert_cat);

if($run_cat){
				echo "<script>alert('The Category was updated successfully')</script>";
				echo "<script>window.open('index.php?view_cats', '_self')</script>";
			}

}


?>