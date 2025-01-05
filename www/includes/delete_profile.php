<?php
// Enable error reporting for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set Content-Type to application/json for the response
header('Content-Type: application/json');

// Include your database connection
include '../includes/dbh.inc.php';

try {
    // Decode the JSON input data
    $data = json_decode(file_get_contents('php://input'), true);

    // Check if user_id is provided
    if (!isset($data['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'User ID is required.']);
        exit;
    }

    $user_id = $data['user_id'];

    // Prepare and execute the SQL query to delete the user
    $query = $pdo->prepare("DELETE FROM users WHERE user_id = :user_id");
    $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $query->execute();

    // Check if the query affected any rows
    if ($query->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => 'Account deleted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'No account found with the provided User ID.']);
    }

} catch (PDOException $e) {
    // Log the error and return a JSON response
    error_log('Error deleting account: ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Error deleting account: ' . $e->getMessage()]);
} catch (Exception $e) {
    // Catch any other exceptions
    error_log('Unexpected error: ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Unexpected error: ' . $e->getMessage()]);
}
