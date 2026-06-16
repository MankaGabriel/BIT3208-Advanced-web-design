<?php
// ============================================================
// Task 5 & 6: Connecting PHP to Database + Fetching Records
// Standalone demo matching the lesson examples exactly
// ============================================================

// --- Task 5: Connect to the database ---
$conn = mysqli_connect("localhost", "root", "", "week5db");

if (!$conn) {
    die("Connection Failed");
}

echo "<!DOCTYPE html><html><head><link rel='stylesheet' href='css/style.css'></head><body>";
echo "<div class='card wide'>";
echo "<h2>🚗 Task 5 & 6 — Connect + Fetch Records</h2>";
echo "<p class='success-box'>✅ Connected to week5db successfully.</p>";

// --- Task 6: Fetch and display all vehicle records ---
$result = mysqli_query($conn, "SELECT * FROM vehicles");

echo "<table>";
echo "<tr><th>ID</th><th>Category</th><th>Model</th><th>Plate</th><th>Rate</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . htmlspecialchars($row['category']) . "</td>";
    echo "<td>" . htmlspecialchars($row['model']) . "</td>";
    echo "<td>" . htmlspecialchars($row['plate_number']) . "</td>";
    echo "<td>KES " . number_format($row['daily_rate']) . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "<p class='link-text'><a href='index.php'>&larr; Back to vehicle list</a></p>";
echo "</div></body></html>";

mysqli_close($conn);
?>
