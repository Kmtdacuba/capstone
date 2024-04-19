<?php include('../config/connection.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay 188 Tala Caloocan City</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../favicon.png">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/4a6db1b6a3.js" crossorigin="anonymous"></script>
</head>

<body class="bg">
    <center>
        <div>
            <a href="../index.php">
                <img src="../images/Logo Name.png" alt="" width=100%>
            </a>
        </div>
        <!--Main Content Ends-->
        <div class="main-content">
            <div class="wrapper">

                <div class="add_admin_content">

                    <a class="icons" href="employee.php">
                        <i class="fa-solid fa-square-xmark"></i>
                    </a>
                    <h1>Add Employee</h1>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <table class="table-size">
                            <tr>
                                <td>
                                    <input type="text" name="employee_no" placeholder="Employee Number"
                                        class="input-responsive" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="Fname" placeholder="First Name" class="input-responsive"
                                        required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" name="Mname" placeholder="Middle Name" class="input-responsive">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" name="Lname" placeholder="Last Name" class="input-responsive"
                                        required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="date" for="">Birthday: </label>
                                    <input type="date" id="Birthday" name="Bithrday" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" name="username" placeholder="Username" class="input-responsive">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="password" name="password" placeholder="Password"
                                        class="input-responsive">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="submit" name="submit" value="Add Employee" class="btn-second">
                                </td>
                            </tr>

                        </table>

                    </form>

                </div>
            </div>
        </div>
        <!--Main Content Ends-->

    </center>

</body>

</html>

<?php 
    // Process value from form and save to database;
    // Check whether submit button is clicked or not

    if(isset($_POST['submit'])) {

        // Get data from form
        $employee_no = $_POST['employee_no'];
        $Fname = $_POST['Fname'];
        $Mname = $_POST['Mname'];
        $Lname = $_POST['Lname'];
        $Birthday = date("Y-m-d");
        $username = $_POST['username'];
        $password = md5($_POST['password']); // make the password encrypted

        //Upload the image
       if(isset($_FILES['image']['name'])) {
        $img_name = $_FILES['image']['name'];
    
        // Extract the file extension
        $ext = end(explode('.', $img_name));
    
        // Generate a new filename with a random number
        $img_name = "User-Img-" . rand(0000,9999) . "." . $ext;
    
        // Temporary location of the uploaded image
        $src = $_FILES['image']['tmp_name'];
    
        // Destination directory where the image will be moved
        $dst = "../images/user/" . $img_name;
    
        // Move the uploaded image to the destination directory
        $upload = move_uploaded_file($src, $dst);
    
        // Check if the image was uploaded successfully
        if($upload == false) {
            $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
            header('location:' . SITEURL . "admin/admin-register.php");
            die(); // Stop execution if upload fails
        }
    } else {
        $img_name = ""; // Set img_name to empty if no image is selected
    }


        // Sql query to serve the data into database
        $sql = "INSERT INTO tbl_employee SET
            employee_no = '$employee_no',
            img_name = '$img_name',
            Fname = '$Fname',
            Mname = '$Mname',
            Lname = '$Lname',
            Birthday = '$Birthday',
            username = '$username',
            password = '$password'
        ";
        // EXECUTE QUERY AND SAVE DATA IN DATABASE
       $res = mysqli_query($conn, $sql) or die(mysqli_error());

       // check if data is inserted or not and display message;

       if($res == TRUE) {
        // data inserted
        // variable to display message;

        $_SESSION['add'] = "<div class='success'>Employee Added Successfully </div>";
        header("location:" .SITEURL.'admin/employee.php');
        exit;
        
       }
       else {
        // data not inserted
        $_SESSION['add'] = " <div class='error'> Failed to Add the Admin </div>";
        header("location:" .SITEURL.'admin/add-employee');
        exit;
       }
    }
?>