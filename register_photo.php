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
} else {
    echo "You are not in session";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['registerPhoto']) && isset($_POST['photoDataUrl'])) {
      // Extract base64 string from the hidden input
      $photoDataUrl = $_POST['photoDataUrl'];

      // Check if the base64 string is valid
      if (empty($photoDataUrl)) {
          echo "No image data received.";
          exit;
      }

      // Extract the base64 encoded image data (after the "base64," part)
      list($type, $data) = explode(';', $photoDataUrl);
      list(, $data) = explode(',', $data);
      $decodedData = base64_decode($data);

      // Determine the file extension from the MIME type
      $mimeType = explode(':', $type)[1];
      $imageFileType = '';
      if ($mimeType == 'image/jpeg') {
          $imageFileType = 'jpg';
      } elseif ($mimeType == 'image/png') {
          $imageFileType = 'png';
      } elseif ($mimeType == 'image/gif') {
          $imageFileType = 'gif';
      } elseif ($mimeType == 'image/webp') {
          $imageFileType = 'webp';
      } else {
          echo "Unsupported image type.";
          exit;
      }

      // Define target directory and generate a unique file name
      $targetDirectory = "uploads/";
      $Photo = uniqid('User_', true) . '.' . $imageFileType;
      $targetFilePath = $targetDirectory . $Photo;

      // Save the decoded image data to a file
      if (file_put_contents($targetFilePath, $decodedData)) {
          // Update the database with the file name
          $updateSql = "UPDATE usertbl SET Photo = '$Photo' WHERE userID = $userID";

          if ($connections->query($updateSql) === TRUE) {
              echo "<script>window.location.href='staffPage/dashboard.php?register_photo_success=true';</script>";
          } else {
              echo "Error: " . $connections->error;
          }
      } else {
          echo "Sorry, there was an error saving your file.";
      }
  } else {
      echo "No photo data received.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Photo</title>
    <link rel="stylesheet" href="css/sweetalert.css">
    <script src="js/sweetalert.js"></script>
    <link rel="stylesheet" href="auth.css">
    <link rel="icon" href="img/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link rel="stylesheet" href="css/filepond.css">
    <script src="js/filepond.js"></script>
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

<section class="register-details-container-photo">
  <div class="register-details-form-photo">
    <h2>Choose Photo</h2>
    <form action="register_photo.php" method="POST" enctype="multipart/form-data">
      
      <div class="form-row">
        <div class="form-group">
          <input type="hidden" id="photoDataUrl" name="photoDataUrl">
          <input type="file" id="photo" name="Photo" class="custom-file-input" accept="image/*" required>
        </div>
        <div class="details-btn">
            <button type="submit" name="registerPhoto" class="button" id="detailsBtn">Submit</button>
        </div>
      </div>
    </form>
  </div>
    <div class="details-photo-wrapper">
      <div class="details-photo"></div>
    </div>
</section>
    </main>

    <script>
    window.addEventListener('load', function() {
    document.querySelector('.register-details-form-photo').classList.add('visible');
    });
    </script>

    <script>
        window.addEventListener('load', function() {
            document.querySelector('.details-photo-wrapper').classList.add('show');
        })
    </script>

<script>
    const inputElement = document.querySelector('#photo');
FilePond.create(inputElement, {
    credits: false,
    maxFiles: 1
});

// Find the FilePond instance for handling the image preview logic
const pond = FilePond.find(inputElement);

// Get the hidden input to store the image's Data URL
const hiddenInput = document.querySelector('#photoDataUrl');

pond.on('addfile', (error, file) => {
    if (error) {
        console.log('Error', error);
        return;
    }

    const reader = new FileReader();
    reader.onload = function(e) {
        const detailsPhoto = document.querySelector('.details-photo');
        detailsPhoto.style.backgroundImage = `url(${e.target.result})`;
        detailsPhoto.classList.add('visible');

        // Store the Data URL in the hidden input
        hiddenInput.value = e.target.result;
    };
    reader.readAsDataURL(file.file);
});

// Listen for the removefile event to clear the image preview and hidden input
pond.on('removefile', (error, file) => {
    if (error) {
        console.log('Error', error);
        return;
    }

    const detailsPhoto = document.querySelector('.details-photo');
    detailsPhoto.classList.remove('visible');

    // Clear the background image after a brief delay for the fade-out effect
    setTimeout(() => {
        detailsPhoto.style.backgroundImage = '';
    }, 500);

    // Clear the hidden input value
    hiddenInput.value = '';
});
</script>
   

    <?php include 'php/alerts.php'?>
</body>
</html>