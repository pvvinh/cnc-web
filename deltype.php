<?php 
require_once("incfiles/connect.php");
$id= $_GET['id']; 

$query= mysqli_query($conn,"DELETE FROM theloai where ID=".$id."");
if ($query)
	echo'Đã xóa
		<script type="text/javascript">
		 // window.location="/qltv";
		window.location="/project/index.php"; 
		</script>';
else 
	echo'Lỗi';
?>