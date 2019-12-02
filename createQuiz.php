<?php require './templates.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<?php printHeaderTags("Create a Quiz"); ?>
	</head>
	<body>
		<?php printNavBar(); ?>
		<main>
			<?php printSpacing(); ?>
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
