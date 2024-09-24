<?php
include '../php/connections.php';
include '../php/fetchStaffLoginData.php';
include_once '../php/parkingFunction.php';

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
    <script src="../script/modal.js"></script>
    <script src="../script/sidebar.js"></script>
    <script src="../script/darkmode.js"></script>
    <script src="../script/highlighted.js"></script>

    <link rel="icon" href="../img/logo.png" type="img/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Dashboard | BCP</title>
</head>
<body>
    <main>
        <!-- Side Bar -->
        <div class="sidebar" id="sideBar">
            <div class="sidebar-content">
                <div class="sidebar-logo">
                    <img src="../img/logoes.jpg" alt="Logo" />
                </div>
                <div class="sidebar-text">
                    <ul>
                        <li><a href="dashboard.php"><i class="fa-solid fa-table"></i> <span>Dashboard</span></a></li>
                        <li><a href="reservations.html"><i class="fa-solid fa-book"></i> <span>Reservations</span></a></li>
                        <li><a href="parkinglotmgmnt.php"><i class="fa-solid fa-car"></i> <span>Parking Slot Management</span></a></li>
                        <li><a href="reservations.html"><i class="fa-solid fa-clock-rotate-left"></i> <span>Activity Feed</span></a></li>
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
                <div class="middle-title">
                    <h4>Parking Lot Management System</h4>
                </div>
            </div>
            <div class="right">
                <button id="darkModeBtn" class="darkMode-toggle">
                    <i class="fa-regular fa-moon"></i>
                </button>
                <button onclick="openNotif()" class="notification" id="notifBtn">
                    <i class="fa-regular fa-bell"></i>
                </button>
                <button onclick="openProfile()" class="user" id="userBtn">
                    <img src="<?php echo htmlspecialchars($Photo); ?>" alt="User PFP" class="user-image" />
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
                <img src="<?php echo htmlspecialchars($Photo); ?>" alt="Profile Photo">
                <div class="profile-details">
                    <p class="profile-name"><?php echo htmlspecialchars($Name); ?></p>
                    <div class="profile-info">
                        <span class="profile-dot"></span>
                        <span class="profile-id"><?php echo htmlspecialchars($userID); ?></span>
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
        <div class="main-page">
        <div class="title">
                    <h1>PROFILE</h1>
                </div>
                <div class="line"></div>
                <div class="content">
                                    <form class="profile-container row" action="../php/profile_change_staff.php" method="POST" enctype="multipart/form-data" id="profileForm">
                        <!-- Profile Container Form -->
                        <div class="profile-left col-md-4">
                            <div class="profile-img-container text-center">
                                <img id="imagedis" src="<?php echo "$photo"; ?>" alt="Profile">
                                <input name="photo" required accept="image/*" onchange="previewPhoto()" id="imgup" type="file" class="form-control mt-3">
                            </div>
                        </div>
                        <div class="profile-right col-md-8">
                            <div class="profile-right-wrapper">
                                <!-- First Name -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="First Name" name="firstName" value="<?php echo "$fName"; ?>">
                                </div>

                                <!-- Last Name -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Last Name" name="lastName" value="<?php echo "$lName"; ?>">
                                </div>

                                <!-- Email -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email" name="Email" value="<?php echo "$Email"; ?>">
                                </div>

                                <!-- Password -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="text" class="form-control" placeholder="Password" name="Password" value="<?php echo "$Password"; ?>">
                                </div>

                                <!-- Age -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    <input type="number" class="form-control" placeholder="Age" name="Age" value="<?php echo "$Age"; ?>">
                                </div>

                                <!-- Account Type -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
                                    <input type="text" class="form-control" placeholder="Account Type" name="accountType" value="<?php echo "$account_type"; ?>" readonly>
                                </div>

                                <!-- Date of Birth -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                    <input type="date" class="form-control" id="dob" name="birthDay" value="<?php echo "$birthDay"; ?>">
                                </div>

                                <!-- Address -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                    <input type="text" class="form-control" placeholder="Address" name="Address" value="<?php echo "$Address"; ?>">
                                </div>

                                <!-- Gender -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                    <input type="text" class="form-control" placeholder="Gender" name="Gender" value="<?php echo "$Gender"; ?>">
                                </div>

                                <!-- Phone Number -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phoneNum" value="<?php echo "$phoneNum"; ?>">
                                </div>
                            </div>

                            <div class="input-group">
                                <button type="submit" id="profileSubmit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
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
