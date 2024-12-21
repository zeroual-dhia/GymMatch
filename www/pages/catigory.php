<!DOCTYPE html>
<?php include_once '../php/connect.php'
    ?>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs - Gym Website</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/animate.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/catigory.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">

</head>

<body class="p-0">

    <?php
    include 'header.php';
    ?>


    <div class=" catigory row justify-content-center ">
        <div class="col-8 pb-3">
        
            <?php
            if (isset($_GET['category'])) {
                $category = urldecode($_GET['category']);
            }
            echo '
               <h1 class="text-center fw-bold text-light">' .$category. ' Workouts</h1>
            ';

            ?>

        </div>
        <div class="col-8 mb-4">
            <p class="text-center text-light">Unleash Your Inner Strength, Transform Your Body, Empower Your Mind – Your Fitness Journey Starts Here</p>
        </div>

        <div class="col-lg-10 col-sm-11 workouts p-4 mb-5">
            <h3>WHAT'S NEW</h3>


            <div class="row  justify-content-center">


                <?php

                $sql = $connect->prepare("select program_title,pr_description,pr_image,program_id from program where main_goal=?");
                $sql->bind_param("s", $category);
                $sql->execute();
                $result = $sql->get_result();
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $image_b64=base64_encode($row["pr_image"]);
                        $image_src='data:image/ ;base64,' . $image_b64 ;
                        echo '<div class="col-lg-4 col-md-6 col-sm-9 col-11 mycard wow fadeInUp">
                        
                    <img class="img-fluid rounded" src="' .$image_src .'" alt="">
                   
                    <h3 class="">' . htmlspecialchars($row['program_title']) . '</h3>
                    <p class=""> ' . htmlspecialchars($row['pr_description']) . '
                    </p>
                    <a href="descreption.php?id='.$row['program_id'].'"><button>VIEW WORKOUT</button></a>
                </div>';

                    }
                } else {
                    echo '<p class="text-light">No programs found for the selected goal.</p>';
                }

                ?>



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

    <script src="../js/header.js"></script>


</body>


</html>