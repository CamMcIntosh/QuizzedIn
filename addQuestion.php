<?php 
	// Required files
	require_once './templates.php'; 
	require_once './functions.php';
	require_once 'classes.php'; // This MUST come before the session_start() call so that the objects will be serialized correctly
    session_start(); 
?>
<!DOCTYPE html>
<html>
	<head>
		<?php printHeaderTags("Add a Question"); // Printing header from function ?>
	</head>
	<body>
		<?php printNavBar(); // Printing nav bar from function ?>
		<main>
			<?php printSpacing(); ?>
			<?php
				// Finishing pringting UI
				printSignInSignUpForms();
				
				// Storing POST vars
    			if ($_SERVER["REQUEST_METHOD"] == "POST") {
    				// Connecting to database and creating a quiz if one isn't in SESSION
	    			if (!isset($_SESSION['quiz'])) {
    					$_SESSION['quiz'] = new Quiz(testInput($_POST['title']));
						$_SESSION['category'] = testInput($_POST['category']);
	    			}
	    			
	    			// Getting quiz from session and creating a question object to add to database
    				$_SESSION["quiz"] = parseQuizQuestion($_SESSION['quiz'], $_SESSION['category'], $_POST);
 				}
   			?>
   			<form action="./addQuestion.php" method="post">
				<?php printAddQuestionForm(); // Printing form from function ?><br>
				<input type="submit" value="Add Another Question">
				<input type="submit" value="Submit Quiz" formaction="./finalizeQuiz.php">
			</form>
   		</main>
	</body>
</html>