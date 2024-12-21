<!DOCTYPE html>
<html lang="en">

<?php include_once '../php/connect.php'; ?>

<head>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs - Gym Website</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/animate.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/descreption.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">




</head>




<body class="p-0">

    <?php
    include 'header.php';
    ?>
    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $sql = $connect->prepare("select * from program where program_id= ?");
    $sql->bind_param("i", $_GET["id"]);
    $sql->execute();
    $result = $sql->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image_b64 = base64_encode($row["pr_image"]);
        $image_src = 'data:image/ ;base64,' . $image_b64;
        echo '<div class="desc row justify-content-center pt-5">
            <div class="col-12 mt-5 mb-5">
                <h3 class="program-name text-light text-center fw-bold">' . $row['program_title'] . '</h3>
            </div>
            <div class="col-12 ">
                <img class=" img-fluid descreption-image rounded mx-auto d-block" src="' . $image_src . '"
                    alt="">
            </div>

            <div class="col-lg-8 col-md-10 col-sm-11 mt-3 ">
                <div class="row justify-content-center">
                    <div class="col-11 motivation mb-5 mt-5 p-3   wow fadeInLeft " >
                        <p class="text-center text-light fw-600">' . $row['pr_description'] . '</p>
                    </div>
                    <div class="col-12 workout-summary  wow fadeInLeft" data-wow-duration="2s" >
                        <table class="table caption-top">
                            <caption class="caption fw-bold ">Workout Summary:</caption>

                            <tbody>
                                <tr class="table-row">
                                    <td id="col1">Main Goal</td>
                                    <td>
                                        ' . $row['main_goal'] . '</td>
                                </tr>
                                <tr class="table-row">
                                    <td id="col1">Workout Type</td>
                                    <td>' . $row['workout_type'] . '</td>
                                </tr>
                                <tr class="table-row">
                                    <td id="col1">Training Level</td>
                                    <td>' . $row['training_level'] . '</td>
                                </tr>
                                <tr class="table-row">
                                    <td id="col1">Program Duration</td>
                                    <td>' . $row['program_duration'] . ' weeks</td>
                                </tr>
                                <tr class="table-row">
                                    <td id="col1">Days Per Week</td>
                                    <td>' . $row['days_per_week'] . '</td>
                                </tr>
                                <tr class="table-row">
                                    <td id="col1">Time Per Workout</td>
                                    <td>' . $row['time_per_workout'] . '</td>
                                </tr>
                                <tr class="table-row">
                                    <td id="col1">Equipment Required</td>
                                    <td>' . $row['equipment_required'] . '</td>
                                </tr>
                                <tr class="table-row">
                                    <td id="col1">Target Gender</td>
                                    <td>' . $row['target_gender'] . ' </td>
                                </tr>
                                <tr class="table-row">
                                    <td id="col1">Recomanded supps</td>
                                    <td>' . $row['recommended_supplements'] . '
                                    </td>
                                </tr>


                            </tbody>
                        </table>

                    </div>
                     <div class="col-12 mt-5 text wow fadeInUp ">
        <div class="row ">
            <div class="col-12 ">
                <h3 class="fw-bold ">Workout Descreption :</h3>
            </div>
            <div class="col-12">
                <p class="text-light">' . $row['wr_descreption'] . '</p>
            </div>
        </div>


    </div>
    </div>
    ';

    } else {
        echo '<p class="text-light">No programs found for the selected goal.</p>';
    }
    ?>



    <div class="col-12 mt-4 text ">
        <h3>Workout program :</h3>
    </div>

    <?php


    $sql2 = $connect->prepare('select workout_descreption,workout_title from workout where program_id=?');
    $sql2->bind_param('i', $_GET['id']);
    $sql2->execute();
    $result2 = $sql2->get_result();
    $i=1;
    if ($result2 && $result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {


            echo '<div class="col-12">
        <div class="row wow fadeInUp">

            <div class="col-12 mt-4 Workout">
                <div class="col-12">
                    <h4 class="text-light">Workout ' . $i++ . ':'.$row2['workout_title'].' </h4>
                    <p class="text-light fw-500">'.$row2['workout_descreption'].' </p>
                </div>

                <table class="table table-striped mt-5 table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Exercise</th>
                            <th scope="col">Sets</th>
                            <th scope="col">Reps</th>
                            <th scope="col">Rest</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"><a href="exercise.php" style="text-decoration: none;">Miltary Press</a></td>
                            <td>5</td>
                            <td>3-5</td>
                            <td>3 min</td>
                        </tr>
                        <tr>
                            <td scope="row"><a style="text-decoration: none;" href="exercise.php">Incline Bench
                                    Press</a></td>
                            <td>4</td>
                            <td>3-5</td>
                            <td>3 min</td>
                        </tr>
                        <tr>
                            <td scope="row"><a style="text-decoration: none;" href="exercise.php">Dummble Bench
                                    Press</a></td>
                            <td>3</td>
                            <td>5</td>
                            <td>2 min</td>
                        </tr>
                        <tr>
                            <td scope="row"><a style="text-decoration: none;" href="exercise.php">Tricep Dip</a></td>
                            <td>3</td>
                            <td>5</td>
                            <td>2 min</td>
                        </tr>
                        <tr>
                            <td scope="row"><a style="text-decoration: none;" href="exercise.php">Overhead EZ Bar Tricep
                                    Extension</a></td>
                            <td>3</td>
                            <td>5</td>
                            <td>2 min</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>';
        }
    } else {

    }
    ?>



    </div>
    </div>
    </div>


    </div>


    <?php
    include 'footer.php';
    ?>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

</body>


</html>