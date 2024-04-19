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
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/4a6db1b6a3.js" crossorigin="anonymous"></script>
</head>
<script>
function checkForm() {
    var Fname = document.getElementById('Fname').value;
    var Lname = document.getElementById('Lname').value;
    var Birthday = document.getElementById('Birthday').value;
    var femaleChecked = document.getElementById("female").checked;
    var maleChecked = document.getElementById("male").checked;
    var singleChecked = document.getElementById("single").checked;
    var marriedChecked = document.getElementById("married").checked;
    var widowedChecked = document.getElementById("widowed").checked;
    var email = document.getElementById('email').value;
    var a = document.getElementById('a').value;
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Check if all fields are filled
    if (Fname !== '' &&
        Lname !== '' &&
        Birthday.trim() !== '' &&
        email !== '' &&
        a !== '' &&
        username !== '' &&
        password !== '' &&
        femaleChecked || maleChecked &&
        singleChecked ||
        marriedChecked || widowedChecked) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}
</script>

<body class="bg">
    <center>
        <div>
            <a href="register.php">
                <img src="../images/Logo Name.png" alt="" width=100%>
            </a>
        </div>
        <!--Main Content Ends-->
        <div class="main-content">
            <div class="wrapper">
                <div class="add_admin_content">
                    <a class="icons" href="../index.php">
                        <i class="fa-solid fa-square-xmark"></i>
                    </a>
                    <h1>Registration Form</h1>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <table class="table-size">
                            <tr>
                                <td>
                                    <input type="text" id="Fname" name="Fname" placeholder="Enter First Name"
                                        onkeyup="checkForm()" class="input-responsive" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" id="Mname" name="Mname" placeholder="Middle Name"
                                        class="input-responsive">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" id="Lname" placeholder="Last Name" onkeyup="checkForm()"
                                        class="input-responsive" required>
                                </td>
                            </tr>
                            <input class="file" type="hidden" name="image">
                            <tr>
                                <td>
                                    <label for="">Birthday:</label><br>
                                    <input class="b_date" type="date" id="Birthday" name="Birthday"
                                        onkeyup="checkForm()" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Gender:</label>
                                    <input type="radio" id="male" name="gender" value="male" onclick="checkForm()">
                                    Male
                                    <input type="radio" id="female" name="gender" value="female" onclick="checkForm()">
                                    Female
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Status:</label>
                                    <input type="radio" id="single" name="s" value="single" onclick="checkForm()">
                                    Single
                                    <input type="radio" id="married" name="s" value="married" onclick="checkForm()">
                                    Married
                                    <input type="radio" id="widowed" name="s" value="widowed" onclick="checkForm()">
                                    Widowed
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="email" id="email" name="email" placeholder="Email Address"
                                        onkeyup="checkForm()" class="input-responsive" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" id="a" name="a" placeholder="Home Address" onkeyup="checkForm()"
                                        class="input-responsive" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" id="username" name="username" placeholder="Username"
                                        onkeyup="checkForm()" class="input-responsive" required>
                                    <?php
                    if(isset($_SESSION['unique']))
                    {
                        echo $_SESSION['unique'];
                        unset($_SESSION['unique']);
                    }
                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" id="password" name="password" placeholder="Password"
                                        onkeyup="checkForm()" class="input-responsive" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" id="submit" name="submit" value="Register" class="btn-second"
                                        disabled>
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
    // Process value from form and save to database;
    // Check whether submit button is clicked or not
    if(isset($_POST['submit'])) {

        // Get data from form
        $Fname = $_POST['Fname'];
        $Mname = $_POST['Mname'];
        $Lname = $_POST['Lname'];
        $Birthday = date('Y-m-d', strtotime($_POST['Birthday']));
        $gender = $_POST['gender'];
        $s = $_POST['s'];
        $email = $_POST['email'];
        $a = $_POST['a'];
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
            header('location:' . SITEURL . "admin/register.php");
            die(); // Stop execution if upload fails
        }
    } else {
        $img_name = ""; // Set img_name to empty if no image is selected
    }
        $sql1 = "SELECT * FROM tbl_resident WHERE username='$username'";
        $res1 = mysqli_query($conn, $sql1) or die(mysqli_error);

        if (mysqli_num_rows($res1) > 0) {
            $_SESSION['unique'] = "<div class='success'>Username already take.</div>";
            header("Location:".SITEURL.'residents/register.php');?>
<?php
        exit();
        }
        else{

            $bday = new Datetime(date('Y-m-d', strtotime($_POST['Birthday']))); // Creating a DateTime object representing your date of birth.
            $today = new Datetime(date('Y-m-d')); // Creating a DateTime object representing today's date.
            $diff = $today->diff($bday); 

             // Sql query to serve the data into database
        $sql = "INSERT INTO tbl_resident SET
        img_name = '$img_name',
        Fname = '$Fname',
        Mname = '$Mname',
        Lname = '$Lname',
        Birthday = '$Birthday',
        age='$diff->y',
        gender = '$gender',
        s = '$s',
        email = '$email',
        a = '$a',
        username = '$username',
        password = '$password'
    ";
    // EXECUTE QUERY AND SAVE DATA IN DATABASE
   $res = mysqli_query($conn, $sql) or die(mysqli_error());

   // check if data is inserted or not and display message;

   if($res == TRUE){
    // data inserted
    // variable to display message;
    $_SESSION['add']="<div class='success'> &nbsp; Successful Registration</div>";
    header("Location:".SITEURL.'index.php');
    exit();
   }
   else{
    // data not inserted
    $_SESSION['add'] = " <div class='error'> &nbsp; Failed to Register, Please try again </div>";
    header("location:".SITEURL.'residents/register.php');
    exit();
   }
}
    }   
?>