<?php 

	include "confs/config.php";

	$title = $_POST['title'];
	$author = $_POST['author'];
	$summary = $_POST['summary'];
	$price = $_POST['price'];
	$category_id = $_POST['category_id'];

	$cover = $_FILES['cover']['name'];
	$tmp = $_FILES['cover']['tmp_name'];

	if($cover) {
		move_uploaded_file($tmp, "books/$title.png");
	}

	//ဖိုင်နာမည်တူမတူစစ်ပြီး ရှိရင် copy- ခံပြီးမှ upload
	/*	if (file_exists("covers/".$cover)) {
			
				$cover = "copy-".$cover;
			move_uploaded_file($tmp, "covers/$cover");
		}else{
		move_uploaded_file($tmp, "covers/$cover");
	}
	*/

	$book = $_FILES['book']['name'];
	$tmp = $_FILES['book']['tmp_name'];

	if($book) {
		move_uploaded_file($tmp, "books/$title.pdf");
	}

	$sql = "INSERT INTO books (
			title, author, summary, price, category_id, 
			cover, book, created_date,  modified_date
			) VALUES (
			'$title', '$author', '$summary', '$price', '$category_id', 
			'$cover', '$book', now(), now()
			) ";

	mysqli_query($conn, $sql);

	header("location: book-list.php");

 ?>