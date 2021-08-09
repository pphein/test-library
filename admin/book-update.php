<?php 

	include "confs/config.php";

	$id = $_POST['id'];
	$title = $_POST['title'];
	$author = $_POST['author'];
	$summary = $_POST['summary'];
	$price = $_POST['price'];
	$category_id = $_POST['category_id'];

	

	

	$result = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
	
	$coverfile = 'covers/'.$row['title'].'.png';

	
	$bookfile = 'books/'.$row['title'].'.pdf';

	$cover = $_FILES['cover']['name'];
	$tmp = $_FILES['cover']['tmp_name'];	
	if($cover){		
		unlink($coverfile);
		move_uploaded_file($tmp, "covers/$title.png");		
	}else{
		$newPhotoName = 'covers/'.$title.'.png';
		rename($coverfile, $newPhotoName);
	}

	$book = $_FILES['book']['name'];
	$tmp = $_FILES['book']['tmp_name'];
	if($book){
		unlink($bookfile);
		move_uploaded_file($tmp, "books/$title.pdf");
	}else{		
		$newBookName = 'books/'.$title.'.pdf';
		rename($bookfile, $newBookName);

	}	

	
			
		$sql = "UPDATE books SET title='$title', author='$author',
				summary='$summary', price='$price', category_id='$category_id',
				cover='$title.png',book='$title.pdf', modified_date=now() WHERE id=$id";
	
		
	mysqli_query($conn,$sql);

	header("location: book-list.php");

 ?>