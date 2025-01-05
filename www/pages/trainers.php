<?php
try {
    require_once "../includes/dbh.inc.php";

    $query = "
        SELECT 
            t.trainer_id,
            u.user_name AS trainer_name, 
            t.trainer_spe AS specialization, 
            t.trainer_fb AS facebook, 
            t.trainer_insta AS instagram, 
            t.trainer_ytb AS youtube,
            t.trainer_img AS image
        FROM trainers t
        INNER JOIN users u ON t.user_id = u.user_id;
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $trainers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $stmt = null;
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainers</title>
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../node_modules/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../node_modules/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/trainers.css" type="text/css">
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <header>
        <!-- Your header content -->
    </header>

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

    <section class="team-section team-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <h2>Connect with Our Trainers</h2>
                            <p>Our expert trainers are here to guide your fitness journey to the next level...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if (empty($trainers)) {
                    echo '<p>No trainers found.</p>';
                } else {
                    foreach ($trainers as $trainer) {
                        $imageSrc = !empty($trainer['image'])
                            ? 'data:image/jpeg;base64,' . base64_encode($trainer['image'])
                            : 'path/to/default-image.jpg';

                        echo '
                        <div class="col-lg-4 col-sm-6">
                            <a href="infotrainer.php?trainer_id=' . htmlspecialchars($trainer['trainer_id']) . '" class="trainer-link">
                                <div class="ts-item" style="background-image: url(\'' . htmlspecialchars($imageSrc) . '\');">
                                    <div class="ts_text">
                                        <h4>' . htmlspecialchars($trainer['trainer_name']) . '</h4>
                                        <span>' . htmlspecialchars($trainer['specialization']) . '</span>
                                        <div class="tt_social">
                                            <a href="' . (!empty($trainer['facebook']) ? htmlspecialchars($trainer['facebook']) : '#') . '" target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a href="' . (!empty($trainer['instagram']) ? htmlspecialchars($trainer['instagram']) : '#') . '" target="_blank"><i class="fa fa-instagram"></i></a>
                                            <a href="' . (!empty($trainer['youtube']) ? htmlspecialchars($trainer['youtube']) : '#') . '" target="_blank"><i class="fa fa-youtube-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <script src="../js/jstemptrainer/jquery-3.3.1.min.js"></script>
    <script src="../js/jstemptrainer/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
