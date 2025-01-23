<?php
include_once "connect.php";
include_once "calculatetime.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

function fetchRequests($connect, $query, $type) {
    $page='';
    if($type =='trainer'){
        $page='infotrainer' ;
    } 
    else{
        $page='info' ;
    }
    $stmt = $connect->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $time = calculate_time($row['request_time']);
            echo '
                <a href="../../index.php?page='.$page.'&id='. $row["{$type}_id"] .'" class="dropdown-item">
                    <h6 class="fw-normal mb-0">' . ucfirst($type) . ' request : '.$row['gym_name'].'</h6>
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



fetchRequests($connect, "SELECT t.trainer_id, u.user_name as trainer_name, t.request_time FROM trainers t  join users u on u.user_id=t.user_id WHERE t.tr_accepted = 0", "trainer");


fetchRequests($connect, "SELECT gym_id,gym_name, request_time FROM gyms WHERE gym_accepted = 0", "gym");
?>
