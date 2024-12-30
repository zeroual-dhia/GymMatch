<?php 
date_default_timezone_set('Africa/Algiers');

// Function to calculate time difference
function calculate_time($time)
{
    $currentDateTime = new DateTime();
    $contactDateTime = new DateTime($time);
    $interval = $currentDateTime->diff($contactDateTime);

    if ($interval->y > 0) {
        return $interval->y . ' year(s) ago';
    } elseif ($interval->m > 0) {
        return $interval->m . ' month(s) ago';
    } elseif ($interval->d > 0) {
        return $interval->d . ' day(s) ago';
    } elseif ($interval->h > 0) {
        return $interval->h . ' hour(s) ago';
    } elseif ($interval->i > 0) {
        return $interval->i . ' minute(s) ago';
    } else {
        return 'Just now';
    }
}
?>