<?php
include_once("connect.php");
require_once("calculatetime.php");
error_reporting(E_ALL); // Report all PHP errors
ini_set('display_errors', 1);
// Set the timezone


$sql = $connect->prepare("SELECT * FROM contacts");
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Use calculate_time function to convert TIMESTAMP
        $time = calculate_time($row['contact_time']);
        $messageId = $row['contact_id']; // Assuming there is a unique contact_id field

        echo '
<div class="d-flex align-items-center border-bottom py-3 message">
    <img class="rounded-circle flex-shrink-0" src="../assets/images/admin/user.jpg" alt="" style="width: 40px; height: 40px;">
    <div class="w-100 ms-3">
        <div class="d-flex w-100 justify-content-between">
            <h6 class="mb-0">' . htmlspecialchars($row['contact_name']) . '</h6>
            <small>' . $time . '</small>
        </div>
        <button class="btn btn-outline-light" data-id="' . $messageId . '">Read message</button>
    </div>
</div>
<div class="w-100 py-3 message-content" id="message-' . $messageId . '" style="display: none;">
    <h6 class="mb-0">' . htmlspecialchars($row['contact_msg']) . '</h6>
</div>';
    }
} else {
    echo '<p>No contacts found.</p>';
}

$sql->close();
$connect->close();
?>
