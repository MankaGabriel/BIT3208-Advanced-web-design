<?php
// ============================================================
// Fig 4: Database Connection Script – Car Hire System
// Unit: BIT3208 | Week 3
// Tests connection to car_hire_db and creates required tables
// ============================================================

ini_set('display_errors', 1);
error_reporting(E_ALL);

// --- Database Configuration ---
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'car_hire_db';

echo "<h2 style='font-family:Arial; color:#1a3c5e;'>Car Hire Database Setup</h2>";
echo "<p style='font-family:Arial;'>Trying to connect to MySQL...</p>";

// --- Step 1: Connect to MySQL server (no DB selected yet) ---
$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("<p style='font-family:Arial; color:red;'>❌ Connection failed: " . $conn->connect_error . "</p>");
}
echo "<p style='font-family:Arial; color:green;'>✅ Step 1: Connected to MySQL server successfully.</p>";

// --- Step 2: Create the database if it does not exist ---
if ($conn->query("CREATE DATABASE IF NOT EXISTS $dbname")) {
    echo "<p style='font-family:Arial; color:green;'>✅ Step 2: Database '$dbname' is ready.</p>";
} else {
    die("<p style='font-family:Arial; color:red;'>❌ Error creating database: " . $conn->error . "</p>");
}

// --- Step 3: Select the database ---
$conn->select_db($dbname);
echo "<p style='font-family:Arial; color:green;'>✅ Step 3: Database '$dbname' selected.</p>";

// --- Step 4: Create customers table ---
$sql_customers = "
CREATE TABLE IF NOT EXISTS customers (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    full_name    VARCHAR(100) NOT NULL,
    email        VARCHAR(100) NOT NULL UNIQUE,
    phone        VARCHAR(20),
    password     VARCHAR(255) NOT NULL,
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql_customers)) {
    echo "<p style='font-family:Arial; color:green;'>✅ Step 4: Table 'customers' is ready.</p>";
} else {
    echo "<p style='font-family:Arial; color:red;'>❌ Error creating customers table: " . $conn->error . "</p>";
}

// --- Step 5: Create vehicles table ---
$sql_vehicles = "
CREATE TABLE IF NOT EXISTS vehicles (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    category     VARCHAR(50) NOT NULL,
    model        VARCHAR(100) NOT NULL,
    plate_number VARCHAR(20) NOT NULL UNIQUE,
    daily_rate   DECIMAL(10,2) NOT NULL,
    available    TINYINT(1) DEFAULT 1
)";

if ($conn->query($sql_vehicles)) {
    echo "<p style='font-family:Arial; color:green;'>✅ Step 5: Table 'vehicles' is ready.</p>";
} else {
    echo "<p style='font-family:Arial; color:red;'>❌ Error creating vehicles table: " . $conn->error . "</p>";
}

// --- Step 6: Create bookings table ---
$sql_bookings = "
CREATE TABLE IF NOT EXISTS bookings (
    id             INT AUTO_INCREMENT PRIMARY KEY,
    booking_ref    VARCHAR(20) NOT NULL UNIQUE,
    customer_id    INT NOT NULL,
    vehicle_id     INT NOT NULL,
    pickup_date    DATE NOT NULL,
    return_date    DATE NOT NULL,
    total_cost     DECIMAL(10,2) NOT NULL,
    status         VARCHAR(20) DEFAULT 'pending',
    created_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql_bookings)) {
    echo "<p style='font-family:Arial; color:green;'>✅ Step 6: Table 'bookings' is ready.</p>";
} else {
    echo "<p style='font-family:Arial; color:red;'>❌ Error creating bookings table: " . $conn->error . "</p>";
}

// --- Step 7: Insert sample vehicle data (only if table is empty) ---
$check = $conn->query("SELECT COUNT(*) as total FROM vehicles");
$row   = $check->fetch_assoc();

if ($row['total'] == 0) {
    $sql_seed = "
    INSERT INTO vehicles (category, model, plate_number, daily_rate) VALUES
    ('economy',  'Toyota Vitz',        'KDA 001A', 3000.00),
    ('suv',      'Toyota Land Cruiser','KDB 202B', 6500.00),
    ('luxury',   'Mercedes C-Class',   'KDC 303C', 12000.00),
    ('minibus',  'Toyota HiAce',       'KDD 404D', 9000.00)";

    if ($conn->query($sql_seed)) {
        echo "<p style='font-family:Arial; color:green;'>✅ Step 7: Sample vehicle data inserted.</p>";
    } else {
        echo "<p style='font-family:Arial; color:red;'>❌ Seed error: " . $conn->error . "</p>";
    }
} else {
    echo "<p style='font-family:Arial; color:blue;'>ℹ️ Step 7: Vehicles table already has data – skipping seed.</p>";
}

// --- Step 8: Close connection ---
$conn->close();
echo "<p style='font-family:Arial; color:green;'>✅ Step 8: Database connection closed cleanly.</p>";
echo "<hr><h3 style='font-family:Arial; color:#1a3c5e;'>🎉 car_hire_db setup complete! All tables are ready.</h3>";
?>
