<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = "";     // Default password is empty for XAMPP
$dbname = "userdb"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
