<?php
	include ("admin/confs/config.php");
	
	$name = $_POST['name'];	
	$email = $_POST['email'];	
	$password = md5($_POST['password']);
	$check = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
	$result = mysqli_fetch_assoc($check);

	if(isset($result)){
		session_start();
		$_SESSION['msg'] = "Your Email has been registered! Try with Another Email!";
		header("location: signup.php");
	}else{
		$sql = mysqli_query($conn, "INSERT INTO user ( name , email , password, user_registered ) VALUES ('$name', '$email', '$password',now())");		
	}
	if($sql){
		$check = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
		$result = mysqli_fetch_assoc($check);
		$user_id = $result['ID'];

		session_start();
		if($result['admin']==1){
			$_SESSION['admin'] = true;
		}
		$_SESSION['auth'] = true;
		$_SESSION['id']	= 	$user_id;
		$_SESSION['email'] = $email;
		$_SESSION['name'] = $name;
		header("location: index.php");
	}