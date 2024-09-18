<?php
  
  include '../php/connections.php';
  include '../php/fetchLoginData.php';

?>


<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

                  <!-- Links -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="icon" href="../img/logo.png" type="img/x-icon" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../css/sweetalert.css">
    <link rel="stylesheet" href="../css/toastr.css">
    <script src="../js/toastr.js"></script>
    <script src="../js/sweetalert.js"></script>
    <link rel="stylesheet" href="../css/aos.css">
    <script src="../js/aos.js"></script>
    <title>Slot Management | BCP</title>

  </head>
  <body>
    <main>

      
      <!-- Side Bar -->
      <div class="sidebar" id="sideBar">
        <div class="sidebar-content">
          <div class="sidebar-logo">
            <img src="../img/logoes.jpg" alt="" />
          </div>
          <div class="sidebar-text">
            <ul>
              <li><a href="dashboard.php"><i class="fa-solid fa-table"></i> <span>Dashboard</span></a></li>
              <li><a href="reservations.html"><i class="fa-solid fa-book"></i> <span>Reservations</span></a></li>
            <li><a href="parkinglotmgmnt.php"><i class="fa-solid fa-car"></i> <span>Parking Slot Management</span></a></li>
            <li><a href="vipslotmgmnt.php"><i class="fa-solid fa-star"></i> <span>VIP Slot Management</span></a></li>
              <li><a href="reservations.html"><i class="fa-solid fa-clock-rotate-left"></i></i> <span>Activity Feed</span></a></li>
              <li><a href="concerns.html"><i class="fa-solid fa-bullhorn"></i> <span>Concerns</span></a></li>
            </ul>
          </div>
        </div>
      </div>


      <!-- Navigation Bar -->
      <nav>
        <div class="left">      
          <button class="sideBar-btn" id="sideBarBtn">
            <i class="fa-solid fa-arrow-left-long"></i>
          </button>
        </div>
        <div class="middle">
          <div class="logo">
            <a href="#">
              <img src="../img/logo.png" alt="BCP" />
            </a>
          </div>
          <div class="middle-title"><h4>Parking Lot Management System</h4></div>
        </div>
        <div class="right">
          <button id="darkModeBtn" class="darkMode-toggle">
            <i class="fa-regular fa-moon"></i>
          </button>
          <button onclick="openNotif()" class="notification" id="notifBtn">
            <i class="fa-regular fa-bell"></i>
          </button>
          <button  onclick="openProfile()" class="user" id="userBtn">
            <img src="<?php echo "$Photo" ?>" alt="User PFP" class="user-image" />
          </button>
        </div>
      </nav>


<!-- Notification Modal -->
<div class="notif-modal">
  <div class="nModal-content">
    <h5 class="nTitle">Notifications</h5>
    <div class="notif-divider"></div>
    <div class="notif-items">
      <div class="notif-item">
        <img src="../img/hye.jpg" alt="User Icon" class="notif-img">
        <div class="notif-text">
          <p class="notif-title">Admin messaged you: Kill yourself</p>
          <p class="notif-time">2 mins ago</p>
        </div>
        <button class="notif-btn">
          <i class="fa-solid fa-book"></i>
        </button>
      </div>

      <div class="notif-item">
        <img src="../img/∘˙○🫧⋆｡˚.jpg" alt="User Icon" class="notif-img">
        <div class="notif-text">
          <p class="notif-title">Admin messaged you: Kill yourself</p>
          <p class="notif-time">2 mins ago</p>
        </div>
        <button class="notif-btn">
          <i class="fa-solid fa-book"></i>
        </button>
      </div>

      <div class="notif-item">
        <img src="../img/1.jpg" alt="User Icon" class="notif-img">
        <div class="notif-text">
          <p class="notif-title">Admin messaged you: Kill yourself</p>
          <p class="notif-time">3 mins ago</p>
        </div>
        <button class="notif-btn">
          <i class="fa-solid fa-book"></i>
        </button>
      </div>

      <div class="notif-item">
        <img src="../img/hehe.jpg" alt="User Icon" class="notif-img">
        <div class="notif-text">
          <p class="notif-title">Admin messaged you: Kill yourself</p>
          <p class="notif-time">4 mins ago</p>
        </div>
        <button class="notif-btn">
          <i class="fa-solid fa-book"></i>
        </button>
      </div>

      <div class="notif-item">
        <img src="../img/smug.jpg" alt="User Icon" class="notif-img">
        <div class="notif-text">
          <p class="notif-title">Admin messaged you: Kill yourself</p>
          <p class="notif-time">5 mins ago</p>
        </div>
        <button class="notif-btn">
          <i class="fa-solid fa-book"></i>
        </button>
      </div>

      <div class="notif-item">
        <img src="../img/meanji.jpg" alt="User Icon" class="notif-img">
        <div class="notif-text">
          <p class="notif-title">Admin messaged you: Kill yourself</p>
          <p class="notif-time">6 mins ago</p>
        </div>
        <button class="notif-btn">
          <i class="fa-solid fa-book"></i>
        </button>
      </div>

      <div class="notif-item">
        <img src="../img/goofy.jpg" alt="User Icon" class="notif-img">
        <div class="notif-text">
          <p class="notif-title">Staff messaged you: Kill yourself</p>
          <p class="notif-time">7 mins ago</p>
        </div>
        <button class="notif-btn">
          <i class="fa-solid fa-book"></i>
        </button>
      </div>
    </div>
  </div>
