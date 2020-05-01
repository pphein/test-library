 <?php 
	 session_start();	 
	 include ("admin/confs/config.php");

	 $id = $_GET['id'];
	 $_SESSION['cart'][$id]++;
?>
<?php

	$tmp = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");

	$tmp_book = mysqli_fetch_assoc($tmp);

	$tmp_title = $tmp_book['title'];
	$tmp_id = $tmp_book['id'];

	mysqli_query($conn, "INSERT INTO tmp_book_items 
					(tmp_book_id, tmp_book_title) VALUES ('$tmp_id', '$tmp_title') ");

	header("location: index.php");
  ?>