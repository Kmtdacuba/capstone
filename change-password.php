<?php
include('config/connection.php');

// Check if the form is submitted for password change
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Verify if passwords match
    if ($new_password === $confirm_password) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update password in the respective table based on user type
        if ($_SESSION['user_type'] == 'admin') {
            $email = $_SESSION['email'];
            $sql = "UPDATE tbl_admin SET password='$hashed_password' WHERE email='$email'";
        } elseif ($_SESSION['user_type'] == 'employee') {
            $email = $_SESSION['email'];
            $sql = "UPDATE tbl_employee SET password='$hashed_password' WHERE email='$email'";
        } elseif ($_SESSION['user_type'] == 'resident') {
            $email = $_SESSION['email'];
            $sql = "UPDATE tbl_resident SET password='$hashed_password' WHERE email='$email'";
        }

        // Execute the update query
        if ($conn->query($sql) === TRUE) {
            $_SESSION['change'] = "<div class='success text-center'>Password changed successfully!</div>";
            header('location: index.php');
            exit;
        } else {
            $_SESSION['change'] = "<div class='error text-center'>Error updating password: " . $conn->error . "</div>";
            header('location: change-password.php');
            exit;
        }
    } else {
        $_SESSION['change'] = "<div class='error text-center'>Passwords do not match!</div>";
        header('location: change-password.php');
        exit;
    }
}
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
            if (isset($_SESSION['change'])) {
                echo $_SESSION['change'];
                unset($_SESSION['change']);
            }
            ?>
            <form method="post" action="change-password.php">
                <input class="login-responsive" type="password" id="new_password" name="new_password"
                    placeholder="Input New Password" required><br>
                <input class="login-responsive" type="password" id="confirm_password" name="confirm_password"
                    placeholder="Confirm Your Password" required><br>
                <input class="btn-second" type="submit" value="Change Password">
            </form>
        </div>
    </center>
</body>

</html>