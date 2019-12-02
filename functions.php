<?php
/*-------------------- Debugging Funtions --------------------*/
// Does a var_dump but formatted all purdy-like
function vardump($var) {
	echo "<pre>";
	var_dump($var);
	echo "<pre>";
}

/*-------------------- SQL Funtions --------------------*/

// Database info stored here so it only needs to be changed in one place
function getDBInfo () {
	return array("host"=>"localhost", "username"=>"id11205838_db", "password"=>"database", "name"=>"id11205838_quizzedin");
}

// Creates connection to database
function connectToDB() {
	$db = getDBInfo();
	return new mysqli ($db["host"], $db["username"], $db["password"], $db["name"]);
}

// Disconnects from database
function disconnectFromDB ($conn) {
	$conn->close();
}

// Sanitizes input for SQL queries
function testInput ($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

/*-------------------- Login/Signup Funtions --------------------*/

/*------ This func should replace connect.php ------*/
// Adds a user to the database
function addUserToDB () {
	// Sign Up info stored in variables
	$user = array("name"=>filter_input(INPUT_POST,'name'),
		"username"=>filter_input(INPUT_POST, 'username'), 
		"email"=>filter_input(INPUT_POST, 'email'),
		"password"=>filter_input(INPUT_POST, 'password'));
	$flag = false;
	$errorString = "Empty field(s): ";
	
	// Checking for empty strings and flagging if found
	foreach ($user as $key => $val) {
		if (empty($val)) {
			$flag = true;
			$errorString += $val." ";
		}
	}
	if ($flag) { die($errorString); }
	unset($val); // Doing this cause the internet said to

	// Create connection
	$conn = connectToDB();

	// If there is an error connecting to the database
	if (mysqli_connect_error()) {
		die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
	} else {
		// Inserts the User's Info into the 'users' table in the database
		$sql = "INSERT INTO users (name, username, email, password) values ('".$user["name"]."', '".$user["username"]."', '".$user["email"]."', '".$user["password"]."')";
    	if ($conn->query($sql)) {
			header("location: ./index.php"); // Redirecting To Profile Page
			echo "You have sucessfully signed up!";
	    } else { 
    		echo "Error: ".$sql."\n".$conn->error;
    	}
    	
    	// Close connection
    	disconnectFromDB($conn);
	}
}   

/*-------------------- Quiz/Question Funtions --------------------*/

// Takes vars passed in from $_POST and $_SESSION and turns them into objects
function parseQuizQuestion ($quiz, $cat, $postInfo) {
	$type = testInput($postInfo['type']);
    $qText = testInput($postInfo['q1']);
	$rghtAns = testInput($postInfo['a1']);
    $wrngAns = [];
    for ($i = 2; $i <= 4; $i++) {
    	if (!empty($postInfo["a".$i])) {
    		array_push($wrngAns, testInput($postInfo["a".$i]));
    	}
    }
	$question = new Question($cat, $type, $qText, $rghtAns, $wrngAns);
    array_push($quiz->questions, $question);
   
	return $quiz;
}

//  Adds a quiz object to the database and returns the ID
function addQuizToDB($conn, $quiz, $user) {
	$query = "INSERT INTO quizzes (title, creator) VALUES ('".$quiz->title."', '".$user."')";
	if ($conn->query($query)) {
		$query = "SELECT id FROM quizzes WHERE title=? ORDER BY id DESC LIMIT 1";
		$stmt = $conn->prepare($query);
        $stmt->bind_param("s", $quiz->title);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id);
		$stmt->fetch();
		return $id;
	} else {
		die("Died in addQuizToDB");
	}
}

// Adds a question object to the database and returns the ID
function addQuestionToDB($conn, $question) {
	$query = "INSERT INTO questions (category, type, question, correct_answer, wrong_answer_1, wrong_answer_2, wrong_answer_3) VALUES ('".$question->category."', '".$question->type."', '".$question->qText."', '".$question->rghtAns."', '".(isset($question->wrngAns[0]) ? $question->wrngAns[0] : NULL)."', '".(isset($question->wrngAns[1]) ? $question->wrngAns[1] : NULL)."', '".(isset($question->wrngAns[2]) ? $question->wrngAns[2] : NULL)."')";
	if ($conn->query($query)) {
		$query = "SELECT id FROM questions WHERE question=? ORDER BY id DESC LIMIT 1";
		$stmt = $conn->prepare($query);
        $stmt->bind_param("s", $question->qText);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id);
		$stmt->fetch(); // Populates the params in bind_result()
		return $id;
	} else {
		die("Died in addQuestionToDB");
	}
}

// Adds the quiz/question pair to the database
// This is the equivalent to pushing the question onto the quiz's question array in our database
function addQuizQToDB ($conn, $quiz, $question) {
	$query = "INSERT INTO quiz_questions (quizID, questionID) VALUES ('".$quiz->id."', '".$question->id."')";
	if (!$conn->query($query)) {
		die("Died in addQuizQToDB");
	} else {
		return true;
	}
}

// This is here cause I need it. Don't delete it unless it's in a function somewhere
$removeAllTestDataFromDB = "DELETE from quizzes where id > 24; alter table quizzes AUTO_INCREMENT = 25; delete from questions where id > 2641; alter table questions AUTO_INCREMENT = 2641; delete from quiz_questions where questionID > 2641;";
$getQuizQuestions = "SELECT qz.id, qs.* FROM questions qs INNER JOIN quiz_questions qq ON qs.id = qq.questionID INNER JOIN quizzes qz ON qz.id = qq.quizID WHERE qz.id = 1;";

/*-------------------- SQL Funtions --------------------*/

// Prints the categories into the categories.php page
function printCategories () {
	// Connecting to database
	$conn = connectToDB();
	$query = "SELECT category FROM categories";
	if ($stmt = $conn->prepare($query)) {
		$stmt->execute();
		$stmt->bind_result($cat);
		while ($stmt->fetch()) {
			echo "<a href='./quizzes.php?category=".htmlspecialchars($cat)."'>".$cat."</a><br>";
		}
		$stmt->close();
	}
	disconnectFromDB($conn);
}

?>
