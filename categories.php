<!DOCTYPE html>
<?php require './templates.php'; ?>
<html>
	<head>
		<?php printHeaderTags("Categories"); ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="functions.js"></script>
	</head>
	<body>
		<?php printNavBar(); ?>
		<main>
			<?php printSignInSignUpForms(); ?>
			<h1>
				Categories 
			</h1>
			<ul style="list-style-type: none;">
				<div id="topics">
				</div>
<!-- Categories automatically uploaded via API-->
			</ul>
		</main>
	</body>
</html>
