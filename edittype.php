<?php
require_once("incfiles/connect.php");

$id= $_POST['idtype'];
$name= $_POST['theloai'];

if (empty($name))
	echo'Check input data';
else 
	{
		$result = mysqli_query($conn, "UPDATE theloai SET  `name`= '".$name."' where ID = ".$id." ");
		if ($result)
		{
			echo'
			<div class="alert alert-info alert-dismissible">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Done!</strong> modified successfully.
			</div>
				 
		';
		}
		else 
		echo'Not done';
	}

?>