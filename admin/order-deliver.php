<?php 




include ("confs/config.php");


mysqli_query($conn, "DELETE FROM order_items");

mysqli_query($conn, "DELETE FROM  tmp_book_items");

mysqli_query($conn, "DELETE FROM orders");




header("location: orders.php");

 ?>
