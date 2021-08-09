<?php 

	include "confs/config.php";
	$id = $_GET['id'];
	
	$result = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
	

	$file = 'covers/'.$row['cover'];
	$book = 'books/'.$row['title'].'.pdf';
	//echo $book;
	//die();
	unlink($file);
	unlink($book);
	

	/* if(file_exists($file)){
		echo "not delete";
	}else{
		echo "deleted";
	}
 */
	//die();

	$sql = "DELETE FROM books WHERE id = $id";

	mysqli_query($conn, $sql);

	header("location: book-list.php");

 ?>