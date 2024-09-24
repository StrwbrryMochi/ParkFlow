<?php
session_start();
    if (isset($_SESSION['Email'])) { 
        $Email = $_SESSION['Email'];
    
        $sqlfetch = "SELECT * FROM usertbl WHERE Email = '$Email'";
        $result = mysqli_query($connections, $sqlfetch);
    
        if ($connections && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userID = $row['userID'];
            $Email = $row['Email'];
            $Name = $row['FirstName'];
            $Photo = '../uploads/'.$row['Photo'];
        }
        if($row['account_Type'] != 2){
            echo "<script>window.location.href='../loginPage.php?Error=true';</script>";
        }
        
    } else {
        echo "You are not in session";
        exit;
    }




