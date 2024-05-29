<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../favicon.png">
    <script src="https://kit.fontawesome.com/4a6db1b6a3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Barangay 188 Tala Caloocan City</title>
</head>

<style>
/* Add CSS styles to make content visible when printing */
@media print {

    /* Show all elements */
    .print-content {
        display: block !important;
        visibility: visible !important;
    }
}
</style>

<body>

</body>

</html><?php 
date_default_timezone_set('Asia/Manila');
ob_start();
include('../config/connection.php');
?>
<div class="refresh">
    <a class="icons" href="analytics.php">
        <i class="fa-solid fa-arrow-left"></i>
    </a>
</div>

<h2 class="print-content">Transaction as of <?php echo date('F j,Y'); ?></h2>
<button class="print-record" onclick="printContent()">Print</button>
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
            window.location.href = 'analytics.php';
        }, 1000); // Redirect after 1 second (adjust the delay as needed)
    }
}
</script>

<table class="table-full print-content">
    <tr>
        <th class="copy">No</th>
        <th class="copy">Full Name</th>
        <th class="copy">Service</th>
        <th class="copy">Appointment No</th>
        <th class="copy">Scheduled Time & Date</th>
    </tr>
    <?php

    $sql = "SELECT * FROM appointment_archive WHERE DATE(created_date) = CURDATE();";

    $res = mysqli_query($conn, $sql);
    $sn=1;
    
    $count = mysqli_num_rows($res);


    if($count > 0) {
    // have data in database
    //get data and displya

    while($row = mysqli_fetch_assoc($res))
    {
        $id = $row['id'];
        $name = $row['name'];
        $type = $row['type'];
        $appointment_no = $row['appointment_no'];
        $time = $row['time'];
        $date = $row['date'];
    ?>


    <tr>
        <td><?php echo $sn++; ?></td>
        <td class="copy"><?php echo $name;?></td>
        <td class="copy"><?php echo $type;?></td>
        <td class="copy"><?php echo $appointment_no;?></td>
        <td class="copy"><?php echo $date. ' at '. $time;?></td>

    </tr>
    <div class="clear"></div>
    <?php         
                            }
                        }
                        ?>
    <?php
    ?>
</table>