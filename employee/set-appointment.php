<?php
include('../config/connection.php');
$user_id = $_SESSION['user_id'];
ob_start();
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var dateInput = document.getElementById('selected_date');
    dateInput.addEventListener('change', function() {
        var selectedDate = new Date(this.value);
        if (selectedDate.getDay() == 0) { // 0 corresponds to Sunday
            alert('Sorry, Sundays are not available for appointments.');
            this.value = ''; // Clear the selected date
        }
    });
});
</script>

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
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <table class="table-size">
                            <tr>
                                <td>
                                    <label for="name">Full Name:</label> <br>
                                    <input type="text" name="name" placeholder="Input Full Name"
                                        class="input-responsive">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="name">Email Address:</label> <br>
                                    <input type="email" name="email" placeholder="Input Email Address"
                                        class="input-responsive">
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
                                        <!-- Add more options as needed -->
                                    </select><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;Time:
                                    <br><input class="date" type="date" id="selected_date" name="selected_date"
                                        min="<?php echo date('Y-m-d'); ?>" required>
                                    <?php
             // Array of available time slots
$selected_time = array(
"8:00 AM",
"8:10 AM",
"8:20 AM",
"8:30 AM",
"8:40 AM",
"8:50 AM",
"9:00 AM",
"9:10 AM",
"9:20 AM",
"9:30 AM",
"9:40 AM",
"9:50 AM",
"10:00 AM",
"10:10 AM",
"10:20 AM",
"10:30 AM",
"10:40 AM",
"10:50 AM",
"11:00 AM",
"11:10 AM",
"11:20 AM",
"11:30 AM",
"11:40 AM",
"11:50 AM",
"12:00 NN",
"12:10 PM",
"12:20 PM",
"12:30 PM",
"12:40 PM",
"12:50 PM",
"1:00 PM",
"1:10 PM",
"1:20 PM",
"1:30 PM",
"1:40 PM",
"1:50 PM",
"2:00 PM",
"2:10 PM",
"2:20 PM",
"2:30 PM",
"2:40 PM",
"2:50 PM",  
"3:00 PM",
"3:10 PM",
"3:20 PM",
"3:30 PM",
"3:40 PM",
"3:50 PM",
"4:00 PM",
"4:10 PM",
"4:20 PM",
"4:30 PM",
"4:40 PM",
"4:50 PM",
"5:00 PM"
);
?>
                                    <select class="time input-responsive" name="selected_time" required>
                                        <option value="">Select Time</option>
                                        <?php
                                        foreach ($selected_time as $slot) {
                                            if (!isset($_SESSION["bookedTimeSlots"]) || !in_array($slot, $_SESSION["bookedTimeSlots"])) {
                                                echo "<option value='$slot'>$slot</option>";
                                            }
                                        }
                                        ?>
                                    </select>
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
if (isset($_POST["selected_time"])) {
    $selectedTimeSlot = $_POST["selected_time"];
    
    // Check if the selected time slot is available
    if (in_array($selectedTimeSlot, $selected_time)) {
        // Check if the time slot is already booked
        if (!isset($_SESSION["bookedTimeSlots"]) || !in_array($selectedTimeSlot, $_SESSION["bookedTimeSlots"])) {
            // Book the time slot
            $_SESSION["bookedTimeSlots"][] = $selectedTimeSlot;
            echo "Time slot $selectedTimeSlot has been successfully booked.";
        } else {
            echo "Sorry, the selected time slot $selectedTimeSlot is already booked.";
        }
    } else {
        echo "Invalid time slot selected.";
    }
}
    // Function to check if a date is a weekend (Saturday or Sunday)
    function isWeekend($date) {
        return (date('N', strtotime($date)) >= 6);
    }

  if(isset($_POST['email'])) {

    
    // Get data from form
    $email = $_POST['email'];
    $appointment_no = rand(0, 99999);
    $name = $_POST['name'];
    $type = $_POST['type'];
    $selectedDate = $_POST['selected_date'];
    $selectedTime = $_POST['selected_time'];

    if(isWeekend($selectedDate)) {
        echo "Sorry, you cannot select Saturday or Sunday. Please choose a weekday.";
    }

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
    selected_time = '$selectedTime',
    selected_date = '$selectedDate'
";
    // Send email confirmation
    $to = $email; 
    $subject = "Appointment Schedule Confirmation";
    $message = "Dear $name,\n\n";
    $message .= "Your appointment has been scheduled successfully.\n\n";
    $message .= "Appointment for $type\n";
    $message .= "Appointment Number: $appointment_no\n";
    $message .= "Date: $selectedDate\n";
    $message .= "Time: $selectedTimeSlot\n";
    $message .= "\nThank you for choosing our service.\n\n";
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
$res = mysqli_query($conn, $sql) or die(mysqli_error());

// check if data is inserted or not and display message;

if($res == TRUE){
// data inserted
// variable to display message;
$_SESSION['appointment']="<div class='success'>Successful to set appointment</div>";
header("Location:".SITEURL.'residents/my-appointment.php');
exit();
}
else{
// data not inserted
$_SESSION['appointmrnt'] = " <div class='error'> Failed to set appointment. pleas try again</div>";
header("location:".SITEURL.'residents/my-appointment.php');
exit();
}
}
?>