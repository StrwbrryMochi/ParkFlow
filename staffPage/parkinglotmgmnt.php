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
    <title>Dashboard | BCP</title>
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

        <!-- Main Display -->
      <section>
        <!-- Dashboard -->
        <div class="main-page">
          <h2>Slot Management</h2>

          <!-- Search Bar -->
          <div class="search-create-container">
          <input type="text" id="search-bar" class="search-bar" placeholder="Search...">

 <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#modalId" id="create-btn">
  Add Slot
</button>


            <!-- The Modal -->
<div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
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
              <select class="form-select" id="slotId" name="slot_id" required>
                <option value="" disabled selected>Choose Slot ID</option>
                <?php
                include '../php/parkingFunction.php'; // Include the file that contains the function
                $slots = getAvailableSlots(); // Get available slots
                foreach ($slots as $slot_id) {
                echo "<option value=\"$slot_id\">Slot $slot_id</option>";
               }
             ?>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="licensePlate" class="form-label">License Plate Number</label>
              <input type="text" class="form-control" id="licensePlate" name="license_plate" placeholder="Enter License Plate Number" required>
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
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" name="status" required>
                <option value="" disabled selected>Choose Status</option>
                <option value="Occupied">Occupied</option>
                <option value="Reserved">Reserved</option>
              </select>
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
 
</div>

<!-- Dashboard Table -->
<div class="table-container-parking">
    <table class="parking-table">
        <thead>
            <tr>
                <th>Slot ID</th>
                <th>License Plate No</th>
                <th>User Type</th>
                <th>Vehicle Type</th>
                <th>Status</th>
                <th>Duration</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    <div class="parking-table-body-container">
    <table class="parking-table">
          <?php include_once '../php/parkingFunction.php';
            $fetchParking = fetchParking();
          
          ?>
            <tbody>
              <?php foreach ($fetchParking as $parkingData): ?>      
            <tr>
                <td><?php echo htmlspecialchars($parkingData['slot_id']) ?></td>
                <td><?php echo htmlspecialchars($parkingData['license_plate']) ?></td>
                <td><?php echo htmlspecialchars($parkingData['user_type']) ?></td>
                <td><?php echo htmlspecialchars($parkingData['vehicle_type']) ?></td>
                <td><div class="<?php echo htmlspecialchars($parkingData['ClassADD']); ?>"><span class="status-dot"></span><?php echo htmlspecialchars($parkingData['status']); ?></div></td>

                <td>2 hrs</td>
                <td>Paid</td>
                <td><button>Details</button></td>
            </tr>
            </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>

        </div>
          </div>
        </div>
      </section>

    </main>

    

    <?php include '../php/alerts.php' ?>
    <!-- JS Script -->
    
    <script src="../script/modal.js"></script>
    <script src="../script/sidebar.js"></script>
    <script src="../script/darkmode.js"></script>
    <script src="../script/highlighted.js"></script>
  </body>
</html>
