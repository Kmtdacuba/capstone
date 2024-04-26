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
</head>

<body class="bg">
    <div>
        <a href="">
            <img src="images/Logo Name.png" alt="" width=100%>
        </a>
    </div>
    <center>
        <div class="login">
            <a class="icons" href="index.php">
                <i class="fa-solid fa-square-xmark"></i>
            </a>
            <h1>Change Password</h1>
            <?php
                if(isset($_SESSION['change']))
                {
                    echo $_SESSION['change'];
                    unset($_SESSION['change']);
                }
                if(isset($_SESSION['temp']))
                {
                    echo $_SESSION['temp'];
                    unset($_SESSION['temp']);
                }
                ?>
            <form method="post" action="change-pass.php">
                <tr>
                    <input class="login-responsive" type="password" id="new_password" name="new_password"
                        placeholder="Input New Password" required><br>
                </tr>
                <tr>
                    <input class="login-responsive" type="password" id="confirm_password" name="confirm_password"
                        placeholder="Confirm Your Password" required><br>
                </tr>
                <tr>
                    <input class="btn-second" type="submit" value="Change Password">
                </tr>
            </form>
        </div>
    </center>

</body>

</html>
<?php

/* FOR ADMIN */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Verify if passwords match
    if ($new_password === $confirm_password) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        // Update password in the database
        $email = $_SESSION['email'];
        $sql = "UPDATE tbl_admin SET password='$hashed_password' WHERE email='$email'";

        // Database connection and query execution code here...
        $_SESSION['change'] = " <div class='success text-center'>Password changed successfully!</div>";
        header('location: index.php');
    } else {
        $_SESSION['change'] = " <div class='success text-center'>Passwords do not match!</div>";
        header('location: change-pass.php');
    }
}


?>