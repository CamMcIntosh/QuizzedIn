<!DOCTYPE html>
<?php require './templates.php'; ?>
<html>
<head>
	<title>QuizzedIn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./styling.css" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script>
	<script src="functions.js">
	</script>
</head>
<body>
	<?php printNavBar(); ?>
<main> 
	<?php printSignInSignUpForms(); ?>
<h1>
	Categories
</h1>
<ul style="list-style-type: none;">
	<div id="topics">
	</div>
<!-- Categories automatically uploaded via API-->
</ul>
</main> 
</body>
</html>
