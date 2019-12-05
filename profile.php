<?php
	session_start();
	// Requiring needed php files
	require_once './templates.php';
    require_once './session.php';
    if (!isset($_SESSION['login_user'])){
        header("location: index.php"); // Redirecting To Home Page
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<?php printHeaderTags("Your Home Page"); ?>
	</head>
	<body>
		<?php printNavBar(); printSignInSignUpForms(); ?>
		<div id="profile">
			<br><br><br><br> 
			<b id="welcome">
				Welcome : 
				<i><?php echo $email;//$login_session; //This won't be set by session.php becuase the var will scope out. ?></i>
			</b> <br><br>
			<b id="logout">
				<a href="./logout.php">Log Out</a>
			</b>
			<h3>Past Quizzes</h3>
			<br>
			<h3>Created Quizzes</h3>
		</div>
	</body>
</html>
