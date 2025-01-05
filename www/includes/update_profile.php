<?php
require_once '../includes/dbh.inc.php';

// Assuming the user is logged in, replace with session-based user_id
$user_id = 4; // Replace with $_SESSION['user_id'] if using sessions

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $age = $_POST['age'] ?? '';
    $status = $_POST['status'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $email = $_POST['email'] ?? '';
    $bio = $_POST['bio'] ?? '';

    // Handle profile picture upload if provided
    if (!empty($_FILES['profilePicture']['name'])) {
        $uploadDir = '../assets/images/profile/';
        $fileName = basename($_FILES['profilePicture']['name']);
        $targetFilePath = $uploadDir . $fileName;
        
        if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $targetFilePath)) {
            $profilePicturePath = $targetFilePath;
        } else {
            $response['error'] = 'Failed to upload profile picture.';
            echo json_encode($response);
            exit;
        }
    }

    try {
        $query = "UPDATE users SET user_name = :username, user_acc = :name, user_phonenum = :phone,
                  user_age = :age, user_status = :status, user_gender = :gender, user_email = :email, 
                  user_bio = :bio";

        if (isset($profilePicturePath)) {
            $query .= ", user_img = :profile_pic";
        }

        $query .= " WHERE user_id = :user_id";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if (isset($profilePicturePath)) {
            $stmt->bindParam(':profile_pic', $profilePicturePath);
        }

        if ($stmt->execute()) {
            $response['success'] = true;
        } else {
            $response['error'] = 'Failed to update the database.';
        }
    } catch (PDOException $e) {
        $response['error'] = 'Database error: ' . $e->getMessage();
    }
}

echo json_encode($response);
?>
