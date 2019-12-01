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

function test_input ($data) {
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
?>
