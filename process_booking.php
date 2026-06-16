<?php
// ============================================================
// Fig 3: PHP Syntax Practice – Car Hire Booking Form Processor
// Unit: BIT3208 | Week 3 | Car Hire System
// ============================================================

// Vehicle pricing table (KES per day)
$pricing = [
    'economy'  => 3000,
    'suv'      => 6500,
    'luxury'   => 12000,
    'minibus'  => 9000,
];

$vehicleNames = [
    'economy'  => 'Economy',
    'suv'      => 'SUV',
    'luxury'   => 'Luxury Sedan',
    'minibus'  => 'Minibus',
];

// ---- Process POST data from booking_form.html ----
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitise inputs to prevent XSS
    $customerName = htmlspecialchars(trim($_POST['customerName'] ?? ''));
    $email        = htmlspecialchars(trim($_POST['email'] ?? ''));
    $vehicle      = htmlspecialchars(trim($_POST['vehicle'] ?? ''));
    $pickupDate   = $_POST['pickupDate'] ?? '';
    $returnDate   = $_POST['returnDate'] ?? '';

    // --- Server-side validation ---
    $errors = [];

    if (empty($customerName)) {
        $errors[] = "Customer name is required.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }

    if (empty($vehicle) || !array_key_exists($vehicle, $pricing)) {
        $errors[] = "Please select a valid vehicle category.";
    }

    if (empty($pickupDate)) {
        $errors[] = "Pickup date is required.";
    }

    if (empty($returnDate)) {
        $errors[] = "Return date is required.";
    }

    if (!empty($pickupDate) && !empty($returnDate)) {
        $pickup = new DateTime($pickupDate);
        $return = new DateTime($returnDate);
        $days   = $return->diff($pickup)->days;

        if ($return <= $pickup) {
            $errors[] = "Return date must be after the pickup date.";
        }
    }

    // --- Display result ---
    if (!empty($errors)) {
        echo "<h3 style='color:red;'>Booking Failed – Please fix the following:</h3><ul>";
        foreach ($errors as $err) {
            echo "<li>" . $err . "</li>";
        }
        echo "</ul>";
    } else {
        $dailyRate   = $pricing[$vehicle];
        $totalCost   = $days * $dailyRate;
        $vehicleName = $vehicleNames[$vehicle];
        $bookingRef  = strtoupper(substr(md5(uniqid()), 0, 8)); // random booking ref

        echo "
        <div style='font-family:Arial; max-width:500px; margin:40px auto;
                    background:#e8f5e9; border:1px solid #a5d6a7;
                    border-radius:8px; padding:30px;'>
            <h2 style='color:#2e7d32;'>✅ Booking Confirmed!</h2>
            <p style='color:#555; margin-bottom:20px;'>
                Thank you, <strong>{$customerName}</strong>.
                Your car hire booking has been received.
            </p>
            <table style='width:100%; border-collapse:collapse; font-size:14px;'>
                <tr style='background:#c8e6c9;'>
                    <th style='padding:8px; text-align:left;'>Detail</th>
                    <th style='padding:8px; text-align:left;'>Value</th>
                </tr>
                <tr><td style='padding:8px;'>Booking Reference</td><td style='padding:8px;'><strong>{$bookingRef}</strong></td></tr>
                <tr style='background:#f1f8e9;'><td style='padding:8px;'>Customer</td><td style='padding:8px;'>{$customerName}</td></tr>
                <tr><td style='padding:8px;'>Email</td><td style='padding:8px;'>{$email}</td></tr>
                <tr style='background:#f1f8e9;'><td style='padding:8px;'>Vehicle</td><td style='padding:8px;'>{$vehicleName}</td></tr>
                <tr><td style='padding:8px;'>Pickup Date</td><td style='padding:8px;'>{$pickupDate}</td></tr>
                <tr style='background:#f1f8e9;'><td style='padding:8px;'>Return Date</td><td style='padding:8px;'>{$returnDate}</td></tr>
                <tr><td style='padding:8px;'>Duration</td><td style='padding:8px;'>{$days} day(s)</td></tr>
                <tr style='background:#f1f8e9;'><td style='padding:8px;'>Daily Rate</td><td style='padding:8px;'>KES " . number_format($dailyRate) . "</td></tr>
                <tr style='background:#a5d6a7; font-weight:bold;'>
                    <td style='padding:10px;'>Total Cost</td>
                    <td style='padding:10px;'>KES " . number_format($totalCost) . "</td>
                </tr>
            </table>
            <p style='margin-top:16px; color:#555; font-size:13px;'>
                A confirmation email will be sent to <strong>{$email}</strong>.
            </p>
        </div>";
    }

} else {
    // Direct access (not a POST request)
    echo "<p style='font-family:Arial; color:red; padding:20px;'>
            ⚠️ Access this page by submitting the booking form.
          </p>";
}
?>
