<?php
/*-------------------- SQL Funtions --------------- -----*/
// For sanitizing SQL queries
function getDBInfo () {
	return array("host"=>"localhost", "username"=>"id11205838_db", "password"=>"database", "name"=>"id11205838_quizzedin");
}

function connectToDB() {
	$db = getDBInfo();
	return new mysqli ($db["host"], $db["username"], $db["password"], $db["name"]);
}

function disconnectFromDB ($conn) {
	$conn->close();
}

function testInput ($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

/*-------------------- Login/Signup Funtions --------------------*/
function addUserToDB () {
	//Sign Up info stored in variables
	$user = array("name"=>filter_input(INPUT_POST,'name'),
		"username"=>filter_input(INPUT_POST, 'username'), 
		"email"=>filter_input(INPUT_POST, 'email'),
		"password"=>filter_input(INPUT_POST, 'password'));
	$flag = false;
	$errorString = "Empty field(s): ";
	
	foreach ($user as $key => $val) {
		if (empty($val)) {
			$flag = true;
			$errorString += $val." ";
		}
	}
	if ($flag) { die($errorString); }
	unset($val); //Doing this cause the internet said to

	//Create connection
	$conn = connectToDB();

	//If there is an error connecting to the database
	if (mysqli_connect_error()) {
		die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
	} else {
		//Inserts the User's Info into the 'users' table in the database
		$sql = "INSERT INTO users (name, username, email, password) values ('".$user["name"]."', '".$user["username"]."', '".$user["email"]."', '".$user["password"]."')";
    	if ($conn->query($sql)) {
			header("location: ./index.php"); // Redirecting To Profile Page
			echo "You have sucessfully signed up!";
	    } else { 
    		echo "Error: ". $sql ."\n". $conn->error;
    	}
    	$conn->close(); //close connection
	}
}   

/*-------------------- Quiz/Question Funtions --------------------*/
function addQuizToDB($conn, $quiz) {
	$query = "INSERT INTO quizzes (title) VALUES ('".$quiz->title."')";
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

function addQuestionToDB($conn, $question) {
	$query = "INSERT INTO questions (category, type, question, correct_answer, wrong_answer_1, wrong_answer_2, wrong_answer_3) VALUES ('".$question->category."', '".$question->type."', '".$question->qText."', '".$question->rghtAns."', '".$question->wrngAns[0]."', '".(isset($question->wrngAns[1]) ? $question->wrngAns[1] : NULL)."', '".(isset($question->wrngAns[2]) ? $question->wrngAns[2] : NULL)."')";
	if ($conn->query($query)) {
		$query = "SELECT id FROM questions WHERE question=? AND wrong_answer_1=?";
		$stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $question->qText, $question->wrngAns[0]);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id);
		$stmt->fetch();
		return $id;
	} else {
		die("Died in addQuestionToDB");
	}
}

function addQuizQToDB ($conn, $quiz, $question) {
	$query = "INSERT INTO quiz_questions (quizID, questionID) VALUES ('".$quiz->id."', '".$question->id."')";
	if (!$conn->query($query)) {
		die("Died in addQuizQToDB");
	}
}


$temp = "SELECT qz.id, qs.* FROM questions qs INNER JOIN quiz_questions qq ON qs.id = qq.questionID INNER JOIN quizzes qz ON qz.id = qq.quizID WHERE qz.id = 1;";
?>
