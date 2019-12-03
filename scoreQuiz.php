<?php 
	require './templates.php'; 
	require './functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			if (isset($_POST)) {
				vardump($_POST);
			}		
		?>
	</head>
	<body>
		<?php printNavBar(); ?>
		<main>
			<?php printSignInSignUpForms(); printSpacing(); ?>
			<div class="title">
				<?php echo $quiz->title; ?>
			</div>
			<form method="post" action="./gradeQuiz.php">
				<?php 
					printQuizForm($quiz);
				?>
			</form>
		</main>
	</body>
</html>
