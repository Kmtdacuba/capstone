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
                    window.print();
                    window.location.href = 'queuing.php';
                } <
                script >
                    function printContent() {
                        var content = document.getElementById('printContent').innerHTML;
                        var mywindow = window.open('', 'Print', 'height=600,width=800');
                        mywindow.document.write('<html><head><title>Print</title>');
                        mywindow.document.write('</head><body>');
                        mywindow.document.write(content);
                        mywindow.document.write('</body></html>');
                        mywindow.document.close();
                        mywindow.focus();
                        mywindow.print();
                        mywindow.close();
                        return true;
                    }
                </script>
            </div>
            This script will only show the content inside the <div class="print-only"> when the print button is clicked,
                hiding the rest of the content. It opens a new window with just that content for printing.









                </script>
            </div>
        </div>
    </center>
</body>

</html>