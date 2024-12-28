<?php

function get_user(pbject $pdo,$email){

    $query = "SELECT * FROM users WHERE user_email = :username;  ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username",$email);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;



}