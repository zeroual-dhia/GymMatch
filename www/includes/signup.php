
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
    $query="INSERT INTO users (user_name, user_phonenum, user_email, user_pw, user_acc, user_age, user_status) VALUES 
    (:username, :phone, :email, :pwd, :accname, :age ,:statuss );";
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(":username",$Name);
    $stmt->bindParam(":phone",$phone);
    $stmt->bindParam(":email",$Email);
    $stmt->bindParam(":pwd",$pwd);
    $stmt->bindParam(":accname",$Name);
    $stmt->bindParam(":age",$age);
    $stmt->bindParam(":statuss",$item);   

    $stmt->execute();

    $pdo=null;
    $stmt=null;
    header("Location:../index.php");
    die();
} catch (PDOException $e) {
    die("query failed: " . e->getMessage());
}

}
else{

    header("Location:../index.php");//user did not enter any data so nothing happens
}