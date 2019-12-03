<?php
// For printing stuff in <head>
function printHeaderTags($title) {
	echo <<<endOfTags
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>$title</title>
	<link href="./styling.css" rel="stylesheet" />
endOfTags;
}

// For printing the nav bar in the top of <body>
function printNavBar () {
  echo <<<endOfNav
  <header>
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
    </header>
endOfNav;
}

// For printing functions to go with nav bar (either in <main> or right after nav bar)
function printSignInSignUpForms () {
  echo <<<endOfForm
	<div class="form-popup" id="signUpForm">
              <form action="./connect.php" method="post" class="form-container">
                <h1>Sign Up</h1>

                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="email" required>

                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="email" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

            	<label for="pswcf"><b>Password Confirm</b></label>
                <input type="password" placeholder="Confirm Password" name="pswcf" required>

                <button type="submit" class="btn" href="/">Sign Up</button>
                <button type="button" class="btn cancel" onclick="closeSignUpForm()">Close</button>
              </form>
            </div>

            <div class="form-popup" id="signInForm" >
              <form action="/signIn.php" method="post" class="form-container">
                <h1>Sign In</h1>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit" class="btn"><a class="signInSubmit" href="./temp_signedIn.php" style="text-decoration:none">Sign In</a></button>
                <button type="button" class="btn cancel" onclick="closeSignInForm()">Close</button>
              </form>
            </div>
            <script>
            	function openSignInForm() {
	  				document.getElementById("signInForm").style.display = "block";
					closeSignUpForm();
				}
				function closeSignInForm() {
					document.getElementById("signInForm").style.display = "none";
				}
				function openSignUpForm() {
					document.getElementById("signUpForm").style.display = "block";
					closeSignInForm();
				}
				function closeSignUpForm() {
					document.getElementById("signUpForm").style.display = "none";
				}
            </script>
            
endOfForm;
}

// Just adds spacing so it stays consistent
function printSpacing() {
	echo "<br><br><br><br>";
}

// For printing the form in addQuestion and createQuiz pages
function printAddQuestionForm() {
  echo <<<endOfForm
  	<script src="functions.js"></script>
    Question Type:<br>
    <input type="radio" onclick="addAnswers(3)" name="type" value="mc" checked> Multiple Choice<br>
    <input type="radio" onclick="addTrueFalse()" name="type" value="tf"> True/False<br>
    <input type="radio" onclick="addAnswers(0)" name="type" value="fb"> Fill In The Blank<br><br>
    Question 1: <input type="text" name="q1" required><br><br>
    <div id="correctAnswer"></div>
    <div id="wrongAnswers"></div>
    <script>
      addAnswers(3);
    </script>
endOfForm;
}

// For printing the quiz form on the takeQuiz page
function printQuizForm ($quiz) {
	// Looping through all questions in quiz
	foreach ($i = 0; $i <count($quiz->questions); $i++) {
		$q = $quiz->questions[$i];
		$answers = array($q->rghtAns);
		// Adding all the right and wrong answers into the same array
		foreach ($q-wrngAns as $ans) {
			array_push($answers, $ans);
		}
		$answers = shuffle($answers);
		echo "<br>";
		echo "<b>Question {$i+1}:</b> {$q->qTezxt} <br>";
		
		// If it's a fill in the blank, there needs to be a text input, otherwise radio buttons 
		if ($q->type == "fb") {
			echo "<input type='text' name='q{$i}' required>";
		} else {
			foreach ($answers as $ans) {
				echo "<input type='radio' name='q$i' value='{$ans}' checked required> {$ans} <br>";
	    	}
    	}
	}
	echo "<br><input type='submit' value='Check your answers'>";
}

?>
