<?php
session_start();
    if (isset($_SESSION['Email'])) { 
        $Email = $_SESSION['Email'];
    
        $sqlfetch = "SELECT *FROM usertbl WHERE Email = '$Email'";
        $result = mysqli_query($connections, $sqlfetch);
    
        if ($connections && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userID = $row['userID'];
            $Email = $row['Email'];
            $Name = $row['Name'];
            $Photo = '../uploads/'.$row['Photo'];
        }
    } else {
        echo "You are not in session";
        exit;
    }


