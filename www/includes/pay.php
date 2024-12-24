<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$person_name= $_POST["person_name"];
$card_num=$_POST["card_num"];
$expiry=$_POST["expiry"];
$cvv=$_POST["cvv"];

try {
    require_once "dbh.inc.php";
    $query="INSERT INTO payements (pay_name, pay_card, 
    pay_exp, pay_civ ) VALUES (:person_name, :card_num, 
    :expiry, :cvv )
    ;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":person_name",$person_name);
    $stmt->bindParam(":card_num",$card_num);
    $stmt->bindParam(":expiry",$expiry);
    $stmt->bindParam(":cvv",$cvv);
    $stmt->execute();
    $pdo=null;
    $stmt=null;

    header("Location:../../index.php");
    die();

} catch (PDOException $e) {
    die("query faild : " . $e->getMessage());
    //throw $th;
}



}
else{

    header("Location:../../index.php");



}
?>