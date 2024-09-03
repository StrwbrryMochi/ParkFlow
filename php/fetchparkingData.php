<?php 

include '../php/connections.php';

function insertParkingSlot($slot_id, $license_plate, $user_type, $vehicle_type, $status) {
  global $connections;

  // Prepare and bind
  $stmt = $connections->prepare("INSERT INTO parking_tbl (slot_id, license_plate, user_type, vehicle_type, status ) VALUES (?, ?, ?, ?, ?)");
  if ($stmt === false) {
      die("Prepare failed: " . $connections->error);
  }

  $stmt->bind_param("sssss", $slot_id, $license_plate, $user_type, $vehicle_type, $status);

  // Execute the statement
  if ($stmt->execute()) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $stmt->error;
  }

  // Close the statement and connection
  $stmt->close();
  $connections->close();
}

// Handling AJAX request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $slot_id = $_POST['slot_id'];
  $license_plate = $_POST['license_plate'];
  $user_type = $_POST['user_type'];
  $vehicle_type = $_POST['vehicle_type'];
  $status = $_POST['status'];

  insertParkingSlot($slot_id, $license_plate, $user_type, $vehicle_type, $status);
}
