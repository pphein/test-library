<!DOCTYPE html>
<meta utf="8" lang="myan">
<html>

<head>
    <title>Library</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Padauk&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <ul class="menu">
            <center>
                <a href="index.php">Library</a>
            </center>
        </ul>
    </div>

    <div class="content">
        <h1>You need to login</h1>
        <form action="login.php" method="post">
            <span><?php session_start(); echo $_SESSION['error']; unset($_SESSION['error']); ?></span>
            <label for="email">Email</label>
            <input type="text" name="email">
            <label for="password">Password</label>
            <input type="password" name="password">
            <br><br>
            <input type="submit" value="Login">
        </form>
    </div>

    <div class="footer">
        <center>
            <h3>Copyright <?php echo date('Y'); ?></h3>
        </center>
    </div>
</body>

</html>