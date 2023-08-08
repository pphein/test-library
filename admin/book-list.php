<?php include ("confs/auth.php") ?>
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

    <h1>Book List</h1>
    <ul class="menu">
        <li><a href="book-list.php">Manage Books</a></li>
        <li><a href="cat-list.php">Manage Categories</a></li>
        <li><a href="orders.php">Manage Order</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="../index.php">Home Page</a></li>
    </ul>
    <a href="book-new.php" class="new">New Book</a>
    <form action="search.php" method="get">

        <label>

            search
            <input type="text" name="keywords" autocomplete="off">


        </label>

        <input type="submit" value="search">

    </form>

    <?php 
    include "confs/config.php";

	$result = mysqli_query($conn, "SELECT * FROM books ORDER BY `id` DESC " );



    if(!isset($_GET['page'])){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }

    $books_per_page = 3;
    $page_first_result = ($page - 1) * $books_per_page;

    $number_of_result = mysqli_num_rows($result);
    $number_of_page = ceil($number_of_result/$books_per_page);

$result = mysqli_query($conn, "SELECT * FROM books LIMIT ".$page_first_result.",".$books_per_page);



	?>

    <ul class="books">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <li>
            <img src="covers/<?php if($row['cover']){ echo $row['cover'];}else{echo "a.png";} ?>" alt="" align="right"
                height="140">

            <b> <?php echo $row['title'] ?> </b>
            <i>by <?php echo $row['author'] ?> </i>
            <span> $<?php echo $row['price'] ?> </span>
            <p> <?php echo $row['summary'] ?> </p>

            [ <a href="book-del.php?id=<?php echo $row['id']; ?>">del</a> ]


            [ <a href="book-edit.php?id=<?php echo $row['id']; ?>">edit</a> ]
            [<a href="books/<?php if($row['book']){echo $row['book'];}else{echo "a.pdf";} ?>"><i>read</i></a>]
        </li>
        <?php endwhile; ?>
    </ul>

    <ul class="paginate">
        <ul>

            <?php
        for($page=1; $page<=$number_of_page; $page++){
            echo '<a href="book-list.php?page='.$page.'"><li>'.$page.'</li></a>';
        }
    ?>
        </ul>
    </ul>

</body>

</html>