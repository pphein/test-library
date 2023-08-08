 <?php 
	 session_start();	 
	 include ("admin/confs/config.php");

	 $id = $_GET['id'];
	 $user_id = $_GET['user_id'];

	$check = mysqli_query($conn, "SELECT * FROM tmp_book_items WHERE tmp_book_id = $id");
	$check_book = mysqli_fetch_assoc($check);
	
	if($check_book){
		echo "Already Chosen";
		
		
	}else{
		$_SESSION['cart'][$id]++;

		$tmp = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
		

		$tmp_book = mysqli_fetch_assoc($tmp);

		$tmp_title = $tmp_book['title'];
		$tmp_id = $tmp_book['id'];

		mysqli_query($conn, "INSERT INTO tmp_book_items 
					(tmp_book_id, tmp_book_title, user_id) VALUES ('$tmp_id', '$tmp_title', '$user_id')");
	}

	 
?>
 <?php

	

	

	

	header("location: index.php");
  ?>