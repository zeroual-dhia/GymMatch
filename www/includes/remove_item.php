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

            // Redirect back to the store page or cart
            header("Location: ../pages/store.php");
            exit();
        } catch (PDOException $e) {
            die("Error deleting item: " . $e->getMessage());
        }
    } else {
        die("Product ID not provided");
    }
} else {
    die("Invalid request method");
}