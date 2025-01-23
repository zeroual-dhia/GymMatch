
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_FILES['imaga']) && $_FILES['imaga']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['imaga']['tmp_name'];
        $fileName = $_FILES['imaga']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            die("Invalid file type. Please upload an image.");
        }

        
        $imageData = base64_encode(file_get_contents($fileTmpPath));
        

        
        $newFileName = uniqid() . '.' . $fileExtension;

        
        $pname = $_POST["pname"];
        $quantity = $_POST["quantity"];
        $type = $_POST["type"];
        $size = $_POST["size"];
        $price = $_POST["price"];

      
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
            case 'Open the menu':
                 $sizeColumn = "product_quantity";
                break;
            default:
                die("Invalid size selected.");
        }

        try {
            require_once "dbh.inc.php"; // Connection to the database

            // Insert query to store product details, including Base64-encoded image string
            $query = "INSERT INTO products (product_name, product_img, product_category, product_prix, $sizeColumn) 
                      VALUES (:pname, :imaga, :typ, :price, :quantity)";
            $stmt = $pdo->prepare($query);

            // Bind parameters for the query
            $stmt->bindParam(":pname", $pname);
            $stmt->bindParam(":imaga", $imageData, PDO::PARAM_STR); // Store Base64 image string
            $stmt->bindParam(":typ", $type);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":quantity", $quantity);

            // Execute the query
            $stmt->execute();

            // Close connection
            $pdo = null;
            $stmt = null;

            // Redirect after successful insert
            header("Location: ../pages/admin.php");
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    header("Location: ../pages/admin.php");
}
