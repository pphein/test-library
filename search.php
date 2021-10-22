<?php
	session_start();
	include ("admin/confs/config.php");

	if(isset($_GET['cart'])){
		$cart = $_GET['cart'];
	}else{
		$cart = 0;
		if(isset($_SESSION['cart'])){
			foreach($_SESSION['cart'] as $qty) {
				$cart += $qty;
			}
		}
	}

	if (isset($_SESSION['cmt'])) {
		foreach ($_SESSION['cmt'] as $cmt_qty) {
			$cmt += $cmt_qty;
		}
	}

	if(isset($_GET['cat'])){
		$cat_id = $_GET['cat'];
		$books  = mysqli_query($conn, "SELECT * FROM books WHERE category_id = $cat_id");
	}else {
		$books = mysqli_query($conn, "SELECT * FROM books  ORDER BY `id` DESC");
	}
	$Categories = mysqli_query($conn, "SELECT * FROM categories");
?>

<!DOCTYPE html>
<meta utf="8">
<html>

<head>
    <title>Book Store</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Padauk&display=swap" rel="stylesheet">
</head>

<body>
    <h1> Library</h1>
    <div class="header">
        <h2>Welcome From Library :-)</h2>
        <form class="search" action="search.php" method="post">
            <label>Search</label>
            <input type="text" name="keywords" autocomplete="off" placeholder="Type book or author or words">
            <input class="button" type="submit" value="search">
        </form>

        <div class="info">
            You have borrowed( <?php echo $cart; ?> ) books. <br>

            <?php if ($cart >0): ?>
            <a href="view-cart.php">Click to deliver. :-)</a>
            <?php endif; ?>

            <br>

            <b class="limit"><?php if ($cart >= 3) { echo "Limited"; } ?></b>
        </div>
    </div>

    <div class="sidebar">
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
    </div>

    <?php
 			$keywords = $_POST['keywords'];
 			$keywords = strip_tags($keywords); 				

	 		if(isset($keywords)){
	 			
	 			$query = "SELECT * FROM books
						WHERE author LIKE '%{$keywords}%'
						OR summary LIKE '%{$keywords}%'
						OR title LIKE '%{$keywords}%'";

	 			$result = mysqli_query($conn, $query);	 		
	 		}else{ 
	 			header("location: index.php");
	 		}
		?>
    <br>
    <div class="result-count">
        <b>Found <?php echo $result->num_rows; ?> results.</b>
    </div>

    <?php while ($r = $result->fetch_object()) : ?>

    <div class="main">
        <ul class="books">
            <li>

                <div class="info">
                    <img src="admin/covers/<?php if($r->cover){ echo $r->cover;}else{echo "a.png";} ?>"
                        height="150"><br>

                    <b>
                        <a href="#"><?php echo $r->title; ?></a><br>
                        <i><?php echo $r->author; ?></i><br>

                        <a href="admin/books/<?php if($r->book){echo $r->book;}else{echo "a.pdf";} ?>">To read</a>
                    </b><br>

                    <b> Price::$ <?php echo $r->price;  ?> </b>
                    <p>

                        created-date:
                        <?php echo $r->created_date; ?><br>
                        Book-NO.:<?php echo $r->id; ?>
                    </p>

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
                        <?php if(isset($row_id) || isset($ordered['book_id'])) : ?>
                        <?php if($row_id == $ordered['book_id']): ?>
                        Borrowed
                        <?php elseif($row_id == $tmp['tmp_book_id']): ?>
                        Chosen
                        <?php elseif($cart >= 3): ?>
                        You're Limited
                        <?php else: ?>

                        <a href="add-to-cart.php?id=<?php echo $row_id ?>" class="add-to-cart">Click to Borrow</a>
                        <?php endif; ?>
                        <?php endif; ?>
                    </b>

                </div>

                <div class="words">
                    <p>
                        <?php echo $r->summary; ?>
                    </p>
                    <br>
                    <a href="admin/books/<?php if($r->book){echo $r->book;}else{echo "a.pdf";} ?>"><i>read more</i></a>
                </div>
            </li>
        </ul>
    </div>

    <?php endwhile; ?>


    <div class="footer">
        &copy; <?php echo date("Y") ?>. All right reserved.
    </div>

</body>

</html>