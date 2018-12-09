<?php 
//Allow the config
define('__CONFIG__', true);
//Require the config
require_once "incl/config.php";
Page::forceDashboard();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="follow">
    <title>Register an account</title>
    <!-- UIKit css -->
    <link rel="stylesheet" href="assets/css/uikit.min.css">
</head>
<body>

<div class="uk-section uk-container">
    <div class="uk-grid uk-child-width-1-2@s uk-child-width-1-1" uk-grid="">
        <form class="uk-form-stacked js-register">
            <div class="uk-margin">
                <h2>Register</h2>
                <label class="uk-form-label" for="form-stacked-text">Email</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="email" required="required" placeholder="Enter your email address">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text2">Password</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text2" 
                    type="password" required="required" placeholder="Enter your Password">
                </div>
            </div>
            <div class="uk-margin uk-alert uk-alert-danger js-error" style="display:none"></div>

            <div class="uk-margin">
                <button class="uk-button uk-button-default" type="submit">REGISTER</button>
            </div>
        </form>
    </div>
</div>








<?php require_once "incl/footer.php" ?>

</body>
</html>



