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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="icon" href="../img/logo.png" type="img/x-icon" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../css/sweetalert.css">
    <link rel="stylesheet" href="../css/toastr.css">
    <script src="../js/toastr.js"></script>
    <script src="../js/sweetalert.js"></script>
    <title>Parking Lot Management | BCP</title>
  </head>
  <body>
    <main>

      
      <!-- Side Bar -->
      <div class="sidebar" id="sideBar">
        <div class="sidebar-content">
          <div class="sidebar-logo">
            <img src="../img/Png.png" alt="" />
          </div>
          <div class="sidebar-text">
            <ul>
              <li><a href="dashboard.php"><i class="fa-solid fa-table"></i> <span>Dashboard</span></a></li>
              <li><a href="reservations.html"><i class="fa-solid fa-book"></i> <span>Reservations</span></a></li>
            <li><a href="parkinglotmgmnt.php"><i class="fa-solid fa-car"></i> <span>Parking Slot Management</span></a></li>
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
            <li><a href="#"><i class="fa-regular fa-user"></i><span>Profile</span></a></li>
            <li><a href="#"><i class="fa-solid fa-gear"></i><span>Settings</span></a></li>
            <li><a href="../php/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Log Out</span></a></li>
          </ul>
        </div>
      </div>

        //* <!-- Main Display -->
        <section>

        //* <!-- Dashboard -->
        <div class="main-page">
        <h2>Slot Management</h2>

        //* <!-- Search Bar -->
        <div class="search-create-container">
        <input type="text" id="search-bar" class="search-bar" placeholder="Search...">

        //* <!-- Button to Open the Add a slot Modal -->
        <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#createBtn" id="create-btn">
          Add Slot
        </button>      
        </div>

        //*  <!-- Dashboard Table -->



