<?php
include('../../config/connection.php');
ob_start();
$queue_no = $_GET['queue_no'];
$query = "UPDATE tbl_queuing SET status = 'Serving' WHERE queue_no =$queue_no";
$sql = mysqli_query($conn,$query);
if($sql == TRUE) {

    $_SESSION['call'] = "<div class='success'></div>";
    header("location:" .SITEURL.'employee/document.php');
    exit;
    
   }
   else {
    $_SESSION['call'] = " <div class='error'> &nbsp Cannot serve, Pleas try again</div>";
    header("location:" .SITEURL.'employee/counter-two.php');
    exit;
   }
?>