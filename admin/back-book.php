<?php 
	session_start();
	include ("confs/config.php");
	$id = $_GET['id'];
	$tmpdel = mysqli_query($conn, "DELETE FROM tmp_book_items WHERE 
				`tmp_book_items`.`tmp_book_id`= $id ");

	$orderdel = mysqli_query($conn, "DELETE FROM order_items WHERE 
				`order_items`.`book_id`= $id ");

	header("location: orders.php");

  ?>
