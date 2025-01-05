<?php
// Start a session
session_start();

// Include configuration and helper files


// Get the requested page from the URL (e.g., ?page=home)
$page = isset($_GET['page']) ? $_GET['page'] :'programs';

// List of allowed pages to prevent unauthorized file access
$allowed_pages = ['home', 'about_us', 'explore', 'profile', 'login', 'info', 'ownerform', 'payement', 'programs', 'store', 'trainers', 
'trainerform', 'gymdashboard', 'exercise', 'descreption','catigory', ];

if (in_array($page, $allowed_pages)) {
    // Include the requested page file if it exists
    
    include "www/pages/$page.php";     // Specific page content
  
} else {
    // Display a 404 error page if the page is not found
    include 'pages/header.php';
    echo "<h1>404 - Page Not Found</h1>";
    include 'pages/footer.php';
}