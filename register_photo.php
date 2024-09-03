<?php

include 'php/connections.php';
session_start();

// Check if the session contains an Email and fetch the userID
if (isset($_SESSION['Email'])) { 
    $Email = $_SESSION['Email'];

    $sqlfetch = "SELECT userID, Name FROM usertbl WHERE Email = '$Email'";
    $result = mysqli_query($connections, $sqlfetch);

    if ($connections && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userID = $row['userID'];
        $Name = $row['Name'];
    }
} else {
    echo "You are not in session";
    exit;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['registerSecond'])) {
        $targetDirectory = "uploads/";  
        $file = $_FILES['Photo'];
        $originalFileName = basename($file['name']);  
        $imageFileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));  
        $Photo = uniqid('User_', true) . '.' . $imageFileType;
        $targetFilePath = $targetDirectory . $Photo;  
        $uploadOk = 1;  

        // Check if the file is a valid image
        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size (limit to 5MB)
        if ($file['size'] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow specific file formats
        $allowedFormats = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if the file can be uploaded
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Upload the file and update the database
            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                $sql = "UPDATE usertbl SET Photo = '$Photo' WHERE userID = $userID";

                if ($connections->query($sql) === TRUE) {
                    echo "<script>window.location.href='staffPage/dashboard.php?register_photo_success=true';</script>";
                } else {
                    echo "Error: " . $connections->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | BCP</title>
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
      <div style="opacity: 1;" class="form-container sign-up">
        <form action="register_photo.php" method="POST" enctype="multipart/form-data"> 
            <h1>Choose Photo</h1>
            <div class="file-upload-wrapper">
    <div class="file-icon" id="file-icon">
        <img id="file-preview" src="" alt="Preview" style="display: none;">
    </div>
    <div class="file-upload-container" id="file-upload-container">
        <label for="file-upload" class="custom-file-upload">
            Choose File
        </label>
        <span id="file-chosen">No file chosen</span>
        <input name="Photo" id="file-upload" type="file" accept="image/*"/>
    </div>
</div>

            <button name="registerSecond" class="button" type="submit">Submit</button>
        </form>
    </div>
    
   
      <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-right">
                <img src="img/logo.png" alt="">
                <h3>Already have an Account?</h3>
                <a href="loginPage.php">
                <button class="hidden" >Sign In</button>
                </a>
        </div>
      </div>
    </div>
    </div>
    <script src="script/registerphoto.js"></script>

    <?php include 'php/alerts.php'?>
</body>
</html>