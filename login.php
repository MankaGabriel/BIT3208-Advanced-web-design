<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Car Hire – Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="card">
  <h2>🚗 Car Hire Login</h2>
  <p class="sub">Task 3 — Simple Authentication System</p>

  <?php if (isset($_GET['error'])) : ?>
    <p class="error-box"><?php echo htmlspecialchars($_GET['error']); ?></p>
  <?php endif; ?>

  <?php if (isset($_GET['success'])) : ?>
    <p class="success-box"><?php echo htmlspecialchars($_GET['success']); ?></p>
  <?php endif; ?>

  <form method="POST" action="login_process.php">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="e.g. admin" required />

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required />

    <button type="submit">Login</button>
  </form>

  <p class="link-text">Don't have an account? <a href="register.php">Register here</a></p>
  <p class="hint">Default test login: <strong>admin</strong> / <strong>1234</strong></p>
</div>
</body>
</html>
