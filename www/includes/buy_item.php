<?php
session_start(); // Start the session to access user data

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once "dbh.inc.php";

    // Get the user ID from the session
    if (!isset($_SESSION["user_id"])) {
        die("User not logged in.");
    }
    $userId = $_SESSION["user_id"];

    // Get product ID and requested quantity
    $productId = $_POST["product_id"];
    $requestedQuantity = intval($_POST["quantity"]);

    if ($requestedQuantity <= 0) {
        die("Invalid quantity requested.");
    }

    try {
        // Fetch product data
        $query = "SELECT product_name, product_quantity, product_prix FROM products WHERE product_id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id", $productId, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            die("Product not found.");
        }

        $currentQuantity = intval($product["product_quantity"]);
        $productPrice = floatval($product["product_prix"]);

        // Check stock
        if ($requestedQuantity > $currentQuantity) {
            die("Insufficient stock for " . htmlspecialchars($product["product_name"]) . ".");
        }

        // Check if the product already exists in the cart
        $cartCheckQuery = "SELECT quantity, total_price FROM cart WHERE user_id = :user_id AND product_id = :product_id";
        $cartCheckStmt = $pdo->prepare($cartCheckQuery);
        $cartCheckStmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
        $cartCheckStmt->bindParam(":product_id", $productId, PDO::PARAM_INT);
        $cartCheckStmt->execute();
        $cartItem = $cartCheckStmt->fetch(PDO::FETCH_ASSOC);

        if ($cartItem) {
            // Product already in cart: Update the quantity and price
            $newQuantity = intval($cartItem["quantity"]) + $requestedQuantity;

            // Check if new quantity exceeds stock
            if ($newQuantity > $currentQuantity) {
                die("Insufficient stock for " . htmlspecialchars($product["product_name"]) . ".");
            }

            // Calculate total price for the updated quantity
            $totalPrice = $newQuantity * $productPrice;

            $updateCartQuery = "UPDATE cart
                                SET quantity = :quantity, total_price = :total_price
                                WHERE user_id = :user_id AND product_id = :product_id";
            $updateCartStmt = $pdo->prepare($updateCartQuery);
            $updateCartStmt->bindParam(":quantity", $newQuantity, PDO::PARAM_INT);
            $updateCartStmt->bindParam(":total_price", $totalPrice, PDO::PARAM_STR);
            $updateCartStmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
            $updateCartStmt->bindParam(":product_id", $productId, PDO::PARAM_INT);
            $updateCartStmt->execute();
        } else {
            // Product not in cart: Insert into cart
            $cartInsertQuery = "INSERT INTO cart (user_id, product_id, quantity, total_price)
                                VALUES (:user_id, :product_id, :quantity, :total_price)";
            $cartStmt = $pdo->prepare($cartInsertQuery);
            $cartStmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
            $cartStmt->bindParam(":product_id", $productId, PDO::PARAM_INT);
            $cartStmt->bindParam(":quantity", $requestedQuantity, PDO::PARAM_INT);

            $totalPrice = $requestedQuantity * $productPrice;
            $cartStmt->bindParam(":total_price", $totalPrice, PDO::PARAM_STR);

            $cartStmt->execute();
        }

        // Update product stock in the products table
        $newStockQuantity = $currentQuantity - $requestedQuantity;
        $updateProductQuery = "UPDATE products SET product_quantity = :product_quantity WHERE product_id = :product_id";
        $updateProductStmt = $pdo->prepare($updateProductQuery);
        $updateProductStmt->bindParam(":product_quantity", $newStockQuantity, PDO::PARAM_INT);
        $updateProductStmt->bindParam(":product_id", $productId, PDO::PARAM_INT);
        $updateProductStmt->execute();

        // Recalculate the total cart price after updating the cart
        $totalCartQuery = "SELECT SUM(total_price) AS total_cart_price FROM cart WHERE user_id = :user_id";
        $totalCartStmt = $pdo->prepare($totalCartQuery);
        $totalCartStmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
        $totalCartStmt->execute();
        $totalCart = $totalCartStmt->fetch(PDO::FETCH_ASSOC);

        if ($totalCart && isset($totalCart["total_cart_price"])) {
            $_SESSION["total_cart_price"] = $totalCart["total_cart_price"]; // Store the total price in the session
        }

        header("Location: ../pages/store.php");
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    } finally {
        $pdo = null;
    }
} else {
    header("Location: ../pages/store.php");
    exit();
}

