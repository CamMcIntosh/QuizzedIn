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
			$userAnswers; $quiz;
			if (isset($_POST)) {
				$userAnswers = $_POST;
				$quiz = $_SESSION['currentQuiz'];
				printHeaderTags($quiz->title." - Answers");
			}		
		?>
	</head>
	<body>
		<?php printNavBar(); ?>
		<main>
			<?php printSignInSignUpForms(); printSpacing(); ?>
			<div class="title">
				<?php echo $quiz->title." - Answers"; ?>
			</div>
			<?php 
				$questions = $quiz->questions;
				for ($i = 0; $i < count($questions); $i++) {
					$questions[$i]->userAns = $userAnswers["q$i"];
				}
				$quiz->questions = $questions;
				$attempt = new QuizAttempt($quiz, $_SESSION['startTime']);
				unset($_SESSION['startTime']); // Unsetting start time so there are no conflicts in the future
				$attempt->gradeQuiz();
				if (isset($_SESSION['login_user'])) {
					$attempt->user = $_SESSION['login_user'];
					addAttemptToDB($attempt);
				}
				for ($i = 0; $i < count($questions); $i++) {
					printCorrectAnswer($questions[$i], $i);
				}
				echo "<br>Final Score: {$attempt->correct}/".count($questions);
				echo "<br><b>{$attempt->score}%</b>"
			?>
		</main>
	</body>
</html>
