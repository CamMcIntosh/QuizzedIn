<?php
//Sign Up info stored in variables
$name = filter_input(INPUT_POST, 'name');
$username = filter_input(INPUT_POST, 'username');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if (!empty($name)) {
    if (!empty($username)) {
        if (!empty($email)) {
            if (!empty($password)) { //if none of the fields are empty
                //database info
                $host = "localhost";
                $dbusername = "id11205838_db";
                $dbpassword = "database";
                $dbname = "id11205838_quizzedin";

                //Create connection
                $connect = new mysqli ($host, $dbusername, $dbpassword, $dbname);

                //If there is an error connecting to the database
                if (mysqli_connect_error()) {
                    die('Connect Error ('. mysqli_connect_errno() .') '
                    . mysqli_connect_error());
                }
                else {
                    //Inserts the User's Info into the 'users' table in the database
                    $sql = "INSERT INTO users (name, username, email, password)
                    values ('$name', '$username', '$email', '$password')";

                    if ($connect->query($sql)) {
                        header("location: ./index.php"); // Redirecting To Profile Page
                        echo "You have sucessfully signed up!";
                    }
                    else { 
                        echo "Error: ". $sql ."
                        ". $connect->error;
                    }
                    $connect->close(); //close connection
                }
            }
            else {
                echo "Password field should not be empty";
                die();
            }
        }
        else {
            echo "Email field should not be empty";
            die();
        }
        
    }
    else {
        echo "Username field should not be empty";
        die();
    }
}
else {
    echo "Name field should not be empty";
    die();
}
?>