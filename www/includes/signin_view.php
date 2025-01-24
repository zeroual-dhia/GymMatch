<?php


function check_signin(){
if( isset($_SESSION["error_signin"])){
    $errors = $_SESSION["error_signin"];
    foreach($errors as $error){

        echo '<span id="signin-email-error" class="error-message">' . $error . '</span>';
    }
    unset($_SESSION["error_signin"]);
}

}


