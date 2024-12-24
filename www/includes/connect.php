<?php


$servername = "localhost"; 
$username = "root";        
$password = "";           
$dbname = "Gym-match";    

// Create connection

$connect = new mysqli($servername, $username, $password, $dbname);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error); // Use $connect here
}
?>
