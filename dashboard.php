<?php 
//Allow the config
define('__CONFIG__', true);
//Require the config
require_once "incl/config.php";

forceLogin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="follow">
    <title>Dashboard Page</title>
    <!-- UIKit css -->
    <link rel="stylesheet" href="assets/css/uikit.min.css">
</head>
<body>

<div class="uk-section uk-container">
  Dashboard here; <br/> <?php
                        echo 'You are signed in as user ' . $_SESSION['user_id'];
                        ?>
                
</div>

<?php require_once "incl/footer.php" ?>

</body>
</html>