<?php 

session_start();
include ("confs/config.php");





$id = $_GET['id'];


mysqli_query($conn, "DELETE FROM orders WHERE 
			id = $id ");



header("location: orders.php");




  ?>
