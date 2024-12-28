<?php

function check_signup(){
    if(isset($_SESSION['error_signup'])){


        $errors = $_SESSION['error_signup'];
        echo "<br>";
        foreach($errors as $error){

            echo '<p>' . $error . '</p>';
        }
        unset($_SESSION['error_signup']);

    }

}