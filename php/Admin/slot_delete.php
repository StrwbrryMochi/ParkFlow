<?php  

include '../connections.php';


if (isset($_GET['slotDelete'])) {
    $slot_id = $_GET['slotDelete'];


    $sql = "DELETE FROM parking_tbl WHERE slot_id = $slot_id";

        if ($connections->query($sql) === TRUE) {
            //Redirect with success message

            echo "<script>window.location.href='../../adminPage/adminParkinglotmgmnt.php?slot_deleted=true';</script>";
        } else {
            //Display Error
            echo "Error: ". $connections->error;
        }
}