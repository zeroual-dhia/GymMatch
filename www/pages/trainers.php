<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trainers</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../../node_modules/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../node_modules/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/trainers.css" type="text/css">
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <!-- Page Header -->
    <header class="header2">
        <div class="logo-name">
            <img id="logo" src="../assets/logo/logo.png" alt="">
            <p class="text-light GYMMATCH">GYM MATCH</p>
        </div>
        <nav class="links">
            <a href="../pages/home.html" class="active">Home</a>
            <a href="../pages/about_us.html">About us</a>
            <a href="../pages/explore.html">Explore</a>
            <a href="../pages/programs.html">Programs</a>
            <a href="../pages/store.html">Store</a>
        </nav>
    </header>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Our Trainers</h2>
                        <div class="bt-option">
                            <a href="../pages/home.html"><i class="fa fa-home"></i> Home</a>
                            <span>Trainers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trainers Section -->
    <section class="team-section team-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <h2>Connect with Our Trainers</h2>
                            <p>Our expert trainers are here to guide your fitness journey to the next level.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="trainer-list">
                <?php
                try {
                    // Include the database connection
                    require_once "dbh.inc.php";

                    // Fetch trainers and join with users table
                    $sql = "SELECT 
                                t.trainer_id, t.trainer_fb, t.trainer_insta, t.trainer_ytb, 
                                t.gender_prefrence, t.trainer_spe, t.trainer_img, u.user_name 
                            FROM trainers t 
                            INNER JOIN users u ON t.user_id = u.user_id";

                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $trainerImg = base64_encode($row['trainer_img']); // Encode image for display
                            echo '
                            <div class="col-lg-4 col-sm-6">
                                <a href="infotrainer.php?trainer_id=' . $row['trainer_id'] . '">
                                    <div class="ts-item" style="background-image: url(data:image/jpeg;base64,' . $trainerImg . ');">
                                        <div class="ts_text">
                                            <h4>' . htmlspecialchars($row['user_name']) . '</h4>
                                            <span>' . htmlspecialchars($row['trainer_spe']) . '</span>
                                            <div class="tt_social">
                                                ' . (!empty($row['trainer_fb']) ? '<a href="' . htmlspecialchars($row['trainer_fb']) . '" target="_blank"><i class="fa fa-facebook"></i></a>' : '') . '
                                                ' . (!empty($row['trainer_ytb']) ? '<a href="' . htmlspecialchars($row['trainer_ytb']) . '" target="_blank"><i class="fa fa-youtube-play"></i></a>' : '') . '
                                                ' . (!empty($row['trainer_insta']) ? '<a href="' . htmlspecialchars($row['trainer_insta']) . '" target="_blank"><i class="fa fa-instagram"></i></a>' : '') . '
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>';
                        }
                    } else {
                        echo "<p>No trainers found.</p>";
                    }
                } catch (PDOException $e) {
                    echo "<p>Error fetching trainers: " . $e->getMessage() . "</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- JS Plugins -->
    <script src="../js/jstemptrainer/jquery-3.3.1.min.js"></script>
    <script src="../js/jstemptrainer/bootstrap.min.js"></script>
</body>

</html>
