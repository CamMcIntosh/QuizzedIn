<!-- I don't think this page is used. Still need to check -->

<?php
    require 'login.php'; // Includes Login Script
    if (isset($_SESSION['login_user'])) {
        header("location: profile.php"); // Redirecting To Profile Page
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<?php printHeaderTags("Sign In"); ?>
	</head>
	<body>
		<?php printNavBar(); printSignInSignOutForms(); ?>
		<h2>
			Sign In 
		</h2>
		<form method="POST" action="">
			Email:<br> <input type="email" name="email"> <br> Password:<br> <input type="password" name="password"> <br> <input type="submit" name="submit" value="Sign In"> 
			<span><?php echo $error; ?></span>
		</form>
		<p>
			<a href="signUp.php">Sign Up</a>
		</p>
	</body>
</html>
