<?php
include('config/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="favicon.png">
    <title>Barangay 188 Tala Caloocan City</title>
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
            <a href="index.php">
                <img src="images/Logo Name.png" alt="" width=100%>
            </a>
        </div>

        <div class="login">

            <h1>Login</h1>
            <?php 
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if (isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    if(isset($_SESSION['register'])) {
    echo $_SESSION['register']; // display session message
    unset($_SESSION['register']); // remove session message
    }

            ?>

            <form action="index.php" method="POST" enctype="multipart/form-data">
                <!-- Login table -->
                <table class="table-size">
                    <tr>
                        <input type="email" name="email" placeholder="Enter Email Address" class="login-responsive"
                            required>
                    </tr>
                    <br>
                    <tr>
                        <input type="password" name="password" placeholder="Enter Password" class="login-responsive"
                            required>
                    </tr>
                    <tr>
                        <a class="f" href="form.php">Forgot Password?</a>
                    </tr>
                    <br>
                    <tr>
                        <input type="submit" name="submit" value="Login" class="btn-second">
                    </tr>
                    <br><br>
                    <tr>
                        <a href="<?php echo SITEURL;?>residents/register.php" class="btn-reg">Register Now</a>
                    </tr>
                </table>
            </form>
        </div>
    </center>

</body>

</html>
<?php

if(isset($_POST['email'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Retrieve hashed password from the database based on the entered email
    $result1 = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE email = '$email'") or die('query failed');
    $result2 = mysqli_query($conn, "SELECT * FROM tbl_employee WHERE email = '$email'") or die('query failed');
    $result3 = mysqli_query($conn, "SELECT * FROM tbl_resident WHERE email = '$email'") or die('query failed');

    if(mysqli_num_rows($result1) > 0){
       $row = mysqli_fetch_assoc($result1);
       $hashed_password = $row['password'];
       if (password_verify($password, $hashed_password)) {
           $_SESSION['user_id'] = $row['id'];
           $_SESSION['login'] = "<div class='success text-center'>Login Successful</div>";
           header('location:'. SITEURL.'admin/dashboard.php');
       } else {
           $_SESSION['login'] = "<div class='error text-center'>Email or password not match</div>";
           header('location:'.SITEURL.'index.php');
       }
    } elseif(mysqli_num_rows($result2) > 0){
        $row = mysqli_fetch_assoc($result2);
        $hashed_password = $row['password'];
       if (password_verify($password, $hashed_password)) {
           $_SESSION['user_id'] = $row['id'];
           $_SESSION['login'] = "<div class='success text-center'>Login Successful</div>";
           header('location:'. SITEURL.'employee/dashboard.php');
       } else {
           $_SESSION['login'] = "<div class='error text-center'>Email or password not match</div>";
           header('location:'.SITEURL.'index.php');
       }
    } elseif(mysqli_num_rows($result3) > 0){
        $row = mysqli_fetch_assoc($result3);
        $hashed_password = $row['password'];
       if (password_verify($password, $hashed_password)) {
           $_SESSION['user_id'] = $row['id'];
           $_SESSION['login'] = "<div class='success text-center'>Login Successful</div>";
           header('location:'. SITEURL.'residents/dashboard.php');
       } else {
           $_SESSION['login'] = "<div class='error text-center'>Email or password not match</div>";
           header('location:'.SITEURL.'index.php');
       }
    } else {
        $_SESSION['login'] = "<div class='error text-center'>Email or password not match</div>";
        header('location:'.SITEURL.'index.php');
    }
}
?>