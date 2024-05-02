<?php 
    include ('partials/side-nav.php');
    ob_start();
?>

<!--Refresh every 10 seconds (10000 milliseconds) -->
<script>
setTimeout(function() {
    window.location.reload();
}, 10000);
</script>


<section class="home-section">
    <div class="refresh">
        <a class="icons" href="queuing.php">
            <i class="fa-solid fa-arrows-rotate"></i>
        </a>
    </div>
    <div class="text">Queuing
    </div>
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
            <td>1.</td>
            <td>1.</td>
            <td>1.</td>
            <td>1.</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>2.</td>
            <td>2.</td>
            <td>2.</td>
        </tr>

        <tr>
            <td>3.</td>
            <td>3.</td>
            <td>3.</td>
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
    <div class="cb text-center">
        <input type="checkbox" id="checkbox" name="checkbox" value="checkbox">
        <label for="checkbox">All</label>
    </div>
    <div class="cb text-center">
        <input type="checkbox" id="checkbox" name="checkbox" value="checkbox">
        <label for="checkbox">Regular</label>
    </div>
    <div class="cb text-center">
        <input type="checkbox" id="checkbox" name="checkbox" value="checkbox">
        <label for="checkbox">Priority</label>
    </div>

    <table class="table-full">



        <tr>
            <th>QUEUING NUMBER</th>
            <th>DATE & TIME</th>
            <th>APPOINTMENT NUMBER</th>
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
                                
                ?>

        <tr>
            <td><?php echo $queue_no++; ?></td>
            <td><?php echo $queue_type; ?></td>
            <td><?php echo $date_time; ?></td>
            <td><?php echo $appointment_no; ?></td>
            <td>
                <a href="<?php echo SITEURL; ?>admin/queuing-done.php?id=<?php echo $id; ?>" class="btn-fifth">Call</a>
                <a href="<?php echo SITEURL; ?>admin/queuing-done.php?id=<?php echo $id; ?>"
                    class="btn-forth">Recall</a>
                <a href="<?php echo SITEURL; ?>admin/queuing-done.php?id=<?php echo $id; ?>" class="btn-second">Done</a>
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