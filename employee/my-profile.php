<?php 
    include ('partials/side-nav.php');
    $user_id = $_SESSION['user_id'];
?>
<section class="home-section">


    <?php
                    // query to get teh admin in data base 
                    $sql = "SELECT * FROM tbl_employee";
                    $res = mysqli_query($conn, $sql);

                    if($res == TRUE) {
                        // count rows whether we have data in database
                        $count = mysqli_num_rows($res); // get all rows in database

                        $sn=1;

                        //check number of rows 
                        if($count> 0) {
                            // we have data in database
                            while($rows = mysqli_fetch_assoc($res)) {
                                // while loop to get all data from database
                                // execute as long as there is a data in database

                                //get individual data

                                $id = $rows['id'];
                            }
                          }
                        }
                ?>
    <div class="text">My Profile</div>
    <br><br>

    <center>
        <div class="wrapper">

            <div class="add_admin_content">


                <?php 
        if(isset($_SESSION['update'])) {
            echo $_SESSION['update']; // display session message
            unset($_SESSION['update']); // remove session message
        }
?>

                <?php

                $sql = "SELECT * FROM tbl_employee WHERE id=$user_id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                $sn=1;

                if($count > 0) {
                    // have data in database
                    //get data and display

                    while($row = mysqli_fetch_assoc($res))
                    {
                        $employee_no = $row['employee_no'];
                        $Fname = $row['Fname'];
                        $Mname = $row['Mname'];
                        $Lname = $row['Lname'];
                        $Birthday = $row['Birthday'];
                        $img_name = $row['img_name'];
                        $username = $row['username'];
        ?>
                <div class="profile text-center">
                    <td><?php 
                                            if($img_name=="")
                                            {
                                                ?>
                        <img src="../images/profile-user.png" alt="" width=150px>
                        <?php
                                            }
                                            else
                                            {
                                                ?>
                        <img class="image" src="<?php echo SITEURL; ?>/images/user/<?php echo $img_name; ?>"
                            width="200px">
                        <?php
                                            }
                                        ?>
                    </td>
                </div>
                <tr>
                    <div class="profile text-center">
                        <td><?php echo $employee_no; ?></td>
                    </div>
                    <br>
                    <div class="profile text-center">
                        <td><?php echo $Fname; ?></td>
                    </div>
                    <br>
                    <div class="profile text-center">
                        <td><?php echo $Mname; ?></td>
                    </div>
                <tr>
                    <div class="profile text-center">
                        <td><?php echo $Lname; ?></td>
                    </div>
                    <br>
                    <div class="profile text-center">
                        <td><?php echo $Birthday; ?></td>
                    </div>
                    <br>
                    <div class="profile text-center">
                        <td><?php echo $username; ?></td>
                    </div>
                    <br><br>

                    <a href="<?php echo SITEURL; ?>employee/update-myprofile.php?id=<?php echo $user_id; ?>"
                        class="btn-primary">Edit My Profile</a>

                    <?php

                    }
                }

                ?>

            </div>
        </div>
    </center>

</section>
<?php 
    include ('partials/footer.php');
?>