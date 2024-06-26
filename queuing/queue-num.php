<?php

include('../config/connection.php');
ob_start();
$queuing_id = $_SESSION['queuing_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../favicon.png">
    <title>Barangay 188 Tala Caloocan City</title>
</head>



<body class="bg">
    <center>
        <div>
            <?php
                   $sql = "SELECT queue_no FROM tbl_queuing ORDER BY queue_no DESC LIMIT 1"; 
 
                   // Execute the query and get the result 
                   $result = $conn->query($sql); 
                    
                   // Check if the result contains any rows 
                   if ($result->num_rows > 0) { 
                       // Get the row as an associative array 
                       $row = $result->fetch_assoc();  
                   }
                   ?>

            <a href="">
                <img src="../images/Logo Name.png" alt="" width=100%>
            </a>

            <div class="login">
                <div class="screen-only">
                    <h1 style="font-size: 20px">Your queuing number is: </h1><br>
                    <h1 style="color:#21618C; font-size: 35px">Queue - 0<?php echo $row['queue_no'];?></h1>
                </div>

                <div class="print-only">
                    <div class="content">
                        <h6 style="font-size:15px;">Barangy 188 Tala Caloocan City</h6>
                        <?php
        date_default_timezone_set('Asia/Manila');
        echo '<span style="font-size: 12px;">' . date('Y-m-d H:i:s') . '</span>';
        ?><br><br>
                        <h1 style="color:#21618C; font-size: 35px">Queue - 0<?php echo $row['queue_no'];?></h1>
                    </div>
                </div><br>

                <button class="btn-print" onclick="printContent()">Print</button>
                <script>
                function printContent() {
                    // Check if the browser is mobile
                    var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

                    // If it's mobile, just initiate print, else initiate print and redirect after a delay
                    if (isMobile) {
                        window.print();
                    } else {
                        window.print();
                        setTimeout(function() {
                            window.location.href = 'queuing.php';
                        }, 1000); // Redirect after 1 second (adjust the delay as needed)
                    }
                }
                </script>
            </div>
        </div>
    </center>
</body>

</html>