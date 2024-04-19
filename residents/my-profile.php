<?php 
include('partials/side-nav.php');
$user_id = $_SESSION['user_id'];
?>
<section class="home-section">
    <div class="text">My Profile</div>
    <br><br>
    <center>
        <div class="wrapper">
            <div class="add_admin_content">
                <?php 
        if(isset($_SESSION['update'])){
            echo $_SESSION['update']; // display session message
            unset($_SESSION['update']); // remove session message
        }
?>
                <?php
                $sql = "SELECT * FROM tbl_resident WHERE id=$user_id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                $sn=1;

                if($count > 0){
                    // have data in database
                    //get data and display
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $Fname = $row['Fname'];
                        $Mname = $row['Mname'];
                        $Lname = $row['Lname'];
                        $img_name = $row['img_name'];
                        $Birthday = $row['Birthday'];
                        $age = $row['age'];
                        $gender = $row['gender'];
                        $s = $row['s'];
                        $email = $row['email'];
                        $a = $row['a'];
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
                <br>
                <tr>
                    <div class="profile text-center">
                        <td><?php echo $Fname, ' ', $Mname, ' ',$Lname;?></td>
                    </div>
                    <br>
                    <div class="profile text-center">
                        <td><?php echo $Birthday; ?></td>
                    </div>
                    <br>
                    <div class="profile text-center">
                        <td><?php echo $age; ?></td>
                    </div>
                    <br>
                    <div class="profile text-center">
                        <td><?php echo $gender; ?></td>
                    </div>
                    <br>
                    <div class="profile text-center">
                        <td><?php echo $s; ?></td>
                    </div>
                    <br>
                    <div class="profile text-center">
                        <td><?php echo $email; ?></td>
                    </div>
                    <br>
                    <div class="profile text-center">
                        <td><?php echo $a; ?></td>
                    </div>
                    <br>
                    <div class="profile text-center">
                        <td><?php echo $username; ?></td>
                    </div>
                    <br><br>
                    <a href="<?php echo SITEURL; ?>residents/update-myprofile.php?id=<?php echo $user_id; ?>"
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