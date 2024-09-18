<?php
session_start();
include("connections.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registerFirst'])) {
    // Sanitize and validate input
    $Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    $Name = htmlspecialchars($_POST['Name']);
    $Password = htmlspecialchars($_POST['Password']);
    $account_type = '2'; // Default account type

    // Check if email is valid
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format'); window.location.href='../loginPage.php?register_error=true';</script>";
        exit;
    }

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $connections->prepare("INSERT INTO usertbl (Email, Name, Password, account_Type) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $Email, $Name, $Password, $account_type);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        $_SESSION['Email'] = $Email;
        echo "<script>window.location.href='../register_photo.php?register_success=true';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='../loginPage.php?register_error=true';</script>";
    }

    // Close statement and connection
    $stmt->close();
    $connections->close();
}
