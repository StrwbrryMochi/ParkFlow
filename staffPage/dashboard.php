<?php
include '../php/connections.php';
include '../php/fetchStaffLoginData.php';
include '../php/parkingFunction.php';
include '../php/vipFunction.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/sweetalert.css">
    <link rel="stylesheet" href="../style.css" />
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/sweetalert.js"></script>
    <link rel="icon" href="../img/logo.svg" type="img/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Dashboard</title>
</head>
<body>
<div class="sidebar" id="sideBar">
  <div class="sidebar-logo">
    <img src="../img/logo.svg" alt="ParkFlow Logo">
    <span class="logo-text">ParkFlow</span>
  </div>
  
  <div id="toggleButton">
    <button class="toggle-btn">
      <i class="fa-solid fa-bars"></i>
      <span>Overview</span>
    </button>
  </div>
  
  <div class="sidebar-content">
    <ul>
      <li>
        <a href="#">
          <i class="fa-solid fa-house"></i>
          <span>Slot Management</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa-solid fa-list"></i>
          <span>Task Management</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa-solid fa-car"></i>
          <span>Concerns</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa-solid fa-user"></i>
          <span>Announcements</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa-solid fa-user"></i>
          <span>Audit Logs</span>
        </a>
      </li>
    </ul>
  </div>
  
  <div class="sidebar-profile">
    <img src="<?php echo htmlspecialchars($Photo); ?>" alt="Profile Image">
  </div>
</div>


    <main>
      <nav>
        <div class="nav-logo"></div>
      </nav>
      <div class="section-container">
    <section id="section1">
        <h1>Section 1</h1>
        <p>This is the first section.</p>
    </section>
    <section id="section2" style="opacity: 0; pointer-events: none;">
        <h1>Section 2</h1>
        <p>This is the second section.</p>
    </section>
</div>
    </main>

    <?php  include '../php/alerts.php'; ?>


    <!-- JS Script -->
    <script src="../script/layout.js"></script>
    <script src="../script/section.js"></script>

  </body>
</html>
