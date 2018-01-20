<?php 
require_once("incfiles/connect.php");
$id= $_GET['idbook']; 
$idtype= $_GET['idtype']; 

$query= mysqli_query($conn,"DELETE FROM dsbook where IDbook=".$id."");
if ($query)
	echo'Deleted done
		<script type="text/javascript">
		  window.location="viewlistbook.php?id='.$idtype.'"
		</script>';
else 
	echo'Error...';
?>