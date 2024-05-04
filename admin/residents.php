<?php 
include('partials/side-nav.php')
?>

<section class="home-section">
    <div class="text">Residents Profile</div>
    <section class="search text-center">
        <div class="container">

            <form action="<?php echo SITEURL;?>admin/residents.php" method="POST">
                <input type="submit" name="submit" value="Search" class="btn btn-search">
                <input type="search" name="search" placeholder="Search Here...">
            </form>
        </div>

    </section>
    <a href="<?php echo SITEURL; ?>admin/register.php" class="btn-primary">Add Resident</a>
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
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Email</th>
            <th>Address</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        <?php
        if(isset($_POST['search'])) {
         $search = mysqli_real_escape_string($conn, $_POST['search']);
         // Proceed with your code that uses $search here

         $sql1 = "SELECT * FROM tbl_resident WHERE Lname LIKE '%$search%' or Mname LIKE '%$search%' or Fname LIKE '%$search%' ";

          $res1 = mysqli_query($conn, $sql1);
          $sn=1;
          $count1 = mysqli_num_rows($res1);
          if($count1 > 0) 
          {
             while ($row = mysqli_fetch_assoc($res1))
             {
                 //get values
                 $id = $row['id'];
                 $img_name= $row['img_name'];
                 $Fname = $row['Fname'];
                 $Mname = $row['Mname'];
                 $Lname = $row['Lname'];
                 $Birthday = $row['Birthday'];
                 $age = $row['age'];
                 $gender = $row['gender'];
                 $s = $row['s'];
                 $email = $row['email'];
                 $a = $row['a'];
                 $username = $row['username'];
                 ?>
        <div class="menu-box">
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
                <td><?php echo $Fname;?></td>
                <td><?php echo $Mname;?></td>
                <td><?php echo $Lname; ?></td>
                <td><?php echo $Birthday;?></td>
                <td><?php echo $age;?></td>
                <td><?php echo $gender;?></td>
                <td><?php echo $s;?></td>
                <td><?php echo $email;?></td>
                <td><?php echo $a;?></td>
                <td><?php echo $username;?></td>
                <td>
                    <a href="<?php echo SITEURL;?>admin/update-resident.php?id=<?php echo $id;?>"
                        class="btn-second">Update</a>
                    <a href="<?php echo SITEURL;?>admin/delete-resident.php?id=<?php echo $id;?>"
                        class="btn-third">Delete</a>
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
                         echo "<div class='error'> &nbsp;Resident Not Found </div>";
                     }

                 ?>

        <div class="clear"></div>
        <?php
         
     }
    else {

        $sql = "SELECT * FROM tbl_resident";

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
                                $Fname = $row['Fname'];
                                $Mname = $row['Mname'];
                                $Lname = $row['Lname'];
                                $Birthday = $row['Birthday'];
                                $age = $row['age'];
                                $gender = $row['gender'];
                                $s = $row['s'];
                                $email = $row['email'];
                                $a = $row['a'];
                                $username = $row['username'];
                ?>


        <tr>
            <td><?php echo $sn++;?></td>
            <td>
                <?php 
                                            if($img_name=="")
                                            {
                                                ?>
                <img src="../images/profile-user.png" alt="" width=30px>
                <?php
                                            }
                                            else
                                            {
                                                ?>
                <img src="<?php echo SITEURL; ?>/images/user/<?php echo $img_name; ?>" width="30px">
                <?php
                                            }
                                        
                                        ?>
            </td>
            <td><?php echo $Fname;?></td>
            <td><?php echo $Mname;?></td>
            <td><?php echo $Lname; ?></td>
            <td><?php echo $Birthday;?></td>
            <td><?php echo $age;?></td>
            <td><?php echo $gender;?></td>
            <td><?php echo $s;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $a;?></td>
            <td><?php echo $username;?></td>
            <td>
                <a href="<?php echo SITEURL;?>admin/update-resident.php?id=<?php echo $id;?>"
                    class="btn-second">Update</a>
                <a href="<?php echo SITEURL;?>admin/delete-resident.php?id=<?php echo $id;?>"
                    class="btn-third">Delete</a>
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