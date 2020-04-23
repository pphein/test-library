<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>

		<h1>Book Detail</h1>

		<?php 
			include ("admin/confs/config.php");
			$id = $_GET['id'];
			$books = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
			$row = mysqli_fetch_assoc($books);
		 ?>

		 <div class="detail">
		 	
		 	<a href="index.php" class="back">&laquo; Go Back</a>

		 	<img height="300px" width="200px" src="admin/covers/<?php echo $row['title'].".png"; ?>">

		 	<h2> <?php echo $row['title'] ?> </h2>
		 	<i>by <?php echo $row['author'] ?> </i>
		 	<b> <?php echo $row['price'] ?> </b>

		 	<p> <?php echo $row['summary'] ?> </p>

		 	<?php 

 								

 								$row_id = $row['id'];

 								$ordered_book = mysqli_query($conn,"SELECT *
						 					FROM order_items LEFT JOIN books ON order_items.book_id = books.id
						 					WHERE order_items.book_id = $row_id");
 								$ordered = mysqli_fetch_assoc($ordered_book);
 								

 								$tmp_book = mysqli_query($conn, "SELECT * FROM tmp_book_items WHERE tmp_book_id = $row_id");
 								$tmp = mysqli_fetch_assoc($tmp_book);

 								?>
 								<?php if($row_id == $ordered['book_id']): ?>
 									<b>Borrowed</b>
 								<?php elseif($row_id == $tmp['tmp_book_id']): ?>
 									<b>Chosen</b>
 								<?php elseif($cart >= 3): ?>
 									<b>You're Limited</b>
 								<?php else: ?>
 									
 									<b><a href="add-to-cart.php?id=<?php echo $row['id'] ?>" class="add-to-cart">Click to Borrow</a></b>
 								<?php endif; ?>

		 </div>

		 <div class="footer">
		 	&copy; <?php echo date("Y") ?>. All right reserved.
		 </div>
	
	</body>
</html>
