<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_FILES['imaga']) && $_FILES['imaga']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['imaga']['tmp_name'];
        $fileName = $_FILES['imaga']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allowed file types
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            die("Invalid file type. Please upload an image.");
        }

        // Read the image file content as binary data
        $imageData = file_get_contents($fileTmpPath);

        // Sanitize file name (optional, just for storing in DB if necessary)
        $newFileName = uniqid() . '.' . $fileExtension;
    }






    
    $pname= $_POST["pname"];
    $quantity= $_POST["quantity"];
    $type= $_POST["type"];
    $size= $_POST["size"];
    $price= $_POST["price"];
    $sizeColumn = "";
    switch ($size) {
        case '36':
            $sizeColumn = "quantity_36";
            break;
        case '38':
            $sizeColumn = "quantity_38";
            break;
        case '40':
            $sizeColumn = "quantity_40";
            break;
        case '42':
            $sizeColumn = "quantity_42";
            break;
        default:
            die("Invalid size selected.");
    }
    
    try {
        require_once "dbh.inc.php";//connection to the database
        $query = "INSERT INTO products(product_name,product_img,
        product_category,product_prix,$sizeColumn) VALUES (
        :pname,:imaga,:typ,:price,:quantity);";
        
        
        $stmt=$pdo->prepare($query);
        $stmt->bindParam(":pname",$pname);
        $stmt->bindParam(":imaga",$imaga,PDO::PARAM_LOB);
        $stmt->bindParam(":typ",$type);
        $stmt->bindParam(":price",$price);
        $stmt->bindParam(":quantity",$quantity);
        $stmt->execute();
        
        $pdo=null;
        $stmt=null;
        header("Location:../../index.php");
        die();
    }catch (PDOException $e) {
        die("query failed: " . $e->getMessage());
    }
    

}
else{
    header("Location:../../index.php");

}


