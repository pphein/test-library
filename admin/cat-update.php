<?php 

	include ("confs/config.php");

	$id = $_POST['id'];
	$name = $_POST['name'];
	$remark = $_POST['remark'];

	$sql = "UPDATE Categories SET name='$name', remark='$remark', created_date=now(), modified_date=now() WHERE id=$id";

	mysqli_query($sql);

	header("location: cat-list.php");

 ?>
