<?php
require_once("incfiles/connect.php");
$type = $_POST['theloai'];
if (empty($type))
	echo'Check your input';
else 
{
	
	//myadd
	$query = "SELECT * FROM theloai WHERE name='$type'";
	$results = mysqli_query($conn, $query);
	$rowcount=mysqli_num_rows($results);

	if (mysqli_num_rows($results) > 0) {
		echo'<script type="text/javascript">
         alert("Error! Type already existed");
          
        </script>';

	}
	else
	{




	$result = mysqli_query($conn,"INSERT INTO `theloai` (name) values ('".$type."')");
	if ($result)
	{
		echo'Successful adding
		<script type="text/javascript">
		window.location.reload(); 
		</script>
		';
	}
	else 
		echo'SQL error!';
}
}



?>

