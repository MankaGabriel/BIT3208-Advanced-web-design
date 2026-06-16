<?php
// ============================================================
// Task 2: Contact Form Processing (POST method)
// ============================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email   = htmlspecialchars(trim($_POST['email'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    echo "<!DOCTYPE html><html><head><link rel='stylesheet' href='css/style.css'></head><body>";
    echo "<div class='card'>";
    echo "<h2>✅ Message Received</h2>";
    echo "<div class='info-box'>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Message:</strong> $message</p>";
    echo "</div>";
    echo "<a href='contact.php'>&larr; Send another message</a>";
    echo "</div></body></html>";
} else {
    header("Location: contact.php");
    exit();
}
?>
