<?php
include 'php/connections.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registerFirst'])) {
    // Sanitize and validate input
    $Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    $Password = htmlspecialchars($_POST['Password']);
    $account_type = '2'; // Default account type

    // Check if email is valid
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format'); window.location.href='../loginPage.php?register_error=true';</script>";
        exit;
    }

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $connections->prepare("INSERT INTO usertbl (Email, Password, account_Type) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $Email, $Password, $account_type);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        $_SESSION['Email'] = $Email;
        echo "<script>window.location.href='register_details.php?register_success=true';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='../loginPage.php?register_error=true';</script>";
    }

    // Close statement and connection
    $stmt->close();
    $connections->close();
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
      <a href="#" class="sign-up">Sign Up</a>
    </div>
  </nav>
</header>

<section class="register-container">
      
      <div class="register-img-container">
        <div class="register-img"><?php include 'img/auth-components/regimg.php'?></div>
      </div>
      <div class="register-form">
        <h2>Sign Up</h2>
        <form action="register.php" autocomplete="off" method="POST">
        <div class="input-container">
            <div class="email-field">
                <input name="Email" type="email" placeholder=" " required/>
                <label>Email</label>
            </div>
            <div class="password-field">
                <input name="Password" type="password" id="LoginPassword" placeholder=" " required>
                <label>Password</label>
            </div>
            <button name="registerFirst" class="button" type="submit">Sign Up</button>
            <div class="redirect">
                <a href="loginPage.php">Already have an Account?</a>
            </div>
        </form>
      </div>
    </section>
    </main>

    <?php include 'php/alerts.php'?>



     <script src="script/hover.js"></script>
     <script src="script/togglePassword.js"></script>

    <script>
      window.addEventListener('load', function(){
      document.querySelector('.register-form').classList.add('visible');
      })
    </script>

    <script>
      window.addEventListener('load', function() {
      document.querySelector('.register-img-container').classList.add('show');
    })
    </script>
</body>
</html>