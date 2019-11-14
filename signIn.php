    <?php
        include('login.php'); // Includes Login Script
        if(isset($_SESSION['login_user'])) {
            header("location: profile.php"); // Redirecting To Profile Page
        }
    ?>

<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <h2>Sign In</h2>
        <form method="POST" action="">
        Email:<br>
        <input type="email" name="email"><br>
        Password:<br>
        <input type="password" name="password"><br>
        <input type="submit" value="Sign In">
        <span><?php echo $error; ?></span>
    </form>

    <p><a href="signUp.php">Sign Up</a></p>
    
    </body>

</html>