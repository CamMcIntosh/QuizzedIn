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
				
    			<br>
    			<b>Question 2:</b> Who patented a steam engine that produced continuous rotary motion? <br>
				<input type="radio" name="q2" value="True" checked> True <br>
    			<input type="radio" name="q2" value="False"> False <br>

			
				<?php 
					//printQuizForm($quiz);
				?>
			</form>
		</main>
	</body>
</html>
