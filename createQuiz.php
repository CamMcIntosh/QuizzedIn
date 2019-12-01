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
			<?php printSignInSignUpForms(); ?>
			<script id="answerTemplate" type="text/html">
			</script>
			<form action="./addQuestion.php" method="post">
				Name your Quiz:<br> <input type="text" name="name" required><br>
				Choose a Category:<br><input type="text" name="category" required><br><br><br> 
				<!-- Printing the from from the templates.php file -->
				<?php printAddQuestionForm(); ?><br>
				<input type="submit" value="Next Question"> 
			</form>
			<!-- Code for this still needs to be completed -->
			<!-- We need to add code somewhere to pull the data out of the form -->
		</main>
	</body>
</html>
