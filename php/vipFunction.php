<?php

// Function to add or update a parking slot
function vipAdd($slot_id, $license_plate, $user_type, $vehicle_type, $status) {
    global $connections;

    // Check if the slot_id exists
    $checkSql = "SELECT status FROM vip_tbl WHERE slot_id = ?";
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

    // Get the current time in human-readable format
    date_default_timezone_set('Asia/Manila');
    $current_time = date('Y-m-d H:i:s');

    if ($status === 'Reserved') {
        // Update without modifying the time_in field
        $updateSql = "UPDATE vip_tbl SET license_plate = ?, user_type = ?, vehicle_type = ?, status = ? WHERE slot_id = ?";

        if ($stmt = $connections->prepare($updateSql)) {
            $stmt->bind_param("ssssi", $license_plate, $user_type, $vehicle_type, $status, $slot_id);
            if ($stmt->execute()) {
                echo "<script>window.location.href='../staffPage/vipslotmgmnt.php?add_slot=true';</script>";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error: " . $connections->error;
            $connections->close();
            exit();
        }
    } else {
        // Update the slot and set time_in when the status is not 'Reserved'
        $updateSql = "UPDATE vip_tbl SET license_plate = ?, user_type = ?, vehicle_type = ?, status = ?, time_in = ? WHERE slot_id = ?";

        if ($stmt = $connections->prepare($updateSql)) {
            $stmt->bind_param("sssssi", $license_plate, $user_type, $vehicle_type, $status, $current_time, $slot_id);
            if ($stmt->execute()) {
                echo "<script>window.location.href='../staffPage/vipslotmgmnt.php?add_slot=true';</script>";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error: " . $connections->error;
            $connections->close();
            exit();
        }
    }

    $connections->close();
    exit();
}


// Function to fetch parking data
function fetchVIP() {
    global $connections;

    $sql = "SELECT * FROM vip_tbl";
    $result = mysqli_query($connections, $sql);

    $VIPfetch = [];

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

                $VIPfetch[] = $row;
            }
        }
    } else {
        echo "Error: " . $connections->error;
    }

    return $VIPfetch;
}

// Function to Edit a slot
function editVIP($slot_id, $license_plate, $user_type, $vehicle_type, $status) {
    global $connections;

    // Set Timezone and get the current time
    date_default_timezone_set('Asia/Manila'); 
    $current_time = date('Y-m-d H:i:s');
    

    $checksql = "SELECT time_in FROM vip_tbl WHERE slot_id = ?";

    // To check if time_in is already set in the slot
    if ($stmt = $connections->prepare($checksql)) {
        $stmt->bind_param("i", $slot_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $existing_time_in = $row['time_in'];
        } else {
            echo "Error: Slot not found.";
            $stmt->close();
            $connections->close();
            exit();
        }
        $stmt->close();
    } else {
        echo "Error: ". $connections->error;
        $connections->close();
        exit();
    }

    if ($status === 'Reserved' && !empty($existing_time_in)) {
        echo "<script>window.location.href='../staffPage/vipslotmgmnt.php?edit_slot_error=true';</script>";
        $connections->close();
        exit();
        }
    
    if ($status === 'Occupied') {

        // Query if the slot has no existing time, it will set the current time
        if (empty($existing_time_in)) {
            $sql = "UPDATE vip_tbl SET license_plate = ?, user_type = ?, vehicle_type = ?, status = ?, time_in = ? WHERE slot_id = ?";
            if ($stmt = $connections->prepare($sql)){
                $stmt->bind_param("sssssi", $license_plate, $user_type, $vehicle_type, $status, $current_time, $slot_id);
            } else {
                echo "Error: ". $connections->error;
                $connections->close();
                exit();
            }
        } else {
            
            // Query if the slot has already a time set in, it will not update the time in
            $sql = "UPDATE vip_tbl SET license_plate = ?, user_type = ?, vehicle_type = ?, status = ? WHERE slot_id = ?";
            if ($stmt = $connections->prepare($sql)) {
                $stmt->bind_param("ssssi", $license_plate, $user_type, $vehicle_type, $status, $slot_id);
            } else {
                echo "Error: ". $connections->error;
                $connections->close();
                exit();
            }
        }
    } else {

        // Query if Slot is still set to Reserved, Time in will not Start
        $sql = "UPDATE vip_tbl SET license_plate = ?, user_type = ?, vehicle_type = ?, status = ? WHERE slot_id = ?";
        if ($stmt = $connections->prepare($sql)) {
            $stmt->bind_param("ssssi", $license_plate, $user_type, $vehicle_type, $status, $slot_id);
        } else {
            echo "Error: ". $connections->error;
            $connections->close();
            exit();
        }
    }
    // Execute the Query
    if ($stmt->execute()) {
        echo "<script>window.location.href='../staffPage/vipslotmgmnt.php?slot_edit=true';</script>";
    } else {
        echo "Error: ". $stmt->error;
    }
    $stmt->close();
    $connections->close();
    exit();    
}


   


