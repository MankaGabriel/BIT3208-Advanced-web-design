<?php
// ============================================================
// Task 3: Session-Based Welcome Page
// Protects the page so only logged-in users can view it
// ============================================================
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=Please login to access the dashboard.");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Car Hire – Dashboard</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="card">
  <h2>🚗 Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</h2>
  <p class="sub">Task 3 — Session-Protected Dashboard</p>

  <div class="info-box">
    <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
    <p><strong>Session ID:</strong> <?php echo session_id(); ?></p>
    <p>You are seeing this page because a valid session was created when you logged in.
       If you try to open this page without logging in, you will be redirected back to the login page.</p>
  </div>

  <a href="logout.php" class="btn-link">Logout</a>
</div>
</body>
</html>
