<?php
// Get form data
$user_email = $_POST['user_email'];
$service_id = $_POST['service_id'];
$start_date = $_POST['start_date'];
$start_time = $_POST['start_time'];
$workers_needed = $_POST['workers_needed'];
$duration_days = $_POST['duration_days'];
$address = $_POST['address'];

// Connect to the database
$conn = new mysqli("localhost", "root", "", "ServiceBooking");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Calculate total amount
$sql = "SELECT price_per_day FROM services WHERE service_id = $service_id";
$result = $conn->query($sql);
$price_per_day = $result->fetch_assoc()['price_per_day'];
$total_amount = $price_per_day * $workers_needed * $duration_days;

// Insert booking details
$sql = "INSERT INTO bookings (user_email, service_id, start_date, start_time, workers_needed, duration_days, total_amount, address)
        VALUES ('$user_email', $service_id, '$start_date', '$start_time', $workers_needed, $duration_days, $total_amount, '$address')";

if ($conn->query($sql) === TRUE) {
    echo "Booking successful! Total amount: ₹" . $total_amount;
} else {
    echo "Error: " . $conn->error;
}

// Close connection
$conn->close();
?>
