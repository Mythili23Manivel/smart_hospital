<?php
// Include the database connection file
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $insuranceType = $_POST['insuranceType'];
    $medicalHistory = $_POST['medicalHistory'];

    // Prepare the SQL query to insert data into the table
    $sql = "INSERT INTO insurance_applications (fullName, email, phone, address, dob, insuranceType, medicalHistory)
            VALUES ('$fullName', '$email', '$phone', '$address', '$dob', '$insuranceType', '$medicalHistory')";

    // Execute the query and check if the insert was successful
    if ($conn->query($sql) === TRUE) {
        // If successful, redirect to a thank you page or show success message
        echo "Application submitted successfully!";
    } else {
        // If an error occurs, display it
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
