<?php 
    include 'php/connections.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $slot_id = $_POST['slot_id'];
        $license_plate = $_POST['license_plate'];
        $user_type = $_POST['user_type'];
        $vehicle_type = $_POST['vehicle_type'];
        $status = $_POST['status'];
    
        $sql = "INSERT INTO parking_tbl (slot_id, license_plate, user_type, vehicle_type, status, check_in_time)
                VALUES (?, ?, ?, ?, ?, NOW())";
    
        if ($stmt = $connections->prepare($sql)) {
            $stmt->bind_param("sssss", $slot_id, $license_plate, $user_type, $vehicle_type, $status);
            if ($stmt->execute()) {
                echo "Record added successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error: " . $connections->error;
        }
    
        $connections->close();
        header("Location: your_dashboard_page.php"); // Redirect to the dashboard page
        exit();
    }
?>