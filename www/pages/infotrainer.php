<?php
if (!isset($_GET['trainer_id'])) {
    die("Trainer ID not provided.");
}

$trainerId = (int) $_GET['trainer_id'];

try {
    require_once "../includes/dbh.inc.php";

    $query = "
        SELECT 
            u.user_name, 
            u.user_phonenum, 
            u.user_email, 
            u.user_address, 
            u.user_bio,
            t.gender_prefrence, 
            t.trainer_spe, 
            t.trainer_img
        FROM trainers t
        INNER JOIN users u ON t.user_id = u.user_id
        WHERE t.trainer_id = :trainer_id;
    ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':trainer_id', $trainerId, PDO::PARAM_INT);
    $stmt->execute();
    $trainer = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$trainer) {
        die("Trainer not found.");
    }

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
    <title>Trainer Info</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/animate.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/infotrainer.css">
</head>
<body>
    <header>
        <!-- Your header content -->
    </header>

    <div class="program-descreption container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 mt-5 mb-5">
                <h3 id="trainer-name" class="program-name text-light text-center fw-bold">Trainer: <?php echo htmlspecialchars($trainer['user_name']); ?></h3>
            </div>
            <div class="col-12">
                <img id="trainer-image" class="img-fluid descreption-image rounded mx-auto d-block" src="data:image/jpeg;base64,<?php echo base64_encode($trainer['trainer_img']); ?>" alt="Trainer Image">
            </div>
            <div class="col-8 mt-3">
                <div class="row justify-content-center">
                    <div class="col-11 motivation mb-5 mt-5 p-3">
                        <p id="trainer-title" class="text-center text-light fw-600">Train with <?php echo htmlspecialchars($trainer['user_name']); ?></p>
                    </div>
                    <div class="col-12 workout-summary">
                        <table class="table caption-top">
                            <caption class="caption fw-bold">Trainer Info</caption>
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo htmlspecialchars($trainer['user_name']); ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><?php echo htmlspecialchars($trainer['user_address']); ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo htmlspecialchars($trainer['user_email']); ?></td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td><?php echo htmlspecialchars($trainer['user_phonenum']); ?></td>
                                </tr>
                                <tr>
                                    <td>Target Gender</td>
                                    <td><?php echo htmlspecialchars($trainer['gender_prefrence'] ?? 'N/A'); ?></td>
                                </tr>
                                <tr>
                                    <td>Services</td>
                                    <td><?php echo htmlspecialchars($trainer['trainer_spe']); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 mt-5 text">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="fw-bold">Bio</h3>
                            </div>
                            <div class="col-12">
                                <p id="trainer-bio" class="text-light"><?php echo htmlspecialchars($trainer['user_bio'] ?? 'No bio available.'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>
