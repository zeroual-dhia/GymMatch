<?php
include_once("connect.php");
session_start();
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $gymName = $_POST["gymName"] ?? '';
    $location = $_POST["location"] ?? '';
    $targetGender = $_POST["targetGender"] ?? '';
    $extraActivities = $_POST["activities"] ?? null; // Optional field
    $description = $_POST["description"] ?? ''; // Required field
    $user_id=$_SESSION['user_id'];// Replace this with dynamic user ID based on session or authentication.

    // File uploads
    $gymImage = $_FILES["gymImage"] ?? null;
    $timetable = $_FILES["timetable"] ?? null;
    
    // Validate and process file uploads
    $gymImageContent = $timetableContent = null;

    if ($gymImage && $gymImage["error"] === UPLOAD_ERR_OK) {
        $gymImageContent = file_get_contents($gymImage["tmp_name"]);
    } else {
        die("Error uploading gym image: " . $gymImage["error"]);
    }

    if ($timetable && $timetable["error"] === UPLOAD_ERR_OK) {
        $timetableContent = file_get_contents($timetable["tmp_name"]);
    } else {
        die("Error uploading timetable: " . $timetable["error"]);
    }

    // Prepare the SQL query for gym data
    $stmt = $connect->prepare(
        "INSERT INTO gyms (gym_name, gym_location, gym_targender, gym_extra, gym_img, gym_timetable, gym_desc, user_id) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        die("Error preparing SQL statement: " . $connect->error);
    }

    // Bind parameters for gym insertion
    $stmt->bind_param(
        "sssssssi",
        $gymName,
        $location,
        $targetGender,
        $extraActivities,
        $gymImageContent,
        $timetableContent,
        $description,
        $user_id
    );

    // Execute the query for gym data
    if ($stmt->execute()) {
        // Get the last inserted gym ID
        $gymId = $stmt->insert_id;
        echo "Gym record added successfully!";
    } else {
        echo "Error inserting gym data: " . $stmt->error;
    }

    // Insert membership data into `membership` table for each plan
    $membershipPrices = $_POST["membershipPrice"] ?? [];
    $membershipDurations = $_POST["membershipDuration"] ?? [];
    $membershipOffers = $_POST["membershipOffer"] ?? [];

    foreach ($membershipPrices as $index => $price) {
        // Only insert if price and duration are not empty
        $membershipPrice = $price;
        $membershipDuration = $membershipDurations[$index] ?? '';
        $membershipOffer = $membershipOffers[$index] ?? '';

        // Skip empty membership plans
        if (empty($membershipPrice) || empty($membershipDuration)) {
            continue;
        }

        // Prepare SQL query for membership data
        $stmt = $connect->prepare(
            "INSERT INTO memberships (ship_price, ship_offer, ship_duration, gym_id) 
             VALUES (?, ?, ?, ?)"
        );

        if (!$stmt) {
            die("Error preparing membership SQL statement: " . $connect->error);
        }

        // Bind parameters for membership data
        $stmt->bind_param(
            "dssi",
            $membershipPrice,
            $membershipOffer,
            $membershipDuration,
            $gymId
        );

        // Execute the query for membership data
        if (!$stmt->execute()) {
            die("Error inserting membership data: " . $stmt->error);
        }
    }
    
    echo "Membership data added successfully!";
    $stmt->close();
    $connect->close();
    header("Location:../../index.php");       
}
?>
