<?php
// ============================================================
// Task 4: DELETE Operation – Remove Vehicle Record
// ============================================================
include 'includes/db.php';

$id = $_GET['id'] ?? 0;

if (!empty($id)) {
    $sql = "DELETE FROM vehicles WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?msg=Vehicle deleted successfully.");
        exit();
    } else {
        header("Location: index.php?msg=" . urlencode("Error: " . mysqli_error($conn)));
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
