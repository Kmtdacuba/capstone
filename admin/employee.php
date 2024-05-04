<?php 
    include ('partials/side-nav.php');
?>

<section class="home-section">
    <div class="text">Employee Profile</div>
    <br><br>
    <a href="<?php echo SITEURL; ?>admin/add-employee.php" class="btn-primary">Add Employee</a>
    <br><br><br>

    <?php 
                if(isset($_SESSION['add'])) {
                    echo $_SESSION['add']; // display session message
                    unset($_SESSION['add']); // remove session message
                }

                if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
        ?>

    <br>

    <table class="table-full">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Employee No</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>Action</th>
        </tr>

        <?php
                        $sql = "SELECT * FROM tbl_employee";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        $sn=1;

                        if($count > 0) {
                            // have data in database
                            //get data and displya

                            while($row = mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $img_name = $row['img_name'];
                                $employee_no = $row['employee_no'];
                                $Fname = $row['Fname'];
                                $Mname = $row['Mname'];
                                $Lname = $row['Lname'];
                                $Birthday = $row['Birthday'];
                ?>

        <tr>
            <td><?php echo $sn++; ?></td>
            <td>
                <?php 
                                            if($img_name=="")
                                            {
                                                ?>
                <img src="../images/profile-user.png" alt="" width=100px>
                <?php
                                            }
                                            else
                                            {
                                                ?>
                <img src="<?php echo SITEURL; ?>/images/user/<?php echo $img_name; ?>" width="100px">
                <?php
                                            }
                                        
                                        ?>
            </td>
            <td><?php echo $employee_no; ?></td>
            <td><?php echo $Fname; ?></td>
            <td><?php echo $Mname; ?></td>
            <td><?php echo $Lname ?></td>
            <td><?php echo $Birthday; ?></td>


            <td>
                <a href="<?php echo SITEURL; ?>admin/update-employee.php?id=<?php echo $id; ?>"
                    class="btn-second">Update</a>
                <a href="<?php echo SITEURL; ?>admin/delete-employee.php?id=<?php echo $id; ?>"
                    class="btn-third">Delete</a>
            </td>
        </tr>

        <?php
        
                            }
                        }

                        else {
                            // no data in database
                        }

                    ?>
    </table>

</section>

<?php 
    include ('partials/footer.php');
?>