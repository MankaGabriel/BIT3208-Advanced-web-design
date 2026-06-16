<?php
// ============================================================
// Task 1: Simple PHP Processing Page – Dynamic Welcome
// Demonstrates the request-response cycle
// ============================================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['username'] ?? ''));

    if (empty($name)) {
        echo "<p style='color:red; font-family:Arial;'>Please enter your name.</p>";
        echo "<a href='index.php'>Go back</a>";
    } else {
        echo "<!DOCTYPE html><html><head><link rel='stylesheet' href='css/style.css'></head><body>";
        echo "<div class='card'>";
        echo "<h2>🚗 Welcome, " . $name . "!</h2>";
        echo "<p class='sub'>Your request was received and processed by the PHP server.</p>";
        echo "<p>This page demonstrates the request-response cycle: your browser (client) sent a POST request, ";
        echo "and this PHP script (server) processed it and generated this dynamic response.</p>";
        echo "<a href='index.php'>&larr; Try again</a>";
        echo "</div></body></html>";
    }
} else {
    header("Location: index.php");
    exit();
}
?>
