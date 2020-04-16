<?php 

session_start();
include ("admin/confs/config.php");


	$tmp_del ="DELETE FROM `tmp_book_items`";

	mysqli_query($conn, $tmp_del);

unset($_SESSION['cart']);



header("location: index.php");


  ?>
