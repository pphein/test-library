<!DOCTYPE html>
<html>

<head>
    <meta utf="8" lang="myan">

    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Padauk&display=swap" rel="stylesheet">
</head>

<body>

    <?php 
			include "confs/config.php";

			$id = $_GET['id'];
			$result = mysqli_query($conn,"SELECT * FROM books WHERE id = $id");
			$row = mysqli_fetch_assoc($result);

		?>
    <h1>Edit Book</h1>
    <ul class="menu">
        <li><a href="book-list.php">Manage Books</a></li>
        <li><a href="cat-list.php">Manage Categories</a></li>
        <li><a href="orders.php">Manage Order</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="../index.php">Home Page</a></li>

    </ul>

    <form action="book-update.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

        <label for="title">Book Title</label>
        <input type="text" name="title" id="title" value="<?php echo $row['title'] ?> ">

        <label for="author">Author</label>
        <input type="text" name="author" id="author" value="<?php echo $row['author'] ?>">

        <label for="summary">Summary</label>
        <textarea name="summary" id="summary"> <?php echo $row['summary'] ?> </textarea>

        <label for="price">Price</label>
        <input type="text" name="price" id="price" value="<?php echo $row['price'] ?>">

        <label for="categories">Category</label>

        <select name="category_id" id="categories">

            <option value="0">-- Choose --</option>

            <?php 
					include "confs/config.php";
					$categories = mysqli_query($conn,"SELECT id, name FROM categories");
					while($cat = mysqli_fetch_assoc($categories)):
				 ?>
            <option value="<?php echo $cat['id'] ?>" <?php if($cat['id'] == $row['category_id']) echo "selected"; ?>>

                <?php echo $cat['name']; ?>

            </option>

            <?php endwhile; ?>

        </select>

        <br><br>


        <label for="cover">Change Cover</label>
        <input type="file" name="cover" id="cover">


        <label for="book">Book</label>
        <input type="file" name="book" id="book">
        <br><br>

        <br><br>
        <input type="submit" value="Update Book">
        <a href="book-list.php">Back</a>

    </form>

</body>

</html>