<?php require '../templates.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			if (isset($_GET['category'])) {
				$cat = $_GET['category'];
				printHeaderTags("Categories");
			} else {
				header("Location: ./categories.php");
			}			
		?>
		<!-- This line calls to the API to get the categories -->
	</head>
	<body>
		<?php printNavBar(); ?>
		<main>
			<?php printSignInSignUpForms(); printSpacing(); ?>
			<div class="title">
				Categories 
			</div>
			<ul style="list-style-type: none;">
				<div id="topics">
				</div>
				<!-- Categories automatically uploaded via API -->
			</ul>
		</main>
	</body>
</html>
