<!DOCTYPE html>
<?php include_once '../includes/connect.php' ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs - Gym Website</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/animate.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="www/css/header.css">
    <link rel="stylesheet" href="www/css/info.css">
</head>

<body class="p-0">
    <?php include 'header.php' ?>
    <?php

    $sql = $connect->prepare('SELECT gyms.*, users.user_phonenum FROM gyms 
    JOIN users ON gyms.user_id = users.user_id 
    WHERE gym_id = ?');
    $sql->bind_param('i', $_GET['id']);
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image_b64 = base64_encode($row["gym_img"]);
            $image_src = 'data:image/ ;base64,' . $image_b64;

            echo '
          <div class="program-descreption container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 mt-5 mb-5">
                <h3 class="program-name text-light text-center fw-bold"><br>Gym : ' . $row['gym_name'] . '</h3>
            </div>
            <div class="col-12">
                <img class="img-fluid descreption-image rounded mx-auto d-block" src="' . $image_src . '" alt="">
            </div>
    
            <div class="col-8 mt-3">
                <div class="row justify-content-center">
                    <div class="col-11 motivation mb-5 mt-5 p-3">
                        <p class="text-center text-light fw-600">Welcome to ' . $row['gym_name'] . '</p>
                    </div>
                    <div class="col-12 workout-summary">
                        <table class="table caption-top">
                            <caption class="caption fw-bold">Our gym:</caption>
                            <tbody>
                                <tr class="table-row">
                                    <td id="col1">Location</td>
                                    <td>' . $row['gym_location'] . '</td>
                                </tr>
                              
                                <tr class="table-row">
                                    <td id="col1">Extra Activities</td>
                                    <td>' . $row['gym_extra'] . '</td>
                                </tr>
                                <tr class="table-row">
                                    <td id="col1">Target Gender</td>
                                    <td>' . $row['gym_targender'] . '</td>
                                </tr>
                                <tr class="table-row">
                                    <td id="col1">Contact Information</td>
                                    <td>' . $row['user_phonenum'] . '</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 mt-5 text">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="fw-bold">Description of our gym:</h3>
                            </div>
                            <div class="col-12">
                                <p class="text-light">' . $row['gym_desc'] . '</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
      ';
        }
    }


    ?>

    <!-- Cards Section -->
    <div class="container mt-5">
        <div class="row">
            <?php
            $sql1 = $connect->prepare('
                  select * from memberships where gym_id= ?
              
              ');
            $sql1->bind_param('i', $_GET['id']);
            $sql1->execute();
            $result1 = $sql1->get_result();
            if ($result1->num_rows > 0) {
                while ($row1 = $result1->fetch_assoc()) {

                    echo '
              <div class="col-md-4">
                <section class="card">
                    <header>
                        <h2 class="title">'.$row1['ship_duration'].' Membership</h2>
                        <h1 class="price">'.$row1['ship_price'].'DA</h1>
                    </header>
                    <p class="desc">includes :</p>
                    <ul class="lists">
                        <li class="list">
                            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    fill-rule="evenodd"></path>
                            </svg>
                            <p>'.$row1['ship_offer'].'</p> 
                        </li>
                    </ul>
                    <button class="action" type="button">Get Started</button>
                </section>
            </div>
             
             ';

                }
            }

            ?>

        </div>


    </div>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="node_modules/bootstrap/dist/js/wow.min.js"></script>
    <script src="www/js/info.js"></script>
    <script src="www/js/header.js"></script>
<script src="www/js/info.js"></script>
</body>

</html>