<?php include ("confs/auth.php") ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>

		<h1>Book List</h1>
		<ul class="menu">
			<li><a href="book-list.php">Manage Books</a></li>
			<li><a href="cat-list.php">Manage Categories</a></li>
			<li><a href="orders.php">Manage Order</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<a href="book-new.php" class="new">New Book</a>
		<form action="search.php" method="get">

 			<label>

 				search
 				<input type="text" name="keywords" autocomplete="off">


 			</label>

 			<input type="submit" value="search">
 			
 		</form>

		<?php 

			include "confs/config.php";

			$result = mysqli_query($conn, 

					"SELECT * FROM
					books " 
				)	;
			?>

		 <ul class="books">
		 	<?php while($row = mysqli_fetch_assoc($result)): ?>
		 		<li>
		 			<img src="covers/<?php echo $row['cover'] ?>" 
		 				alt="" align="right" height="140">

		 			<b> <?php echo $row['title'] ?> </b>
		 			<i>by <?php echo $row['author'] ?> </i>
		 			<small> (in <?php echo $row['name'] ?> ) </small>
		 			<span> $<?php echo $row['price'] ?> </span>
		 			<p> <?php echo $row['summary'] ?> </p>

		 			[ <a href="book-del.php?id=<?php echo $row['id']; ?>">del</a> ]


		 			[ <a href="book-edit.php?id=<?php echo $row['id']; ?>">edit</a> ]
		 		</li>
		 	<?php endwhile; ?>		 	
		 </ul>	 
	
	</body>
</html>