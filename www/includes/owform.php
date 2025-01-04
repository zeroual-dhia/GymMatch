<?php
 include_once("connect.php");
// Turn on error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debugging: Display posted data
    var_dump($_POST);  
    var_dump($_FILES); 

    // Retrieve form data
    $gymName = $_POST["gymName"] ?? '';
    $location = $_POST["location"] ?? '';
    $targetGender = $_POST["targetGender"] ?? '';
    $extraActivities = $_POST["activities"] ?? '';
    $userId = 1; // Replace with actual user_id if applicable

    // Initialize variables for file uploads
    $gymImage = null;
    $timetableBlob = null;

    // Handle image upload
    if (isset($_FILES["gymImage"]) && $_FILES["gymImage"]["error"] === UPLOAD_ERR_OK) {
        $gymImage = file_get_contents($_FILES["gymImage"]["tmp_name"]);
    } else {
        echo "Error with gym image upload: " . $_FILES["gymImage"]["error"] . "<br>";
    }

    // Handle timetable upload
    if (isset($_FILES["timetable"]) && $_FILES["timetable"]["error"] === UPLOAD_ERR_OK) {
        $timetableBlob = file_get_contents($_FILES["timetable"]["tmp_name"]);
    } else {
        echo "Error with timetable file upload: " . $_FILES["timetable"]["error"] . "<br>";
    }

    // Prepare SQL query
    $stmt = $conn->prepare("INSERT INTO gyms (gym_name, gym_location, gym_targender, gym_extra, gym_img, gym_timetable, user_id) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error preparing the SQL statement: " . htmlspecialchars($conn->error));
    }

    // Bind parameters
    $stmt->bind_param("ssssssi", 
        $gymName,
        $location,
        $targetGender,
        $extraActivities,
        $gymImage,
        $timetableBlob,
        $userId
    );

    // Execute the query
    if ($stmt->execute()) {
        echo "New record created successfully.<br>";
    } else {
        echo "Error executing query: " . htmlspecialchars($stmt->error) . "<br>";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>