<?php
include('config/connection.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Barangay 188 Tala Caloocan City</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="favicon.png">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/4a6db1b6a3.js" crossorigin="anonymous"></script>

    <script>
    // Message will disappear after 2 seconds 
    setTimeout(function() {
        var errorDiv = document.querySelector('.error');
        if (errorDiv) {
            errorDiv.remove(); // Remove the error message
        }
    }, 2000);

    setTimeout(function() {
        var errorDiv = document.querySelector('.success');
        if (errorDiv) {
            errorDiv.remove(); // Remove the success message
        }
    }, 2000);
    </script>
</head>

<body class="bg">
    <center>
        <div>
            <a href="">
                <img src="images/Logo Name.png" alt="" width=100%>
            </a>
        </div>
        <div class="login">
            <a class="icons" href="index.php">
                <i class="fa-solid fa-square-xmark"></i>
            </a>
            <h1>Forgot Password</h1>
            <br>
            <?php
if(isset($_SESSION['temp']))
{
    echo $_SESSION['temp'];
    unset($_SESSION['temp']);
}
?>
            <table class="table-size">
                <form method="post" action="form.php">
                    <tr>
                        <input class="login-responsive" type="email" id="email" name="email"
                            placeholder="Input Email Address" required><br>
                    </tr>
                    <tr>
                        <input class="btn-second" type="submit" value="Reset Password">
                    </tr>
                </form>
            </table>
        </div>
    </center>
</body>

</html>
<?php
$host = 'smtp.hostinger.com';
$port = ' 465'; // Port number may vary, check Hostinger's documentation
$username_smtp = 'info@brgymanagment.online';
$password_smtp = 'Barangay188#';
$from_email = 'info@brgymanagment.online';
$from_name = 'Barangay 188 Tala Caloocan City'; 

// Function to generate a random password
function generateRandomPassword($length = 10) {
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $specialChars = '!@#$%^&*()-_=+';

    // Make sure each character type is included at least once
    $password = 
        substr(str_shuffle($uppercase), 0, 1) . 
        substr(str_shuffle($lowercase), 0, 1) . 
        substr(str_shuffle($numbers), 0, 1) . 
        substr(str_shuffle($specialChars), 0, 1);

    // Fill the rest of the password with random characters
    $remainingLength = $length - 4; // 4 characters are already added
    $allChars = $uppercase . $lowercase . $numbers . $specialChars;
    $password .= substr(str_shuffle($allChars), 0, $remainingLength);

    // Shuffle the password to randomize the character order
    $password = str_shuffle($password);

    return $password;
}


if(isset($_POST['email'])) {
$email = $_POST['email'];

// Check if the email exists in the database - ADMIN
$sql1 = "SELECT * FROM tbl_admin WHERE email = '$email'";
$result1 = $conn->query($sql1);

// Check if the email exists in the database - EMPLOYEE
$sql2 = "SELECT * FROM tbl_employee WHERE email = '$email'";
$result2 = $conn->query($sql2);

// Check if the email exists in the database - RESIDENTS
$sql3 = "SELECT * FROM tbl_resident WHERE email = '$email'";
$result3 = $conn->query($sql3);

// FOR ADMIN
if ($result1->num_rows > 0) {
// Generate a temporary password
$temp_password = generateRandomPassword();

// Update the user's password in the database
$hashed_password1 = md5($temp_password, PASSWORD_DEFAULT);
$sql_update1 = "UPDATE tbl_admin SET password = '$hashed_password1' WHERE email = '$email'";
$conn->query($sql_update1); 

// Send the temporary password via email
$to1 = $email;
$subject1 = 'Password Reset';
$message1 = 'Your temporary password is: ' . $temp_password . '
Please use this temporary password to log in and change your password.';
$headers1 = 'From: ' . $from_name . ' <' . $from_email . '>' ; if (mail($to1, $subject1, $message1, $headers1)) {

    $_SESSION['temp'] = " <div class='success text-center'>Temporary password sent to your email.</div>";
       header('location:'. SITEURL.'temp-pass.php');
} else {
    $_SESSION['temp'] = " <div class='error text-center'>Email not found.</div>";
    header('location:'. SITEURL.'form.php');
 } 
} 
 
// FOR EMPLOYEE

elseif ($result2->num_rows > 0) {
    // Generate a temporary password
    $temp_password = generateRandomPassword();
    
    // Update the user's password in the database
    $hashed_password2 = password_hash($temp_password, PASSWORD_DEFAULT);
    $sql_update2 = "UPDATE tbl_employee SET password = '$hashed_password2' WHERE email = '$email'";
    $conn->query($sql_update2);
    
    // Send the temporary password via email
    $to2 = $email;
    $subject2 = 'Password Reset';
    $message2 = 'Your temporary password is: ' . $temp_password . '
    Please use this password to log in and change your password.';
    
    $headers2 = 'From: ' . $from_name . ' <' . $from_email . '>' ; if (mail($to2, $subject2, $message2, $headers2)) {
        $_SESSION['temp'] = " <div class='success text-center'>Temporary password sent to your email.</div>";
        header('location:'. SITEURL.'temp-pass.php');
    } else {
        $_SESSION['temp'] = " <div class='error text-center'>Email not found.</div>";
        header('location:'. SITEURL.'form.php');
    } 
}

    // FOR RESIDENTS
elseif ($result3->num_rows > 0) {
    // Generate a temporary password
    $temp_password = generateRandomPassword();
    
    // Update the user's password in the database
    $hashed_password3 = password_hash($temp_password, PASSWORD_DEFAULT);
    $sql_update3 = "UPDATE tbl_employee SET password = '$hashed_password3' WHERE email = '$email'";
    $conn->query($sql_update3);
    
    // Send the temporary password via email
    $to3 = $email;
    $subject3 = 'Password Reset';
    $message3 = 'Your temporary password is: ' . $temp_password . '
    Please use this password to log in and change your password.';
    $headers3 = 'From: ' . $from_name . ' <' . $from_email . '>' ; if (mail($to3, $subject3, $message3, $headers3)) {
        $_SESSION['temp'] = " <div class='success text-center'>Temporary password sent to your email.</div>";
        header('location:'. SITEURL.'temp-pass.php');
    } else {
        $_SESSION['temp'] = " <div class='error text-center'>Email not found.</div>";
        header('location:'. SITEURL.'form.php');
    }
    } 
else {
    $_SESSION['temp'] = " <div class='error text-center'>Email not found.</div>";
    header('location:'. SITEURL.'form.php');
} 
    }
    $conn->close();
    ?>