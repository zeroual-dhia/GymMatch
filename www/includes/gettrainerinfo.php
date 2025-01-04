<?php
session_start(); // Start or resume a session

header('Content-Type: application/json');

try {
    require_once "dbh.inc.php"; // Include the database connection
} catch (PDOException $e) {
    die(json_encode(['error' => 'Connection failed: ' . $e->getMessage()]));
}

// Check if the trainer ID is set in the session
if (!isset($_SESSION['trainer_id'])) {
    echo json_encode(['error' => 'Trainer not logged in or not registered as a trainer.']);
    exit;
}

// Retrieve the trainer ID from the session
$trainer_id = intval($_SESSION['trainer_id']);

if ($trainer_id <= 0) {
    echo json_encode(['error' => 'Invalid trainer ID']);
    exit;
}

// Query to fetch trainer details
$sql = "
    SELECT 
        t.trainer_fb, t.trainer_insta, t.trainer_ytb, t.gender_prefrence, 
        t.trainer_spe, t.trainer_img, u.user_name, u.user_phonenum, 
        u.user_email, u.user_bio, u.user_address
    FROM trainers t
    JOIN users u ON t.user_id = u.user_id
    WHERE t.trainer_id = :trainer_id
";

try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':trainer_id', $trainer_id, PDO::PARAM_INT);
    $stmt->execute();
    $trainer = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($trainer) {
        // Convert BLOB to Base64 for images
        $trainer['trainer_img'] = base64_encode($trainer['trainer_img']);
        echo json_encode($trainer);
    } else {
        echo json_encode(['error' => 'Trainer not found']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    exit;
}
