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

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // If the slot is already occupied or reserved, display an alert
            if ($row['status'] == 'Occupied' || $row['status'] == 'Reserved') {
                echo "<script>
                    alert('The selected slot is already occupied or reserved.');
                    window.location.href='../staffPage/parkinglotmgmnt.php?add_slot=false';
                </script>";
                $stmt->close();
                $connections->close();
                exit();
            }
        } else {
            // If the slot_id does not exist, display an alert
            echo "<script>
                alert('The selected slot does not exist.');
                window.location.href='../staffPage/parkinglotmgmnt.php?add_slot=false';
            </script>";
            $stmt->close();
            $connections->close();
            exit();
        }
        $stmt->close();
    } else {
        echo "Error: " . $connections->error;
        $connections->close();
        exit();
    }

    // Update the status of the existing slot
    $updateSql = "UPDATE parking_tbl SET license_plate = ?, user_type = ?, vehicle_type = ?, status = ? WHERE slot_id = ?";
    if ($stmt = $connections->prepare($updateSql)) {
        $stmt->bind_param("ssssi", $license_plate, $user_type, $vehicle_type, $status, $slot_id);
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

// Function to get reserved slots
function getReservedSlots() {
    global $connections;
    $sql = "SELECT slot_id FROM parking_tbl WHERE status = 'Reserved'";
    $result = mysqli_query($connections, $sql);

    $slots = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $slots[] = $row['slot_id'];
        }
    }
    return $slots;
}

