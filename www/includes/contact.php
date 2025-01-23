<?php
// Database connection
include_once 'connect.php' ;
error_reporting(E_ALL); // Report all PHP errors
ini_set('display_errors', 1);
// Set the timezone

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Get current timestamp
    $contact_time = date('Y-m-d H:i:s'); // Format: YYYY-MM-DD HH:MM:SS

    // Set a default user_id, assuming user_id is not coming from the form
   

    // Prepare the SQL query to insert data into the contacts table
    $stmt = $connect->prepare("INSERT INTO contacts (contact_name, contact_email, contact_msg, contact_time) VALUES (?, ?, ?, ?)");

    if ($stmt === false) {
        die("Prepare failed: " . $connect->error);
    }

    // Bind parameters
    $stmt->bind_param("ssss", $name, $email, $message, $contact_time);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to a success page
        header("Location:../../index.php?page=about_us");       
         exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $connect->close();

    
}
?>
