<?php 
//Allow the config
if (!defined('__CONFIG__')) {
    exit('You do not have a config file');
}
//Require the config

//Forcing the user to be logged in
class Page
{
    static function forceLogin()
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
    static function forceDashboard()
    {

        if (!isset($_SESSION['user_id'])) {

        } else {
        //the user is allowed here
            header('Location: dashboard.php');
            exit;
        }

    }


}
?>