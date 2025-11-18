<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in");
}

$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $productId = $_POST['product_id'];

        try {
            // Include database connection
            require_once "dbh.inc.php";

            // Delete the item from the cart for the logged-in user
            $deleteQuery = "DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id";
            $deleteStmt = $pdo->prepare($deleteQuery);
            $deleteStmt->execute([':user_id' => $userId, ':product_id' => $productId]);

            // Recalculate the total price of the cart
            $totalCartQuery = "SELECT SUM(total_price) AS total_cart_price FROM cart WHERE user_id = :user_id";
            $totalCartStmt = $pdo->prepare($totalCartQuery);
            $totalCartStmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
            $totalCartStmt->execute();
            $totalCart = $totalCartStmt->fetch(PDO::FETCH_ASSOC);

            // Update the session variable for total cart price
            $_SESSION["total_cart_price"] = $totalCart && isset($totalCart["total_cart_price"]) ? $totalCart["total_cart_price"] : 0;

            // Redirect back to the cart or store page
            header("Location: ../../index.php?page=store");            exit();
        } catch (PDOException $e) {
            die("Error deleting item: " . $e->getMessage());
        }
    } else {
        die("Product ID not provided");
    }
} else {
    die("Invalid request method");
}
