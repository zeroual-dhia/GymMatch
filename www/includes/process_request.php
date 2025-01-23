<?php
include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $type = $_POST['type'];
    $action = $_POST['action'];

    if ($type === 'trainer') {
        if ($action === 'accept') {
            $stmt = $connect->prepare("UPDATE trainers SET tr_accepted = 1 WHERE trainer_id = ?");
        } elseif ($action === 'deny') {
            $stmt = $connect->prepare("DELETE FROM trainers WHERE trainer_id = ?");
        }
    } elseif ($type === 'gym') {
        if ($action === 'accept') {
            $stmt = $connect->prepare("UPDATE gyms SET gym_accepted = 1 WHERE gym_id = ?");
        } elseif ($action === 'deny') {
            $stmt = $connect->prepare("DELETE FROM gyms WHERE gym_id = ?");
        }
    }

    if (isset($stmt)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    $connect->close();
    header("Location: ../pages/admin.php");
    exit();
}
?>



