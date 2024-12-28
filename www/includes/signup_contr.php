<?php

function is_empty($name,$email,$phone,$item,$age,$passwrod){
    if(empty($name)||empty($email)||empty($phone)||empty($item)||empty($age)||empty($passwrod)){
        return true;
    }
    else {
        return false; 
    }
}
function is_email_valid($email){
if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    return true;

}
else{
    return false;
}



}
function is_username_taken(object $pdo,$username){
if(get_username($pdo,$username)){

    return true;


}
else{

      return false;
}


}

function is_email_taken(object $pdo,$email){
    if(get_email($pdo,$email)){
    
        return true;
    
    
    }
    else{
    
          return false;
    }
    
    
    }