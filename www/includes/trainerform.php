<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Required Fields
    $facebook = $_POST['facebook'] ?? null;
    $instagram = $_POST['instagram'] ?? null;
    $youtube = $_POST['youtube'] ?? null;
    $gender_preference = $_POST['Gender preference'] ?? null;
    $specialization = $_POST['services'] ?? null;
   
    $user_id=$_SESSION['user_id'];// Replace this with dynamic user ID based on session or authentication.;

    // Validate required fields
    if (empty($specialization) || empty($user_id)) {
        die("Error: All required fields must be filled.");
    }

    // Handle profile picture upload
    if (isset($_FILES['pic-profile']) && $_FILES['pic-profile']['error'] === UPLOAD_ERR_OK) {
        $profile_picture = file_get_contents($_FILES['pic-profile']['tmp_name']);

        // Check file size (e.g., max 2MB)
        if ($_FILES['pic-profile']['size'] > 2 * 1024 * 1024) {
            die("Error: Profile picture must not exceed 2MB.");
        } 

        // Check file type
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['pic-profile']['type'], $allowed_types)) {
            die("Error: Profile picture must be a JPG, PNG, or GIF file.");
        }
    } else {
        die("Error: Profile picture is required.");
    }

    // Handle CV upload
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        $cv = file_get_contents($_FILES['cv']['tmp_name']);

        // Check file size (e.g., max 5MB)
        if ($_FILES['cv']['size'] > 5 * 1024 * 1024) {
            die("Error: CV must not exceed 5MB.");
        }

        // Check file type 
        if ($_FILES['cv']['type'] !== 'application/pdf') {
            die("Error: CV must be a PDF file.");
        }
    } else {
        die("Error: CV is required.");
    }

    // Insert data into the database
    try {
        require_once "dbh.inc.php";
        
        $sql = "INSERT INTO trainers (trainer_fb, trainer_insta, trainer_ytb, gender_prefrence, trainer_spe, trainer_img, trainer_cv, user_id) 
                VALUES (:facebook, :instagram, :youtube, :gender_preference, :specialization, :profile_picture, :cv, :user_id)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':facebook', $facebook);
        $stmt->bindParam(':instagram', $instagram);
        $stmt->bindParam(':youtube', $youtube);
        $stmt->bindParam(':gender_preference', $gender_preference);
        $stmt->bindParam(':specialization', $specialization);
        $stmt->bindParam(':profile_picture', $profile_picture, PDO::PARAM_LOB);
        $stmt->bindParam(':cv', $cv, PDO::PARAM_LOB);
        $stmt->bindParam(':user_id', $user_id);

        $stmt->execute();
        $pdo=null;
    $stmt=null;
        echo "Trainer data successfully added.";
        header("Location:../../index.php");
    } catch (PDOException $e) {
        header("Location: ../../index?page=trainerform");
        die("Error: " . $e->getMessage());
    }
}

