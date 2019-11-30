<!DOCTYPE html>
<?php require './templates.php'; require './functions.php'; ?>
<html>
	<head>
<?php printHeaderTags("Add a Question"); ?>
	</head>
	<body>
<?php printNavBar(); ?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$temp = test_input($_POST['a1']);
        echo "<br><br><br><h1>{$temp}</h1>";
    }
	</body>
</html>
