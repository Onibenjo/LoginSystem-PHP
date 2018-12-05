<?php
//If there's no config defined, do not load the file
if (!defined('__CONFIG__')) {
    exit("You do not have a config file");
}

//Turn session on
if (!isset($_SESSION)) {
    session_start();

}
// error_reporting(-1);
// ini_set('display_errors', 'On');

//Include the DB.php file
include_once "classes/DB.php";
include_once "classes/Filter.php";

$con = DB::getConnection();

?>