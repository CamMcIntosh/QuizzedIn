<?php 
	require_once './templates.php'; 
	require_once './functions.php';
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
		<script src="functions.js"></script>
	</head>
	<body>
		<?php printNavBar(); ?>
		<main>
			<?php printSignInSignUpForms(); printSpacing(); ?>
			<div class="title">
				<?php echo $cat; ?>
			</div>
			<select id="max">
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="25">25</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>
			<ul style="list-style-type: none;">
				<div id="quizzes">
					<?php 
						$quizzes = getCategoryQuizzes($cat);
						$i = 0;
						foreach ($quizzes as $id => $title) {
							echo "<button type='button' name='./takeQuiz.php?qid=".$id."' id='q".$i."' onclick='updatehref(\"q".$i."\")'>".$title."</button><br>";
							$i++;
						}
					?>
				</div>
			</ul>
			
		</main>
	</body>
</html>
