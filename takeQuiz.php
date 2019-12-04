<?php 
	require_once './templates.php'; 
	require_once './functions.php';
	require_once './classes.php';
	session_start();
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
			<form method="post" action="./scoreQuiz.php">
				<?php 
					$_SESSION['currentQuiz'] = $quiz;
					$_SESSION['startTime'] = date(DATE_ATOM);
					printQuizForm($quiz);
				?>
			</form>
		</main>
	</body>
</html>
