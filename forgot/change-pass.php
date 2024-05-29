<?php
include('../config/connection.php');
session_start(); // Make sure to start the session
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Barangay 188 Tala Caloocan City</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../favicon.png">
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
        var successDiv = document.querySelector('.success');
        if (successDiv) {
            successDiv.remove(); // Remove the success message
        }
    }, 2000);
    </script>
</head>

<body class="bg">
    <div>
        <img src="../images/Logo Name.png" alt="" width=100%>
    </div>
    <center>
        <div class="login">
            <a class="icons" href="../index.php">
                <i class="fa-solid fa-square-xmark"></i>
            </a>
            <h1>Change Password</h1>
            <?php
                if(isset($_SESSION['change'])) {
                    echo $_SESSION['change'];
                    unset($_SESSION['change']);
                }
                if(isset($_SESSION['temp'])) {
                    echo $_SESSION['temp'];
                    unset($_SESSION['temp']);
                }
                if(isset($_SESSION['pass'])) {
                    echo $_SESSION['pass'];
                    unset($_SESSION['pass']);
                }
            ?><br>
            <form method="post" action="change-pass.php">
                <tr>
                    <label for="new_password" style="text-align: left; display: block;">New Password:</label>
                    <input class="input-responsive" type="password" id="new_password" name="new_password"
                        placeholder="Input New Password" required><br>
                </tr>
                <tr>
                    <label for="confirm_password" style="text-align: left; display: block;">Confirm Password:</label>
                    <input class="input-responsive" type="password" id="confirm_password" name="confirm_password"
                        placeholder="Confirm Your Password" required><br>
                </tr>
                <tr>
                    <input name="change-pass" class="btn-second" type="submit" value="Confirm">
                </tr>
            </form>
        </div>
    </center>
</body>

</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the new password from the POST request
    $new_password = $_POST['new_password'];

    // Retrieve the email from the session
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        $_SESSION['change'] = "<div class='error text-center'>No email found in session. Please try again.</div>";
        header('location:' . SITEURL . 'forgot/change-pass.php');
        exit;
    }

    // Validate and sanitize the new password (additional checks can be added)
    if (empty($new_password)) {
        $_SESSION['pass'] = "<div class='error text-center'>Password cannot be empty.</div>";
        header('location:' . SITEURL . 'forgot/change-pass.php');
        exit;
    }

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // List of user types and their corresponding table names
    $user_types = [
        'tbl_admin',
        'tbl_employee',
        'tbl_resident'
    ];

    $password_changed = false;

    // Loop through each user type and try to update the password
    foreach ($user_types as $table) {
        // Prepare and execute the SQL query to update the password
        $sql_update = $conn->prepare("UPDATE $table SET password = ? WHERE email = ?");
        $sql_update->bind_param('ss', $hashed_password, $email);
        
        if ($sql_update->execute() && $sql_update->affected_rows > 0) {
            $password_changed = true;
            break;
        }
    }

    if ($password_changed) {
        $_SESSION['pass'] = "<div class='success text-center'>Password changed successfully! Please login with your new password.</div>";
        // Redirect user to login page
        header('location:' . SITEURL . 'index.php');
        exit;
    } else {
        $_SESSION['pass'] = "<div class='error text-center'>Error changing password. Please try again later.</div>";
        // Redirect user back to change password page
        header('location:' . SITEURL . 'forgot/change-pass.php');
        exit;
    }
}
?>