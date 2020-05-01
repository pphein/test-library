<?php 
	session_start();
	include ("admin/confs/config.php");

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$adress = $_POST['adress'];

	$order = mysqli_query($conn, "INSERT INTO orders 
				(name, email, phone, adress, status, created_date, modified_date)
				VALUES ('$name', '$email', '$phone', '$adress', 0, now(), now() ) ");

	$order_id = mysqli_insert_id($conn);

	foreach ($_SESSION['cart'] as $id => $qty) {
		$books = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");

		$title = mysqli_fetch_assoc($books);
		$bookname = $title['title'];
		
	$confirm = mysqli_query($conn, "INSERT INTO order_items 
					(book_id, order_id, bookname, qty) VALUES ('$id', '$order_id', '$bookname', '$qty') ");
	}

	unset($_SESSION);
 ?>

 <!DOCTYPE html>
 <html>
 	<head>
 		<title>Order Submitted</title>
 		<link rel="stylesheet" type="text/css" href="css/style.css">
 	</head>
 	<body> 		
 		<h1>Order Submitted</h1>

 		<div class="msg">
 			Your order has been submitted. We'll deliver the items soon.
 			<a href="clear-cart.php" class="done">Book Store Home</a>
 		</div>

 		<div class="footer">
 			&copy; <?php echo date("Y") ?>. All right reserved.
 		</div>
 	</body>
 </html>
