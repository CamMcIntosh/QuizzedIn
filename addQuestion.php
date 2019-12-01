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
		<?php
    		if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    		$conn = connectToDB();
    			if (!isset($_SESSION['quiz'])) {
    				$quiz = new Quiz(testInput($_POST['title']));
					$query = "INSERT INTO quizzes (title) VALUES ('".$quiz->title."')";
					if ($conn->query($query)) {
						$query = "SELECT id FROM quizzes WHERE title=?";
						$stmt = $conn->prepare($query);
        			    $stmt->bind_param("s", $quiz->title);
			            $stmt->execute();
			            $stmt->store_result();
			            $stmt->bind_result($id);
			            $stmt->fetch();
			            $quiz->qID = $id;
					}
					$_SESSION["quiz"] = $quiz;
    			} else {
    				$quiz = $_SESSION['quiz'];
    			}
    			disconnectFromDB($conn);
    			echo "<br><br><br><br>".print_r($quiz, true);
   			}
   		?>
	</body>
</html>
