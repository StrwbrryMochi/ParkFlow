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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <title>Dashboard</title>
</head>
<body>
<div class="sidebar" id="sideBar">
  <div class="sidebar-logo">
    <img src="../img/logo.svg" alt="ParkFlow Logo">
    <span class="logo-text">ParkFlow</span>
    <button class="toggle-btn" id="logoToggle">
      <i class='bx bx-menu-alt-right'></i>
    </button>
  </div>
  <div class="divider"></div>
  <div class="sidebar-content">
    <ul>
      <li>
        <button class="toggle-btn" id="sidebarToggle">
        <i class='bx bx-menu-alt-left' ></i>
        </button>
      </li>
      <div class="divider"></div>
      <li>
        <a href="dashboard.php">
          <i class='bx bx-grid-alt' ></i>
          <span>Slots</span>
        </a>
      </li>
      <li>
        <a href="task.php">
          <i class='bx bx-check-square' ></i>
          <span>Tasks</span>
        </a>
      </li>
      <li>
        <a href="concerns.php">
          <i class='bx bxs-megaphone' ></i>
          <span>Concerns</span>
        </a>
      </li>
      <li>
        <a href="announcements.php">
          <i class='bx bx-file' ></i>
          <span>Announcements</span>
        </a>
      </li>
      <li>
        <a href="activity.php">
          <i class='bx bx-bar-chart-square' ></i>
          <span>Activity</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="divider"></div>
  <div class="sidebar-profile">
  <div class="profile-image">
    <img src="<?php echo htmlspecialchars($Photo); ?>" alt="Profile Image" id="profileImage" onclick="profileSnippet()">
  </div>
  <div class="profile-details">
    <div class="profile-name"><?php echo htmlspecialchars($FirstName); ?></div>
    <div class="profile-email">Available</div>
  </div>
</div>
</div>

    <main>
      <nav>
        <div class="nav-logo"><img src="../img/1.jpg" alt=""></div>
        <div class="search-container">
        <form class="no-submit">
            <input class="no-submit" type="search" id="search" autocomplete="off" placeholder="Search...">
        </form>
    </div>
    <div class="nav-logo"><img src="../img/1.jpg" alt=""></div>
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
    <?php include '../components/profile-snippet.php' ?>
    <?php include '../components/profile-modal.php' ?>

    <!-- JS Script -->
    <script>
    const profileImage = document.getElementById('profileImage');

    // Scale the image up when the mouse is pressed
    profileImage.addEventListener('mousedown', function() {
      this.style.transform = 'scale(1.2)'; 
      this.classList.remove('release'); 
    });

    // Revert to normal size with a bounce effect on release
    profileImage.addEventListener('mouseup', function() {
      this.style.transform = 'scale(1)'; 
      this.classList.add('release'); 
    });

    // Also revert scale with bounce effect when mouse leaves the image
    profileImage.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1)'; 
      this.classList.add('release'); 
    });
    </script>
     <script src="../script/modal.js"></script>
    <script src="../script/layout.js"></script>
    <script src="../script/section.js"></script>

  </body>
</html>