</div>


                  <!-- Profile Modal -->
                  <div class="profile-modal">
                    <div class="pModal-content">
                      <img src="<?php echo "$Photo" ?>" alt="">
                      <div class="profile-details">
                        <p class="profile-name"><?php echo "$Name "?></p>
                        <div class="profile-info">
                          <span class="profile-dot"></span>
                          <span class="profile-id"><?php echo " $userID" ?></span>
                        </div>
                      </div>
                    </div>
                    <hr class="profile-divider">
                    <div class="modalBtn">
                      <ul>
                        <li><a href="profile.php"><i class="fa-regular fa-user"></i><span>Profile</span></a></li>
                        <li><a href="#"><i class="fa-solid fa-gear"></i><span>Settings</span></a></li>
                        <li><a href="../php/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Log Out</span></a></li>
                      </ul>
                    </div>
                  </div>


        <!-- Main Display -->
        <section>
        <!-- Dashboard -->
        <div class="main-page">

          <!-- Search Bar -->
          <div class="search-create-container">
          <h2 >Slot Management</h2>
          <div class="search-container">
        <form class="no-submit">
            <input class="no-submit" type="search" id="search" autocomplete="off" placeholder="Search...">
        </form>
    </div>

 <!-- Button to Open the Modal -->
  <div class="createbtn-container">
<button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#addModal" id="create-btn">
<i class="fa-solid fa-plus"></i> Add Slot
</button>
</div>
</div>


            <!-- Add a slot Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleId">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../php/vipExecution.php" id="insertForm" method="POST">
          <div class="row">
            <div class="col-12 mb-3col-12 mb-3">
              <label for="slotId" class="form-label">Slot ID</label>
              <div class="custom-input-group">
              <span class="custom-input-group-text"><i class="fas fa-hashtag"></i></span>
              <select class="form-select" id="slotId" name="slot_id" required>
                <option value="" disabled selected>Choose Slot ID</option>
                <?php
                include '../php/vipFunction.php'; 
                $slots = getAvailableVIPSlots(); 
                foreach ($slots as $slot_id) {
                echo "<option value=\"$slot_id\">Slot $slot_id</option>";
               }
             ?>
              </select>
              </div>
            </div>
            <div class="col-12 mb-3">
              <label for="status" class="form-label">Status</label>
              <div class="custom-input-group">
              <span class="custom-input-group-text"><i class="fas fa-info-circle"></i></span>
              <select class="form-select" id="status" name="status" required>
                <option value="" disabled selected>Choose Status</option>
                <option value="Occupied">Occupied</option>
                <option value="Reserved">Reserved</option>
              </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 mb-3">
              <label for="userType" class="form-label">User Type</label>
              <div class="custom-input-group">
              <span class="custom-input-group-text"><i class="fas fa-user-tag"></i></span>
              <input type="text" class="form-control" id="licensePlate" name="user_type" value="VIP" readonly required>
              </select>
              </div>
            </div>
            <div class="col-12 mb-3">
              <label for="vehicleType" class="form-label">Vehicle Type</label>
              <div class="custom-input-group">
              <span class="custom-input-group-text"><i class="fas fa-car"></i></span>
              <select class="form-select" id="vehicleType" name="vehicle_type" required>
                <option value="" disabled selected>Choose Vehicle Type</option>
                <option value="Car">Car</option>
                <option value="Motorcycle">Motorcycle</option>
                <option value="SUV">SUV</option>
                <option value="Truck">Truck</option>
                <option value="Van">Van</option>
                <option value="Pickup Truck">Pickup Truck</option>
                <option value="Minivan">Minivan</option>
              </select>
              </div>
            </div>
          </div>
          <div class="rowcol-12 mb-3col-12 mb-3">
            <div class="col-12 mb-3">
              <div class="form-group">
                <label for="licensePlate" class="form-label">License Plate Number</label>
                <div class="custom-input-group">
                <span class="custom-input-group-text"><i class="fas fa-id-card"></i></span>
                <input type="text" class="form-control" id="licensePlate" name="license_plate" placeholder="Enter License Plate No." autocomplete="off" >
                </div>
              </div>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="add_vip" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

 
