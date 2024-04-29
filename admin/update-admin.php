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
    <link rel="icon" type="image/png" href="../favicon.png">
    <script src="https://kit.fontawesome.com/4a6db1b6a3.js" crossorigin="anonymous"></script>
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

                    <a class="icons" href="admin.php">
                        <i class="fa-solid fa-square-xmark"></i>
                    </a>

                    <h1>Update Admin</h1>

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
                    $username = $row['username'];
                    $password = $row['password'];
                }
                else
                {
                    header("location: " . SITEURL . 'admin/update-admin.php');
                    exit;
                }
            }
        ?>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <table class="table-size">

                            <tr>
                                <td>
                                    <label class="lbl_update" for="">Full Name:</label> <br>
                                    <input type="text" name="name" value="<?php echo $Fname; ?>"
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


                            </tr>
                            <td>
                                <label for="">Username: </label><br>
                                <input type="text" name="username" value="<?php echo $username; ?>"
                                    class="input-responsive">
                            </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" name="submit" value="Update Admin" class="btn-second"
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
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $select= "SELECT * FROM tbl_admin WHERE id='$id'";
        $sql = mysqli_query($conn,$select);
        $row = mysqli_fetch_assoc($sql);

        $res= $row['id'];
         if($res === $id) {

        $update = "UPDATE tbl_admin SET 
        Fname = '$Fname',
        email = '$email',
        username = '$username',
        password = '$password'
        WHERE id='$id' 
        ";

        $sql2 = mysqli_query($conn,$update);

        if($sql2)
       { 
           /*Successful*/
           header("location:" .SITEURL.'admin/admin.php');
           exit;
       }
       else
       {
           /*sorry your profile is not update*/
           header("location:" .SITEURL.'admin/update-admin.php');
           exit;
       }
    }
    else
    {
        /*sorry your id is not match*/
        header("location:" .SITEURL.'admin/update-admin.php');
        exit;
    }

}
?>