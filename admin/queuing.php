<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baranagy 188 Tala Caloocan City</title>

    <link rel="icon" type="image/png" href="../favicon.png">
    <meta http-equiv="refresh" content="5">
</head>

<body>

</body>

</html><?php 
    include ('partials/side-nav.php');
    ob_start();
?>


<!--Refresh every 10 seconds (10000 milliseconds) -->
<script>
setTimeout(function() {
    window.location.reload();
}, 5000);
</script>


<section class="home-section">
    <div class="refresh">
        <a class="icons" href="queuing.php">
            <i class="fa-solid fa-arrows-rotate"></i>
        </a>
    </div>
    <div class="text">Queuing
    </div>
    <a href="<?php echo SITEURL; ?>queuing/queuing.php" class="btn-primary">Queuing Number</a>
    <br>
    <div class="q text-center">
        <h5 class="h5">Counter Access</h5>
    </div>

    <table class="table-full">
        <tr>
            <th>COUNTER NO.</th>
            <th>QUEUING NUMBER</th>
            <th>STATUS</th>
            <th>ANNOUNCEMENT</th>
        </tr><br>

        <tr>
            <td>COUNTER 1</td>
            <?php
$sql = "SELECT * FROM tbl_queuing LIMIT 1";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    // Move result pointer to the second row
    mysqli_data_seek($res, 0);

    // Fetch and display data from the second row
    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        $status = $row['status'];
        ?>
            <td>Queue-00<?php echo $queue_no; ?></td>
            <?php
    }
}
?>
            <td><?php echo $status; ?></td>
            <td>2.</td>
        </tr>
        <tr>
            <td>COUNTER 2</td>
            <?php
$sql = "SELECT * FROM tbl_queuing ";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    // Move result pointer to the second row
    mysqli_data_seek($res, 1);

    // Fetch and display data from the second row
    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        $status = $row['status'];
        ?>
            <td>Queue-00<?php echo $queue_no; ?></td>
            <?php
    }
}
?> <td><?php echo $status; ?></td>
            <td>2.</td>
        </tr>

        <tr>
            <td>COUNTER 3</td>
            <?php
$sql = "SELECT * FROM tbl_queuing";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    // Move result pointer to the second row
    mysqli_data_seek($res, 2);

    // Fetch and display data from the second row
    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        $status = $row['status'];
        ?>
            <td>Queue-00<?php echo $queue_no; ?></td>
            <?php
    }
}
?>
            <td><?php echo $status; ?></td>
            <td>3.</td>
        </tr>

    </table>

    <div class="counter text-center">
        <h5 class="h5">Timer</h5>
    </div>

    <div class="counter text-center">
        <h5 class="h5">Counter</h5>
    </div>

    <div class="blank text-center">
        <h5 class="h5">Queuing Number</h5>
    </div>
    <br>

    <a href="queuing.php">
        <div class="queues text-center">
            <?php
                                $total_queuing_query = "SELECT COUNT(*) AS total_queuing FROM tbl_queuing";
                                $total_queuing_result = $conn->query($total_queuing_query);
                                $total_queuing_row = $total_queuing_result->fetch_assoc();
                                $total_queuing = $total_queuing_row['total_queuing'];
                                ?>
            <h5 class="h5">TOTAL QUEUES</h5>
            <h2 class="h2"><?php echo $total_queuing; ?></h2>
        </div>
    </a>
    <a href="priority-queue.php">
        <div class="queues text-center">
            <?php
                                $total_priority_query = "SELECT COUNT(*) AS total_priority FROM tbl_queuing WHERE age>=60";
                                $total_priority_result = $conn->query($total_priority_query);
                                $total_priority_row = $total_priority_result->fetch_assoc();
                                $total_priority = $total_priority_row['total_priority'];
                                ?>
            <h5 class="h5">PRIORITY RESIDENT</h5>
            <h2 class="h2"><?php echo $total_priority; ?></h2>
        </div>
    </a>
    <a href="regular-queue.php">
        <div class="queues text-center">
            <?php
                                $total_regular_query = "SELECT COUNT(*) AS total_regular FROM tbl_queuing WHERE age<=60 && age>=1";
                                $total_regular_result = $conn->query($total_regular_query);
                                $total_regular_row = $total_regular_result->fetch_assoc();
                                $total_regular = $total_regular_row['total_regular'];
                                ?>
            <h5 class="h5">REGULAR RESIDENT</h5>
            <h2 class="h2"><?php echo $total_regular; ?></h2>
        </div>
    </a>
    <br><br>

    <table class="table-full">



        <tr>
            <th>QUEUING NUMBER</th>
            <th>RESIDENT TYPE</th>
            <th>DATE & TIME</th>
            <th>APPOINTMENT NUMBER</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>

        <?php
                        $sql = "SELECT * FROM tbl_queuing";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        $sn=1;

                        if($count > 0) {
                            // have data in database
                            //get data and display

                            while($row = mysqli_fetch_assoc($res))
                            {
                                $queue_no = $row['queue_no'];
                                $queue_type = $row['queue_type'];
                                $date_time= $row['date_time'];
                                $appointment_no = $row['appointment_no'];
                                $status= $row['status'];
                ?>

        <tr>
            <td>Queue-00<?php echo $queue_no++; ?></td>
            <td><?php echo $queue_type; ?></td>
            <td><?php echo $date_time; ?></td>
            <td><?php echo $appointment_no; ?></td>
            <td><?php echo $status; ?></td>
            <td>
                <a href="<?php echo SITEURL; ?>admin/queuing-call.php?queue_no=<?php echo $queue_no; ?>"
                    class="btn-fifth">Call</a>
                <a href="<?php echo SITEURL; ?>admin/queuing-done.php?queue_no=<?php echo $queue_no - 1; ?>"
                    class="btn-second">Done</a>
            </td>
            </td>
        </tr>
        <?php
        
                            }
                        }

                    ?>
    </table>



</section>
<?php 
    include ('partials/footer.php');
?>