<!-- Dashboard Table -->
<div class="table-container-parking">
    <table class="parking-table">
        <thead>
            <tr>
                <th>Slot ID</th>
                <th>License Plate</th>
                <th>User Type</th>
                <th>Vehicle Type</th>
                <th>Status</th>
                <th>Time in</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    <div class="parking-table-body-container">
        <table class="parking-table">
            <tbody>
                <?php 
                include_once '../php/vipFunction.php';
                $fetchVIP = fetchVIP(); 

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
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>
              </div>
           </div>
      </section>

                                                           <!-- Check-Out Modal --> 
                                      <div
                                        class="modal fade"
                                        id="checkoutModal"
                                        tabindex="-1"
                                        role="dialog"
                                        aria-labelledby="checkoutModalTitle"
                                        aria-hidden="true"
                                      >
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="checkoutModalTitle">Check Out</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="../php/vipExecution.php" id="doneForm" method="POST">
                                                <div class="mb-3">
                                                  <label for="done_slot_id" class="form-label">Slot ID</label>
                                                  <div class="custom-input-group">
                                                  <span class="custom-input-group-text"><i class="fas fa-hashtag"></i></span>
                                                  <input type="text" class="form-control" id="done_slot_id" name="slot_id" readonly>
                                                  </div>
                                                </div>
                                                <div class="mb-3">
                                                  <label for="done_license_plate" class="form-label">License Plate</label>
                                                  <div class="custom-input-group">
                                                  <span class="custom-input-group-text"><i class="fas fa-id-card"></i></span>
                                                  <input type="text" class="form-control" id="done_license_plate" name="license_plate" readonly>
                                                  </div>
                                                </div>
                                                <div class="mb-3">
                                                  <label for="done_status" class="form-label">Status</label>
                                                  <div class="custom-input-group">
                                                  <span class="custom-input-group-text"><i class="fas fa-info-circle"></i></span>
                                                  <input type="text" class="form-control" id="done_status" name="status" readonly>
                                                  </div>
                                                </div>
                                                <div class="mb-3">
                                                  <label for="done_user_type" class="form-label">User Type</label>
                                                  <div class="custom-input-group">
                                                  <span class="custom-input-group-text"><i class="fas fa-user-tag"></i></span>
                                                  <input type="text" class="form-control" id="done_user_type" name="user_type" readonly>
                                                  </div>
                                                </div>
                                                <div class="mb-3">
                                                  <label for="done_vehicle_type" class="form-label">Vehicle Type</label>
                                                  <div class="custom-input-group">
                                                  <span class="custom-input-group-text"><i class="fas fa-car"></i></span>
                                                  <input type="text" class="form-control" id="done_vehicle_type" name="vehicle_type" readonly>
                                                  </div>
                                                </div>
                                                <div class="mb-3">
                                                  <label for="done_time_in" class="form-label">Time In</label>
                                                  <div class="custom-input-group">
                                                  <span class="custom-input-group-text"><i class="fas fa-sign-in-alt"></i></span>
                                                  <input type="text" class="form-control" id="done_time_in" name="time_in" readonly>
                                                  </div>
                                                </div>
                                                <div class="mb-3">
                                                  <label for="done_time_out" class="form-label">Time Out</label>
                                                  <div class="custom-input-group">
                                                  <span class="custom-input-group-text"><i class="fas fa-sign-out-alt"></i></span>
                                                  <input type="text" class="form-control" id="done_time_out" name="time_out" readonly>
                                                  </div>
                                                </div>
                                                <div class="mb-3">
                                                  <label for="done_duration" class="form-label">Duration</label>
                                                  <div class="custom-input-group">
                                                  <span class="custom-input-group-text"><i class="fas fa-hourglass-half"></i></span>
                                                  <input type="text" class="form-control" id="done_duration" name="duration" readonly>
                                                  </div>
                                                </div>   
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  <button type="submit" name="vip_checkout_slot" class="btn btn-primary">Done</button>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                    
                            <script>
                            function populateModal(button) {
                            const slotId = $(button).data('slot-id');
                            const status = $(button).data('status');
                            const userType = $(button).data('user-type');
                            const licensePlate = $(button).data('license-plate');
                            const vehicleType = $(button).data('vehicle-type');
                            const timeIn = $(button).data('time-in');
                            const timeOut = $(button).data('time-out');
                            const duration = $(button).data('duration');
                            const fee = $(button).data('fee');
                            
                            // Populate the form fields with the extracted data
                            $('#checkoutModal input[name="slot_id"]').val(slotId);
                            $('#checkoutModal input[name="status"]').val(status);
                            $('#checkoutModal input[name="user_type"]').val(userType);
                            $('#checkoutModal input[name="vehicle_type"]').val(vehicleType);
                            $('#checkoutModal input[name="license_plate"]').val(licensePlate);
                            $('#checkoutModal input[name="time_in"]').val(timeIn);
                            
                            // Get the current local time
                            const currentTime = new Date();

                            // Format the local time as 'YYYY-MM-DD HH:mm:ss'
                            const timeOutFormatted = currentTime.getFullYear() + '-' +
                                String(currentTime.getMonth() + 1).padStart(2, '0') + '-' +
                                String(currentTime.getDate()).padStart(2, '0') + ' ' +
                                String(currentTime.getHours()).padStart(2, '0') + ':' +
                                String(currentTime.getMinutes()).padStart(2, '0') + ':' +
                                String(currentTime.getSeconds()).padStart(2, '0');

                            $('#checkoutModal input[name="time_out"]').val(timeOutFormatted);

                            // Ensure timeIn is a valid Date object
                            const timeInDate = new Date(timeIn);
                            if (isNaN(timeInDate.getTime())) {
                                console.error('Invalid timeIn value:', timeIn);
                            } else {
                                // Calculate the duration (in milliseconds)
                                const durationMs = currentTime - timeInDate;

                                // Convert milliseconds to hours (fractional hours allowed)
                                const durationHrs = durationMs / (1000 * 60 * 60);

                                // Ensure a minimum of 1 hour is charged
                                const chargeableDurationHrs = Math.max(1, Math.ceil(durationHrs));

                                // Format the actual duration as 'HH:mm:ss'
                                const durationSecs = Math.floor(durationMs / 1000);  
                                const durationMins = Math.floor((durationSecs % 3600) / 60);
                                const durationSecsRem = durationSecs % 60;
                                const formattedDuration = 
                                    String(Math.floor(durationHrs)).padStart(2, '0') + ':' +
                                    String(durationMins).padStart(2, '0') + ':' +
                                    String(durationSecsRem).padStart(2, '0');

                                console.log('Formatted Duration:', formattedDuration);
                                $('#checkoutModal input[name="duration"]').val(formattedDuration);

                               
                            }
                        }

                        // Bind the function to the modal's show event
                        $('#checkoutModal').on('show.bs.modal', function (event) {
                            const button = $(event.relatedTarget); 
                            populateModal(button); 
                        });
                            </script>

                                
                                                        <!-- Edit Modal -->
                        <div
                          class="modal fade"
                          id="modalIdEdit"
                          tabindex="-1"
                          role="dialog"
                          aria-labelledby="modalTitleId"
                          aria-hidden="true"
                        >
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="modalTitleId">Edit Slot</h5>
                                      <button
                                          type="button"
                                          class="btn-close"
                                          data-bs-dismiss="modal"
                                          aria-label="Close"
                                      ></button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="../php/vipExecution.php" id="insertForm" method="POST">
                                          <div class="row">
                                              <div class="col-12 mb-3">
                                                  <label for="slot_id" class="form-label">Slot ID</label>
                                                  <div class="custom-input-group">
                                                      <span class="custom-input-group-text"><i class="fas fa-hashtag"></i></span>
                                                      <input type="text" class="form-control" id="slot_id" name="slot_id" placeholder="Slot ID" readonly>
                                                  </div>
                                              </div>
                                              <div class="col-12 mb-3">
                                                  <label for="status" class="form-label">Status</label>
                                                  <div class="custom-input-group">
                                                      <span class="custom-input-group-text"><i class="fas fa-info-circle"></i></span>
                                                      <select class="form-select" id="status" name="status" required>
                                                    <option value="" disabled selected >Choose Status</option>
                                                    <option value="Occupied">Occupied</option>
                                                    <option value="Reserved">Reserved</option>
                                                    </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-12 mb-3">
                                                  <label for="userType" class="form-label">User Type</label>
                                                  <div class="custom-input-group">
                                                      <span class="custom-input-group-text"><i class="fas fa-user-tag"></i></span>
                                                      <input type="text" class="form-control" id="licensePlate" name="user_type" value="VIP" readonly required>
                                                  </div>
                                              </div>
                                              <div class="col-12 mb-3">
                                                  <label for="vehicleType" class="form-label">Vehicle Type</label>
                                                  <div class="custom-input-group">
                                                      <span class="custom-input-group-text"><i class="fas fa-car"></i></span>
                                                      <select class="form-select" id="vehicleType" name="vehicle_type" required>
                                                          <option value="" disabled selected>Choose Vehicle Type</option>
                                                          <option value="Car">Car</option>
                                                          <option value="Motorcycle">Motorcycle</option>
                                                          <option value="SUV">SUV</option>
                                                          <option value="Truck">Truck</option>
                                                          <option value="Van">Van</option>
                                                          <option value="Pickup Truck">Pickup Truck</option>
                                                          <option value="Minivan">Minivan</option>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                  <div class="col-12 mb-3">
                                      <label for="done_license_plate" class="form-label">License Plate</label>
                                      <div class="custom-input-group">
                                          <span class="custom-input-group-text"><i class="fas fa-id-card"></i></span>
                                          <input type="text" class="form-control" id="licensePlate" name="license_plate" placeholder="Enter License Plate No." autocomplete="off">
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="edit_vip" class="btn btn-primary">Edit</button>
                              </div>
                            </form>

                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <script>
                      $(document).ready(function () {
                          // Function to populate the modal with data
                          function populateModal(button) {
                              const slotId = $(button).data('slot-id');
                              const status = $(button).data('status');
                              const userType = $(button).data('user-type');
                              const vehicleType = $(button).data('vehicle-type');
                              const licensePlate = $(button).data('license-plate');
                              
                              // Populate the form fields with the extracted data
                              $('#modalIdEdit input[name="slot_id"]').val(slotId);
                              $('#modalIdEdit input[name="status"]').val(status);
                              $('#modalIdEdit select[name="user_type"]').val(userType);
                              $('#modalIdEdit select[name="vehicle_type"]').val(vehicleType);
                              $('#modalIdEdit input[name="license_plate"]').val(licensePlate);
                          }

                          // Bind the function to the modal's show event
                          $('#modalIdEdit').on('show.bs.modal', function (event) {
                              const button = $(event.relatedTarget); 
                              populateModal(button); 
                          });
                      });
                      </script>

    </main>

                <!-- Event listener for the search input -->
              <script>
                        // Prevents the Search bar to be submittable 
                      $('#search').on('keydown', function(event) {
                      if (event.key === 'Enter') {
                          event.preventDefault(); 
                      }
                  
                    $('#search').on('input', function() {
                      var searchQuery = $(this).val();

                      $.ajax({
                          url: '../php/vipSearch.php',
                          type: 'GET',
                          data: { search: searchQuery },
                          success: function(data) {

                              $('.parking-table-body-container tbody').html(data);
                          },
                          error: function(xhr, status, error) {
                              console.error('Error:', error);
                          }
                      });
                  });
                });
              </script>

                                <!-- Alerts -->
                        <?php include '../php/alerts.php' ?>

                  <!-- Script -->
        <script>
          AOS.init();
        </script>
        <script src="../script/modal.js"></script>
        <script src="../script/sidebar.js"></script>
        <script src="../script/darkmode.js"></script>
        <script src="../script/highlighted.js"></script>
  </body>
</html>
