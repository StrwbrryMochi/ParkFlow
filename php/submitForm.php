<?php
// submitForm.php

// Include database connection
include '../php/connections.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $slotId = $_POST['slot_id'];
    $licensePlate = $_POST['license_plate'];
    $userType = $_POST['user_type'];
    $vehicleType = $_POST['vehicle_type'];
    $status = $_POST['status'];
    $duration = $_POST['duration'];
    $paymentStatus = $_POST['payment_status'];

    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO parking_slots (slot_id, license_plate, user_type, vehicle_type, status, duration, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $slotId, $licensePlate, $userType, $vehicleType, $status, $duration, $paymentStatus);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>