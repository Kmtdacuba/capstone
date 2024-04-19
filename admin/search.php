<?php 
include('partials/side-nav.php')
?>
<section class="home-section">

    <section class="find text-center">
        <div class="container">

            <?php
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            ?>

            <h2 class="text-center">Food On Your Search <a href="#" class="text-white">"<?php echo $search; ?>" </a>
            </h2>

        </div>
    </section>
    <table class="table-full">
        <tr>
            <th>ID</th>
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
        </tr>
        <section class="menu">
            <div class="container">
                <?php

             //query to get food in search
             $sql = "SELECT * FROM tbl_resident WHERE Lname LIKE '%$search%'";

             $res = mysqli_query($conn, $sql);

             $count = mysqli_num_rows($res);

             if($count > 0) 
             {
                //food available
                while ($row = mysqli_fetch_assoc($res))
                {
                    //get values
                    $id = $row['id'];
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
                        <td><?php echo $id; ?></td>
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
                </div>
                <div class="clear"></div>

            </div>

            <?php

                        }
                        }

                        else 
                        {
                            // food not available
                            echo "<div class='error'> &nbsp; Resident Not Found </div>";
                        }

                    ?>

            <div class="clear"></div>

            </div>
    </table>
</section>
</section>
<?php 
include ('partials/footer.php');
?>