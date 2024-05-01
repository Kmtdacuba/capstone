<?php
include('../config/connection.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Barangay 188 Tala Caloocan City</title>
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
        var errorDiv = document.querySelector('.success');
        if (errorDiv) {
            errorDiv.remove(); // Remove the success message
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
            <h1>Temporary Password</h1><br>

            <?php
            if(isset($_SESSION['temp']))
            {
                echo $_SESSION['temp'];
                unset($_SESSION['temp']);
            }
            if(isset($_SESSION['change']))
            {
                echo $_SESSION['change'];
                unset($_SESSION['change']);
            }
            ?>
            <table class="table-size">
                <form method="post" action="temp-pass.php">
                    <tr>
                        <label for="email" style="text-align: left; display: block;">Email Address:</label>
                        <input class="input-responsive" type=" email" id="email" name="email"
                            placeholder="sample@gmail.com" required>
                    </tr>
                    <tr>
                        <label for="email" style="text-align: left; display: block;">Temporary Password:</label>
                        <input class="input-responsive" type="password" id="temp_password" name="temp_password"
                            required>
                    </tr><br>
                    <tr>
                        <input class="btn-second" type="submit" value="Verify">
                    </tr>
                </form>
            </table>
    </center>
    </div>
</body>

</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $temp_password = $_POST['temp_password'];

    // Retrieve the user from the database using the email - ADMIN
    $sql = "SELECT * FROM tbl_admin WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashed_password = $user['password'];

        // Verify the temporary password against the hashed password
        if (password_verify($temp_password, $hashed_password)) {
            // Temporary password matches, set session variables and redirect to change password page
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['change'] = "<div class='success text-center'>Change your password to login</div>";
            header('location:'. SITEURL.'forgot/change-pass.php');
            exit; // Ensure no further execution of the script after redirection
        } else {
            $_SESSION['change'] = "<div class='error text-center'>Invalid email or temporary password</div>";
            header('location:'. SITEURL.'forgot/temp-pass.php');
            exit;
        }
    } else {
        $_SESSION['change'] = "<div class='error text-center'>Invalid email or temporary password</div>";
        header('location:'. SITEURL.'forgot/temp-pass.php');
        exit;
    }
}

?>