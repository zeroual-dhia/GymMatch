<?php



    // Start the session
    session_start();
    
    // Destroy all session variables
    session_unset();
    
    // Destroy the session
    session_destroy();
    
    echo "destroyed";
    // Redirect to the homepage or login page
    header("Location: ../../index.php?page=home");
    exit;
   

