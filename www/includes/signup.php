
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$Name=$_POST["Name"];
$Email=$_POST["Email"];
$phone=$_POST["phone"];

$item=$_POST["item"];
$age=$_POST["age"];
$pwd=$_POST["pwd"];


try {
    require_once "dbh.inc.php";//connection to the database
    require_once "signup_model.php";
    require_once "signup_contr.php";
   
    $errors = [];
    if(is_empty($Name,$Email,$phone,$item,$age,$pwd)){
        $errors["empty_input"]="fill in all fields";
    }
   
    if(is_username_taken($pdo,$Name)){
        $errors["username_taken"]="username already taken";
    }
    if(is_email_taken($pdo,$Email)){
        $errors["email_used"]="email already taken";
    }
    $Name = test_input($Name);
    $Email=test_input($Email);
    $phone=test_input($phone);
    
    $age=test_input($age);
    $pwd=test_input( $pwd);





    require_once "config_session.php";

    if($errors){


        $_SESSION["error_signup"]= $errors;
        header("Location:../pages/login.php?signup=fail");
        die();
    }

    $query="INSERT INTO users (user_name, user_phonenum, user_email, user_pw, user_acc, user_age, user_status) VALUES 
    (:username, :phone, :email, :pwd, :accname, :age ,:statuss );";
    $options = [

        'cost' => 12 
    ];
    $hashedpw = password_hash($pwd,PASSWORD_BCRYPT,$options); 
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(":username",$Name);
    $stmt->bindParam(":phone",$phone);
    $stmt->bindParam(":email",$Email);
    $stmt->bindParam(":pwd",$hashedpw);
    $stmt->bindParam(":accname",$Name);
    $stmt->bindParam(":age",$age);
    $stmt->bindParam(":statuss",$item);   

    $stmt->execute();

    $pdo=null;
    $stmt=null;
    header("Location:/GymPath/index.php");
    die();
} catch (PDOException $e) {
    die("query failed: " . $e->getMessage());
}

}
else{
    
}