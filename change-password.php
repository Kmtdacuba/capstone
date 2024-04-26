<?php
include('config/connection.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('location: temp-pass.php');
    exit;
}

// Check if the form is submitted - ADMIN
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['admin_password'])) {
    $new_password = $_POST['admin_password'];
    $confirm_password = $_POST['admin_confirm_password'];

    // Validate new password and confirm password
    if ($new_password != $confirm_password) {
        $_SESSION['change'] = "<div class='error text-center'>New password and confirm password do not match</div>";
        header('location: change-password.php');
        exit;
    }

    // Update password in the database
    $user_id = $_SESSION['user_id'];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $sql = "UPDATE tbl_admin SET password='$hashed_password' WHERE id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['change'] = "<div class='success text-center'>Password changed successfully</div>";
        header('location: index.php');
        exit;
    } else {
        $_SESSION['change'] = "<div class='error text-center'>Error updating password: " . $conn->error . "</div>";
        header('location: change-pass.php');
        exit;
    }
}

// Check if the form is submitted - EMPLOYEE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['employee_password'])) {
    $new_password = $_POST['employee_password'];
    $confirm_password = $_POST['employee_confirm_password'];

    // Validate new password and confirm password
    if ($new_password != $confirm_password) {
        $_SESSION['change'] = "<div class='error text-center'>New password and confirm password do not match</div>";
        header('location: change-password.php');
        exit;
    }

    // Update password in the database
    $user_id = $_SESSION['user_id'];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $sql = "UPDATE tbl_employee SET password='$hashed_password' WHERE id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['change'] = "<div class='success text-center'>Password changed successfully</div>";
        header('location: index.php');
        exit;
    } else {
        $_SESSION['change'] = "<div class='error text-center'>Error updating password: " . $conn->error . "</div>";
        header('location: change-pass.php');
        exit;
    }
}

// Check if the form is submitted - RESIDENT
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['resident_password'])) {
    $new_password = $_POST['resident_password'];
    $confirm_password = $_POST['resident_confirm_password'];

    // Validate new password and confirm password
    if ($new_password != $confirm_password) {
        $_SESSION['change'] = "<div class='error text-center'>New password and confirm password do not match</div>";
        header('location: change-password.php');
        exit;
    }

    // Update password in the database
    $user_id = $_SESSION['user_id'];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $sql = "UPDATE tbl_resident SET password='$hashed_password' WHERE id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['change'] = "<div class='success text-center'>Password changed successfully</div>";
        header('location: index.php');
        exit;
    } else {
        $_SESSION['change'] = "<div class='error text-center'>Error updating password: " . $conn->error . "</div>";
        header('location: change-pass.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="favicon.png">
    <script src="https://kit.fontawesome.com/4a6db1b6a3.js" crossorigin="anonymous"></script>
</head>

<body class="bg">
    <center>
        <div class="login">
            <a class="icons" href="index.php">
                <i class="fa-solid fa-square-xmark"></i>
            </a>
            <h1>Change Password</h1><br>
            <?php
            if(isset($_SESSION['change'])) {
                echo $_SESSION['change'];
                unset($_SESSION['change']);
            }
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <table class="table-size">
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin'): ?>
                    <tr>
                        <input class="login-responsive" type="password" name="admin_password"
                            placeholder="New Admin Password" required>
                    </tr>
                    <tr>
                        <input class="login-responsive" type="password" name="admin_confirm_password"
                            placeholder="Confirm New Admin Password" required>
                    </tr><br>
                    <?php elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'employee'): ?>
                    <tr>
                        <input class="login-responsive" type="password" name="employee_password"
                            placeholder="New Employee Password" required>
                    </tr>
                    <tr>
                        <input class="login-responsive" type="password" name="employee_confirm_password"
                            placeholder="Confirm New Employee Password" required>
                    </tr><br>
                    <?php elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'resident'): ?>
                    <tr>
                        <input class="login-responsive" type="password" name="resident_password"
                            placeholder="New Resident Password" required>
                    </tr>
                    <tr>
                        <input class="login-responsive" type="password" name="resident_confirm_password"
                            placeholder="Confirm New Resident Password" required>
                    </tr><br>
                    <?php endif; ?>
                    <tr>
                        <input class="btn-second" type="submit" value="Change Password">
                    </tr>
                </table>
            </form>
        </div>
    </center>
</body>

</html>