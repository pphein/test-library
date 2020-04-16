 
 <?php 

include ("confs/config.php");

$name = $_POST['name'];
$remark = $_POST['remark'];
 
$sql = "INSERT INTO Categories (name, remark, created_date, modified_date)
		VALUES ('$name', '$remark', now(), now() )";

//die(var_dump($sql));

mysqli_query($conn, $sql);

header("location: cat-list.php");

 ?>
