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
    <title>Barangay 188 Tala Caloocan City</title>
    <link rel="icon" type="image/png" href="../favicon.png">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/4a6db1b6a3.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="bg">
    <center>
        <div>
            <img src="../images/Logo Name.png" alt="" width=100%>
        </div>
        <div class="main-content">
            <div class="wrapper">
                <div class="add_admin_content">
                    <a class="icons" href="my-appointment.php">
                        <i class="fa-solid fa-square-xmark"></i>
                    </a>
                    <h1>Appointment Form</h1><br>
                    <?php
                   $sql = "SELECT * FROM tbl_resident WHERE id=$user_id";
       
                   $res = mysqli_query($conn, $sql);
       
                   if ($res == TRUE)
                   {
                       $count= mysqli_num_rows($res);
       
                       if($count==1)
                       {
                           $row = mysqli_fetch_assoc($res);
                           
                           $Fname = $row['Fname'];
                           $Mname = $row['Mname'];
                           $Lname = $row['Lname'];
                           $Birthday = $row['Birthday'];
                       }
                   }
        ?>
                    <form id="appointmentForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                        method="POST">
                        <table class="table-size">
                            <tr>
                                <td>
                                    <label for="name">Full Name:</label> <br>
                                    <input type="text" name="name"
                                        value="<?php echo $Fname, ' ', $Mname, ' ', $Lname; ?>" class="input-responsive"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="name">Email Address:</label> <br>
                                    <input type="email" name="email" placeholder="Input Email Address"
                                        class="input-responsive" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="Birthday" value="<?php echo $Birthday; ?>"
                                        class="input-responsive" readonly>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="type">Transaction Type:</label>
                                    <select class="type input-responsive" id="type" name="type">
                                        <option value="Barangay Certificate">Barangay Certificate</option>
                                        <option value="Barangay Indigency">Barangay Indigency</option>
                                        <option value="Barangay Clearance">Barangay Clearance</option>
                                        <option value="Barangay Business Permit">Barangay Business Permit</option>
                                        <option value="Barangay Facilities & Properties">Barangay Facilities &
                                            Properties
                                        </option>
                                        <option value="Barangay Indentification Card">Barangay Identification Card
                                        </option>
                                        <option value="Barangay Data  Similar Documents">Barangay Data Similar Documents
                                        </option>
                                        <option value="Other Services">Other Services</option>
                                    </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Date:
                                    <br>
                                    <input class="date" type="date" id="date" name="date"
                                        min="<?php echo date('Y-m-d'); ?>"> <br><br>

                                    Time:<label for="" style="color: gray;">(Military Time)</label>
                                    <select class="time input-responsive" id="time" name="time"></select>

                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <input type="submit" name="submit" value="Set" class="btn-second"
                                        class="input-responsive">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </center>

</body>

</html>
<?php 
$host = 'smtp.hostinger.com';
$port = ' 465'; // Port number may vary, check Hostinger's documentation
$username_smtp = 'info@brgymanagment.online';
$password_smtp = 'Barangay#188';
$from_email = 'info@brgymanagment.online';
$from_name = 'Barangay 188 Tala Caloocan City'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date']) && isset($_POST['time'])) {
  
    // Get data from form
    $email = $_POST['email'];
    $appointment_no = rand(0, 99999);
    $name = $_POST['name'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $time = $_POST['time'];


    $sql1 = "SELECT * FROM tbl_appointment";
    $res1 = mysqli_query($conn, $sql1) or die(mysqli_error);
    $bday = new Datetime(date('Y-m-d', strtotime($_POST['Birthday']))); // Creating a DateTime object representing your date of birth.
    $today = new Datetime(date('Y-m-d')); // Creating a DateTime object representing today's date.
    $diff = $today->diff($bday); 
         // Sql query to serve the data into database
    $sql = "INSERT INTO tbl_appointment SET
    email = '$email',
    appointment_no = '$appointment_no',
    name = '$name',
    age='$diff->y',
    type = '$type',
    time = '$time',
    date = '$date'
";
    // Send email confirmation
    $to = $email; 
    $subject = "Appointment Schedule Confirmation";
    $message = "Dear $name,\n\n";
    $message .= "Your appointment has been scheduled successfully.\n\n";
    $message .= "Appointment for $type\n";
    $message .= "Appointment Number: $appointment_no\n";
    $message .= "Date: $date\n";
    $message .= "Time: $time\n";
    $message .= "\nThank you for choosing our service. Please bring your requirements.\n";
    $message .= "\nValid ID (indicates your identity and address) such us:
    - Barangay ID
    - Government ID
    - School ID
    - Company ID\n\n";
    $message .= "Best Regards,\nBarangay 188 Tala Caloocan City";

    $headers = "From: $from_name <$from_email>";

    // PHP mail() function to send email
    if (mail($to, $subject, $message, $headers)) {
        $_SESSION['sent'] = " <div class='success text-center'>Scheduled appointment details sent to your email</div>";
           header('location:'. SITEURL.'my-appointment.php');
    } else {
        $_SESSION['sent'] = " <div class='error text-center'>Unseccessful to send appointment details</div>";
        header('location:'. SITEURL.'set-appointment.php');
     } 
// EXECUTE QUERY AND SAVE DATA IN DATABASE


$date = mysqli_real_escape_string($conn, $date);
$time = mysqli_real_escape_string($conn, $time);

// Prepare the SQL statement
$update = "UPDATE appointments SET is_available = 0 WHERE date = '$date' AND time_slot = '$time'";

// Execute the SQL statement
$result = mysqli_query($conn, $update);

// Check if the update was successful
if ($result) {
    echo "Update successful!";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

$res = mysqli_query($conn, $sql) or die(mysqli_error());

// check if data is inserted or not and display message;

if($res == TRUE){
// data inserted
// variable to display message;
$_SESSION['email'] = $email;
$_SESSION['appointment']="<div class='success'>Successful to set appointment</div>";
header("Location:".SITEURL.'residents/payment.php');
exit();
}
else{
// data not inserted
$_SESSION['appointment'] = " <div class='error'> Failed to set appointment. pleas try again</div>";
header("location:".SITEURL.'residents/my-appointment.php');
exit();
}
}
?> <script>
$(document).ready(function() {
    $('#date').change(function() {
        var selectedDate = new Date($(this).val());
        // Check if the selected date is a Sunday (day 0)
        if (selectedDate.getDay() === 0) {
            // Reset the date to the next Monday
            selectedDate.setDate(selectedDate.getDate() + 1);
            $(this).val(selectedDate.toISOString().slice(0, 10));
        }
        var date = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'get_available_timeslots.php',
            data: {
                date: date
            },
            success: function(response) {
                $('#time').html(response);
            }
        });
    });


});
</script>