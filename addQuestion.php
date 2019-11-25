<!DOCTYPE html>
<?php
  require './templates.php';
  require './functions.php';
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuizzedIn</title>
    <link href="styling.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
      <header>
          <?php printNavBar(); ?>
      </header>
      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $temp = test_input($_POST['a1']);
          echo "<br><br><br><h1>{$temp}</h1>";
        }
      ?>
  </body>
</html>
