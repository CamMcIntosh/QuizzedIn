<!-- This page should never be used -->

<!DOCTYPE html>
<html>
	<head>
		<?php printHeaderTags("QuizzedIn"); ?>
	</head>
	<body>
		<?php printNavBar(); printSignInSignUp(); ?>
		<h2>
			Sign Up
		</h2>
		<form method="POST" action="./connect.php">
			Name:<br> <input type="text" name="name"><br> Username:<br> <input type="text" name="username"><br> Email:<br> <input type="email" name="email"><br> Password:<br> <input type="password" name="password"><br> <input type="submit" value="Submit"> <input type="reset" value="Reset"> 
		</form>
		<p>
			<a href="./signIn.php">Log In</a>
		</p>
	</body>
</html>
