<?php
session_start();
unset($_SESSION['auth']);
unset($_SESSION['id']);
session_destroy();
header("location: index.php");
?>