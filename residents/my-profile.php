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
                        <img src="../images/profile-user.png" alt="" width=120px>
                        <?php
                                            }
                                            else
                                            {
                                                ?>
                        <img class="image" src="<?php echo SITEURL; ?>/images/user/<?php echo $img_name; ?>"
                            width="120px">
                        <?php
                                            }
                                        ?>
                    </td>
                </div>
                <br>
                <tr>
                    <div class="label-profile">
                        <div class="">
                            <td>Name: <?php echo $Fname, ' ', $Mname, ' ',$Lname;?></td>
                        </div>
                        <br>
                        <div class="">
                            <td>Birthdate: <?php echo $Birthday; ?></td>
                        </div>
                        <br>
                        <div class="">
                            <td>Age: <?php echo $age; ?></td>
                        </div>
                        <br>
                        <div class="">
                            <td>Gender:<?php echo $gender; ?></td>
                        </div>
                        <br>
                        <div class="">
                            <td>Status: <?php echo $s; ?></td>
                        </div>
                        <br>
                        <div class="">
                            <td>Email Address: <?php echo $email; ?></td>
                        </div>
                        <br>
                        <div class="">
                            <td>Home Address: <?php echo $a; ?></td>
                        </div>
                        <br>
                        <div class="">
                            <td>Username: <?php echo $username; ?></td>
                        </div>
                    </div>
                    <br><br>
                    <a href="<?php echo SITEURL; ?>residents/update-myprofile.php?id=<?php echo $user_id; ?>"
                        class="btn-primary">Edit My Profile</a><br>
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