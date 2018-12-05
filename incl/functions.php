<?php 
//Allow the config
define('__CONFIG__', true);
//Require the config
require_once "incl/config.php";

//Forcing the user to be logged in
function forceLogin()
{

    if (isset($_SESSION['user_id'])) {
        //the user is allowed here
    } else {
        //the user is not allowed here
        header('Location: login.php');
        exit;
    }

}

//Making the register page unavailable to the user while logged in
function forceDashboard()
{

    if (!isset($_SESSION['user_id'])) {
        //the user is allowed here
    } else {
        //the user is not allowed here
        header('Location: dashboard.php');
        exit;
    }

}


?>