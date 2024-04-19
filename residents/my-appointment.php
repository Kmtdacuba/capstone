<?php 
    include ('partials/side-nav.php');
    $user_id = $_SESSION['user_id'];
?>
    <section class="home-section">
 
        <div class="text">My Appointment</div>
        <br><br>
        <a href="<?php echo SITEURL; ?>residents/set-appointment.php?id=<?php echo $user_id; ?>" class="btn-primary">Set Appointment</a>

        <table class="table-full">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Appointment Number</th>
                    <th>Time</th>
                    <th>Date</th>
                </tr>

                <?php
                        $sql = "SELECT * FROM tbl_appointment";

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
                                
                ?>

                                <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $name;?></td>
                                <td><?php echo $type;?></td>
                                <td><?php echo $appointment_no;?></td>
                                <td><?php echo $selected_time;?></td>
                                <td><?php echo $selected_date;?></td>
                                </tr>

                <?php
        
                            }
                        }

                        else {
                            // no data in database
                            echo "No record found";
                        }

                    ?>
        </table>

        
    </section>
<?php 
    include ('partials/footer.php');
?>