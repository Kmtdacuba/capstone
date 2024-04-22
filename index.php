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
    if(isset($_SESSION['add'])) {
    echo $_SESSION['add']; // display session message
    unset($_SESSION['add']); // remove session message
    }

?>

            <form action="" method="POST" enctype="multipart/form-data">
                <!-- Login table -->
                <table class="table-size">
                    <tr>
                        <input type="email" name="email" placeholder="Enter Username" class="login-responsive" required>
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

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
 
    $select1 = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$password'") or die('query failed');
    $select2 = mysqli_query($conn, "SELECT * FROM tbl_employee WHERE email = '$email' AND password = '$password'") or die('query failed');
    $select3 = mysqli_query($conn, "SELECT * FROM tbl_resident WHERE email = '$email' AND password = '$password'") or die('query failed');
 
    if(mysqli_num_rows($select1) > 0){
       $row = mysqli_fetch_assoc($select1);
       $_SESSION['user_id'] = $row['id'];
       $_SESSION['login'] = " <div class='success text-center'></div>";
       header('location:'. SITEURL.'admin/dashboard.php');
    } 
 
    elseif(mysqli_num_rows($select2) > 0){
         $row = mysqli_fetch_assoc($select2);
         $_SESSION['user_id'] = $row['id'];
         $_SESSION['login'] = " <div class='success text-center'></div>";
         header('location:'. SITEURL.'employee/dashboard.php');
         } 
 
     elseif(mysqli_num_rows($select3) > 0){
         $row = mysqli_fetch_assoc($select3);
         $_SESSION['user_id'] = $row['id'];
         $_SESSION['login'] = " <div class='success text-center'></div>";
         header('location:'. SITEURL.'residents/dashboard.php');
         } 
    
    else
    {
        $_SESSION['login'] = " <div class='error text-center'>Username or password not match </div>";
        header('location:'.SITEURL.'index.php');
    }
 
 }

 ?>