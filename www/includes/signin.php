<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $email=$_POST["email"];
    $psw=$_POST["psw"];

    try {
        require_once "dbh.inc.php";
        require_once "signin_model.php";
        require_once "signin_contr.php";
        


        $errors = [];
    if(is_empty($email,$psw)){
        $errors["empty_input"]="fill in all fields";
    }
   $result=get_user($pdo,$email);
   if(is_email_wrong($result)){
    $errors["login_incorrect"]="incorrect login info";
}
if(!is_email_wrong($result) && is_password_wrong($psw,$result["user_pw"])){
    $errors["login_incorrect"]="incorrect login info";
}
   

 require_once "config_session.php";

    if($errors){


        $_SESSION["error_signin"]= $errors;
        header("Location:../../index.php?signin=fail");
        die();
    }
        $newid = session_create_id();
        $sessionid = $newid . "_" . $result["user_id"];
        session_id($sessionid);


        $_SESSION["user_id"]=$result["user_id"];
        $_SESSION["email"]=htmlspecialchars ($result["user_email"]);

        $_SESSION["last_regeneration"]= time();

        header("Location:/GymPath/index.php?signin=success");

        $pdo=null;
        $stmt=null;
        die();

    } catch (PDOException $e) {
        die("query failed: " . $e->getMessage());
    }


}
else{
    header("Location:../pages/login.php");
    die();
}