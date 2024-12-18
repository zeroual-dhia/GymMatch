<?php

$servername = "localhost"; 
$username = "root";        
$password = "";           
$dbname = "gym-match";    

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $message = $_POST['message'];
    
    // Get current timestamp for contact_time
    $contact_time = date('Y-m-d H:i:s'); // This will store the current date and time.

    // You can either set user_id to NULL or a default value like 1 if needed
    $user_id = 1;  // You can modify this based on your actual logic.

    // Prepare the SQL query to insert data into the `contacts` table
    $sql = "INSERT INTO contacts (contact_name, contact_msg, contact_time, user_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error); // If prepare fails
    }

    // Bind parameters (name, message, contact_time, user_id)
    $stmt->bind_param("sssi", $name, $message, $contact_time, $user_id);

    // Execute the query and check the result
    if ($stmt->execute()) {
        // Redirect to success page after successful insert
        header("Location: ../pages/about_us.html");
        exit; // Make sure to exit after the redirect
    } else {
        echo "Error: " . $stmt->error; // Show any error if insert fails
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
