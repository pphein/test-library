<?php 


$db = new mysqli('localhost', 'root', '', 'library');

if($db->connect_error){
	die("Connection failed: ");
}

 ?>