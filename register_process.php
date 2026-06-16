<?php
// ============================================================
// Task 2 & 3: Registration Processing
// Secure handling of form data + password hashing
// ============================================================
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullname = htmlspecialchars(trim($_POST['fullname'] ?? ''));
    $username = htmlspecialchars(trim($_POST['username'] ?? ''));
    $email    = htmlspecialchars(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';

    // --- Server-side validation ---
    if (empty($fullname) || empty($username) || empty($email) || empty($password)) {
        header("Location: register.php?error=All fields are required.");
        exit();
    }

    if (strlen($password) < 6) {
        header("Location: register.php?error=Password must be at least 6 characters.");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?error=Invalid email address.");
        exit();
    }

    // --- Check for duplicate username/email ---
    $check = mysqli_query($conn, "SELECT id FROM customers WHERE username='$username' OR email='$email'");
    if (mysqli_num_rows($check) > 0) {
        header("Location: register.php?error=Username or email already exists.");
        exit();
    }

    // --- Secure password handling: hash before storing ---
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO customers (full_name, username, email, password)
            VALUES ('$fullname', '$username', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.php?success=Account created successfully. Please login.");
        exit();
    } else {
        header("Location: register.php?error=" . urlencode(mysqli_error($conn)));
        exit();
    }

} else {
    header("Location: register.php");
    exit();
}
?>
