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
    <title>Log In | BCP</title>
    <link rel="stylesheet" href="css/sweetalert.css">
    <script src="js/sweetalert.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
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
<div class="login-page">
<div class="login-container" id="login-container">
      <div class="form-container sign-up">
        <form action="php/register.php" method ="POST"> 
            <h1>Create Account</h1>
            <input autocomplete="off" name="Name" type="text" placeholder="Name" required/>
            <input autocomplete="off" name="Email" type="email" placeholder="Email" required/>
            <div class="password-container" id="signup-pass-container">
                <input name="Password" type="password" id="signUpPassword" placeholder="Password" required>
                <i class="fa fa-eye" id="toggleSignUpPassword"></i>
            </div>
            <button name="registerFirst" class="button" type="submit">Sign Up</button>
        </form>
    </div>
    
    <div class="form-container sign-in">
        <form autocomplete="off" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h1>Sign In</h1>
            <input name="Email" type="email" placeholder="Email" required/>
            <div class="password-container">
                <input name="Password" type="password" id="signInPassword" placeholder="Password" required>
                <i class="fa fa-eye" id="toggleSignInPassword"></i>
            </div>
        
            
            <button class="button" type="submit">Sign In</button>
            <div class="forgotpass">
                <a href="#">Forgot Password?</a>
            </div>
        </form>
      </div>
      <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <img src="img/logo.png" alt="">
                <h3>Already have an Account?</h3>
                <button class="hidden" id="login">Sign In</button>
            </div>
            <div class="toggle-panel toggle-right">
                <img src="img/logo.png" alt="">
                <h3>Don't have an Account?</h3>
                <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
    </div>
    <script src="script/loginSlider.js"></script>
    <script src="script/togglePassword.js"></script>

    <?php include 'php/alerts.php'?>
</body>
</html>