<div class="table-container-parking">
    <table class="parking-table">
        <thead>
            <tr>
                <th>Slot ID</th>
                <th>License Plate No</th>
                <th>User Type</th>
                <th>Vehicle Type</th>
                <th>Status</th>
                <th>Time in</th>
                <th>Time out</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    <div class="parking-table-body-container">
        <table class="parking-table">
            <tbody>
                <?php 
                include_once '../php/parkingFunction.php';
                $fetchParking = fetchParking(); 

                foreach ($fetchParking as $parkingData): 
                  if ($parkingData['status'] !== 'Available'): 
                ?>      
                <tr>
                    <td><?php echo htmlspecialchars($parkingData['slot_id']); ?></td>
                    <td><?php echo htmlspecialchars($parkingData['license_plate']); ?></td>
                    <td><?php echo htmlspecialchars($parkingData['user_type']); ?></td>
                    <td><?php echo htmlspecialchars($parkingData['vehicle_type']); ?></td>
                    <td><div class="<?php echo htmlspecialchars($parkingData['ClassADD']); ?>"><span class="status-dot"></span><?php echo htmlspecialchars($parkingData['status']); ?></div></td>
                    <td><?php echo htmlspecialchars($parkingData['time_in']); ?></td>
                    <td><?php echo htmlspecialchars($parkingData['time_out']); ?></td>
                   <td>

                                                   //*  <!-- Done Button -->
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
                                          data-time-in = "<?php echo htmlspecialchars($parkingData['time_in']); ?>"
                                          data-time-out="<?php echo htmlspecialchars($parkingData['time_out']); ?>"
                                          data-duration="<?php echo htmlspecialchars($parkingData['duration']); ?>"
                                        >
                                        Check Out
                                        </button>
                  <!-- ? Edit Button --> 
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
                                            Edit
                                        </button>
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

                                      <!-- Create Modal -->
                      <div class="modal fade" id="createBtn" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalTitleId">Add User</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="../php/parkingExecution.php" id="insertForm" method="POST">
                                <div class="row">
                                  <div class="col-md-6 mb-3">
                                    <label for="slotId" class="form-label">Slot ID</label>
                                    <select class="form-select" id="slotId" name="slot_id" >
                                      <option value="" disabled selected>Choose Slot ID</option>
                                      <?php
                                      include '../php/parkingFunction.php'; 
                                      $slots = getAvailableSlots(); 
                                      foreach ($slots as $slot_id) {
                                      echo "<option value=\"$slot_id\">Slot $slot_id</option>";
                                    }
                                  ?>
                                    </select>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                      <option value="" disabled selected>Choose Status</option>
                                      <option value="Occupied">Occupied</option>
                                      <option value="Reserved">Reserved</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 mb-3">
                                    <label for="userType" class="form-label">User Type</label>
                                    <select class="form-select" id="userType" name="user_type" required>
                                      <option value="" disabled selected>Choose User Type</option>
                                      <option value="VIP">VIP</option>
                                      <option value="Regular">Regular</option>
                                      <option value="Visitor">Visitor</option>
                                    </select>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                    <label for="vehicleType" class="form-label">Vehicle Type</label>
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
                                <div class="row justify-content-center">
                                  <div class="col-md-6 mb-3 d-flex justify-content-center">
                                    <div class="form-group">
                                      <label for="licensePlate" class="form-label">License Plate Number</label>
                                      <input type="text" class="form-control" id="licensePlate" name="license_plate" placeholder="Enter License Plate No." required>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" name="add_parking" class="btn btn-primary">Add</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>


                    <script>
                      var modalId = document.getElementById('modalId');
                    
                      modalId.addEventListener('show.bs.modal', function (event) {
                          let button = event.relatedTarget;
                          let recipient = button.getAttribute('data-bs-whatever');
                      });
                    </script>





                                                          //*     <!-- Check-Out Modal --> 
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
                                    <h5 class="modal-title" id="checkoutModalTitle">
                                      Check Out
                                    </h5>
                                    <button
                                      type="button"
                                      class="btn-close"
                                      data-bs-dismiss="modal"
                                      aria-label="Close"
                                    ></button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="../php/parkingExecution.php" id="doneForm" method="POST">
                                    <div class="row">
                                      <div class="col-md-6 mb-3">
                                          <label for="done_slot_id" class="form-label">Slot ID</label>
                                          <div class="custom-input-group">
                                              <span class="custom-input-group-text"><i class="fas fa-hashtag"></i></span>
                                              <input type="text" class="form-control" id="done_slot_id" name="slot_id" placeholder="Slot ID" value="<?php echo $slot_id; ?>" readonly>
                                          </div>
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <label for="done_status" class="form-label">Status</label>
                                          <div class="custom-input-group">
                                              <span class="custom-input-group-text"><i class="fas fa-info-circle"></i></span>
                                              <input type="text" class="form-control" id="done_status" name="status" placeholder="Status" readonly>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6 mb-3">
                                          <label for="done_user_type" class="form-label">User Type</label>
                                          <div class="custom-input-group">
                                              <span class="custom-input-group-text"><i class="fas fa-user-tag"></i></span>
                                              <input type="text" class="form-control" id="done_user_type" name="user_type" placeholder="User Type" readonly>
                                          </div>
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <label for="done_vehicle_type" class="form-label">Vehicle Type</label>
                                          <div class="custom-input-group">
                                              <span class="custom-input-group-text"><i class="fas fa-car"></i></span>
                                              <input type="text" class="form-control" id="done_vehicle_type" name="vehicle_type" placeholder="Vehicle Type" readonly>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6 mb-3">
                                          <label for="done_license_plate" class="form-label">License Plate</label>
                                          <div class="custom-input-group">
                                              <span class="custom-input-group-text"><i class="fas fa-id-card"></i></span>
                                              <input type="text" class="form-control" id="done_license_plate" name="license_plate" placeholder="License Plate" readonly>
                                          </div>
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <label for="done_time_in" class="form-label">Time In</label>
                                          <div class="custom-input-group">
                                              <span class="custom-input-group-text"><i class="fas fa-calendar-day"></i></span>
                                              <input type="text" class="form-control" id="done_time_in" name="time_in" placeholder="Time In" readonly>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6 mb-3">
                                          <label for="done_time_out" class="form-label">Time Out</label>
                                          <div class="custom-input-group">
                                              <span class="custom-input-group-text"><i class="fas fa-calendar-week"></i></span>
                                              <input type="text" class="form-control" id="done_time_out" name="time_out" placeholder="Time Out" readonly>
                                          </div>
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <label for="done_duration" class="form-label">Duration</label>
                                          <div class="custom-input-group">
                                              <span class="custom-input-group-text"><i class="fas fa-clock"></i></span>
                                              <input type="text" class="form-control" id="done_duration" name="duration" placeholder="Duration" readonly>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button
                                      type="submit"
                                      class="btn btn-secondary"
                                      data-bs-dismiss="modal"
                                      name="cancel_Checkout"
                                      value="true"
                                    >
                                      Close
                                    </button>
                                    <button type="submit" name="save_done" class="btn btn-primary">Save</button>
                            </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                    
                            <script>
                                    $(document).ready(function () {
                                    // Function to populate the modal with data

                                        // Bind the function to the modal's show event
                                        $('#checkoutModal').on('show.bs.modal', function (event) {
                                        const button = $(event.relatedTarget);
                                        const slotId = $(button).data('slot-id');

                                    function populateCheckOutModal(button) {
                                        const slotId = $(button).data('slot-id');
                                        const status = $(button).data('status');
                                        const licensePlate = $(button).data('license-plate');
                                        const userType = $(button).data('user-type');
                                        const vehicleType = $(button).data('vehicle-type');
                                        const timeIn = $(button).data('time-in');
                                        
                                        // Populate the modal fields
                                        $('#checkoutModal input[name="slot_id"]').val(slotId);
                                        $('#checkoutModal input[name="status"]').val(status);
                                        $('#checkoutModal input[name="license_plate"]').val(licensePlate);
                                        $('#checkoutModal input[name="user_type"]').val(userType);
                                        $('#checkoutModal input[name="vehicle_type"]').val(vehicleType);
                                        $('#checkoutModal input[name="time_in"]').val(timeIn);
                                        $('#checkoutModal input[name="time_out"]').val(timeOut); 
                                        $('#checkoutModal input[name="duration"]').val(duration); 
                                    }
                                  });
                                });
                            </script>




                                                        //*      <!-- EDIT MODAL -->
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
                                      <form action="../php/parkingExecution.php" id="insertForm" method="POST">
                                          <div class="row">
                                              <div class="col-md-6 mb-3">
                                                  <label for="slot_id" class="form-label">Slot ID</label>
                                                  <div class="custom-input-group">
                                                      <span class="custom-input-group-text"><i class="fas fa-hashtag"></i></span>
                                                      <input type="text" class="form-control" id="slot_id" name="slot_id" placeholder="Slot ID" readonly>
                                                  </div>
                                              </div>
                                              <div class="col-md-6 mb-3">
                                                  <label for="status" class="form-label">Status</label>
                                                  <div class="custom-input-group">
                                                      <span class="custom-input-group-text"><i class="fas fa-info-circle"></i></span>
                                                      <input type="text" class="form-control" id="status" name="status" placeholder="Status" readonly>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6 mb-3">
                                                  <label for="userType" class="form-label">User Type</label>
                                                  <div class="custom-input-group">
                                                      <span class="custom-input-group-text"><i class="fas fa-user-tag"></i></span>
                                                      <select class="form-select" id="userType" name="user_type" >
                                                          <option value="" disabled selected>Choose User Type</option>
                                                          <option value="VIP">VIP</option>
                                                          <option value="Regular">Regular</option>
                                                          <option value="Visitor">Visitor</option>
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="col-md-6 mb-3">
                                                  <label for="vehicleType" class="form-label">Vehicle Type</label>
                                                  <div class="custom-input-group">
                                                      <span class="custom-input-group-text"><i class="fas fa-car"></i></span>
                                                      <select class="form-select" id="vehicleType" name="vehicle_type" >
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
                                          <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label for="done_license_plate" class="form-label">License Plate</label>
                                      <div class="custom-input-group">
                                          <span class="custom-input-group-text"><i class="fas fa-id-card"></i></span>
                                          <input type="text" class="form-control" id="licensePlate" name="license_plate" placeholder="Enter License Plate No." >
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="edit_slot" class="btn btn-primary">Edit</button>
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

    

    <?php include '../php/alerts.php' ?>
    <!-- JS Script -->

    <script src="../script/modal.js"></script>
    <script src="../script/sidebar.js"></script>
    <script src="../script/darkmode.js"></script>
    <script src="../script/highlighted.js"></script>
  </body>
</html>
