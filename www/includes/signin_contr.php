<?php
function is_empty($email,$psw){
if(empty($email)||empty($psw)){
    return true;
}
else{
    return false;
}



}

function is_email_wrong($results){

    if(!$results){
        return true;

    }
    else {

        return false;
    }



}
function is_password_wrong($psw,$hashedpsw){

    if(!password_verify($psw,$hashedpsw)){
        
        return true; 
    }
    else {

        return false;
    }



}