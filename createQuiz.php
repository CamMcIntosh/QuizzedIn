<!DOCTYPE html>
<?php require './templates.php'; ?>
<html>
	<head>
		<?php printHeaderTags("Create a Quiz"); ?>
		<script src="functions.js">
		</script>
	</head>
	<body>
		<?php printNavBar(); ?>
		<main>
			<br><br><br><br>
			<?php printSignInSignUpForms(); ?>
			<form action="./addQuestion.php" method="post">
				Name your Quiz:<br> <input type="text" name="title" required><br>
				Choose a Category:<br><input type="text" name="category" required><br><br><br>
				<!-- Printing the from from the templates.php file -->
				<?php printAddQuestionForm(); ?><br>
				<input type="submit" value="Next Question"> 
			</form>
		</main>
	</body>
</html>
