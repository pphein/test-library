<?php 
	session_start();	 
	include ("confs/config.php");

	$name = $_POST['name'];
	$password = $_POST['password'];

	if($name == 'root' && $password == 'root'){
		$_SESSION['auth'] = true;
		$_SESSION['admin'] = true;

		header("location: book-list.php");
	}else{
		header("location: index.php");
	}
 ?>