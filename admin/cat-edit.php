<!DOCTYPE html>
<html>

<head>
    <meta utf="8" lang="myan">

    <title>Edit Category</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Padauk&display=swap" rel="stylesheet">
    <style>
    form label {
        display: block;
        margin-top: 8px;
    }
    </style>
</head>

<body>

    <h1>Edit Category</h1>
    <ul class="menu">
        <li><a href="book-list.php">Manage Books</a></li>
        <li><a href="cat-list.php">Manage Categories</a></li>
        <li><a href="orders.php">Manage Order</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="../index.php">Home Page</a></li>

    </ul>
    <?php 

			include "confs/config.php";

			$id = $_GET['id'];
			$result = mysqli_query("SELECT * FROM Categories WHERE id=$id");
			$row = mysqli_fetch_assoc($result);

		 ?>

    <form action="cat-update.php" method="post">

        <input type="hidden" name="id" value=" <?php echo $row['id']; ?> ">

        <label for="name">Category Name</label>
        <input type="text" name="name" id="name" value=" <?php echo $row['name']; ?> ">

        <label for="remark">Remark</label>
        <textarea name="remark" id="remark"><?php echo $row['remark']; ?></textarea>

        <br><br>
        <input type="submit" value="Update Category">

    </form>

</body>

</html>