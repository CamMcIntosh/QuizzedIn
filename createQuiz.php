<!DOCTYPE html>
<?php require './templates.php'; ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuizzedIn</title>
    <link href="./styling.css" rel="stylesheet" />
    <script src="functions.js"></script>
  </head>
  <body>
      <header>
        <div class="nav">
          <div class="company-name">
            <a class="company-name-link" href="./index.php" style="text-decoration:none"><span>QuizzedIn</span></a>
          </div>
          <div class="nav-left-items">
            <div class="nav-item">
              <a class="nav-item-link" href="./categories.php" style="text-decoration:none"><span>Category</span></a>
            </div>
              <div class="nav-item">
                <a class="nav-item-link" href="./" style="text-decoration:none" onclick="showDiv()">
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
                <a class="nav-item-link open-button" href="./signIn.php" style="text-decoration:none"><span>SignIn</span></a>

              </div>
              <div class="nav-item">
                <a class="nav-item-link open-button" href="./signUp.php" style="text-decoration:none"><span>SignUp</span></a>
              </div>
            </div>
          </div>
    <main>
    <script id="answerTemplate" type="text/html"></script>
    <form action="./index.php">
        Name your Quiz:<br>
        <input type="text" name="name"><br>
        Choose a Category: <br>
        <input type="text" name="category"><br><br><br>

        <!-- Printing the from from the templates.php file -->
        <?php printAddQuestionForm(); ?>

        <br><input type="submit" value="Submit">
    </form>
    <!-- Code for this still needs to be completed -->
    <!-- We need to add code somewhere to pull the data out of the form -->
    </main>
</body>
</html>