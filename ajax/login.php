<?php 
//Allow the config
define('__CONFIG__', true);
//Require the config
require_once "../incl/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Always return JSON format
    header('Content-Type: application/json');

    $return = [];

//Retrieving the email and password of thhe user
    $email = Filter::String($_POST['email']);
    $password = $_POST['password'];

    // Make sure the user does not exist
    $findUser = $con->prepare("SELECT user_id, password FROM logintable WHERE email = LOWER(:email) LIMIT 1");
    $findUser->bindParam(':email', $email, PDO::PARAM_STR);
    $findUser->execute();

    if ($findUser->rowCount() == 1) {
        //User exist, sign them in
        $user = $findUser->fetch(PDO::FETCH_ASSOC);

        $user_id = (int)$user['user_id'];
        $hash = (string)$user['password'];

        if (password_verify($password, $hash)) {
            //User is signed in
            $return['redirect'] = "dashboard.php";
            $_SESSION['user_id'] = $user_id;
        } else {
            //Invalid email/password combo
            $return['error'] = "Invalid email / password";
        }
    } else {
        //User does not exist, create new account
        $return['error'] = "You do not have an account <a href='register.php'>Create an account now?</a>";
    }

    // Make sure the user CAN be added AND is added 

    // Return the proper information back to JavaScrit to redirect us.

    echo json_encode($return, JSON_PRETTY_PRINT);
    exit;
} else {
    exit("Invalid URL");
}
?>