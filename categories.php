<?php 
	require './templates.php'; 
	require './functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<?php printHeaderTags("Categories"); ?>
		<!-- This line calls to the API to get the categories -->
		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script-->
		<script src="functions.js"></script>
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
					<?php printCategories(); ?>
				</div>
			</ul>
		</main>
	</body>
</html>
