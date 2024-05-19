<?php
include('../config/connection.php');
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay 188 Tala Caloocan City</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../favicon.png">
    <script src="https://kit.fontawesome.com/4a6db1b6a3.js" crossorigin="anonymous"></script>
</head>

<body class="bg">
    <center>
        <div>
            <a href="update-myprofile.php">
                <img src="../images/Logo Name.png" alt="" width=100%>
            </a>
        </div>

        <div class="main-content">
            <div class="wrapper">
                <div class="add_admin_content">
                    <a class="icons" href="my-profile.php">
                        <i class="fa-solid fa-square-xmark"></i>
                    </a>
                    <h1>Update My Profile</h1>

                    <?php
            $id = $_GET['id'];

            $sql = "SELECT * FROM tbl_resident WHERE id=$id";
            
            $res = mysqli_query($conn, $sql);

            if ($res == TRUE)
            {
                $count= mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);

                    $Fname = $row['Fname'];
                    $Mname = $row['Mname'];
                    $Lname = $row['Lname'];
                    $current_image = $row['img_name'];
                    $Birthday = $row['Birthday'];
                    $age = $row['age'];
                    $gender = $row['gender'];
                    $s = $row['s'];
                    $email = $row['email'];
                    $a = $row['a'];
                    $username = $row['username'];
                }
                else
                {
                    header("location:".SITEURL.'residents/dashboard.php');
                    exit;
                }
            }

        ?>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <table class="table-size">
                            <tr>
                                <td>
                                    <label class="lbl_update" for="">First Name:</label> <br>
                                    <input type="text" name="Fname" value="<?php echo $Fname; ?>"
                                        class="input-responsive">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="lbl_update" for="">Middle Name: </label> <br>
                                    <input type="text" name="Mname" value="<?php echo $Mname; ?>"
                                        class="input-responsive">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="lbl_update" for="Lname">Last
                                        Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="Lname" value="<?php echo $Lname;?>"
                                        class="input-responsive">
                                </td>
                            <tr>
                                <td>
                                    <?php 
                if($current_image == "")
                {
                   
                    ?>
                                    <img src="../images/profile-user.png" alt="" width=100px style="display: none;">
                                    <?php
                }
                else
                {
                    ?>
                                    <img src="<?php echo SITEURL;?>images/user/<?php echo $current_image; ?>"
                                        width="150px" style="display: none;">
                                    <?php
                }
            ?>
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td>Upload Image: <input class="file" type="file" name="image">
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td>
                                    <label
                                        for="Birthday">Birthday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </label><label class="lbl_update" for="age">Age:</label><br>
                                    <input class="b_date" type="date" name="Birthday" value="<?php echo $Birthday;?>"
                                        class="input-responsive" readonly>
                                    <input type="number" name="age" value="<?php echo $age;?>" class="input-responsive"
                                        readonly>
                                </td>
                            </tr>
                            <td>
                                <label class="lbl_update" for="">Gender:</label>
                                <input <?php if($gender == "Male"){echo "checked";}?> type="radio" name="gender"
                                    value="Male"> Male
                                <input <?php if($gender == "Female"){echo "checked";}?> type="radio" name="gender"
                                    value="Female"> Female
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="lbl_update" for="">Status:</label>
                                    <input <?php if($s == "Single"){echo "checked";}?> type="radio" name="s"
                                        value="Single"> Single
                                    <input <?php if($s == "Married"){echo "checked";}?> type="radio" name="s"
                                        value="Married"> Married
                                    <input <?php if($s == "Widowed"){echo "checked";}?> type="radio" name="s"
                                        value="Widowed"> Widowed
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="lbl_update" for="">Email Address: </label> <br>
                                    <input type="text" name="email" value="<?php echo $email;?>"
                                        class="input-responsive">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="lbl_update" for="">Address:</label><br>
                                    <input type="text" name="a" value="<?php echo $a;?>" class="input-responsive">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Username:</label><br>
                                    <input type="text" name="username" value="<?php echo $username; ?>"
                                        class="input-responsive">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <input type="submit" name="submit" value="Update My Profile" class="btn-second"
                                        class="input-responsive">
                                </td>
                            </tr>
                        </table>
                    </form>
    </center>
    </div>
    </div>
    </div>
</body>

</html>

<?php 
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $Fname = $_POST['Fname'];
        $Mname = $_POST['Mname'];
        $Lname = $_POST['Lname'];
        $current_image = $_POST['current_image'];
        $Birthday = $_POST['Birthday'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $s = $_POST['s'];
        $email = $_POST['email'];
        $a = $_POST['a'];
        $username = $_POST['username'];

        if(isset($_FILES['image']['name']))
        {
            $img_name = $_FILES['image']['name'];

            if($img_name!="")
            {
                //auto rename image
                $ext = end(explode('.',$img_name));

                //rename image
                $img_name = "User-Img_" . rand(0000, 9999) . '.' . $ext;

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "../images/user/" . $img_name;

                //upload image
                $upload = move_uploaded_file($source_path, $destination_path);

                //check if image is uploaded or not
                if ($upload == false) {
                    $_SESSION['upload'] = "<div class='error text-center'>Failed to upload image </div>";
                    header('location:' . SITEURL . 'resident/update-myprofile.php');
                    die();
                }
                if ($current_image!="")
                {
                    $remove_path = "../images/user/".$current_image;

                    $remove = unlink($remove_path);

                    if($remove==false)
                    {
                        $_SESSION['remove-failed'] = "<div class='error text-center'>Failed to remove current image </div>";
                        header('location:' . SITEURL . 'resident/update-myprofile.php');
                        die();
                    }
                }
            }
            else
            {
                $img_name = $current_image;
            }
        }
        
        else
        {
            $img_name = $current_image;
        }
        $select= "SELECT * FROM tbl_resident WHERE id='$id'";
        $sql = mysqli_query($conn,$select);
        $row = mysqli_fetch_assoc($sql);

        $res= $row['id'];
         if($res === $id) {

        $update = "UPDATE tbl_resident SET 
        Fname = '$Fname',
        Mname = '$Mname',
        Lname = '$Lname',
        img_name = '$img_name',
        Birthday = '$Birthday',
        age = '$age',
        gender = '$gender',
        s = '$s',
        email = '$email',
        a = '$a',
        username = '$username'
        WHERE id='$id' 
        ";

        $sql2 = mysqli_query($conn,$update);

        if($sql2)
       { 
           /*Successful*/
           $_SESSION['update'] = "<div class='success text-center'>Profile updated successfully </div>";
           header('location:'.SITEURL.'residents/my-profile.php');
           exit;
       }
       else
       {
           /*sorry your profile is not update*/
           $_SESSION['success'] = "<div class='error text-center'>Failed to update profile </div>";
           header('location:'.SITEURL.'residents/update-myprofile.php');
           exit;
       }
    }
    else
    {
        /*sorry your id is not match*/
        $_SESSION['success'] = "<div class='error text-center'>Failed to update profile </div>";
        header('location:'.SITEURL.'residents/update-myprofile.php');
        exit;
    }
}
?>