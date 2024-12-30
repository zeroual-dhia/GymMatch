<?php
include_once "connect.php";
include_once "calculatetime.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

function fetchRequests($connect, $query, $type) {
    $stmt = $connect->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $time = calculate_time($row['request_time']);
            echo '
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">' . ucfirst($type) . ' request</h6>
                    <small>' . $time . '</small>
                </a>
                <div class="accept">
                    <form method="POST" action="../includes/process_request.php" style="display:inline;">
                        <input type="hidden" name="id" value="' . $row["{$type}_id"] . '">
                        <input type="hidden" name="type" value="' . $type . '">
                        <button type="submit" name="action" value="accept" class="btn btn-outline-success">Accept</button>
                        <button type="submit" name="action" value="deny" class="btn btn-outline-danger">Deny</button>
                    </form>
                </div>
                <hr class="dropdown-divider">
            ';
        }
    } else {
        echo 'No ' . $type . ' requests found.';
    }
}


fetchRequests($connect, "SELECT trainer_id, request_time FROM trainers WHERE tr_accepted = 0", "trainer");


fetchRequests($connect, "SELECT gym_id, request_time FROM gyms WHERE gym_accepted = 0", "gym");
?>
