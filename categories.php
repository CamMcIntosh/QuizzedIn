<?php 
	require './templates.php'; 
	require './functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<?php printHeaderTags("Categories"); ?>
	</head>
	<body>
		<?php printNavBar(); ?>
		<main>
			<?php printSignInSignUpForms(); printSpacing(); ?>
			<div class="title">
				Categories 
			</div>
			<ul style="list-style-type: none;">
				<div id="categories">
					<?php printCategories(); ?>
				</div>
			</ul>
		</main>
	</body>
</html>
