<?php include ("confs/auth.php") ?>

<!DOCTYPE html>
<html>

<head>
    <meta utf="8" lang="myan">

    <title>Category Lists</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Padauk&display=swap" rel="stylesheet">
</head>

<body>

    <h1>Category List</h1>
    <ul class="menu">
        <li><a href="book-list.php">Manage Books</a></li>
        <li><a href="cat-list.php">Manage Categories</a></li>
        <li><a href="orders.php">Manage Order</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="../index.php">Home Page</a></li>

    </ul>

    <a href="cat-new.php" class="new">New Category</a>

    <?php
			include ("confs/config.php");
			$result = mysqli_query($conn, "SELECT * FROM categories");
		 ?>
    <ul>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <li title=" <?php echo $row['remark'] ?> ">
            [ <a href="cat-del.php?id=<?php echo $row['id']; ?> " class="del">del</a> ]
            [ <a href="cat-edit.php?id=<?php echo $row['id']; ?> " class="edit">edit</a> ]
            <?php echo $row['name'] ?>
        </li>
        <?php endwhile; ?>
    </ul>
</body>

</html>