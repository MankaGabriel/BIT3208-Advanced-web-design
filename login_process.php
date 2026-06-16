<?php
// ============================================================
// Task 3: Login Logic + Session Basics
// ============================================================
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = htmlspecialchars(trim($_POST['username'] ?? ''));
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        header("Location: login.php?error=Username and password are required.");
        exit();
    }

    $sql = "SELECT * FROM customers WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Support both the demo md5 admin account and properly hashed accounts
        $passwordMatches = password_verify($password, $user['password'])
                            || md5($password) === $user['password'];

        if ($passwordMatches) {
            // --- Session-based login ---
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['username']  = $user['username'];
            $_SESSION['full_name'] = $user['full_name'];

            header("Location: dashboard.php");
            exit();
        }
    }

    header("Location: login.php?error=Invalid username or password.");
    exit();

} else {
    header("Location: login.php");
    exit();
}
?>
