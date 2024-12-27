<?php
// Turn on error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials (replace with your actual credentials)
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "gym-match";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connected successfully.<br>";
}

// Check if form data is being sent
var_dump($_POST);  // Debug: check POST data
var_dump($_FILES); // Debug: check FILES data

// Retrieve form data and check if they are set
$gymName = isset($_POST["gymName"]) ? $_POST["gymName"] : '';
$location = isset($_POST["location"]) ? $_POST["location"] : '';
$targetGender = isset($_POST["targetGender"]) ? $_POST["targetGender"] : '';
$extraActivities = isset($_POST["activities"]) ? $_POST["activities"] : '';
$userId = 1; // Replace with the actual user_id if you have a user system

// Initialize variables for file uploads
$gymImage = '';
$timetableBlob = '';

// Handle image upload
if (isset($_FILES["gymImage"]) && $_FILES["gymImage"]["error"] == 0) {
    $gymImage = file_get_contents($_FILES["gymImage"]["tmp_name"]); // Convert image to binary data
} else {
    echo "Error with gym image upload: " . $_FILES["gymImage"]["error"] . "<br>";
}

// Handle timetable upload
if (isset($_FILES['timetable']) && $_FILES['timetable']['error'] == 0) {
    $timetableBlob = file_get_contents($_FILES['timetable']['tmp_name']); // Convert timetable file to binary data
} else {
    echo "Error with timetable file upload: " . $_FILES['timetable']['error'] . "<br>";
}

// Prepare SQL query to insert gym details
$stmt = $conn->prepare("INSERT INTO gyms (gym_name, gym_location, gym_targender, gym_extra, gym_img, gym_timetable, user_id) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");

// Check if statement preparation was successful
if (!$stmt) {
    die("Error preparing the SQL statement: " . htmlspecialchars($conn->error));
}

// Bind parameters, using 's' for strings and 'b' for binary data (BLOBs)
$stmt->bind_param("ssssssi", 
                 $gymName,
                 $location,
                 $targetGender,
                 $extraActivities,
                 $gymImage,
                 $timetableBlob,
                 $userId);

// For BLOBs, we need to send the data using send_long_data
if (isset($_FILES["gymImage"]) && $_FILES["gymImage"]["error"] == 0) {
    $stmt->send_long_data(4, $gymImage); // 4 is the index for gym_img in the query
}

if (isset($_FILES['timetable']) && $_FILES['timetable']['error'] == 0) {
    $stmt->send_long_data(5, $timetableBlob); // 5 is the index for gym_timetable in the query
}

// Execute the query
if ($stmt->execute()) {
    echo "New record created successfully.<br>";
} else {
    echo "Error executing query: " . htmlspecialchars($stmt->error) . "<br>";
}

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();
?>
