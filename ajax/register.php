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
    $userFound = User::find($email);

    if ($userFound) {
        //User exist
        $return['error'] = "You already have an account!";
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
        $return['redirect'] = 'dashboard.php';
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