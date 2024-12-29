<?php
include_once("connect.php");
include_once("calculatetime.php");

error_reporting(E_ALL); // Report all PHP errors
ini_set('display_errors', 1);

      $sql = $connect->prepare("select trainer_id,request_time from trainers where tr_accepted=0;");

$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $time=calculate_time($row['request_time']);

            echo '
     <a href="#" class="dropdown-item">
           <h6 class="fw-normal mb-0">Trainer request</h6>
           <small>'.$time.'</small>
     </a>
     
     <div class="accept">
     <button class="btn btn-outline-success">accept</button>
     <button class="btn btn-outline-danger">denie</button>

     </div>
     <hr class="dropdown-divider">
     
 ';
      }
} else {
      echo 'not trainer request is found ';
}

$sql2 = $connect->prepare("select gym_id,request_time from gyms where gym_accepted=0;");

$sql2->execute();
$result2 = $sql2->get_result();
if ($result2->num_rows > 0) {
      while ($row2 = $result2->fetch_assoc()) {
        $time2=calculate_time($row2['request_time']);

            echo '
     <a href="#" class="dropdown-item">
           <h6 class="fw-normal mb-0">Gym request</h6>
           <small>'.$time2.'</small>
     </a>
     
     <div class="accept">
     <button class="btn btn-outline-success">accept</button>
     <button class="btn btn-outline-danger">denie</button>

     </div>
     <hr class="dropdown-divider">
     
 ';
      }
} else {
      echo 'no gym request  is found ';
}


?>