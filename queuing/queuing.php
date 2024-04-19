<?php
include('../config/connection.php');
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
            <a href="">
                <img src="../images/Logo Name.png" alt="" width=100%>
            </a>
        </div>
        <div class="login">

            <h1>Appointment Number</h1><br>
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
 
        // Sql query to serve the data into database
        $sql = "INSERT INTO tbl_queuing SET 
        queue_no = '$new_queue_no',
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