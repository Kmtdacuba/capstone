<?php
include('../config/connection.php');
$user_id = $_SESSION['user_id'];
ob_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay 188 Tala Caloocan City</title>
    <link rel="icon" type="image/png" href="../favicon.png">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/4a6db1b6a3.js" crossorigin="anonymous"></script>
</head>

<body class="bg">
    <center>
        <div>
            <img src="../images/Logo Name.png" alt="" width=100%>
        </div>
        <div class="content-payment">
            <h1>Choose Payment</h1><br><br>
            <a href="summary.php">
                <div class="payment text-center">
                    <h4>CASH</h4>
                </div>
            </a>
            <a href="gcash.php">
                <div class="payment text-center">
                    <h4>GCASH</h4>
                </div>
            </a>
            <a href="paymaya.php">
                <div class="payment text-center">
                    <h4>PAYMAYA</h4>
                </div>
            </a>
        </div>

    </center>



</body>

</html>