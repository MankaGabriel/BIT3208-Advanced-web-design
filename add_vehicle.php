<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Car Hire – Add Vehicle</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="card">
  <h2>🚗 Add New Vehicle</h2>
  <p class="sub">Task 4 — CRUD Operations (Create)</p>

  <?php if (isset($_GET['error'])) : ?>
    <p class="error-box"><?php echo htmlspecialchars($_GET['error']); ?></p>
  <?php endif; ?>

  <form method="POST" action="add_vehicle_process.php">
    <label for="category">Category</label>
    <select id="category" name="category" required>
      <option value="">-- Select category --</option>
      <option value="Economy">Economy</option>
      <option value="SUV">SUV</option>
      <option value="Luxury">Luxury</option>
      <option value="Minibus">Minibus</option>
    </select>

    <label for="model">Vehicle Model</label>
    <input type="text" id="model" name="model" placeholder="e.g. Toyota Vitz" required />

    <label for="plate_number">Plate Number</label>
    <input type="text" id="plate_number" name="plate_number" placeholder="e.g. KDA 001A" required />

    <label for="daily_rate">Daily Rate (KES)</label>
    <input type="number" id="daily_rate" name="daily_rate" placeholder="e.g. 3000" min="0" step="0.01" required />

    <button type="submit">Add Vehicle</button>
  </form>

  <p class="link-text"><a href="index.php">&larr; Back to vehicle list</a></p>
</div>
</body>
</html>
