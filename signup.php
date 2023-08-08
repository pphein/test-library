<!DOCTYPE html>
<meta utf="8" lang="myan">
<html>
<head>
    <script>
        function validate() {
            var namecheck = /^[_A-Za-z0-9]+$/
            var emailcheck = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
            if (document.forms.registration.name.value == "") {
                alert("You must provide your name.");
                return false;
            } else if (!document.forms.registration.name.value.match(namecheck)) {
                alert("Invalid name");
                return false;
            } else if (document.forms.registration.email.value == "") {
                alert("You must provide an email adddress.");
                return false;
            } else if (!document.forms.registration.email.value.match(emailcheck)) {
                alert("Invalid email type");
                return false;
            } else if (document.forms.registration.password.value == "") {
                alert("You must provide a password.");
                return false;
            } else if (document.forms.registration.password.value.length < 4) {
                alert("Your name is too short. It must be at least 4 characters.");
                return false;
            } else if (document.forms.registration.password.value != document.forms.registration.confirmPassword.value) {
                alert("You must provide the same password twice.");
                return false;
            } else if (!document.forms.registration.agreement.checked) {
                alert("You must agree to our terms and conditions.");
                return false;
            }
            return true;
        }
    </script>

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
                <a href="index.php">Welcome To Library</a>
            </center>
        </ul>
    </div>
    <div class=main-body>
        <center>
            <div class="content">
                <h1>Welcome User, Sign Up here:</h1>
                <form action="user.php" id="registration" method="post" onsubmit="return validate();">
                    <label for="name">Nick Name</label>
                    <input type="text" name="name" placeholder="John123 (only letters and numbers)" minlength="3">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="example@email.com"><br>
                    <span style="color: red;"><?php session_start(); echo $_SESSION['msg']; session_destroy(); ?></span>
                    <label for="password">Password ( at least 4 characters )</label>
                    <input type="password" name="password" minlength="4">
                    <label for="confirmPassword">Re-type Password</label>
                    <input type="password" name="confirmPassword">
                    <br><br>
                    <br><br>
                    <input type="submit" value="Sign Up">
                </form>
            </div>
        </center>
    </div>
    <div class="footer">
        <center>
            <h3>Copyright <?php echo date('Y'); ?></h3>
        </center>
    </div>
</body>
</html>