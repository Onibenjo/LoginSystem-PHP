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
    <link rel="stylesheet" href="assets/css/uikit.min.css">
</head>
<body>

<div class="uk-section uk-container">
    <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid="">
        <form class="uk-form-stacked js-login">
            <h2>Login</h2>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text2">Email</label>
                <div class="uk-form-controls">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input class="uk-input" id="form-stacked-text2" type="email" required="required" placeholder="Enter your email address">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Password</label>
                <div class="uk-form-controls">
                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                    <input class="uk-input" id="form-stacked-text" 
                    type="password" required="required" placeholder="Enter your Password">
                </div>
            </div>
            <div class="uk-margin uk-alert uk-alert-danger js-error" style="display:none"></div>

            <div class="uk-margin">
                <button class="uk-button uk-button-default" type="submit">LOGIN</button>
            </div>
        </form>
    </div>
</div>








<?php require_once "incl/footer.php" ?>

</body>
</html>



