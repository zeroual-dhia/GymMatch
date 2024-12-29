<?php

function get_username(object $pdo, $username){

$query = "SELECT user_name FROM users WHERE user_name = :username;  ";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":username",$username);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
return $result;
}

function get_email(object $pdo, $email){

    $query = "SELECT user_email FROM users WHERE user_email = :username;  ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username",$email);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
    }