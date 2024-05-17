<?php
include('../../config/connection.php');
ob_start();
$queue_no = $_GET['queue_no'];
$query = "UPDATE tbl_queuing SET status = 'Serving' WHERE queue_no =$queue_no AND counter_no=1";
$sql = mysqli_query($conn,$query);
if($sql == TRUE) {

    $_SESSION['call'] = "<div class='success'> &nbsp Now serving Queue-00$queue_no </div>";
    header("location:" .SITEURL.'employee/counter-one.php');
    exit;
    
   }
   else {
    $_SESSION['call'] = " <div class='error'> &nbsp Cannot serve, Pleas try again</div>";
    header("location:" .SITEURL.'employee/counter-one.php');
    exit;
   }
?>