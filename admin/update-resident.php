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
                    <h1>Update Resident's Profile</h1><br>
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
                    $Fname=$row['Fname'];
                    $Mname=$row['Mname'];
                    $Lname=$row['Lname'];
                    $Birthday=$row['Birthday'];
                    $age=$row['age'];
                    $gender = $row['gender'];
                    $s=$row['s'];
                    $email=$row['email'];
                    $a=$row['a'];
                    $username=$row['username'];
                }
                else
                {
                    header('location:'.SITEURL."admin/update_resident.php");
                    exit;
                }
            }
        ?>
                    <br>
                    <form action="" method="POST">

                        <table class="table-size">
                            <tr>
                                <td>
                                    <label class="lbl_update" for="Fname">First Name:</label><br>
                                    <input type="text" name="Fname" value="<?php echo $Fname;?>"
                                        class="input-responsive">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="lbl_update" for="Mname">Middle Name:</label><br>
                                    <input type="text" name="Mname" value="<?php echo $Mname;?>"
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
                            </tr>
                            <tr>
                                <td>
                                    <label
                                        for="Birthday">Birthday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </label><label class="lbl_update" for="age">Age:</label><br>
                                    <input class="b_date" type="date" name="Birthday" value="<?php echo $Birthday;?>"
                                        class="input-responsive" readonly>
                                    <input type="number" name="age" value="<?php echo $age;?>" class="input-responsive "
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="lbl_update" for="">Gender:</label>
                                    <input <?php if($gender == "male"){echo "checked";}?> type="radio" name="gender"
                                        value="male"> Male
                                    <input <?php if($gender == "female"){echo "checked";}?> type="radio" name="gender"
                                        value="female"> Female
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="lbl_update" for="">Status:</label>
                                    <input <?php if($s == "single"){echo "checked";}?> type="radio" name="s"
                                        value="single"> Single
                                    <input <?php if($s == "married"){echo "checked";}?> type="radio" name="s"
                                        value="married"> Married
                                    <input <?php if($s == "widowed"){echo "checked";}?> type="radio" name="s"
                                        value="widowed"> Widowed
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="lbl_update" for="email">Email:</label><br>
                                    <input type="text" name="email" value="<?php echo $email;?>"
                                        class="input-responsive">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="lbl_update" for="a">Address:</label><br>
                                    <input type="text" name="a" value="<?php echo $a;?>" class="input-responsive">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="username">Username:</label><br>
                                    <input type="text" name="username" value="<?php echo $username;?>"
                                        class="input-responsive">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $id?>">
                                    <input type="submit" name="submit" value="Update Resident" class="btn-second"
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
        $id=$_POST['id'];
        $Fname=$_POST['Fname'];
        $Mname=$_POST['Mname'];
        $Lname=$_POST['Lname'];
        $Birthday=$_POST['Birthday'];
        $age=$_POST['age'];
        $gender = $_POST['gender'];
        $s=$_POST['s'];
        $email=$_POST['email'];
        $a=$_POST['a'];
        $username=$_POST['username'];

        $select= "SELECT * FROM tbl_resident WHERE id='$id'";
        $sql = mysqli_query($conn,$select);
        $row = mysqli_fetch_assoc($sql);

        $res= $row['id'];
         if($res === $id){
        $update = "UPDATE tbl_resident SET
        Fname='$Fname',
        Mname='$Mname',
        Lname='$Lname',
        Birthday='$Birthday',
        age='$age',
        s='$s',
        gender = '$gender',
        email='$email',
        a='$a',
        username='$username'
        WHERE id='$id' 
        ";
        $sql2 = mysqli_query($conn,$update);
        if($sql2){
           /*Successful*/
           header("location: http://localhost/capstone/admin/residents.php");
           $_SESSION['update']="<div class='success'> &nbsp; Resident's Profile Successfully Updated</div>";
           exit();
       }
       else{
           /*sorry your profile is not update*/
           header('location:'.SITEURL."admin/update_resident.php");
           $_SESSION['update']="<div class='success'> &nbsp; Error, Not Updated</div>";
           exit();
       }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:'.SITEURL."admin/update_resident.php");
        $_SESSION['update']="<div class='success'> &nbsp; Error, Not Updated</div>";
        exit();
    }
}
?>