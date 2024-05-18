<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baranagy 188 Tala Caloocan City</title>

    <link rel="icon" type="image/png" href="../favicon.png">
    <meta http-equiv="refresh" content="1">
</head>
<script>
document.getElementById('callButton').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default action of following the link

    // Make an AJAX request to update the database
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'update_status.php?queue_no=<?php echo $queue_no; ?>', true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Request was successful, handle the response if needed
            console.log(xhr.responseText);
        } else {
            // Handle errors
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.send();
});
</script>

<script>
document.getElementById('serveButton').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default action of following the link

    // Make an AJAX request to update the database
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'update_status.php?queue_no=<?php echo $queue_no; ?>', true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Request was successful, handle the response if needed
            console.log(xhr.responseText);
        } else {
            // Handle errors
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.send();
});
</script>

<body>

</body>

</html><?php 
    include ('partials/side-nav.php');
    ob_start();
?>


<!--Refresh every 1 seconds -->
<script>
setTimeout(function() {
    window.location.reload();
}, 1000);
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
    <?php 
    if(isset($_SESSION['done']))
    {
        echo $_SESSION['done'];
        unset($_SESSION['done']);
    }
    if (isset($_SESSION['call']))
    {
        echo $_SESSION['call'];
        unset($_SESSION['call']);
    }
   
            ?>
    <div class="text-center">


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
                                $total_regular_query = "SELECT COUNT(*) AS total_regular FROM tbl_queuing WHERE age>1 AND age<59 ";
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