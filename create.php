<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuizzedIn</title>
    <link href="./styling.css" rel="stylesheet" />
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
    <form action="./index.php">
        Name your Quiz:<br>
        <input type="text" name="name"><br>
        Choose a Category: <br>
        <input type="text" name="category"><br><br><br>
        Type of Question:<br>
        <input type="radio" onclick="addAnswers(3)" name="question" value="multiple" checked> Multiple Choice<br>
        <input type="radio" onclick="addAnswers(0)" name="question" value="trueFalse" checked> True/False<br>
        <input type="radio" onclick="addAnswers(1)" name="question" value="fillIn" checked> Fill In The Blank<br>
        <br>Question 1: <input type="text" name="q1"><br>
        <br>Correct Answer: <input type="text" name="a1"><br>
        <div id="wrongAnswers"></div>
        <!-- Code for this still needs to be completed -->

        <br><input type="submit" value="Submit">


        <script>
          function addAnswers (n) {
            var myNode = document.getElementById("wrongAnswers");
            while (myNode.firstChild) {
              myNode.removeChild(myNode.firstChild);
            }
            for (var i = 1; i <= n; i++) {
              var div = document.createElement("div");
              div.innerHTML = document.getElementById("answerTemplate").innerHTML;
              var answerNumText = document.createElement("pre");
              var answerInput = document.createElement("input");
              answerNumText.innerHTML = "Wrong Answer "+i+": ";
              answerInput.setAttribute("name", "a"+(i+1)); answerInput.setAttribute("type", "text");
              div.appendChild(answerNumText); div.appendChild(answerInput);
              document.getElementById("wrongAnswers").appendChild(div);
            }
          }
        </script>

        <script id="answerTemplate" type="text/html"></script>
    </form>
    </main>

</body>
</html>
