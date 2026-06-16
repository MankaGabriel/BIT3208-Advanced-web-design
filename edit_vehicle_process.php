<?php
// ============================================================
// Task 4: UPDATE Operation – Save Edited Vehicle Record
// ============================================================
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id          = $_POST['id'] ?? 0;
    $category    = htmlspecialchars(trim($_POST['category'] ?? ''));
    $model       = htmlspecialchars(trim($_POST['model'] ?? ''));
    $plate       = htmlspecialchars(trim($_POST['plate_number'] ?? ''));
    $rate        = $_POST['daily_rate'] ?? '';
    $available   = $_POST['available'] ?? 1;

    if (empty($category) || empty($model) || empty($plate) || $rate === '') {
        header("Location: edit_vehicle.php?id=$id&error=All fields are required.");
        exit();
    }

    $sql = "UPDATE vehicles
            SET category='$category', model='$model', plate_number='$plate',
                daily_rate='$rate', available='$available'
            WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?msg=Vehicle updated successfully.");
        exit();
    } else {
        header("Location: edit_vehicle.php?id=$id&error=" . urlencode(mysqli_error($conn)));
        exit();
    }

} else {
    header("Location: index.php");
    exit();
}
?>
