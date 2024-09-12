<?php 
    include 'connections.php';
    include 'parkingFunction.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // For adding Slot
        if(isset($_POST['add_parking'])){

   
        $slot_id = $_POST['slot_id'];
        $license_plate = $_POST['license_plate'];
        $user_type = $_POST['user_type'];
        $vehicle_type = $_POST['vehicle_type'];
        $status = $_POST['status'];
    
        //* Call function to add a Slot
        parkingAdd($slot_id, $license_plate, $user_type,  $vehicle_type, $status);
        
    }
}

// For Editing Slot
if (isset($_POST['edit_slot'])) { 
    $slot_id = $_POST['slot_id'];
    $license_plate = $_POST['license_plate'];
    $user_type = $_POST['user_type'];
    $vehicle_type = $_POST['vehicle_type'];
    $status = $_POST['status'];

    // Call function to update Slot information
    editSlot($slot_id, $license_plate, $user_type, $vehicle_type, $status);
}



// For Check out
if (isset($_POST['checkout_slot'])) {
        $slot_id = $_POST['slot_id'];

        // Check if slot_id is missing
        if (empty($slot_id)) {
            echo "Error: Slot ID is missing.";
            exit();
        }
        
        $license_plate = $_POST['license_plate'];
        $user_type = $_POST['user_type'];
        $vehicle_type = $_POST['vehicle_type'];
        $status = $_POST['status'];
        $time_in = $_POST['time_in'];
        $time_out = $_POST['time_out'];
        $duration = $_POST['duration'];
        $fee = $_POST['fee'];

        // Call the checkout function
        checkoutSlot($slot_id, $license_plate, $user_type, $vehicle_type, $status, $time_in, $time_out, $duration, $fee);
    }

