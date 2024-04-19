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
                <div class="content">
                    <h6>Your Queue Number is:</h6><br>
                    <h1 style="color:#21618C;"> Queue - 00<?php echo $row['queue_no'];?></h1>
                </div>
                <button class="btn-print" onclick="printContent()">Print</button>
                <script>
                function printContent() {
                    window.print();
                    window.location.href = 'queuing.php';
                }
                </script>
            </div>
        </div>
    </center>
</body>

</html>