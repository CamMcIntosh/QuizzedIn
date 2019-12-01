<?php 
	require './templates.php'; 
	require './functions.php';
	require 'classes.php';
    session_start(); 
?>
<!DOCTYPE html>
<html>
	<head>
		<?php printHeaderTags("Add a Question"); ?>
	</head>
	<body>
		<?php printNavBar(); ?>
		<main>
			<br><br><br><br>
			<?php
				// Finishing pringting UI
				printSignInSignUpForms();
				
				// Storing POST vars
    			if ($_SERVER["REQUEST_METHOD"] == "POST") {
    				echo var_dump($_POST);
    				// Connecting to database and creating a quiz if one isn't in SESSION
	    			$conn = connectToDB();
	    			if (!isset($_SESSION['quiz'])) {
    					$quiz = new Quiz(testInput($_POST['title']));
						$quiz->id = addQuizToDB($conn, $quiz);
						$_SESSION["quiz"] = $quiz;
	    			}
	    			
	    			// Getting quiz from session and creating a question object to add to database
    				$quiz = $_SESSION['quiz'];
    				$category = testInput($_POST['category']);
    				$type = testInput($_POST['type']);
    				$qText = testInput($_POST['q1']);
	    			$rghtAns = testInput($_POST['a1']);
    				$wrngAns = [];
    				for ($i = 2; $i <= 4; $i++) {
    					if (!empty($_POST["a".$i])) {
    						array_push($wrngAns, testInput($_POST["a".$i]));
    					}
    				}
	    			$question = new Question($category, $type, $qText, $rghtAns, $wrngAns);
    				$question->id = addQuestionToDB($conn, $question);
    				
    				// Adding question to quiz and storing in database
    				addQuizQToDB($conn, $quiz, $question);
    				array_push($quiz->questions, $question);
    				$_SESSION["quiz"] = $quiz;

					// Disconnecting 
					disconnectFromDB($conn);
				}
   			?>
   			<form action="./addQuestion.php" method="post">
				<!-- Printing the from from the templates.php file -->
				<?php printAddQuestionForm(); ?><br>
				<input type="submit" value="Next Question"> 
			</form>
   		</main>
	</body>
</html>