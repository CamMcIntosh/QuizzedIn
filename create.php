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
    <main>
    <form action="index.php">
        Name your Quiz:<br>
        <input type="text" name="name"><br>
        Choose a Category: <br>
        <input type="text" name="category"><br><br><br>
        Type of Question:<br>
        <input type="radio" name="question" value="multiple" checked> Multiple Choice<br>
        <input type="radio" name="question" value="trueFalse" checked> True/False<br>
        <input type="radio" name="question" value="fillIn" checked> Fill In The Blank<br>
        Question 1:<br>
        <input type="text" name="q1"><br>
        <!-- Code for this still needs to be completed -->

        <input type="submit" value="Submit">
        
    </form>
    </main>

</body>
</html>