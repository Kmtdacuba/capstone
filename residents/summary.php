<?php
include('../config/connection.php');
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/4a6db1b6a3.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../favicon.png">
    <link rel="stylesheet" href="../css/style.css">


    <script>
    // Message will disappear after 2 seconds 
    setTimeout(function() {
        var errorDiv = document.querySelector('.error');
        if (errorDiv) {
            errorDiv.remove(); // Remove the error message
        }
    }, 3000);

    setTimeout(function() {
        var errorDiv = document.querySelector('.success');
        if (errorDiv) {
            errorDiv.remove(); // Remove the success message
        }
    }, 3000);
    </script>

    <title>Barangay 188 Tala Caloocan City</title>
    <style>
    body {
        background-color: black;
        background-color: rgba(255, 255, 255, 0.5);
        /* Transparent white background */
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 600px;
        padding: 20px;
        background-color: lightgray;
        border-radius: 10px;
    }


    h1 {
        color: #333;
        text-align: center;
    }

    .icons {
        float: right;
        padding: 0.5%;
        margin: 0.5%;
    }
    </style>
</head>

<body class="bg">
    <div>
        <a href="">
            <img src="../images/Logo Name.png" alt="" width=100%>
        </a>
    </div>
    <div class="container">

        <a class="icons" href="my-appointment.php">
            <i class="fa-solid fa-square-xmark"></i>
        </a><br>

        <h1>Appointment Summary</h1><br>
        <?php
            if(isset($_SESSION['appointment']))
            {
                echo $_SESSION['appointment'];
                unset($_SESSION['appointment']);
            }
            ?>
        <br>
        <?php
    $sql = "SELECT * FROM tbl_appointment WHERE email='$email' ORDER BY id DESC
    LIMIT 1";

    
                            // Execute the query and get the result 
                            $result = $conn->query($sql); 
                            
                            // Check if the result contains any rows 
                            if ($result->num_rows > 0) { 
                                // Get the row as an associative array 
                                $row = $result->fetch_assoc(); 
                            
                                // Print the username
                                ?>
        <div class="label-profile">
            <?php
            
            echo "Name: <br><strong>" . $row['name'] . "</strong><br><br>";
            echo "Service: <br><strong>". $row['type'] . "</strong><br><br>";
            echo "Appointment Number: <br><strong>". $row['appointment_no'] . "</strong><br><br>";
            echo "Date: <br><strong>". $row['date']. "</strong><br><br>";
            echo "Time: <br><strong>". $row['time']. "</strong><br><br><br>";
            
            } else {
            echo "No results found";
            }
            ?>
        </div>

        <center> <a href="<?php echo SITEURL; ?>residents/my-appointment.php" class="btn-ok">
                Continue</a></center>
    </div>



</body>

</html>