<?php


// Sweet Alerts
if (isset($_GET['welcome_user']) && $_GET['welcome_user'] == 'true') {
    $profilePhoto = $Photo;  // Make sure $photo is defined and set before using it
    
    echo "<script>
        var username = '" . $Name . "';
        var profilePhoto = '" . $Photo. "'; 
        Swal.fire({
            position: 'top',
            title: '<span style=\"color: white;\">Welcome, </span><span style=\"color: #302cac; margin: 0 5px;\">' + username + '</span><span style=\"color: white;\">!</span>',
            showConfirmButton: false,
            timer: 2000,
            html: '<img src=\"' + profilePhoto + '\" style=\"width: 100px; height: 100px; border-radius: 50%;\">',
            background: 'rgb(18,21,31,255)',
        });
    </script>";
}


if (isset($_GET['welcome_admin']) && $_GET['welcome_admin'] == 'true') {
    $profilePhoto = $Photo;  // Make sure $photo is defined and set before using it
    
    echo "<script>
        var username = '" . $Name . "';
        var profilePhoto = '" . $Photo. "'; 
        Swal.fire({
            position: 'top',
            title: '<span style=\"color: white;\">Welcome, </span><span style=\"color: #302cac; margin: 0 5px;\">' + username + '</span><span style=\"color: white;\">!</span>',
            showConfirmButton: false,
            timer: 2000,
            html: '<img src=\"' + profilePhoto + '\" style=\"width: 100px; height: 100px; border-radius: 50%;\">',
            background: 'rgb(18,21,31,255)',
        });
    </script>";
}




if (isset($_GET['email_error']) && $_GET['email_error'] == 'true') {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Account does not Exist!',
            timer: 2000
        });
    </script>";
}

if (isset($_GET['password_error']) && $_GET['password_error'] == 'true') {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Password Incorrect!',
            timer: 2000
        });
    </script>";
}

if (isset($_GET['register_photo_success']) && $_GET['register_photo_success'] == 'true') {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Account successfully created, $Name!',
            timer: 2000
        });
    </script>";
}


if (isset($_GET['checkout_slot']) && $_GET['checkout_slot'] == 'true') {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Slot Successfully Processed!',
        });
    </script>";
}

if (isset($_GET['slot_deleted']) && $_GET['slot_deleted'] == 'true') {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Slot Successfully Removed!',
        });
    </script>";
}


// Toaster Alerts
if (isset($_GET['add_slot']) && $_GET['add_slot'] == 'true') {
    echo "<script>
        toastr.success(' ', 'Slot Added');

        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: 'toast-top-right',
            preventDuplicates: true,
            onclick: null,
            showDuration: '300',
            hideDuration: '1000',
            timeOut: '5000',
            extendedTimeOut: '1000',
            showEasing: 'swing',
            hideEasing: 'linear',
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut'
        };
    </script>";
}

if (isset($_GET['slot_edit']) && $_GET['slot_edit'] == 'true') {
    echo "<script>
        toastr.success(' ', 'Slot Successfully Edited!');

        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: 'toast-top-right',
            preventDuplicates: true,
            onclick: null,
            showDuration: '300',
            hideDuration: '1000',
            timeOut: '5000',
            extendedTimeOut: '1000',
            showEasing: 'swing',
            hideEasing: 'linear',
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut'
        };
    </script>";
}





