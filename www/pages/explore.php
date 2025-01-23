
<!DOCTYPE html>
<html lang="en">
 <?php include_once 'www/includes/connect.php' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Gyms</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="www/css/explore.css">
    <link rel="stylesheet" href="www/css/header.css">
    <link rel="stylesheet" href="www/css/preloader.css">
    <link rel="stylesheet" href="www/css/footer.css">
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
   <?php include 'header.php' ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg spad" data-setbg="../images/gallery/hero2.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <div class="breadcrumb-text">
                        <h2>explore gyms</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <div class="search-container">
        <div class="InputContainer">
            <div class="searchFields">
                <input placeholder="Search by Name / location" id="nameInput" class="input" name="name" type="text" />
            </div>
            <label class="labelforsearch" for="nameInput">
                <svg class="searchIcon" viewBox="0 0 512 512">
                    <path
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                    </path>
                </svg>
            </label>
        </div>
    </div>

    <section class="explore_page">
        <center>
            <h2>OUR GYMS</h2>
        </center>

        <div class="gym-list-container">
            <div class="gym-list">


                <?php
                $sql=$connect->prepare('select * from gyms where gym_accepted=1');
                $sql->execute();
                $result=$sql->get_result();
                if($result->num_rows > 0) {
                while($row=$result->fetch_assoc())
                {           
                    $image_b64 = base64_encode($row["gym_img"]);
                    $image_src = 'data:image/ ;base64,' . $image_b64;
                echo '<div class="gym-card">
                    <a href="index.php?page=info&id='.$row['gym_id'].'" class="gym-link">  
                        <img src="'.$image_src.'" alt="Default Gym Image">
                        <h3>'.$row['gym_name'].'</h3>
                        <p>Location:'.$row['gym_location'].'<br>Facilities:'.$row['gym_extra'].'</p>
                    </a>
                </div>';
                }}
                ?>



            </div>
        </div>
    </section>

    <?php include 'footer.php' ?>

    <script src="www/js/header.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="www/js/explore.js"></script>
</body>

</html>

<?php
$conn->close();
?>