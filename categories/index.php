<?php require '../templates.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			// $cat;
// 			if (isset($_GET['category'])) {
// 				$cat = htmlspecialchars_decode($_GET['category']);
 				printHeaderTags("Quizzes");
// 			} else {
// 				header("Location: ./categories.php");
// 			}			
		?>
	</head>
	<body>
		<?php printNavBar(); ?>
		<main>
			<?php printSignInSignUpForms(); printSpacing(); ?>
			<div class="title">
				<?php echo $cat; ?>
			</div>
			
		</main>
	</body>
</html>
