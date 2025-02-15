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
    <link rel="stylesheet" href="../css/sweetalert.css">
    <script src="../js/sweetalert.js"></script>
    <link rel="stylesheet" href="../style.css" />
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
              <li><a href="adminDashboard.php"><i class="fa-solid fa-table"></i> <span>Dashboard</span></a></li>
              <li><a href="reservations.html"><i class="fa-solid fa-book"></i> <span>Reservations</span></a></li>
              <li><a href="adminParkinglotmgmnt.php"><i class="fa-solid fa-car"></i> <span>Parking Slot Management</span></a></li>
              <li><a href="usermgmnt.php"><i class="fa-solid fa-user"></i> <span>User Management</span></a></li>
              <li><a href="reservations.html"><i class="fa-solid fa-clock-rotate-left"></i></i> <span>Activity Feed</span></a></li>
              <li><a href="concerns.html"><i class="fa-solid fa-bullhorn"></i> <span>Concerns</span></a></li>
              <li><a href="configuration.html"><i class="fa-solid fa-gear"></i> <span>Configuration</span></a></li>
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
          <h2>Dashboard Overview</h2>

          <!-- Status Cards -->
          <div class="status-cards">
            <div class="status-card" id="total-slots-card">
              <div class="status-icon">
                <i class="fa-solid fa-table-cells"></i>
              </div>
              <div class="status-info">
                <span id="total-slots-count">1</span>
                <p>Total Slots</p>
              </div>
            </div>
            <div class="status-card" id="occupied-card">
              <div class="status-icon">
                <i class="fa-solid fa-warehouse"></i>
              </div>
              <div class="status-info">
                <span id="occupied-count">1,000</span>
                <p>Occupied</p>
              </div>
            </div>
            <div class="status-card" id="available-card">
              <div class="status-icon">
                <i class="fa-solid fa-car-side"></i>
              </div>
              <div class="status-info">
                <span id="available-count">0</span>
                <p>Available</p>
              </div>
            </div>
            <div class="status-card" id="reserved-card">
              <div class="status-icon">
                <i class="fa-solid fa-book"></i>
              </div>
              <div class="status-info">
                <span id="reserved-count">5</span>
                <p>Reserved</p>
              </div>
            </div>
            <div class="status-card" id="total-income-card">
              <div class="status-icon">
                <i class="fa-solid fa-money-bill-trend-up"></i>
              </div>
              <div class="status-info">
                <span id="total-income-count">1</span>
                <p>Total Income</p>
              </div>
            </div>
          </div>

<!-- Dashboard Table -->
<div class="table-container">
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
    <div class="table-body-container">
        <table class="parking-table">
            <tbody>
            <tr>
                <td>001</td>
                <td>ABC1234</td>
                <td>VIP</td>
                <td>SUV</td>
                <td><div class="status-item available"><span class="status-dot"></span>Available</div></td>

                <td>2 hrs</td>
                <td>Paid</td>
                <td><button>Details</button></td>
            </tr>
            <tr>
                <td>001</td>
                <td>ABC1234</td>
                <td>VIP</td>
                <td>SUV</td>
                <td><div class="status-item occupied"><span class="status-dot"></span>Occupied</div></td>
                <td>2 hrs</td>
                <td>Paid</td>
                <td><button>Details</button></td>
            </tr>
            <tr>
                <td>001</td>
                <td>ABC1234</td>
                <td>VIP</td>
                <td>SUV</td>
                <td><div class="status-item reserved"><span class="status-dot"></span>Reserved</div></td>
                <td>2 hrs</td>
                <td>Paid</td>
                <td><button>Details</button></td>
            </tr>
          
            </tbody>
        </table>
    </div>
</div>

        </div>
          </div>
        </div>
      </section>
    </main>

    <?php  include '../php/alerts.php'; ?>


    <!-- JS Script -->
     <script src="../script/modal.js"></script>
    <script src="../script/sidebar.js"></script>
    <script src="../script/darkmode.js"></script>
    <script src="../script/highlighted.js"></script>
  </body>
</html>
