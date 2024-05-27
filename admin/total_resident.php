<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../favicon.png">
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
ob_start();
include('../config/connection.php');
?>
<br>
<h2 class="print-content">Residents Profile</h2>
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
<br>
<table class="table-full print-content">
    <tr>
        <th class="copy">Full Name</th>
        <th class="copy">Birthday</th>
        <th class="copy">Age</th>
        <th class="copy">Gender</th>
        <th class="copy">Status</th>
        <th class="copy">Voters type</th>
        <th class="copy">Resident Type</th>
        <th class="copy">Email</th>
        <th class="copy">Address</th>
    </tr>
    <?php

    $sql = "SELECT * FROM tbl_resident";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);


    if($count > 0) {
    // have data in database
    //get data and displya

    while($row = mysqli_fetch_assoc($res))
    {
    $name = $row['Fname']. ' '. $row['Mname']. ' '.$row['Lname'] ;
    $Birthday = $row['Birthday'];
    $age = $row['age'];
    $gender = $row['gender'];
    $s = $row['s'];
    $resident_type = $row['resident_type'];
    $voters_type = $row['voters_type'];
    $email = $row['email'];
    $a = $row['a'];
    ?>


    <tr>

        <td class="copy"><?php echo $name;?></td>
        <td class="copy"><?php echo $Birthday;?></td>
        <td class="copy"><?php echo $age;?></td>
        <td class="copy"><?php echo $gender;?></td>
        <td class="copy"><?php echo $s;?></td>
        <td class="copy"><?php echo $resident_type;?></td>
        <td class="copy"><?php echo $voters_type;?></td>
        <td class="copy"><?php echo $email;?></td>
        <td class="copy"><?php echo $a;?></td>
    </tr>
    <div class="clear"></div>
    <?php         
                            }
                        }
                        ?>
    <?php
    ?>
</table>