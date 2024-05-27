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
    $new_password = $_POST['new_password'];

    // Retrieve the user from the database using the email - ADMIN
    $sql = "SELECT * FROM tbl_admin WHERE email='$email'";
    $result = $conn->query($sql);

    $hashed_password =  password_hash($new_password, PASSWORD_DEFAULT);
    $sql_update = "UPDATE tbl_admin SET password = '$hashed_password' WHERE email = '$email'";
    $conn->query($sql_update); 

    if ($sql_update->num_rows > 0) {
        $user = $sql_update->fetch_assoc();
        $hashed_password = $user['password'];
            $_SESSION['change'] = "<div class='success text-center'>Password changed successfully! Please login with your new password.</div>";
            // Redirect user to login page
            header('location:'.SITEURL.'index.php');
            exit; // Ensure no further execution of the script after redirection
        }else {
            $_SESSION['change'] = "<div class='error text-center'>Error changing password. Please try again later.</div>";
            // Redirect user back to change password page
            header('location:'.SITEURL.'forgot/change-pass.php');
            exit;
        }
    } 


?>