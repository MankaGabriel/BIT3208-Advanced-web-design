<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Car Hire – Register</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="card">
  <h2>🚗 Create Account</h2>
  <p class="sub">Task 2 — Registration Form (PHP Integration)</p>

  <?php if (isset($_GET['error'])) : ?>
    <p class="error-box"><?php echo htmlspecialchars($_GET['error']); ?></p>
  <?php endif; ?>

  <form method="POST" action="register_process.php">
    <label for="fullname">Full Name</label>
    <input type="text" id="fullname" name="fullname" placeholder="e.g. Jane Wambui" required />

    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="e.g. janew" required />

    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" placeholder="e.g. jane@email.com" required />

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Minimum 6 characters" required />

    <button type="submit">Register</button>
  </form>

  <p class="link-text">Already have an account? <a href="login.php">Login here</a></p>
</div>
</body>
</html>
