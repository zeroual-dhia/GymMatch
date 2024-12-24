<?php
//this file is used for connecting to the database

$dsn = "mysql:host=localhost;dbname=gym-match";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn,$dbusername,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "connection failed: " . $e->getMessage();
}
?>