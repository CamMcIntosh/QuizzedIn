<?php 
	require './templates.php'; 
	require './functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			$cat;
			if (isset($_GET['category'])) {
				$cat = htmlspecialchars_decode($_GET['category']);
				printHeaderTags($cat." Quizzes");
			} else {
				header("Location: ./categories.php");
			}			
		?>
	</head>
	<body>
		<?php printNavBar(); ?>
		<main>
			<?php printSignInSignUpForms(); printSpacing(); ?>
			<div class="title">
				<?php echo $cat; ?>
			</div>
			<ul style="list-style-type: none;">
				<div id="quizzes">
					<?php 
						$quizzes = getCategoryQuizzes($cat);
						foreach ($quizzes as $id => $title) {
							echo "<a href='./takeQuiz.php?qid=".$id."'>".$title."</a><br>";
						}
					?>
				</div>
			</ul>
			
		</main>
	</body>
</html>
