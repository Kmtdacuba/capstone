<?php
ob_start();
include('../config/connection.php');
$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle accordingly
    eader('location:'.SITEURL.'index.php');    exit();
}

// Check last activity time
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 600) { // 300 seconds = 5 minutes
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
    <link href='' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

    </style>
</head>

<body>
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
                <a href="counter.php">
                    <i class="fa-solid fa-list-ol"></i>
                    <span class="links_name">Counter</span>
                </a>
                <span class="tooltip">Counter</span>
            </li>
            <li>
                <a href="queuing.php">
                    <i class="fa-solid fa-users-line"></i>
                    <span class="links_name">Queuing</span>
                </a>
                <span class="tooltip">Queuing</span>
            </li>
            <li>
                <a href="residents.php">
                    <i class="fa-solid fa-house"></i>
                    <span class="links_name">Residents</span>
                </a>
                <span class="tooltip">Residents</span>
            </li>
            <li>
                <a href="analytics.php">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span class="links_name">Analytics</span>
                </a>
                <span class="tooltip">Analytics</span>
            </li>
            <li>
                <a href="appointments.php">
                    <i class="fa-regular fa-file"></i>
                    <span class="links_name">Appointments</span>
                </a>
                <span class="tooltip">Appointments</span>
            </li>
            <li>
                <a href="settings.php">
                    <i class="fa-solid fa-gear"></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
            <a href="../index.php ">
                <li class="profile">
                    <div class="profile-details">
                        <?php
                        $sql1 = "SELECT img_name FROM tbl_employee WHERE id=$user_id";

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
                   $sql = "SELECT * FROM tbl_employee WHERE id=$user_id"; 
 
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
                            <div class="email">Employee</div>
                        </div>
                    </div>
                    <i class="fa-solid fa-right-from-bracket" id="log_out"></i>
                </li>
            </a>
        </ul>
    </div>