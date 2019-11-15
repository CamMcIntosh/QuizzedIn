<?php
    include('login.php'); // Includes Login Script
    if(isset($_SESSION['login_user'])) {
        header("location: profile.php"); // Redirecting To Profile Page
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuizzedIn</title>
    <link href="/QuizzedIn/staticPages/styling.css" rel="stylesheet" />
  </head>
  <body>
      <header>
        <div class="nav">
          <div class="company-name">
            <a class="company-name-link" href="/QuizzedIn/index.php" style="text-decoration:none"><span>QuizzedIn</span></a>
          </div>
          <div class="nav-left-items">
            <div class="nav-item">
              <a class="nav-item-link" href="/QuizzedIn/categories.php" style="text-decoration:none"><span>Category</span></a>
            </div>
              <div class="nav-item">
                <a class="nav-item-link" href="/QuizzedIn/" style="text-decoration:none" onclick="showDiv()">
                    <span>Search</span>
                </a>
              </div>
            </div>
            <div id="toggle" class="nav-center-items" style="display:none">
                <div class="nav-searchbar">
                  <form class="example" action="action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
                </div>
            </div>
            <div class="nav-right-items">
              <div class="nav-item">
                <a class="nav-item-link open-button" href="/QuizzedIn/signIn.php" style="text-decoration:none"><span>SignIn</span></a>

              </div>
              <div class="nav-item">
                <a class="nav-item-link open-button" href="/QuizzedIn/signUp.php" style="text-decoration:none"><span>SignUp</span></a>
              </div>
            </div>
          </div>
          
        <h2>Sign In</h2>
        <form method="POST" action="">
        Email:<br>
        <input type="email" name="email"><br>
        Password:<br>
        <input type="password" name="password"><br>
        <input type="submit" value="Sign In">
        <span><?php echo $error; ?></span>
    </form>

    <p><a href="signUp.php">Sign Up</a></p>
    
    </body>

</html>