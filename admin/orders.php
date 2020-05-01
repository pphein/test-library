<?php include ("confs/auth.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Order List</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>

		<h1>Order List</h1>
		<ul class="menu">
			<li><a href="book-list.php">Manage Books</a></li>
			<li><a href="cat-list.php">Manage Categories</a></li>
			<li><a href="orders.php">Manage Order</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>

		<?php 
			include ("confs/config.php");
			$orders = mysqli_query($conn, "SELECT * FROM orders  ORDER BY `id` DESC");
		 ?>
		 <a href="order-deliver.php" class="new">Delete Orders</a>

		<ul class="orders">
			<?php while($order = mysqli_fetch_assoc($orders)): ?>
				<?php if($order['status']): ?>
					<li class="delivered">
				<?php else: ?>
					<li>
				<?php endif; ?>

				<div class="order">
					<b> <?php echo $order['name']; ?> </b><b><a href="order-delete.php?id=<?php echo $order['id']; ?>">All clear</a></b>
					<i> <?php echo $order['email']; ?> </i>
					<span> <?php echo $order['phone']; ?> </span>
					<p>
						<?php echo $order['adress']; ?>
					</p>

				

					<?php if($order['status']): ?>
						* <a href="order-status.php?id=<?php echo $order['id'] ?>&status=0">
						Undo</a>
					<?php else: ?>
						* <a href="order-status.php?id=<?php echo $order['id'] ?>&status=1">
						Marked as Delivered.</a>
					<?php endif; ?>
				</div>

				<div class="items">
					<?php 
						$order_id = $order['id'];

						$items = mysqli_query($conn, "SELECT order_items.*, books.title
						 					FROM order_items LEFT JOIN books ON order_items.book_id = books.id
						 					WHERE order_items.order_id = $order_id");

						while($item = mysqli_fetch_assoc($items)):					
					 ?>
						<b>
							<a href="../book-detail.php?id=<?php echo $item['book_id'] ?>">
								<?php echo $item['title']; ?>
							</a>
							<i>ငှားသည့်ရက်စွဲ :<?php $date = $order['created_date']; $date = strtotime($date); echo date('d-m-Y', $date); ?> </i>
							
							<i>ပြန်အပ်ရက်စွဲ : <?php  $date = strtotime("+7 day",$date); echo date('d-m-Y', $date);  ?>  </i>
							
							<a href="back-book.php?id=<?php echo $item['book_id']; ?>">
					 			<button>Return</button>				 		
					 		</a>
						</b>
					<?php endwhile; ?>
				</div>
			</li>
			<?php endwhile; ?>
		</ul>
	
	</body>
</html>