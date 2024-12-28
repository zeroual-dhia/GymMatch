<?php

try {
    require_once "/GymPath/www/includes/dbh.inc.php";
    $query="SELECT * FROM products;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo=null;
    $stmt=null;
} catch (PDOException $e) {
    die("query faild : " . $e->getMessage());
    //throw $th;
}
    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>results:</h3>
    <?php
    if(empty($results)){
        echo "<div>";
        echo "<p> there is no product </p>";
        echo "</div>";



    }
    else{
        var_dump($results);

    }
    
    
    ?>
</body>
</html>