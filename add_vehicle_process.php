<?php
// ============================================================
// Task 4: CREATE Operation – Insert New Vehicle Record
// ============================================================
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $category    = htmlspecialchars(trim($_POST['category'] ?? ''));
    $model       = htmlspecialchars(trim($_POST['model'] ?? ''));
    $plate       = htmlspecialchars(trim($_POST['plate_number'] ?? ''));
    $rate        = $_POST['daily_rate'] ?? '';

    if (empty($category) || empty($model) || empty($plate) || $rate === '') {
        header("Location: add_vehicle.php?error=All fields are required.");
        exit();
    }

    if (!is_numeric($rate) || $rate < 0) {
        header("Location: add_vehicle.php?error=Daily rate must be a valid positive number.");
        exit();
    }

    $sql = "INSERT INTO vehicles (category, model, plate_number, daily_rate, available)
            VALUES ('$category', '$model', '$plate', '$rate', 1)";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?msg=Vehicle added successfully.");
        exit();
    } else {
        header("Location: add_vehicle.php?error=" . urlencode(mysqli_error($conn)));
        exit();
    }

} else {
    header("Location: add_vehicle.php");
    exit();
}
?>
