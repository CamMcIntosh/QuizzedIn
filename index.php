<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuizzedIn</title>
    <link href="/QuizzedIn/staticPages/styling.css" rel="stylesheet" type="text/css" />
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
          <div class="main">
            
      <div class="title">
        Welcome to QuizzedIn
      </div>
      <div class="subtitle">
          <h4>
            <p>You can study for yourself with various topics that you are interested in and want to study by yourself with our excellent provided quizzes.</p>
            <p>In addition, you can easily create quizzes about the topics you want to study or test on your own,
            save them on the web, and share them with your friends.</p>
            <p>Various topics are already available. Get started!!!</p>
          </h4>

      </div>
      <div class="sub-nav">
        <div class="sub-nav-item">
          <div class="sub-nav-item-title">
            Become a member
          </div>
          <div class="sub-nav-item-detail">
            Explore experience our various quizzes.
          </div>
          <div class="sub-nav-item-detail">
            Study for yourself with quizzes and share with others.
          </div>
          <button class="sub-nav-item-button">
              <a class="sub-item-link" href="/QuizzedIn/signUp.php" style="text-decoration:none"><span>Sign Up</span></a>
          </button>
        </div>
        <div class="sub-nav-item">
          <div class="sub-nav-item-title">
            Look Up Categories
          </div>
          <div class="sub-nav-item-detail">
            Find the topics you are interested in in the quiz category already created by us.
          </div>
          <div class="sub-nav-item-detail">
            Study your knowledge of new topics.
          </div>
          <button class="sub-nav-item-button">
            <a class="sub-item-link" href="/QuizzedIn/categories.php" style="text-decoration:none"><span>Go to Category</span></a>
          </button>
        </div>
        <div class="sub-nav-item">
          <div class="sub-nav-item-title">
            Create New Quiz
          </div>
          <div class="sub-nav-item-detail">
            Unleash your knowledge in new ways.
          </div>
          <div class="sub-nav-item-detail">
            Create your own quizzes and share quizzes with your teammates.
          </div>
          <button class="sub-nav-item-button">
            <a class="sub-item-link" href="/QuizzedIn/create.php" style="text-decoration:none"><span>Create Quiz</span></a>
          </button>
        </div>
      </div>
    </div>
    <footer>
      <p>Company © QuizzedIn. All rights reserved.</p>
    </footer>

</body>

</html>