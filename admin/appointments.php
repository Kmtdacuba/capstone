<?php 
include('partials/side-nav.php')
?>

<section class="home-section">
    <div class="text">Appointments</div>
    <section class="search text-center">
        <div class="container">

            <form action="<?php echo SITEURL;?>admin/appointments.php" method="POST">
                <input type="submit" name="submit" value="Search" class="btn btn-search">
                <input type="search" name="search" placeholder="Search Here...">
            </form>
        </div>

    </section>
    <a href="<?php echo SITEURL; ?>admin/set-appointment.php" class="btn-primary">Set Appointments</a>
    <a href="<?php echo SITEURL; ?>admin/transaction.php" class="btn-primary">Transactions</a>
    <br><br><br>
    <?php
            if(isset($_SESSION['done'])) {
                echo $_SESSION['done']; // display session message
                unset($_SESSION['done']); // remove session message
            }
            if(isset($_SESSION['delete'])) {
                echo $_SESSION['delete']; // display session message
                unset($_SESSION['delete']); // remove session message
            }
        ?>

    <br>
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
        if(isset($_POST['search'])) {
         $search = mysqli_real_escape_string($conn, $_POST['search']);
         // Proceed with your code that uses $search here

         $sql1 = "SELECT * FROM tbl_appointment WHERE appointment_no LIKE '%$search%' or name LIKE '%$search%' ";

          $res1 = mysqli_query($conn, $sql1);
          $sn=1;
          $count1 = mysqli_num_rows($res1);
          if($count1 > 0) 
          {
            while($row = mysqli_fetch_assoc($res1))
            {
                $id = $row['id'];
                $name = $row['name'];
                $type = $row['type'];
                $appointment_no = $row['appointment_no'];
                $selected_time = $row['selected_time'];
                $selected_date = $row['selected_date'];
                 ?>
        <div class="menu-box">
            <tr>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $type; ?></td>
                <td><?php echo $appointment_no; ?></td>
                <td><?php echo $selected_time; ?></td>
                <td><?php echo $selected_date; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/done.php?id=<?php echo $id; ?>" class="btn-second">Done</a>
                </td>

            </tr>
        </div>
        <div class="clear"></div>

        </div>

        <?php

                     }
                     }

                     else 
                     {
                         echo "<div class='error'> &nbsp;Appointment Not Found </div>";
                     }

                 ?>

        <div class="clear"></div>
        <?php
         
     }
    else {

        $sql = "SELECT * FROM tbl_appointment";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);
                        

                        $sn=1;

                        if($count > 0) {
                            // have data in database
                            //get data and displya

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

            <td>
                <a href="<?php echo SITEURL; ?>admin/done.php?id=<?php echo $id; ?>" class="btn-second">Done</a>
            </td>
        </tr>
        <div class="clear"></div>
        <?php         
                            }
                        }
                        ?>
        <?php
    }

    ?>

    </table>
</section>
<?php 
include ('partials/footer.php');
?>