<?php

function check_signup(){
    if(isset($_SESSION['error_signup'])){


        $errors = $_SESSION['error_signup'];
        
        foreach($errors as $error){

            echo '<span id="password-error" class="error-message">' . $error . '</span>';
        }
        unset($_SESSION['error_signup']);

    }

}