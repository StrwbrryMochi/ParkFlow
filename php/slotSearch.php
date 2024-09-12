<?php 
//Database Connection
include 'connections.php';

if($connections->connect_error) {
    die("Connection failed: ". $connections->connect_error);
}

include 'parkingFunction.php';

// Get the search parameter
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Call the search function to get the filtered results
$fetchParking = searchSlot($search);

// Output the table rows dynamically
if (count($fetchParking) > 0) {
    foreach ($fetchParking as $parkingData): 
        if ($parkingData['status'] !== 'Available'): 
?>      
        <tr>
            <td><?php echo htmlspecialchars($parkingData['slot_id']); ?></td>
            <td><?php echo htmlspecialchars($parkingData['license_plate']); ?></td>
            <td><?php echo htmlspecialchars($parkingData['user_type']); ?></td>
            <td><?php echo htmlspecialchars($parkingData['vehicle_type']); ?></td>
            <td>
                <div class="<?php echo htmlspecialchars($parkingData['ClassADD']); ?>">
                    <span class="status-dot"></span>
                    <?php echo htmlspecialchars($parkingData['status']); ?>
                </div>
            </td>
            <td><?php echo htmlspecialchars($parkingData['time_in']); ?></td>
            <td><div class="pending"><span class="pending-dot"></span>Pending</div></td>
            <td>
                <!-- Done Button -->
                <div class="actionContainer">
                <button
                id="check_outBtn"
                type="button"
                class="btn btn-primary btn-md"
                data-bs-toggle="modal"
                data-bs-target="#checkoutModal"
                data-slot-id="<?php echo htmlspecialchars($parkingData['slot_id']); ?>"
                data-status="<?php echo htmlspecialchars($parkingData['status']); ?>"
                data-license-plate="<?php echo htmlspecialchars($parkingData['license_plate']); ?>"
                data-user-type="<?php echo htmlspecialchars($parkingData['user_type']); ?>"
                data-vehicle-type="<?php echo htmlspecialchars($parkingData['vehicle_type']); ?>"
                data-time-in="<?php echo htmlspecialchars($parkingData['time_in']); ?>"
                data-time-out="<?php echo htmlspecialchars($parkingData['time_out']); ?>"
                data-duration="<?php echo htmlspecialchars($parkingData['duration']); ?>"
                data-fee="<?php echo htmlspecialchars($parkingData['fee']); ?>"
                >
                <i class="fa-solid fa-check"></i>
                </button>
                
                <!-- Edit Button -->
                <button
                id="editBtn"
                type="button"
                class="btn btn-primary editBtn"
                data-bs-toggle="modal"
                data-bs-target="#modalIdEdit"
                data-slot-id="<?php echo htmlspecialchars($parkingData['slot_id']); ?>"
                data-license-plate="<?php echo htmlspecialchars($parkingData['license_plate']); ?>"
                data-user-type="<?php echo htmlspecialchars($parkingData['user_type']); ?>"
                data-vehicle-type="<?php echo htmlspecialchars($parkingData['vehicle_type']); ?>"
                data-status="<?php echo htmlspecialchars($parkingData['status']); ?>"
                >
                <i class="fa-solid fa-pencil"></i>
                </button>
                </div>
            </td>
        </tr>
<?php 
        endif;
    endforeach;
} else {
    echo "<tr><td colspan='8'>No results found</td></tr>";
}