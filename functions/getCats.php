<?php
	include 'db/connection.php';

	//$con = mysqli_connect("localhost", "root", "", "ecommerce");

	function getCats(){

		global $con;

		$get_cats = "select * from categories";

		$run_cats = mysqli_query($con, $get_cats);

		while ($row_cats = mysqli_fetch_array($run_cats)){

			$category_id = $row_cats['category_id'];
			$category_title = $row_cats['category_title'];

			//echo $category_title;
			echo "<li><a href = 'index.php?category=$category_id'> $category_title </a></li>";
		}

	}


	

?>