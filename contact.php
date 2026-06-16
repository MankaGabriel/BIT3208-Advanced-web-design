<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Car Hire – Contact Us</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="card">
  <h2>🚗 Contact Us</h2>
  <p class="sub">Task 2 — Contact Form (GET vs POST Demo)</p>

  <form method="POST" action="contact_process.php">
    <label for="name">Your Name</label>
    <input type="text" id="name" name="name" required />

    <label for="email">Your Email</label>
    <input type="email" id="email" name="email" required />

    <label for="message">Message</label>
    <textarea id="message" name="message" rows="4" required></textarea>

    <button type="submit">Send Message</button>
  </form>
</div>
</body>
</html>
