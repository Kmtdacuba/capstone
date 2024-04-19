<?php 
    include ('partials/side-nav.php');
?>
    <section class="home-section">
            <div class="refresh">
            <a class="icons" href="appointments.php">
            <i class="fa-solid fa-arrow-left"></i>
            </a>
            </div>
        <div class="text">Transactions</div>
        <br><br>
        <?php
            if(isset($_SESSION['done'])) {
                echo $_SESSION['done']; // display session message
                unset($_SESSION['done']); // remove session message
            }
        ?>
        
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
                            //get data and display

                            while($row = mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $name = $row['name'];
                                $type = $row['type'];
                                $appointment_no = $row['appointment_no'];
                                $selected_time = $row['selected_time'];
                                $selected_date = $row['selected_date'];
                ?>

                                <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $type; ?></td>
                                <td><?php echo $appointment_no; ?></td>
                                <td><?php echo $selected_time; ?></td>
                                <td><?php echo $selected_date; ?></td>
                                </tr>

                <?php
        
                            }
                        }

                        else {
                            echo "No data in database";
                        }

                    ?>
        </table>
    </section>
<?php 
    include ('partials/footer.php');
?>