<?php 

	session_start();

	include ("admin/confs/config.php");

	$cart = 0;

	if(isset( $_SESSION['cart'])){
			
				foreach($_SESSION['cart'] as $qty) {
					
					$cart += $qty ;
					

			}


		}


	if (isset($_SESSION['cmt'])) {

		foreach ($_SESSION['cmt'] as $cmt_qty) {

			$cmt += $cmt_qty;
		}
	}

	if(isset($_GET['cat'])){

		$cat_id = $_GET['cat'];
		$books  = mysqli_query($conn, "SELECT * FROM books WHERE Category_id = $cat_id");
	}else {

		$books = mysqli_query($conn, "SELECT * FROM books  ORDER BY `id` DESC");
	}

	$cats = mysqli_query($conn, "SELECT * FROM Categories");

?>

 <!DOCTYPE html>
 <meta utf="8" lang="myan">
 <html>
 	<head>
 		<title>Library</title>
 		<link rel="stylesheet" type="text/css" href="css/style.css">
 	</head>
 	<body>

 		<h1>Library</h1>

 		<div class="header">

 			<h2>Welcome From Library :-) </h2>

 			<div>

	 			<form class="search" action="search.php" method="get">

	 				<label>
	 				
	 					<input type="text" name="keywords" autocomplete="off" placeholder= "Type book or author or words">

	 				</label>

	 				<input class="button" type="submit" value="search">
	 			
	 			</form>

	 			

 			</div>

 			<div class="info"> 
 				 			
 					You have chosen <b>( <?php echo $cart; ?> )</b> book<?php if ($cart > 1){echo "s";} ?>.
 				 
 				
 					<?php if ($cart >0): ?>

	 					<b><a href="view-cart.php">Click to deliver. :-)</a></b>
	 				
 					<?php endif; ?>

 					<br>

 				<b class="limit">
 				
 					<?php if ($cart >= 3) {
 						echo "Limited";
 						} 
 					?>

 				</b>
 			

 			</div><br>
 		</div>

 		<!-- <div class="sidebar"> -->
 			
 			<ul class="cats">
 				<li>
 					<b><a href="index.php">All Categories</a></b>
 				</li>

 				<?php while($row = mysqli_fetch_assoc($cats)): ?>
 					<li>
 						<a href="index.php?cat=<?php echo $row['id'] ?>">
 							<?php echo $row['name'] ?>
 						</a>
 					</li>
 				<?php endwhile; ?>

 			</ul>

 		<!-- </div> -->

 		<div class="main">

 			<ul class="books">
 				
 				<?php while($row = mysqli_fetch_assoc($books)): ?>
 					<li>
 						<div class="info">
 						<img src="admin/covers/<?php echo $row['cover'] ?>" height= "150" width="100">

 						<b>
 							<a href="book-detail.php?id=<?php echo $row['id'] ?>">
 								<?php echo $row['title'] ?>
 							</a>
 							
 						</b>

                        <i> $<?php echo $row['price'] ?> </i><br>
						<b> Book-No.:<?php echo $row['id'] ?> </b>			

 							
 							<?php 

 								

 								$row_id = $row['id'];

 								$ordered_book = mysqli_query("SELECT *
						 					FROM order_items LEFT JOIN books ON order_items.book_id = books.id
						 					WHERE order_items.book_id = $row_id");
 								$ordered = mysqli_fetch_assoc($ordered_book);
 								$tmp_book = mysqli_query("SELECT * FROM tmp_book_items WHERE tmp_book_id = $row_id");
 								$tmp = mysqli_fetch_assoc($tmp_book);



 								if ($row_id == $ordered['book_id'] ){
 									echo "Borrowed";
 								}elseif($row_id == $tmp['tmp_book_id'] ){
 									echo "";
 								}elseif($cart >= 3 ){
 									echo "";
 								}else{
 									
 								}

 							?> 

 						<b class="state">
 								
 							<?php 

 								

 								$row_id = $row['id'];

 								$ordered_book = mysqli_query($conn, "SELECT *
						 					FROM order_items LEFT JOIN books ON order_items.book_id = books.id
						 					WHERE order_items.book_id = $row_id");
 								$ordered = mysqli_fetch_assoc($ordered_book);
 								
 								$tmp_book = mysqli_query($conn, "SELECT * FROM tmp_book_items WHERE tmp_book_id = $row_id");
 								$tmp = mysqli_fetch_assoc($tmp_book);

 							?>
 							<?php if($row_id == $ordered['book_id']): ?>
 									Borrowed
 							<?php elseif($row_id == $tmp['tmp_book_id']): ?>
 									Chosen
 							<?php elseif($cart >= 3): ?>
 									You're Limited
 							<?php else: ?>
 									
 									<a href="add-to-cart.php?id=<?php echo $row_id ?>" class="add-to-cart">Click to Borrow</a>
 							<?php endif; ?>

 						</b>


 								

 							
 						</div>	
 						<div class="words"><p><?php echo $row['summary']; ?></p><br>
 							<a href="admin/books/<?php echo $row['title']; ?>.pdf"><i>read more</i></a>
 						</div>
 						
 						<div class="comment">
 							
	 							<?php 

	 								$cmt = mysqli_query($conn, "SELECT * FROM comments WHERE comment_post_ID = $row_id");
	 						
	 									 							 
	 							       while ($comment = mysqli_fetch_assoc($cmt)): ?>
	 										
	 							 				**<?php echo $comment['comment_content']; ?> <br>

				 							
	 									<?php endwhile; ?>
	 									<br>
	 																
	 								
	 						
 						</div>  	 						

 						
 						<div class="comment">

 							<form class="comment" action="comment.php?id=<?php echo $row_id ?>" method="post">

 								<label>

 				
 									<input type="text" name="comment" autocomplete="off" placeholder= "Comment.....">


 								</label>

 									<input class="button"  type="submit" value="comment" style="color: green;">
 			
 							</form>
 						</div>


 							
 					</li>
 					
 				<?php endwhile; ?>
 				
 			</ul>
 			
 		</div>


 		<div class="footer">
 			&copy; <?php echo date("Y") ?>. All right reserved.
 		</div>
 	
 	</body>
 </html>
