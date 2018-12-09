<?php 
//Allow the config
define('__CONFIG__', true);
//Require the config
require_once "incl/config.php";

Page::forceLogin();

$User = new User($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="follow">
    <title>Dashboard</title>
    <!-- UIKit css -->
    <link rel="stylesheet" href="assets/css/uikit.min.css">
</head>
<body>

<div class="uk-section uk-container">

    <h1>Dashboard</h1>
    
      <p>Hello <?php echo $User->email; ?>, you registered at <?php echo $User->reg_time; ?></p>
      
    <p><a href="logout.php">Logout</a></p>
                
</div>

<?php require_once "incl/footer.php" ?>

</body>
</html>