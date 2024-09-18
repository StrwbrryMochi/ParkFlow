<?php 
//Database Connection
include 'connections.php';

if($connections->connect_error) {
    die("Connection failed: ". $connections->connect_error);
}

include 'vipFunction.php';

// Get the search parameter
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Call the search function to get the filtered results
$fetchVIP = searchVIP($search);

// Output the table rows dynamically
if (count($fetchVIP) > 0) {
    foreach ($fetchVIP as $vipData): 
        if ($vipData['status'] !== 'Available'): 
?>      
       <tr>
                    <td><?php echo htmlspecialchars($vipData['slot_id']); ?></td>
                    <td><?php echo htmlspecialchars($vipData['license_plate']); ?></td>
                    <td><?php echo htmlspecialchars($vipData['user_type']); ?></td>
                    <td><?php echo htmlspecialchars($vipData['vehicle_type']); ?></td>
                    <td><div class="<?php echo htmlspecialchars($vipData['ClassADD']); ?>"><span class="status-dot"></span><?php echo htmlspecialchars($vipData['status']); ?></div></td>
                    <td><?php echo htmlspecialchars($vipData['time_in']); ?></td>
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
                                      data-slot-id="<?php echo htmlspecialchars($vipData['slot_id']); ?>"
                                      data-status="<?php echo htmlspecialchars($vipData['status']); ?>"
                                      data-license-plate="<?php echo htmlspecialchars($vipData['license_plate']); ?>"
                                      data-user-type="<?php echo htmlspecialchars($vipData['user_type']); ?>"
                                      data-vehicle-type="<?php echo htmlspecialchars($vipData['vehicle_type']); ?>"
                                      data-time-in="<?php echo htmlspecialchars($vipData['time_in']); ?>"
                                      data-time-out="<?php echo htmlspecialchars($vipData['time_out']); ?>"
                                      data-duration="<?php echo htmlspecialchars($vipData['duration']); ?>"
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
                                            data-slot-id="<?php echo htmlspecialchars($vipData['slot_id']); ?>"
                                            data-license-plate="<?php echo htmlspecialchars($vipData['license_plate']); ?>"
                                            data-user-type="<?php echo htmlspecialchars($vipData['user_type']); ?>"
                                            data-vehicle-type="<?php echo htmlspecialchars($vipData['vehicle_type']); ?>"
                                            data-status="<?php echo htmlspecialchars($vipData['status']); ?>"
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