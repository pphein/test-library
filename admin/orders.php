<?php include ("confs/auth.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Order List</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Padauk&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Order List</h1>
    <ul class="menu">
        <li><a href="book-list.php">Manage Books</a></li>
        <li><a href="cat-list.php">Manage Categories</a></li>
        <li><a href="orders.php">Manage Order</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="../index.php">Home Page</a></li>
    </ul>
    <?php 
		include ("confs/config.php");
		$orders = mysqli_query($conn, "SELECT * FROM order_items LEFT JOIN user ON order_items.user_id = user.ID");
    ?>
    <ul class="orders">
        <?php while($order = mysqli_fetch_assoc($orders)): ?>
            <?php if($order['status']): ?>
                <li class="delivered">
            <?php else: ?>
                <li>
            <?php endif; ?>

            <div class="order">
                <b> <?php echo $order['name']; ?> </b><b>
                </b>
                <i> <?php echo $order['email']; ?> </i>
                <span> <?php echo $order['phone']; ?> </span>
                <p>
                    <?php echo $order['adress']; ?>
                </p>
            </div>

            <div class="items">
                <?php 			
                        $book_id = $order['book_id'];
                        $items = mysqli_query($conn, "SELECT * FROM books WHERE id = $book_id");
						while($item = mysqli_fetch_assoc($items)):					
					 ?>
                <b>
                    <a href="../book-detail.php?id=<?php echo $item['id'] ?>">
                        <?php echo $item['title']; ?>
                    </a>
                    <i>ငှားသည့်ရက်စွဲ
                        :<?php $date = $order['created_date']; $date = strtotime($date); echo date('d-m-Y', $date); ?>
                    </i>

                    <i>ပြန်အပ်ရက်စွဲ : <?php  $date = strtotime("+7 day",$date); echo date('d-m-Y', $date);  ?> </i>

                    <a href="back-book.php?id=<?php echo $item['id']; ?>">
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