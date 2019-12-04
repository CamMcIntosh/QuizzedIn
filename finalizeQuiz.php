<?php
// MUST CLEAR OUT THE QUIZ SESSION VARIABLE ON THIS PAGE
	require_once './templates.php'; 
	require_once './functions.php';
	require_once 'classes.php'; // This MUST come before the session_start() call so that the objects will be serialized correctly
    session_start(); 
?>
<!DOCTYPE html>
<html>
	<head>
		<?php printHeaderTags("Submit Quiz"); // Printing header from function ?>
	</head>
	<body>
		<?php printNavBar(); // Printing nav bar from function?>
		<main>
			<?php printSpacing() ?>
			<?php
				// Finishing pringting UI
				printSignInSignUpForms();
				
				// Storing POST vars
    			if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    			// Don't need to check if $_SESSION['quiz'] exists because the only way to get to this page is from addQuestion
	    			// Getting quiz from session and creating a question object to add to database
	    			$cat = $_SESSION['category'];
    				$quiz = parseQuizQuestion($_SESSION['quiz'], $cat, $_POST);
    				unset($_SESSION["quiz"]); // Destroying quiz var in session

					// Connecting to database
	    			$conn = connectToDB();
					// Adding quiz and all questions to database
					$quiz->id = addQuizToDB($conn, $quiz, $cat, (isset($_SESSION['login_user']) ? $_SESSION['login_user'] : NULL));
					foreach ($quiz->questions as $q) {
						$q->id = addQuestionToDB($conn, $q);
						addQuizQToDB($conn, $quiz, $q);
					}
					disconnectFromDB($conn); // Disconnecting 
					
					vardump($quiz);
				}
   			?>
   		</main>
	</body>
</html>