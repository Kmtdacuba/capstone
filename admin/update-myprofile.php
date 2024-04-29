<?php include('../config/connection.php');
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay 188 Tala Caloocan City</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/4a6db1b6a3.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../favicon.png">
</head>

<body class="bg">
    <center>
        <div>
            <a href="../index.php">
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

            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            $res = mysqli_query($conn, $sql);

            if ($res == TRUE)
            {
                $count= mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);

                    $Fname = $row['Fname'];
                    $email = $row['email'];
                    $current_image = $row['img_name'];
                    $username = $row['username'];
                    $password = $row['password'];
                }
                else
                {
                    header("location: " . SITEURL . 'admin/dashboard.php');
                    exit;
                }
            }

        ?>

                    <br>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <table class="table-size">
                            <tr>
                                <td>
                                    <label for="">Name:</label> <br>
                                    <input type="text" name="Fname" value="<?php echo $Fname; ?>"
                                        class="input-responsive">
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
                                <td>Upload Image: <input class="file" type="file" name="image">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Username: </label><br>
                                    <input type="text" name="username" value="<?php echo $username; ?>"
                                        class="input-responsive">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" name="submit" value="Update Profile" class="btn-second"
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
        $email = $_POST['email'];
        $current_image = $_POST['current_image'];
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
                                    header('location:' . SITEURL . 'admin/update-myprofile.php');
                                    die();
                                }
                                if ($current_image!="")
                                {
                                    $remove_path = "../images/user/".$current_image;

                                    $remove = unlink($remove_path);

                                    if($remove==false)
                                    {
                                        $_SESSION['remove-failed'] = "<div class='error text-center'> &nbsp; Failed to remove current image </div>";
                                        header('location:' . SITEURL . 'admin/update-myprofile.php');
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

        $select= "select * from tbl_admin where id='$id'";
        $sql = mysqli_query($conn,$select);
        $row = mysqli_fetch_assoc($sql);

        $res= $row['id'];
         if($res === $id) {

        $update = "UPDATE tbl_admin SET 
        Fname = '$Fname',
        email = '$email',
        img_name = '$img_name' , 
        username = '$username'
        WHERE id='$id' 
        ";

        $sql2 = mysqli_query($conn,$update);

        if($sql2)
       { 
           /*Successful*/
           $_SESSION['update']="<div class='success'> &nbsp; Your profile updated successfully</div>";
           header("location:" .SITEURL.'admin/my-profile.php');
           exit;
       }
       else
       {
           /*sorry your profile is not update*/
            $_SESSION['aupdadd'] = " <div class='error'> &nbsp; Failed to update your profile, <p></p>lease try again </div>";
            header("location:" .SITEURL.'admin/update-myprofile.php');
           exit;
       }
    }
    else
    {
        /*sorry your id is not match*/
        header("location:" .SITEURL.'admin/update-myprofile.php');
        exit;
    }

}
?>