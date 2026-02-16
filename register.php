<?php
$servername = "localhost"; // Usually localhost
$username = "root";         // Default username for XAMPP
$password = "";             // Default password (leave empty)
$dbname = "jm_medical_center"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO registrations_info (full_name, email, phone_number, address, city, state) VALUES (?, ?, ?, ?, ?, ?)");

    // Error handling for prepare failure
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssss", $full_name, $email, $phone_number, $address, $city, $state);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to registration page with success message
        header("Location: registration.html?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
