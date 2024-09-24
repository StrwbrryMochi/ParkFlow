<?php

include 'php/connections.php';
session_start();

// Check if the session contains an Email and fetch the userID
if (isset($_SESSION['Email'])) { 
    $Email = $_SESSION['Email'];

    $sqlfetch = "SELECT * FROM usertbl WHERE Email = '$Email'";
    $result = mysqli_query($connections, $sqlfetch);

    if ($connections && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userID = $row['userID'];
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $DateofBirth = $_POST['DateofBirth'];
      $Address = $_POST['Address'];
      $PhoneNumber = $_POST['PhoneNumber'];

        $updateSql = "UPDATE usertbl SET DateofBirth = '$DateofBirth', Address = '$Address', PhoneNumber = '$PhoneNumber' WHERE userID = $userID";

        if ($connections->query($updateSql) === TRUE) {
          echo "<script>window.location.href = 'register_photo.php?register_success=true';</script>";
        } else {
            echo "<script>window.location.href = 'register.php?register_error=true';</script>";
        }
        
    }
} else {
    echo "You are not in session";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="css/sweetalert.css">
    <script src="js/sweetalert.js"></script>
    <link rel="stylesheet" href="auth.css">
    <link rel="icon" href="img/logo.svg" type="image/x-icon">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
</head>
<body>
    <main>
    <header>
  <nav class="navbar">
    <div class="logo-section">
      <a href="#" class="logo" id="logo">Park<span>Flow</span></a>
    </div>
    <ul class="nav-links">
    <li><a href="#">Home</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
    <div class="auth-buttons">
      <a href="loginPage.php" class="sign-in">Sign In</a>
      <a href="register.php" class="sign-up">Sign Up</a>
    </div>
  </nav>
</header>

<section class="register-details-container-second">
<div class="details-svg-wrapper-second">
    <div class="details-svg-second"><?php include 'img/auth-components/regsvg2.php' ?></div>
  </div>
  <div class="register-details-form-second">
    <h2>Create an Account</h2>
    <form action="register_details2.php" method="POST">
      
      <div class="form-row">
        <div class="form-group">
          <input type="date" id="dob" name="DateofBirth" onclick="this.showPicker()"; onchange="changeColor(); moveLabel('dob');" required placeholder="MM/DD/YY">
          <label for="dob">Date of Birth</label>
        </div>
        <div class="form-group">
          <input type="text" id="address" name="Address" autocomplete="off" required placeholder=" ">
          <label for="address">Address</label>
        </div>
        <div class="form-group">
          <input type="tel" id="phoneNumber" name="PhoneNumber" autocomplete="off" maxlength="12" pattern="\d{12}" required placeholder=" ">
          <label for="phoneNumber">Phone Number</label>
        </div>
        <div class="details-btn">
            <button type="submit" class="button" id="detailsBtn">Next</button>
        </div>
      </div>
    </form>
  </div>
</section>

    </main>






    <?php include 'php/alerts.php'?>

    
    <script>
    window.addEventListener('load', function() {
    document.querySelector('.register-details-form-second').classList.add('visible');
    });
    </script>

    <script>
        window.addEventListener('load', function() {
            document.querySelector('.details-svg-wrapper-second').classList.add('show');
        })
    </script>

    <script>
        function changeColor() {
            var dobInput = document.getElementById('dob');

            if (dobInput.value) {
                dobInput.style.color = 'black';
            }
        }

        function moveLabel(inputId) {
            var inputElement = document.getElementById(inputId);
            var label = document.querySelector('label[for="' + inputId + '"]');

            if (inputElement.value) {
                label.style.top = '1px';
                label.style.left = '10px';
                label.style.fontSize = '12px';
                label.style.color = 'var(--auth-primary)';
            } else {
                label.style.top = '50%';
                label.style.left = '10px';
                label.style.fontSize = '16px';
                label.style.color = '#999';
            }
        }

        // Initial check to position the labels if inputs already have values
        document.addEventListener('DOMContentLoaded', function() {
            moveLabel('dob');
        });
    </script>

</body>
</html>