<?php 
    include ('partials/side-nav.php');
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];
?>
<section class="home-section">
    <div class="refresh">
        <a class="icons" href="my-appointment.php">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>

    <div class="text">Appointment History</div>
    <br><br>
    <table class="table-full">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Appointment Number</th>
            <th>Time</th>
            <th>Date</th>
            <th>Action</th>

        </tr>

        <?php
                        $sql = "SELECT * FROM appointment_archive WHERE email='$email' ";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        $sn=1;

                        if($count > 0) {
                            // have data in database
                            //get data and displya

                            while($row = mysqli_fetch_assoc($res))
                            {
                                $name = $row['name'];
                                $type = $row['type'];
                                $appointment_no = $row['appointment_no'];
                                $selected_time = $row['selected_time'];
                                $selected_date = $row['selected_date'];
                                $action = $row['action'];
                                
                ?>

        <tr>
            <td><?php echo $sn++;?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $type;?></td>
            <td><?php echo $appointment_no;?></td>
            <td><?php echo $selected_time;?></td>
            <td><?php echo $selected_date;?></td>
            <td style="color: red;"><?php echo $action;?></td>

        </tr>

        <?php
        
                            }
                        }

                        else {
                            // no data in database
                            echo '<span style="color: red;">&nbsp;&nbsp;No record found</span>';
                        }

                    ?>
    </table>


</section>
<?php 
    include ('partials/footer.php');
?>