<?php 

	include "confs/config.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM Categories WHERE id = $id";
	mysqli_query($conn,$sql);
	header("location: cat-list.php");

 ?>
