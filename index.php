<<?php

try {
    require_once "www/includes/dbh.inc.php";
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
    <link rel="stylesheet" href="www/css/store.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="www/css/header.css">
    
</head>
<body>
<?php
    if(empty($results)){
        echo "<div>";
        echo "<p> there is no product </p>";
        echo "</div>";



    }
    else{
        foreach ($results as $row){

            $image_data = $row["product_img"]; // The binary image data retrieved from the database
            $mime_type = "image/gif"; 
            header("Content-Type: $mime_type");
            echo '<img src="$image_data"/>';
            echo '<div class="product-card" data-id="1">';
            echo "<div class=\"product-info\">" ;
            echo "<h4>";
            echo htmlspecialchars($row["product_name"]) ; 
            echo "</h4>";
            echo "<div class=\"price\">";
            echo htmlspecialchars($row["product_prix"]) . ' DA';
            echo "</div>";
            echo "</div>";
            if(isset($row["product_quantity"]) || isset($row["quantity_36"]) ){

              echo   '<div class="quantity-buttons">';
            echo '<button class="quantity-minus">-</button>';
            echo ' <input type="number" class="quantity-value" value="1" min="1">';
            echo '<button class="quantity-plus">+</button>';
           echo "</div>";
           echo '<div class="size-buttons">';
           echo '<button class="size-button">36</button>';
           echo '<button class="size-button">38</button>';
           echo' <button class="size-button">40</button>';
            echo' <button class="size-button">42</button>';
            echo '</div>';
            }



            echo '<button class="buy-button">Buy</button>';

            echo "</div>";
            
        }

    }
    
    
    ?>
</body>
</html>
