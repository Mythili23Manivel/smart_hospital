<?php
$servername = "localhost";  // Host name (XAMPP runs MySQL on localhost)
$username = "root";         // Default MySQL username in XAMPP
$password = "";             // Default MySQL password (empty by default in XAMPP)
$dbname = "insurance_db";   // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
