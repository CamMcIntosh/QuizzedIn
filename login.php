<?php
    session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $error = "Email and/or Password is invalid";
        } else {
            // Define $username and $password
            $email = $_POST['email'];
            $password = $_POST['password'];
            // mysqli_connect() function opens a new connection to the MySQL server.
            $conn = new mysqli("localhost", "id11205838_db", "database", "id11205838_quizzedin");
            // SQL query to fetch information of registerd users and finds user match.
            $query = "SELECT email, password from users where email=? AND password=? LIMIT 1";
            // To protect MySQL injection for Security purpose
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $stmt->bind_result($email, $password);
            $stmt->store_result();

            //fetching the contents of the row
            if ($stmt->fetch())  {
                $_SESSION['login_user'] = $email; // Initializing Session
                header("location: profile.php"); // Redirecting To Profile Page
            }
            $conn->close(); // Closing Connection
        }
    }
?>