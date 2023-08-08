<?php 
	session_start();
	include ("admin/confs/config.php");
    
    $user_id = 0;
    if(isset($_SESSION['id'])){
        $user_id = $_SESSION['id'];
    }
    $borrowbook = 0;
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
        
		$books  = mysqli_query($conn, "SELECT * FROM books WHERE category_id = $cat_id");
       
	}else {
		$books = mysqli_query($conn, "SELECT * FROM books  ORDER BY `id` DESC");
	}

	$cats = mysqli_query($conn, "SELECT * FROM categories");

    $borrows = mysqli_query($conn, "SELECT * FROM `order_items` WHERE user_id = $user_id");
    
    foreach($borrows as $borrow){
        $borrowbook += 1;
    }
    
?>

<!DOCTYPE html>
<meta utf="8" lang="myan">
<html>

<head>
    <title>Library</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="http://mmwebfonts.comquas.com/fonts/?font=padauk">
    <link rel="stylesheet" type="text/css" href="http://mmwebfonts.comquas.com/fonts/?font=myanmar3">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Padauk&display=swap" rel="stylesheet">


</head>

<body>

    <div class="nav">
        <div class="brand">
            <h1>Library</h1>
        </div>
        <div class="member">
            <?php if (isset($_SESSION['auth'])): ?>
            <a href="logout.php">Logout</a>
            <?php else: ?>
            <a href="signup.php">Sign Up</a> <a href="login.php">Login</a>
            <?php endif; ?>
        </div>
    </div>



    <div class="header">

        <h2>Welcome To Library :-) </h2>

        <div>
            <form class="search" action="search.php" method="get">
                <label>
                    <input type="text" name="keywords" autocomplete="off" placeholder="Type book or author or words">
                </label>
                <input class="button" type="submit" value="search">
            </form>
        </div>

        <div class="info">
            You have borrowed <b>( <?php echo $borrowbook; ?> ) </b> book<?php if ($borrowbook > 1){echo "s";} ?>.
            You have chosen <b>( <?php echo $cart; ?> )</b> book<?php if ($cart > 1){echo "s";} ?>.

            <?php if ($cart >0): ?>
            <b><a href="view-cart.php">Click to deliver. :-)</a></b>
            <?php endif; ?>
            <br>
            <b class="limit">
                <?php if ($cart+$borrowbook >= 3) {
 						echo "Limited";
 						} 
					?>
            </b>
        </div><br>
    </div>

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
        <?php if (isset($_SESSION['auth']) && isset($_SESSION['admin'])): ?>
        <li><a href="admin/book-list.php">Admin Page</a></li>
        <?php endif; ?>




    </ul>

    <div class="main">

        <ul class="books">
            <?php
            
            if(!isset($_GET['page'])){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }

    


    $books_per_page = 3;
    $page_first_result = ($page - 1) * $books_per_page;

    $number_of_result = mysqli_num_rows($books);
    $number_of_page = ceil($number_of_result/$books_per_page);

$books = mysqli_query($conn, "SELECT * FROM books LIMIT ".$page_first_result.",".$books_per_page);
            ?>


            <?php while($row = mysqli_fetch_assoc($books)): ?>
            <li>
                <div class="info">

                    <img src="admin/covers/<?php if($row['cover']){ echo $row['cover'];}else{echo "a.png";}  ?>"
                        height="150" width="100">

                    <b>
                        <a href="book-detail.php?id=<?php echo $row['id'] ?>">
                            <?php echo $row['title'] ?>
                        </a>

                    </b>

                    <i> $<?php echo $row['price'] ?> </i><br>
                    <b> Book-No.:<?php echo $row['id'] ?> </b>


                    <b class="state">
                        <?php 
 								$row_id = $row['id'];

 								$ordered_book = mysqli_query($conn, "SELECT *
						 					FROM order_items LEFT JOIN books ON order_items.book_id = books.id
						 					WHERE order_items.book_id = $row_id");
 								$ordered = mysqli_fetch_assoc($ordered_book);
 								
 								$tmp_book = mysqli_query($conn, "SELECT * FROM tmp_book_items WHERE tmp_book_id = $row_id");
 								$tmp = mysqli_fetch_assoc($tmp_book);
                                
                                 $user_id = $_SESSION['id'];

 							?>
                        <?php if(!isset($_SESSION['auth'])): ?>
                        Sign up or Login to Borrow
                        <?php elseif($row_id == $ordered['book_id']): ?>
                        Borrowed
                        <?php elseif($row_id == $tmp['tmp_book_id']): ?>
                        Chosen
                        <?php elseif($cart >= 3): ?>
                        You're Limited
                        <?php else: ?>

                        <a href="add-to-cart.php?id=<?php echo $row_id ?>&user_id=<?php echo $user_id; ?>"
                            class="add-to-cart">Click to Borrow</a>
                        <?php endif; ?>

                    </b>
                </div>
                <div class="words">
                    <p><?php echo $row['summary']; ?></p><br>
                    <a href="admin/books/<?php if($row['book']){echo $row['book'];}else{echo "a.pdf";} ?>"><i>read
                            more</i></a>
                </div>
                <div class="comment-cotent">

                    <?php 

 								$cmt = mysqli_query($conn, "SELECT * FROM comments WHERE comment_post_ID = $row_id");
 												 							 
 							    while ($comment = mysqli_fetch_assoc($cmt)): ?>

                    **<?php echo $comment['comment_content']; ?> <br>

                    <?php endwhile; ?>
                    <br>

                    <form class="comment" action="comment.php?id=<?php echo $row_id ?>" method="post">
                        <label>
                            <input type="text" name="comment" autocomplete="off" placeholder="Comment.....">
                        </label>

                        <input class="button" type="submit" value="comment" style="color: green;">

                    </form>

                </div>
            </li>
            <?php endwhile; ?>
        </ul>

    </div>
    <div class="paginate">
        <ul>
            <!-- <li>Pre</li>
            <li>Next</li> -->
            <?php
        for($page=1; $page<=$number_of_page; $page++){
            echo '<a href="index.php?page='.$page.'"><li>'.$page.'</li></a>';
        }
    ?>
        </ul>
    </div>


    <div class="footer">
        &copy; <?php echo date("Y") ?>. All right reserved.
    </div>

</body>

</html>