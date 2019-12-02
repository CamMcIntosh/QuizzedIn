<!-- This needs to be moved into the functions.php file -->
<!-- I think this is supposed to store the username for the profile.php page, but done this way, $login_session scopes out immediately -->

<?php
    session_start();// Starting Session
    // mysqli_connect() function opens a new connection to the MySQL server.
    $conn = mysqli_connect("localhost", "id11205838_db", "database", "id11205838_quizzedin");
    // Storing Session
    $user_check = $_SESSION['login_user'];
    // SQL Query To Fetch Complete Information Of User
    $query = "SELECT username from users where username = '".$user_check."'";
    $ses_sql = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $login_session = $row['username']; 
?>