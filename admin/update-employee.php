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

                    <a class="icons" href="employee.php">
                        <i class="fa-solid fa-square-xmark"></i>
                    </a>

                    <h1>Update Employee</h1>

                    <?php
            $id = $_GET['id'];

            $sql = "SELECT * FROM tbl_employee WHERE id=$id";

            $res = mysqli_query($conn, $sql);

            if ($res == TRUE)
            {
                $count= mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    
                    $employee_no = $row['employee_no'];
                    $Fname = $row['Fname'];
                    $Mname = $row['Mname'];
                    $Lname = $row['Lname'];
                    $Birthday = $row['Birthday'];
                    $img_name = $row['img_name'];
                    $username = $row['username'];
                    $password = $row['password'];
                }
                else
                {
                    header("location: " . SITEURL . 'admin/update-employee.php');
                    exit;
                }
            }

        ?>

                    <br>

                    <form action="" method="POST">

                        <table class="table-size">
                            <tr>
                                <td>
                                    <label class="lbl_update" for="">Employee No:</label> <br>
                                    <input type="text" name="employee_no" value="<?php echo $employee_no; ?>"
                                        class="input-responsive">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="lbl_update" for="">First Name:</label> <br>
                                    <input type="text" name="Fname" value="<?php echo $Fname; ?>"
                                        class="input-responsive">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="lbl_update" for="">Middle Name:</label> <br>
                                    <input type="text" name="Mname" value="<?php echo $Mname; ?>"
                                        class="input-responsive">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="lbl_update" for="">Last Name:</label> <br>
                                    <input type="text" name="Lname" value="<?php echo $Fname; ?>"
                                        class="input-responsive">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="lbl_update" for="">Birthday:</label> <br>
                                    <input type="date" name="Birthday" value="<?php echo $Birthday; ?>"
                                        class="input-responsive" readonly>
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
                                    <input type="submit" name="submit" value="Update Employee" class="btn-second"
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
        $employee_no = $_POST['employee_no'];
        $Fname = $_POST['Fname'];
        $Mname = $_POST['Mname'];
        $Lname = $_POST['Lname'];
        $Birthday = $_POST['Birthday'];
        $username = $_POST['username'];

        $select= "SELECT * FROM tbl_employee WHERE id='$id'";
        $sql = mysqli_query($conn,$select);
        $row = mysqli_fetch_assoc($sql);

        $res= $row['id'];
         if($res === $id) {

        $update = "UPDATE tbl_employee SET
        employee_no = '$employee_no', 
        Fname = '$Fname',
        Mname = '$Mname',
        Lname = '$Lname',
        Birthday = '$Birthday',
        username = '$username'
        WHERE id='$id' 
        ";

        $sql2 = mysqli_query($conn,$update);

        if($sql2)
       { 
           /*Successful*/
           header("location:" .SITEURL.'admin/employee.php');
           $_SESSION ['update'] = "<div class='success'> &nbsp; Employee Successfully Updated</div>";
           exit;
       }
       else
       {
           /*sorry your profile is not update*/
           header("location:" .SITEURL.'admin/update-employee.php');
           $_SESSION ['update'] = "<div class='success'> &nbsp; Employee Not Updated</div>";
           exit;
       }
    }
    else
    {
        /*sorry your id is not match*/
        header("location:" .SITEURL.'admin/update-employee.php');
        $_SESSION ['update'] = "<div class='success'> &nbsp; Employee Not Updated</div>";
        exit;
    }

}
?>