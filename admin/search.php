<?php 

session_start();

include ("confs/config.php");

$cart = 0;
if(isset($_SESSION['cart'])){
	foreach($_SESSION['cart'] as $qty) {
		$cart += $qty;
	}
}
if(isset($_GET['cat'])){
	$cat_id = $_GET['cat'];
	$books  = mysqli_query("SELECT * FROM books WHERE Category_id = $cat_id");
}else {
	$books = mysqli_query("SELECT * FROM books");
}

$cats = mysqli_query("SELECT * FROM Categories");

 ?>



<!DOCTYPE html>
 <meta utf="8">
 <html>
 	<head>
 		<title>Book Store</title>
 		<link rel="stylesheet" type="text/css" href="css/style.css">
 	</head>
 	<body>

 		<h1>Book Store</h1>
 		<a href="book-list.php">"back"</a>

 		<form action="search.php" method="get">

 			<label>

 				search
 				<input type="text" name="keywords" autocomplete="off">


 			</label>

 			<input type="submit" value="search">



 		</form>

 		<?php require_once '../db/connect.php';

if(isset($_GET['keywords'])) {

	$keywords = $db->escape_string($_GET['keywords']);

	$query = $db->query("

			SELECT *
			FROM books
			WHERE author LIKE '%{$keywords}%'
			OR summary LIKE '%{$keywords}%'
			OR title LIKE '%{$keywords}%'

		");
		?>


		<div class="result-count">

			Found <?php echo $query->num_rows; ?> results.


		</div>
		

		<?php 

		if ($query->num_rows) {

			while ($r = $query->fetch_object()) {
				?>

					<!-- <div class="result">

						<a href="#"><?php echo $r->title; ?></a>

					<!-- </div>  -->
					
					<div class="detail">
						
						<ul class="books">
						

						<li>
 							<img src="admin/covers/<?php echo $r->cover ?>" height= "150">

 							<b>
 								<a href="#"><?php echo $r->title; ?></a><br>
 								<i><?php echo $r->author; ?></i>

 								<a href="admin/books/<?php echo $r->title; ?>.pdf">To read</a>
 							</b>

 							<i> $ price </i>
 							<p> 
 								Summary <br>
 								<?php echo $r->summary; ?><br>
 								created-date:
 								<?php echo $r->created_date; ?><br>
 								<?php echo $r->id; ?><br>
 								[ <a href="book-del.php?id=<?php echo $row['id']; ?>">del</a> ]


		 						[ <a href="book-edit.php?id=<?php echo $row['id']; ?>">edit</a> ]
 							</p>

 							 <!-- <a href="add-to-cart.php?id=<?php echo $row['id'] ?>"
 								class="add-to-cart">Add to cart</a> -->

 								<!-- <a href="add-to-cart.php?id=<?php echo $row['id'] ?>" class="add-to-cart" >

 								<?php 

 								$row_id = $r->id;

 								$ordered_book = mysql_query("SELECT *
						 					FROM order_items LEFT JOIN books ON order_items.book_id = books.id
						 					WHERE order_items.book_id = $r->id");
 								$ordered = mysql_fetch_assoc($ordered_book);
 								/*echo $ordered['id'];
 								echo $ordered['book_id'];
 								echo $ordered['order_id'];
 								echo $ordered['qty'];
 								echo $row['id'];
 								*/
 								if ($r->id == $ordered['book_id']){
 									echo "";
 								}else{
 									echo "NO";
 								}

 								?> 


 								

 							</a>  -->

 						</li>
 					</ul>

					</div>
					

				<?php 
			}
			
		}


}

?>


	
 		<div class="footer">
 			&copy; <?php echo date("Y") ?>. All right reserved.
 		</div>
 	
 	</body>
 </html>
