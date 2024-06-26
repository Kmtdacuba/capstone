<?php
ob_start();
include('../config/connection.php');
$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle accordingly
    eader('location:'.SITEURL.'index.php');    
    exit();
}

// Check last activity time
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 300) { // 300 seconds = 5 minutes
    // Destroy session and logout user
    session_unset();
    session_destroy();
    header('location:'.SITEURL.'index.php');
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Barangay 188 Tala Caloocan City</title>
    <link rel="icon" type="image/png" href="../favicon.png">
    <link rel="stylesheet" href="../css/style.css">
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
    <link href='' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>
<style>
</style>

<body style="background-color: #E4E9F7;">
    <div class="sidebar">
        <div class="logo-details">
            <img src="../images/Logo.png" class="icon">
            <div class="logo_name">Barangay 188 Tala Caloocan City</div>
            <i class="fa-solid fa-bars" id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="my-profile.php">
                    <i class="fa-solid fa-user"></i>
                    <span class="links_name">My Profile</span>
                </a>
                <span class="tooltip">My Profile</span>
            </li>
            <li>
                <a href="my-appointment.php">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span class="links_name">My Appointnments</span>
                </a>
                <span class="tooltip">My Appointnments</span>
            </li>
            <li>
                <a href="settled.php">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span class="links_name">History</span>
                </a>
                <span class="tooltip">History</span>
            </li>
            <li>
                <a href="requirements.php">
                    <i class="fa-regular fa-file-lines"></i>
                    <span class="links_name">Requirements</span>
                </a>
                <span class="tooltip">Requirements</span>
            </li>

            <a href="../index.php ">
                <li class="profile">
                    <div class="profile-details">
                        <?php
                        $sql1 = "SELECT img_name FROM tbl_resident WHERE id=$user_id";

                        $res1 = mysqli_query($conn, $sql1);

                        $count1 = mysqli_num_rows($res1);

                        if($count1 > 0) {
                            // have data in database
                            //get data and display

                            while($row = mysqli_fetch_assoc($res1))
                            {
                                $img_name= $row['img_name'];
                ?>
                        <?php 
                                            if($img_name=="")
                                            {
                                                ?>
                        <img src="../images/profile-user.png" alt="" width=100px>
                        <?php
                                            }
                                            else
                                            {
                                                ?>
                        <img src="<?php echo SITEURL; ?>/images/user/<?php echo $img_name; ?>" width="100px">
                        <?php
                                            }
                                        
                                        ?>
                        <?php
        
                            }
                        }
                    ?>
                        <div class="name_job">
                            <div class="name">
                                <?php
                   $sql = "SELECT * FROM tbl_resident WHERE id=$user_id"; 
 
                   // Execute the query and get the result 
                   $result = $conn->query($sql); 
                    
                   // Check if the result contains any rows 
                   if ($result->num_rows > 0) { 
                       // Get the row as an associative array 
                       $row = $result->fetch_assoc(); 
                    
                       // Print the username 
                       echo $row['Fname'], ' ', $row['Mname'], ' ', $row['Lname']; 
                   } else { 
                       echo "No results found"; 
                   } 
                    
                   // Close the connection 
                   ?>
                            </div>
                            <div class="email">Resident</div>
                        </div>
                    </div>
                    <i class="fa-solid fa-right-from-bracket" id="log_out"></i>
                </li>
            </a>
        </ul>
    </div>