<?php 
//Allow the config
define('__CONFIG__', true);
//Require the config
require_once "incl/config.php";

Page::forceLogin();

$user_id = $_SESSION['user_id'];
$getUserInfo = $con->prepare("SELECT email, date FROM logintable WHERE user_id = :user_id LIMIT 1");
$getUserInfo->bindParam(':user_id', $user_id, PDO::PARAM_STR);
$getUserInfo->execute();

if ($getUserInfo->rowCount() == 1) {
    $user = $getUserInfo->fetch(PDO::FETCH_ASSOC);

} else {
    // User is not signed in
    header('Location: logout.php');
    exit;
}

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
    <p>Hello <?php echo $user['email']; ?>, you registered at <?php echo $user['date']; ?>
    </p>
    <p><a href="logout.php">Logout</a></p>
                
</div>

<?php require_once "incl/footer.php" ?>

</body>
</html>