<?php
include('../config/connection.php');
ob_start();

$id = $_GET['id'];

$sql = "DELETE FROM tbl_employee WHERE id=$id";

$res = mysqli_query($conn, $sql);

        $id = $_POST['id'];
        $employee_no = $_POST['employee_no'];
        $Fname = $_POST['Fname'];
        $Mname = $_POST['Mname'];
        $Lname = $_POST['Lname'];
        $Birthday = $_POST['Birthday'];
        $img = $_POST['img'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql2 = "INSERT INTO employee_archive SET
            id = '$id',
            Fname = '$Fname',
            Mname = '$Mname',
            Lname = '$Lname',
            Birthday = '$Birthday',
            img = '$img',
            username = '$username',
            password = '$password'
        ";
       $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());

if ($res==true)
{
    if ($res2==true)
    {
    $_SESSION['delete'] = "<div class='success'>Employee Deleted Successfully </div>";
    header('location:' . SITEURL . 'admin/employee.php');
    }
}
else
{
    $_SESSION['delete'] = "<div class='error'>Error: Try Aggain Later </div>";
    header('location:' . SITEURL . 'admin/employee.php');
}
?>