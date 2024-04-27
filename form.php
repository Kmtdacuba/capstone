<?php
include('config/connection.php');

$host = 'smtp.hostinger.com';
$port = ' 465'; // Port number may vary, check Hostinger's documentation
$username_smtp = 'info@brgymanagment.online';
$password_smtp = 'Barangay188#';
$from_email = 'info@brgymanagment.online';
$from_name = 'Barangay 188 Tala Caloocan City'; 

// Function to generate a random password
function generateRandomPassword($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}


if(isset($_POST['email'])) {
$email = $_POST['email'];

// Check if the email exists in the database - ADMIN
$sql = "SELECT * FROM tbl_admin WHERE email = '$email'";
$result = $conn->query($sql);


// FOR ADMIN
if ($result->num_rows > 0) {
// Generate a temporary password
$temp_password = generateRandomPassword();

// Update the user's password in the database
$hashed_password =  password_hash($temp_password, PASSWORD_DEFAULT);
$sql_update = "UPDATE tbl_admin SET password = '$hashed_password' WHERE email = '$email'";
$conn->query($sql_update); 

// Send the temporary password via email
$to = $email;
$subject = 'Password Reset';
$message = 'Your temporary password is: ' . $temp_password . '
Please use this temporary password to log in and change your password.';
$headers = 'From: ' . $from_name . ' <' . $from_email . '>' ; 
if (mail($to, $subject, $message, $headers)) {
    $_SESSION['temp'] = " <div class='success text-center'>Temporary password sent to your email.</div>";
       header('location:'. SITEURL.'temp-pass.php');
} else {
    $_SESSION['temp'] = " <div class='error text-center'>Email not found.</div>";
    header('location:'. SITEURL.'form.php');
 } 
} 
    }
    $conn->close();
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

</html