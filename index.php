<?php require './templates.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<?php printHeaderTags("QuizzedIn"); ?>
	</head>
	<body>
		<?php printNavBar(); ?>
		<div class="main">
			<?php printSignInSignUpForms(); ?>
			<div class="title">
				Welcome to QuizzedIn 
			</div>
			<div class="subtitle">
				<h4>
					<p>
						You can study for yourself with various topics that you are interested in and want to study by yourself with our excellent provided quizzes. 
					</p>
					<p>
						In addition, you can easily create quizzes about the topics you want to study or test on your own, save them on the web, and share them with your friends. 
					</p>
					<p>
						Various topics are already available. Get started!!! 
					</p>
				</h4>
				<div id="topics">
				</div>
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
						<a class="sub-item-link" href="./signUp.php" style="text-decoration:none">
							<span>
								Sign Up
							</span>
						</a>
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
						<a class="sub-item-link" href="./categories.php" style="text-decoration:none">
							<span>
								Go to Category
							</span>
						</a>
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
						<a class="sub-item-link" href="./createQuiz.php" style="text-decoration:none">
							<span>
								Create Quiz
							</span>
						</a>
					</button>
				</div>
			</div>
		</div>
		<script src="search.js">
		</script>
			<!--JavaScript for Search-->
		<script type="text/javascript">
			function showDiv(){
			    if (document.getElementById(toggle).style.display=="none") {
			        document.getElementById(toggle).style.display = "block";
			    } else if(document.getElementById(toggle).style.display == "block") {
			        document.getElementById(toggle).style.display = "none";
			    }
			}
		</script>
		<footer>
			<p>
				Company © QuizzedIn. All rights reserved. 
			</p>
		</footer>
	</body>
</html>
