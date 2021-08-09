<?php 
	session_start();
	include ("admin/confs/config.php");

    $name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$adress = $_POST['adress'];

	$user_id = $_SESSION['id'];
  $tmp_books = mysqli_query($conn, "SELECT * FROM tmp_book_items WHERE  user_id = $user_id");
  

  //var_dump($tmp_books);

  foreach($tmp_books as $tmp_book){
	  $tmp_id = $tmp_book["id"];
	  $tmp_book_id = $tmp_book["tmp_book_id"];
	  $tmp_book_title = $tmp_book["tmp_book_title"];
	  $user_id = $tmp_book["user_id"];

      $order = mysqli_query($conn, "INSERT INTO orders
(name, email, phone, adress, status, created_date, modified_date)
VALUES ('$name', '$email', '$phone', '$adress', 0, now(), now() ) ");

$order_id = mysqli_insert_id($conn);

	  mysqli_query($conn, "INSERT INTO order_items
(book_id,  bookname, user_id, order_id) VALUES ('$tmp_book_id',  '$tmp_book_title', '$user_id', '$order_id') ");
	  

  }

  
  

  

















$order_id = mysqli_insert_id($conn);

/* foreach ($_SESSION['cart'] as $id => $qty) {
$books = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");

$title = mysqli_fetch_assoc($books);
$bookname = $title['title']; */




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