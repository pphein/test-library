<?php 

session_start();
include ("admin/confs/config.php");





$id = $_GET['id'];


$tmpdel =mysqli_query($conn, "DELETE FROM tmp_book_items WHERE 
			`tmp_book_items`.`tmp_book_id`= $id ");







unset($_SESSION['cart'][$id]);


header("location: view-cart.php");




  ?>
