<?php
include('config/connection.php');
session_start();

$host = 'smtp.hostinger.com';
$port = '465'; // Port number may vary, check Hostinger's documentation
$username_smtp = 'info@brgymanagment.online';
$password_smtp = 'Barangay188#';
$from_email = 'info@brgymanagment.online';
$from_name = 'Barangay 188 Tala Caloocan City'; 

// Function to generate a random password
function generateRandomPassword($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

// Check if the form is submitted
if(isset($_POST['email'])) {
    $email = $_POST['email'];

    // Check if the email exists in the admin database
    $sql_admin = "SELECT * FROM tbl_admin WHERE email = '$email'";
    $result_admin = $conn->query($sql_admin);

    // Check if the email exists in the employee database
    $sql_employee = "SELECT * FROM tbl_employee WHERE email = '$email'";
    $result_employee = $conn->query($sql_employee);

    // Check if the email exists in the resident database
    $sql_resident = "SELECT * FROM tbl_resident WHERE email = '$email'";
    $result_resident = $conn->query($sql_resident);

    // If email exists in any of the databases, proceed
    if ($result_admin->num_rows > 0 || $result_employee->num_rows > 0 || $result_resident->num_rows > 0) {
        // Generate a temporary password
        $temp_password = generateRandomPassword();

        // Update the user's password in the respective database
        if ($result_admin->num_rows > 0) {
            $table = 'tbl_admin';
        } elseif ($result_employee->num_rows > 0) {
            $table = 'tbl_employee';
        } else {
            $table = 'tbl_resident';
        }
        
        $hashed_password =  password_hash($temp_password, PASSWORD_DEFAULT);
        $sql_update = "UPDATE $table SET password = '$hashed_password' WHERE email = '$email'";
        $conn->query($sql_update);

        // Send the temporary password via email
        $to = $email;
        $subject = 'Password Reset';
        $message = 'Your temporary password is: ' . $temp_password . '
        Please use this temporary password to log in and change your password.';
        $headers = 'From: ' . $from_name . ' <' . $from_email . '>';

        if (mail($to, $subject, $message, $headers)) {
            $_SESSION['temp'] = "<div class='success text-center'>Temporary password sent to your email.</div>";
            header('location: temp-pass.php');
            exit;
        } else {
            $_SESSION['temp'] = "<div class='error text-center'>Failed to send temporary password.</div>";
            header('location: form.php');
            exit;
        }
    } else {
        $_SESSION['temp'] = "<div class='error text-center'>Email not found.</div>";
        header('location: form.php');
        exit;
    }
}

$conn->close();
?>