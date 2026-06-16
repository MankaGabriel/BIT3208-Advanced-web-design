<?php
// ============================================================
// Task 4: READ Operation – View All Vehicle Records
// ============================================================
include 'includes/db.php';

$result = mysqli_query($conn, "SELECT * FROM vehicles ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Car Hire – Vehicle Management</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="card wide">
  <h2>🚗 Vehicle Fleet Management</h2>
  <p class="sub">Task 4 — CRUD Operations (Read / List All Vehicles)</p>

  <?php if (isset($_GET['msg'])) : ?>
    <p class="success-box"><?php echo htmlspecialchars($_GET['msg']); ?></p>
  <?php endif; ?>

  <a href="add_vehicle.php" class="add-btn">+ Add New Vehicle</a>

  <table>
    <tr>
      <th>ID</th>
      <th>Category</th>
      <th>Model</th>
      <th>Plate Number</th>
      <th>Daily Rate (KES)</th>
      <th>Available</th>
      <th>Actions</th>
    </tr>
    <?php while ($vehicle = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td><?php echo $vehicle['id']; ?></td>
      <td><?php echo htmlspecialchars($vehicle['category']); ?></td>
      <td><?php echo htmlspecialchars($vehicle['model']); ?></td>
      <td><?php echo htmlspecialchars($vehicle['plate_number']); ?></td>
      <td><?php echo number_format($vehicle['daily_rate']); ?></td>
      <td><?php echo $vehicle['available'] ? 'Yes' : 'No'; ?></td>
      <td>
        <a href="edit_vehicle.php?id=<?php echo $vehicle['id']; ?>" class="action-btn edit-btn">Edit</a>
        <a href="delete_vehicle.php?id=<?php echo $vehicle['id']; ?>" class="action-btn delete-btn"
           onclick="return confirm('Delete this vehicle?');">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>
</body>
</html>
