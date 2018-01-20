<?php
	$db_host = "localhost";
	$db_name = "quanlythuvien";
	$db_user = "root";
	$db_password = "abc@123";
	$conn=mysqli_connect($db_host,$db_user,$db_password) or die("Database connection error!");
	mysqli_select_db($conn,$db_name);

?>