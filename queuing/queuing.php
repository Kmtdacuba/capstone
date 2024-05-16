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

// Function to get the next counter
function getNextCounter($conn) {
    $query = "SELECT MAX(counter_no) AS max_counter FROM tbl_queuing";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $max_counter = $row['max_counter'];

    // If there are no numbers in the database, return 1
    if ($max_counter === null) {
        return 1;
    } else {
        // Calculate the next counter
        $next_counter = ($max_counter % 5) + 1;

        // Reset counter to 1 if it reaches 5
        if ($next_counter == 5) {
            $reset_query = "UPDATE tbl_queuing SET counter_no = 1";
            $conn->query($reset_query);
        }

        return $next_counter;
    }
}

    if(isset($_POST['submit'])) {
        
        $counter_no = $_POST['counter_no'];
        $appointment_no = $_POST['appointment_no'];
        $date_time = date("Y-m-d h:i:sa"); //time and date

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
    
    $sql1 = "SELECT * FROM tbl_appointment";
    $res1 = mysqli_query($conn, $sql1) or die(mysqli_error);
    $bday = new Datetime(date('Y-m-d', strtotime($_POST['Birthday']))); // Creating a DateTime object representing your date of birth.
    $today = new Datetime(date('Y-m-d')); // Creating a DateTime object representing today's date.
    $diff = $today->diff($bday); 

    $sql_age = "SELECT * FROM tbl_appointment";
    
        // Sql query to serve the data into database
        $sql = "INSERT INTO tbl_queuing SET 
        queue_no = '$new_queue_no',
        counter_no = '$counter_no',
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