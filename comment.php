<?php 
	 session_start(); 
	 include ("admin/confs/config.php");

	$b_id = $_GET['id'];
	$comment = $_POST['comment'];
	$cmt_sql = "INSERT INTO comments (
			comment_post_ID, comment_date, comment_content
			) VALUES (
			'$b_id', now(), '$comment' 
			) ";
	$commentAdd = mysqli_query($conn, $cmt_sql);

	header("location: index.php");
