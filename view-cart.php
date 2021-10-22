<?php 
	session_start();
	include ("admin/confs/config.php");

    $user_id = $_SESSION['id'];
    var_dump($user_id);
    //die();

	$cart = 0;
	if(isset($_SESSION['cart'])){
		foreach($_SESSION['cart'] as $qty) {
			$cart += $qty;
		}
	}

	if($cart == 0){
		header("location: index.php");
		exit();
	}
 ?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Padauk&display=swap" rel="stylesheet">
</head>

<body>
    <h1>View Cart</h1>

    <div class="sidebar">
        <ul class="cats">
            <li><a href="index.php?cart=<?php echo $cart; ?>">&laquo; Continue Shoping</a></li>
            <!-- <li><a href="clear-cart.php" class="del">&times; Clear Cart</a></li> -->
        </ul>
    </div>

    <div class="main">
        <div class="order-form">
            <h2>Order Now</h2>
            <h3>You will borrow ( <?php echo $cart; ?> ) book<?php  if($cart > 1){echo "s";} ?>.</h3>

            <form action="submit-order.php" method="post">
                <table>
                    <?php $tmp = mysqli_query($conn, "SELECT * FROM tmp_book_items WHERE  user_id = $user_id");  ?>

                    <?php 
							while($tmp_book_id = mysqli_fetch_assoc($tmp)):
							
								 ?>



                    <tr>
                        <li>
                            <label for="bookname">Book Name</label>
                            <input type="text" name="bookname" id="bookname"
                                value="<?php echo $tmp_book_id['tmp_book_title']; ?>  ">

                            <a
                                href="clear-book.php?id=<?php echo $tmp_book_id['tmp_book_id']; ?>"><?php if ($tmp_book_id['id']) { echo "x clear"; }?></a>
                        </li>
                    </tr>

                    <?php endwhile; ?>

                    <table>
                        <?php $user_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE ID = $user_id"));?>

                        <label for="name">Your Name</label>
                        <input type="text" name="name" id="name" value="<?php echo $user_info['name']; ?>"
                            placeholder="<?php echo $user_info['name']; ?>">

                        <label for="email">Email</label>
                        <input type="text" placeholder="<?php echo $user_info['email']; ?>" name="email" id="email"
                            value="<?php echo $user_info['email']; ?>">

                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone">

                        <label for="adress">Address</label>
                        <textarea name="adress" id="address"></textarea>

                        <br><br>
                        <input type="submit" value="Submit Order">

                        <a href="index.php?cart=<?php echo $cart;?>">Continue Shopping</a>

            </form>
        </div>
    </div>

    <div class="footer">
        &copy; <?php echo date("Y") ?>. All right reserved.
    </div>

</body>

</html>