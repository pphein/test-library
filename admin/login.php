
<?php 
	session_start();	 
	include ("confs/config.php");

	$name = $_POST['name'];
	$password = $_POST['password'];

	if($name == 'root' && $password == 'pph312php'){
		$_SESSION['auth'] = true;
		header("location: book-list.php");
	}else{
		header("location: index.php");
	}
 ?>