<?php 
//Allow the config
define('__CONFIG__', true);
//Require the config
require_once "incl/config.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="follow">
    <title>Login Page</title>
    <!-- UIKit css -->
    <link rel="stylesheet" href="css/uikit.min.css">
</head>
<body>

<div class="uk-section uk-container">
   <?php
    echo "Hello World! Today is: ";
    echo date(" Y m d");
    ?>
    <p>
        <a href="./login.php">Login</a>
        <a href="./register.php">Register</a>
    </p>
</div>

<?php require_once "incl/footer.php" ?>

</body>
</html>