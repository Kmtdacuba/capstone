<?php
include('../config/connection.php');
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/4a6db1b6a3.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="favicon.png">
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
        max-width: 500px;
        margin: 100px auto;
        padding: 20px;
        background-color: #9DB2BF;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Drop shadow effect */
        text-align: center;
    }

    h1 {
        color: #333;
    }

    .icons {
        float: right;
        padding: 0.5%;
        margin: 0.5%;
    }
    </style>
</head>

<body>

    <div class="container">
        <a class="icons" href="my-appointment.php">
            <i class="fa-solid fa-square-xmark"></i>
        </a><br>
        <h1>Appointment Summary</h1>

        <?php
                        $sql = "SELECT * FROM tbl_appointment"; 
 
                        // Execute the query and get the result 
                        $result = $conn->query($sql); 
                         
                        // Check if the result contains any rows 
                        if ($result->num_rows > 0) { 
                            // Get the row as an associative array 
                            $row = $result->fetch_assoc(); 
                         
                            // Print the username
                            echo $row['name'] . "<br>";
                            echo $row['type'] . "<br>";
                            echo $row['appointment_no'] . "<br>"; 
                            echo $row['selected_time']. "<br>";
                            echo $row['selected_date']. "<br>";
                        } else { 
                            echo "No results found"; 
                        } 
                        ?>
    </div>

</body>

</html>