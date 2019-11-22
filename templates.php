<?php
function printNavBar () {
  echo <<<endOfNav
    <div class="nav">
      <div class="company-name">
        <a class="company-name-link" href="/" style="text-decoration:none"><span>QuizzedIn</span></a>
      </div>
      <div class="nav-left-items">
        <div class="nav-item">
          <a class="nav-item-link" href="./categories.php" style="text-decoration:none"><span>Category</span></a>
        </div>
          <div class="nav-item">
            <a class="nav-item-link" href="/" style="text-decoration:none" onclick="showDiv()">
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
            <a class="nav-item-link open-button" onclick="openSignInForm()" style="text-decoration:none"><span>SignIn</span></a>

          </div>
          <div class="nav-item">
            <a class="nav-item-link open-button" onclick="openSignUpForm()" style="text-decoration:none"><span>SignUp</span></a>
          </div>
        </div>
      </div>
endOfNav;
}

function printAddQuestionForm() {
  echo <<<endOfForm
    Question Type:<br>
    <input type="radio" onclick="addAnswers(3)" name="question" value="multiple" checked> Multiple Choice<br>
    <input type="radio" onclick="addTrueFalse()" name="question" value="trueFalse"> True/False<br>
    <input type="radio" onclick="addAnswers(0)" name="question" value="fillIn"> Fill In The Blank<br><br>
    Question 1: <input type="text" name="q1"><br><br>
    <div id="correctAnswer"></div>
    <div id="wrongAnswers"></div>
    <script>
      addAnswers(3);
    </script>
    <!-- Code for this still needs to be completed -->
    <!-- We need to add code somewhere to pull the data out of the form -->
endOfForm;
}


 ?>
