<?php 


// $db = new mysqli('ec2-44-207-126-176.compute-1.amazonaws.com', 'smukvhrxaqmwmj', 'c28ec57244fcf853dd8fa32c9f52406e0471dceae9fc33832e6659ca95496810', 'dfeeq94jnrlerp');
$db = new mysqli('localhost', 'root', 'root', 'pphlibrary');
if($db->connect_error){
	die("Connection failed: ");
}

 ?>