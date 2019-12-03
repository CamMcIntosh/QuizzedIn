<?php 
	require './templates.php'; 
	require './functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			$quiz;
			if (isset($_GET['qid'])) {
				$quiz = getQuiz(htmlspecialchars_decode($_GET['qid']));
				printHeaderTags($quiz->title);
			} else {
				header("Location: ./categories.php");
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
			<form>
				<?php 
					printQuizForm($quiz);
				?>
			</form>
		</main>
	</body>
</html>
