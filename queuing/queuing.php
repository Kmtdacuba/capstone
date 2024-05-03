<?php
include('../config/connection.php');
$user_id = $_SESSION['user_id'];
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../favicon.png">
    <title>Barangay 188 Tala Caloocan City</title>
</head>
<script>
// Message will disappear after 2 seconds 
setTimeout(function() {
    var errorDiv = document.querySelector('.error');
    if (errorDiv) {
        errorDiv.remove(); // Remove the error message
    }
}, 2000);

setTimeout(function() {
    var errorDiv = document.querySelector('.success');
    if (errorDiv) {
        errorDiv.remove(); // Remove the success message
    }
}, 2000);
</script>
<script>
function checkForm() {
    var appointment_no = document.getElementById('appointment_no').value;

    if (appointment_no !== '') {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}
</script>

<script>
function limitInput(field) {
    if (field.value.length > 5) {
        field.value = field.value.slice(0, 5);
    }
}
</script>

<body class="bg">
    <center>

        <div>
            <img src="../images/Logo Name.png" alt="" width=100%>
        </div>
        <div class="login">

            <h1>Appointment Number</h1><br>
            <?php
                    if(isset($_SESSION['number']))
                    {
                        echo $_SESSION['number'];
                        unset($_SESSION['number']);
                    }
                    ?>

            <?php
                   $sql = "SELECT * FROM tbl_resident WHERE id=$user_id";
       
                   $result = mysqli_query($conn, $sql);
       
                   if ($result == TRUE)
                   {
                       $count= mysqli_num_rows($result);
       
                       if($count==1)
                       {
                           $row = mysqli_fetch_assoc($result);
                           $Birthday = $row['Birthday'];
                       }
                   }
        ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <!-- Login table -->
                <table class="table-size">
                    <!-- <img src="images/Login Form.png" alt="" width=100%> -->
                    <tr>
                        <input type="number" id="appointment_no" name="appointment_no" onkeyup="checkForm()"
                            oninput="limitInput(this)" maxlength="5" placeholder="Enter Appointment Number"
                            class="login-responsive" required>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="Birthday" value="<?php echo $Birthday; ?>"
                                class="input-responsive" readonly>
                        </td>
                    </tr>
                    <tr>
                        <input type="hidden" id="status" name="status" value="waiting">
                    </tr>
                    <br>
                    <button name="submit" id="submit" class="btn-second" disabled>Get Queue
                        Number</button>
                    </tr>
                </table>
            </form>
        </div>
    </center>

</body>

</html>
<?php 
 
    // Process value from form and save to database;
    // Check whether submit button is clicked or not

    if(isset($_POST['submit'])) {

        $appointment_no = $_POST['appointment_no'];
        $date_time = date("Y-m-d h:i:sa"); //time and date 
 
        // Check if appointment number already exists
    $sql_check = "SELECT * FROM tbl_queuing WHERE appointment_no='$appointment_no'";
    $res_check = mysqli_query($conn, $sql_check) or die(mysqli_error($conn));

    if (mysqli_num_rows($res_check) > 0) {
        $_SESSION['number'] = "<div class='error'>Appointment number already exists</div>";
        header("Location: queuing.php");
        exit();
    }

    $sql1 = "SELECT * FROM tbl_appointment";
    $res1 = mysqli_query($conn, $sql1) or die(mysqli_error);
    $bday = new Datetime(date('Y-m-d', strtotime($_POST['Birthday']))); // Creating a DateTime object representing your date of birth.
    $today = new Datetime(date('Y-m-d')); // Creating a DateTime object representing today's date.
    $diff = $today->diff($bday); 
    
        // Sql query to serve the data into database
        $sql = "INSERT INTO tbl_queuing SET 
        queue_no = '$new_queue_no',
        age='$diff->y',
        appointment_no = '$appointment_no',
        date_time = '$date_time'
        ";
        
        
        // EXECUTE QUERY AND SAVE DATA IN DATABASE
       $res = mysqli_query($conn, $sql) or die(mysqli_error());

       // check if data is inserted or not and display message;

       if($res == TRUE) {
        // data inserted
        // variable to display message;
        $_SESSION['queuing_id'] = $row['id'];
        $_SESSION['wait'] = " <div class='success text-center'Please wait for your turn./div>";
        header("location:" .SITEURL.'queuing/queue-num.php');
        
        exit;
        
       }
       else {
        // data not inserted
        $_SESSION['wait'] = " <div class='success text-center'>Error occured, please try again</div>";
        header("location:" .SITEURL.'queuing/queue-num.php');
        exit;
       }
    } 
?>