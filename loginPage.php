<?php
session_start();
$Email = $password1 = "";
$EmailErr = $password1Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Email"])) {
        echo "<script>window.location.href='loginPage.php?email_empty=true';</script>";
    } else {
        $Email = $_POST["Email"];
    }

    if (empty($_POST["Password"])) {
       echo "<script>window.location.href='loginPage.php?password_empty=true';</script>";
    } else {
        $password1 = $_POST["Password"];
    }

    if ($Email && $password1) {
        include("php/connections.php");

        $check_Email = mysqli_query($connections, "SELECT * FROM usertbl WHERE Email='$Email'");
        $check_Email_row = mysqli_num_rows($check_Email);

        if ($check_Email_row > 0) {
            while ($row = mysqli_fetch_assoc($check_Email)) {
                $db_password1 = $row["Password"];
                $db_account_Type = $row["account_Type"];  // Corrected variable name

                if ($password1 == $db_password1) {
                    if ($db_account_Type == "1") {  // Checking correct variable
                        $_SESSION['Email'] = $Email;
                        echo "<script>window.location.href='adminPage/adminDashboard.php?welcome_admin=true';</script>";
                    }
                    elseif($db_account_Type == "2"){
                        $_SESSION['Email'] = $Email;
                        echo "<script>window.location.href='staffPage/dashboard.php?welcome_user=true';</script>";
                    }        
                    else {
                        $_SESSION['Email'] = $Email;
                        echo "<script>window.location.href='staffPage/dashboard.php?welcome_user=true';</script>";
                    }
                } else {
                    // Password incorrect
                    echo "<script>window.location.href='loginPage.php?password_error=true';</script>";
                }
            }
         } else {
            // Email is not registered
            echo "<script>window.location.href='loginPage.php?email_error=true';</script>";
        }
    }
}

// Reset error messages when the page is loaded initially
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $EmailErr = $password1Err = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/sweetalert.css">
    <script src="js/sweetalert.js"></script>
    <link rel="stylesheet" href="auth.css">
    <link rel="icon" id="logo" href="img/logo.svg" type="image/x-icon">
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

<section class="login-container">
      <div class="login-form">
        <h2>Sign In</h2>
        <form autocomplete="off" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="input-container">
            <div class="email-field">
                <input name="Email" type="email" placeholder=" " required/>
                <label>Email</label>
            </div>
            <div class="password-field">
                <input name="Password" type="password" id="LoginPassword" placeholder=" " required>
                <label>Password</label>
            </div>
            <button class="button" type="submit">Sign In</button>
        </div>
        </form>
      </div>
      <div class="login-img-container">
        <div class="login-img">
            <?php include 'img/auth-components/logimg.php'?>
        </div>
      </div>
      
    </section>
    </main>

    <?php include 'php/alerts.php'?>

    <script>
        window.addEventListener('load', function(){
        document.querySelector('.login-form').classList.add('visible');
        })
    </script>

    <script>
        window.addEventListener('load', function() {
        document.querySelector('.login-img-container').classList.add('show');
    })
    </script>
     <script src="script/togglePassword.js"></script>
    <script src="script/hover.js"></script>
</body>
</html>