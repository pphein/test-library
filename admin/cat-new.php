<!DOCTYPE html>
<html>

<head>
    <meta utf="8" lang="myan">

    <title>New Category</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Padauk&display=swap" rel="stylesheet">
</head>

<body>

    <h1>New Category</h1>
    <ul class="menu">
        <li><a href="book-list.php">Manage Books</a></li>
        <li><a href="cat-list.php">Manage Categories</a></li>
        <li><a href="orders.php">Manage Order</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="../index.php">Home Page</a></li>

    </ul>


    <?php include("confs/auth.php"); 
				include("confs/config.php"); ?>

    <form action="cat-add.php" method="post">

        <label for="name">Category Name</label>
        <input type="text" name="name" id="name">

        <label for="remark">Remark</label>
        <textarea name="remark" id="remark"></textarea>
        <br><br>

        <input type="submit" value="Add Category">

    </form>

</body>

</html>