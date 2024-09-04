<?php 
    include 'connections.php';
    include 'parkingFunction.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //for adding //
        if(isset($_POST['add_parking'])){

   
        $slot_id = $_POST['slot_id'];
        $license_plate = $_POST['license_plate'];
        $user_type = $_POST['user_type'];
        $vehicle_type = $_POST['vehicle_type'];
        $status = $_POST['status'];
    
        parkingAdd($slot_id, $license_plate, $user_type,  $vehicle_type, $status);
        
    }
}

