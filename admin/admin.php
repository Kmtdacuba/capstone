<?php 
    include ('partials/side-nav.php');
    ob_start();
?>
<section class="home-section">
    <div class="text">Admin</div>
    <br><br>
    <a href="<?php echo SITEURL; ?>admin/admin-register.php" class="btn-primary">Add Admin</a>
    <br><br>

    <?php 
                if(isset($_SESSION['add'])) {
                    echo $_SESSION['add']; // display session message
                    unset($_SESSION['add']); // remove session message
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                        nset($_SESSION['update']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
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
            <th>Name</th>
            <th>Image</th>
            <th>Userame</th>
            <th>Password</th>
            <th>Action</th>
        </tr>

        <?php
                        $sql = "SELECT * FROM tbl_admin";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        $sn=1;

                        if($count > 0) {
                            // have data in database
                            //get data and display

                            while($row = mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $Fname = $row['Fname'];
                                $img_name= $row['img_name'];
                                $username = $row['username'];
                                $password = $row['password'];
                ?>

        <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $Fname; ?></td>
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
            <td><?php echo $username; ?></td>
            <td><?php echo $password; ?></td>

            <td>
                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>"
                    class="btn-second">Update</a>
                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>"
                    class="btn-forth">Delete</a>
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