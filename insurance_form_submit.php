<?php
// Database connection settings
$servername = "localhost";
$username = "root";  // Default XAMPP username
$password = "";      // Default XAMPP password
$dbname = "claiminsurance";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully.";
}

// Get form data
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$insuranceType = $_POST['insuranceType'];
$medicalHistory = $_POST['medicalHistory'];

// Check if the connection is still alive
if (!$conn->ping()) {
    die("MySQL server has gone away. Please try again.");
}

// Prepare the SQL query
$sql = "INSERT INTO patientinfodetails (fullName, email, phone, address, dob, insuranceType, medicalHistory)
        VALUES ('$fullName', '$email', '$phone', '$address', '$dob', '$insuranceType', '$medicalHistory')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
