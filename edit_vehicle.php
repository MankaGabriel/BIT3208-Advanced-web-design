<?php
// ============================================================
// Task 4: UPDATE Operation – Edit Vehicle Form
// ============================================================
include 'includes/db.php';

$id = $_GET['id'] ?? 0;
$result = mysqli_query($conn, "SELECT * FROM vehicles WHERE id='$id'");

if (mysqli_num_rows($result) === 0) {
    header("Location: index.php?msg=Vehicle not found.");
    exit();
}

$vehicle = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Car Hire – Edit Vehicle</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="card">
  <h2>🚗 Edit Vehicle</h2>
  <p class="sub">Task 4 — CRUD Operations (Update)</p>

  <form method="POST" action="edit_vehicle_process.php">
    <input type="hidden" name="id" value="<?php echo $vehicle['id']; ?>" />

    <label for="category">Category</label>
    <select id="category" name="category" required>
      <?php foreach (['Economy','SUV','Luxury','Minibus'] as $cat) : ?>
        <option value="<?php echo $cat; ?>" <?php echo ($vehicle['category'] === $cat) ? 'selected' : ''; ?>>
          <?php echo $cat; ?>
        </option>
      <?php endforeach; ?>
    </select>

    <label for="model">Vehicle Model</label>
    <input type="text" id="model" name="model" value="<?php echo htmlspecialchars($vehicle['model']); ?>" required />

    <label for="plate_number">Plate Number</label>
    <input type="text" id="plate_number" name="plate_number" value="<?php echo htmlspecialchars($vehicle['plate_number']); ?>" required />

    <label for="daily_rate">Daily Rate (KES)</label>
    <input type="number" id="daily_rate" name="daily_rate" value="<?php echo $vehicle['daily_rate']; ?>" min="0" step="0.01" required />

    <label for="available">Available for Hire</label>
    <select id="available" name="available">
      <option value="1" <?php echo $vehicle['available'] ? 'selected' : ''; ?>>Yes</option>
      <option value="0" <?php echo !$vehicle['available'] ? 'selected' : ''; ?>>No</option>
    </select>

    <button type="submit">Save Changes</button>
  </form>

  <p class="link-text"><a href="index.php">&larr; Back to vehicle list</a></p>
</div>
</body>
</html>
