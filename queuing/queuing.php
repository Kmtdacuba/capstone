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
                           $Fname = $row['Fname'];
                           $Mname = $row['Mname'];
                           $Lname = $row['Lname'];
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
                        <td>
                            <input type="hidden" name="name" value="<?php echo $Fname, ' ', $Mname, ' ', $Lname; ?>"
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

if(isset($_POST['submit'])) {
    $appointment_no = $_POST['appointment_no'];
    $date_time = date("Y-m-d h:i:sa"); //time and date
    $name = $_POST['name'];
    
    // Check if appointment number already exists
    $sql_check = "SELECT * FROM tbl_queuing WHERE appointment_no='$appointment_no'";
    $res_check = mysqli_query($conn, $sql_check) or die(mysqli_error($conn));

    if (mysqli_num_rows($res_check) > 0) {
        $_SESSION['number'] = "<div class='error'>Appointment number already have queuing number</div>";
        header("location:" .SITEURL.'queuing/queuing.php');
        exit();
    }

    // Check if appointment number exists in table appointment
    $sql_number = "SELECT * FROM tbl_appointment WHERE appointment_no='$appointment_no'";
    $res_number = mysqli_query($conn, $sql_number) or die(mysqli_error($conn));

    if (mysqli_num_rows($res_number) == 0) {
        $_SESSION['number'] = "<div class='error'>Appointment number doesn't exist in table</div>";
        header("Location: queuing.php");
        exit();
    }

    $bday = new Datetime(date('Y-m-d', strtotime($_POST['Birthday']))); // Creating a DateTime object representing your date of birth.
    $today = new Datetime(date('Y-m-d')); // Creating a DateTime object representing today's date.
    $diff = $today->diff($bday); 

    // Get the last counter_no
    $sql_last_counter = "SELECT counter_no FROM tbl_queuing ORDER BY queue_no DESC LIMIT 1";
    $res_last_counter = mysqli_query($conn, $sql_last_counter) or die(mysqli_error($conn));

    if (mysqli_num_rows($res_last_counter) > 0) {
        $row_last_counter = mysqli_fetch_assoc($res_last_counter);
        $last_counter_no = $row_last_counter['counter_no'];
        $counter_no = ($last_counter_no % 5) + 1;
    } else {
        $counter_no = 1; // Default to 1 if there are no previous entries
    }

    // Sql query to serve the data into database
    $sql = "INSERT INTO tbl_queuing SET 
    counter_no = '$counter_no',
    name = '$name',
    age = '{$diff->y}',
    appointment_no = '$appointment_no',
    date_time = '$date_time'
    ";

    // EXECUTE QUERY AND SAVE DATA IN DATABASE
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    // check if data is inserted or not and display message
    if($res == TRUE) {
        // data inserted
        // variable to display message;
        $_SESSION['queuing_id'] = mysqli_insert_id($conn);
        $_SESSION['wait'] = "<div class='success text-center'>Please wait for your turn.</div>";
        header("location:" . SITEURL . 'queuing/queue-num.php');
        exit();
    } else {
        // data not inserted
        $_SESSION['wait'] = "<div class='error text-center'>Error occurred, please try again</div>";
        header("location:" . SITEURL . 'queuing/queue-num.php');
        exit();
    }
}
?>