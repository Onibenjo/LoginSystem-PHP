<?php 
//Allow the config
define('__CONFIG__', true);
//Require the config
require_once "../incl/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Always return JSON format
    header('Content-Type: application/json');

    $return = [];

    $email = Filter::String($_POST['email']);
    
    // Make sure the user does not exist
    $findUser = $con->prepare("SELECT user_id FROM logintable WHERE email = LOWER(:email) LIMIT 1");
    $findUser->bindParam(':email', $email, PDO::PARAM_STR);
    $findUser->execute();

    if ($findUser->rowCount() == 1) {
        //User exist
        $return['error'] = "A user with this email address already exists";
        $return['isLoggedIn'] = false;
    } else {
        //User does not exist, add them

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $addUser = $con->prepare("INSERT INTO logintable( email, password) VALUES(LOWER(:email), :password)");
        $addUser->bindParam(':email', $email, PDO::PARAM_STR);
        $addUser->bindParam(':password', $password, PDO::PARAM_STR);
        $addUser->execute();

        $user_id = $con->lastInsertId();

        $_SESSION['user_id'] = (int)$user_id;
        $return['redirect'] = 'dashboard.php?welcome-here';
        $return['isLoggedIn'] = true;
    }

    // Make sure the user CAN be added AND is added 

    // Return the proper information back to JavaScrit to redirect us.

    echo json_encode($return, JSON_PRETTY_PRINT);
    exit;
} else {
    exit("Invalid URL");
}
?>