<!DOCTYPE html>
<html>
    <head>
        <title>QuizzedIn</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./styling.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="script.js"></script>
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
    <h1>Categories</h1>
    <ul style="list-style-type: none;">
        <div id="topics"></div> <!-- Categories automatically uploaded via API-->
    </ul>
    </main>
</body>
</html>