// Function for checkout 
function vipcheckoutSlot($slot_id, $license_plate, $user_type, $vehicle_type, $status, $time_in, $time_out, $duration) {
    global $connections;

    $checksql = "SELECT time_in FROM vip_tbl WHERE slot_id = ?";

    // To check if time_in is already set in the slot
    if ($stmt = $connections->prepare($checksql)) {
        $stmt->bind_param("i", $slot_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $existing_time_in = $row['time_in'];
        } else {
            echo "Error: Slot not found.";
            $stmt->close();
            $connections->close();
            exit();
        }
        $stmt->close();
    } else {
        echo "Error: ". $connections->error;
        $connections->close();
        exit();
    }
    
    if (empty($existing_time_in)) {
        echo "<script>window.location.href='../staffPage/vipslotmgmnt.php?checkout_error=true';</script>";
    } else {
        $updateSql = "UPDATE vip_tbl SET time_in = ?, time_out = ?, duration = ? WHERE slot_id = ?";

    // SQL query to update the aforementioned tables for check out
         if ($stmt = $connections->prepare($updateSql)) {
            $stmt->bind_param("sssi", $time_in, $time_out, $duration, $slot_id);
        
                if($stmt->execute()){
    
                    $stmt->close();

       // SQL Query to transfer specifit slot data to be archived
    $archivesql = "INSERT INTO vip_archive_tbl(slot_id, license_plate, user_type, vehicle_type, status, time_in, time_out, duration) SELECT slot_id, license_plate, user_type, vehicle_type, status, time_in, time_out, duration FROM vip_tbl WHERE slot_id = ?";

        if ($stmt = $connections->prepare($archivesql)) {
            $stmt->bind_param("i", $slot_id);
                
                if($stmt->execute()) {

                    $stmt->close();

            // SQL Query to reset vip_tbl slot values 
    $reset_sql = "UPDATE vip_tbl SET duration = NULL, time_out = NULL, time_in = NULL, vehicle_type = NULL, user_type = NULL, license_plate = NULL,status = 'Available' WHERE slot_id = ?";

        if ($stmt = $connections->prepare($reset_sql)) {
            $stmt->bind_param("i", $slot_id);

                if ($stmt->execute()) {
                     echo "<script>window.location.href='../staffPage/vipslotmgmnt.php?checkout_slot=true';</script>";
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
    }
    $connections->close();
}


// Function to get total slots
function getTotalVIPSlots() {
    global $connections;
    $sql = "SELECT COUNT(slot_id) AS total_slots FROM vip_tbl";
    $result = mysqli_query($connections, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total_slots'];
    } else {
        return 0;
    }
}

// Function to get available slots
function getAvailableVIPSlots() {
    global $connections;
    $sql = "SELECT slot_id FROM vip_tbl WHERE status = 'Available'";
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
function getOccupiedVIPSlots() {
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

// Function to get reserved slots
function getReservedSlots() {
    global $connections;
    $sql = "SELECT slot_id FROM vip_tbl WHERE status = 'Reserved'";
    $result = mysqli_query($connections, $sql);

    $slots = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $slots[] = $row['slot_id'];
        }
    }
    return $slots;
}








