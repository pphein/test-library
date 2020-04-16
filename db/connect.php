<?php 


$db = new mysqli('localhost', 'root', 'pph312php', 'store');

if($db->connect_error){
	die("Connection failed: " .$db->connect_error );
}

 ?>
