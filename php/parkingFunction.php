<?php

// Function to add or update a parking slot
function parkingAdd($slot_id, $license_plate, $user_type, $vehicle_type, $status) {
    global $connections;

    // Check if the slot_id exists and is available
    $checkSql = "SELECT status FROM parking_tbl WHERE slot_id = ?";
    if ($stmt = $connections->prepare($checkSql)) {
        $stmt->bind_param("i", $slot_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            echo "Error: Slot ID not found.";
            $stmt->close();
            $connections->close();
            exit();
        }
    } else {
        echo "Error: " . $connections->error;
        $connections->close();
        exit();
    }

    date_default_timezone_set('Asia/Manila'); 
    $current_time = date('Y-m-d H:i:s');

    // Update the status of the existing slot with formatted time_in and hardcoded payment_status to "Pending"
    $updateSql = "UPDATE parking_tbl SET license_plate = ?, user_type = ?, vehicle_type = ?, status = ?, time_in = ?, payment_status = 'Pending' WHERE slot_id = ?";

    if ($stmt = $connections->prepare($updateSql)) {
        $stmt->bind_param("sssssi", $license_plate, $user_type, $vehicle_type, $status, $current_time, $slot_id);
        if ($stmt->execute()) {
            echo "<script>
                window.location.href='../staffPage/parkinglotmgmnt.php?add_slot=true';
            </script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $connections->error;
    }

    $connections->close();
    exit();
}

// Function for Search Bar/Filter
function searchSlot($search = '') {
    global $connections;

    $search = mysqli_real_escape_string($connections, $search);

    // SQL Query for Search 
    $sql = "SELECT * FROM parking_tbl 
            WHERE slot_id LIKE '%$search%' 
            OR user_type LIKE '%$search%' 
            OR status LIKE '%$search%'";

    $result = mysqli_query($connections, $sql);

    $fetchparking = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Add specific class names based on status
            if ($row['status'] == 'Occupied') {
                $row['ClassADD'] = 'status-item occupied';
            } elseif ($row['status'] == 'Reserved') {
                $row['ClassADD'] = 'status-item reserved';
            } else {
                $row['ClassADD'] = 'status-item available';
            }
            $fetchparking[] = $row;
        }
    }
    return $fetchparking;
}

// Function to fetch parking data
function fetchParking() {
    global $connections;

    $sql = "SELECT * FROM parking_tbl";
    $result = mysqli_query($connections, $sql);

    $parkingFetch = [];

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row['ClassADD'] = "";

                if (isset($row['status'])) {
                    switch ($row['status']) {
                        case "Available":
                            $row['ClassADD'] = "status-item available";
                            break;
                        case "Reserved":
                            $row['ClassADD'] = "status-item reserved";
                            break;
                        case "Occupied":
                            $row['ClassADD'] = "status-item occupied";
                            break;
                    }
                }

                $parkingFetch[] = $row;
            }
        }
    } else {
        echo "Error: " . $connections->error;
    }

    return $parkingFetch;
}

// Function to Edit a slot
function editSlot($slot_id, $license_plate, $user_type, $vehicle_type, $status) {
    global $connections;

    // SQL query to update the parking slot details
    $sql = "UPDATE parking_tbl SET license_plate = '$license_plate', user_type = '$user_type', vehicle_type = '$vehicle_type', status = '$status' WHERE slot_id = '$slot_id';";

    if ($connections->query($sql) === TRUE) {
        echo "<script>window.location.href='../staffPage/parkinglotmgmnt.php?slot_edit=true';</script>";
    } else {
        echo "Error: " . $connections->error;
    }
}

// Function for checkout 
function checkoutSlot($slot_id, $license_plate, $user_type, $vehicle_type, $status, $time_in, $time_out, $duration, $fee) {
    global $connections;


    $updateSql = "UPDATE parking_tbl SET time_in = ?, time_out = ?, duration = ?, fee = ? WHERE slot_id = ?";

    // SQL query to update the aforementioned tables for check out
         if ($stmt = $connections->prepare($updateSql)) {
            $stmt->bind_param("ssssi", $time_in, $time_out, $duration, $fee, $slot_id);
        
                if($stmt->execute()){
    
                    $stmt->close();

       // SQL Query to transfer specifit slot data to be archived
    $archivesql = "INSERT INTO parking_archive_tbl(slot_id, license_plate, user_type, vehicle_type, status, time_in, time_out, duration, fee, payment_status) SELECT slot_id, license_plate, user_type, vehicle_type, status, time_in, time_out, duration, fee, 'Paid' FROM parking_tbl WHERE slot_id = ?";

        if ($stmt = $connections->prepare($archivesql)) {
            $stmt->bind_param("i", $slot_id);
                
                if($stmt->execute()) {

                    $stmt->close();

            // SQL Query to reset parking_tbl slot values 
    $reset_sql = "UPDATE parking_tbl SET payment_status = NULL, fee = NULL, duration = NULL, time_out = NULL, time_in = NULL, vehicle_type = NULL, user_type = NULL, license_plate = NULL,status = 'Available' WHERE slot_id = ?";

        if ($stmt = $connections->prepare($reset_sql)) {
            $stmt->bind_param("i", $slot_id);

                if ($stmt->execute()) {
                     echo "<script>window.location.href='../staffPage/parkinglotmgmnt.php?checkout_slot=true';</script>";
                 } else {
                     echo "Error executing archive query: ". $connections->error. "<br>";
                }
            } else {
                echo "Error executing archive query: " . $stmt->error . "<br>";
            }
        } else {
            echo "Error preparing archive query: " . $connections->error . "<br>";
        }
    }else {
      echo "Error executing update query: " . $stmt->error . "<br>";
    }
  }         
} else {
    echo "Error preparing query: " . $connections->error . "<br>";
}
    $connections->close();
}

// Function to get total slots
function getTotalSlots() {
    global $connections;
    $sql = "SELECT COUNT(slot_id) AS total_slots FROM parking_tbl";
    $result = mysqli_query($connections, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total_slots'];
    } else {
        return 0;
    }
}

// Function to get available slots
function getAvailableSlots() {
    global $connections;
    $sql = "SELECT slot_id FROM parking_tbl WHERE status = 'Available'";
    $result = mysqli_query($connections, $sql);

    $slots = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $slots[] = $row['slot_id'];
        }
    }
    return $slots;
}

// Function to get occupied slots
function getOccupiedSlots() {
    global $connections;
    $sql = "SELECT slot_id FROM parking_tbl WHERE status = 'Occupied'";
    $result = mysqli_query($connections, $sql);

    $slots = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $slots[] = $row['slot_id'];
        }
    }
    return $slots;
}





