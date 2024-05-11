<?php
include('../config/connection.php');
$user_id = $_SESSION['user_id'];
ob_start();
?>

<?php
// Get available timeslots for a specific date
function getAvailableTimeslots($date) {
    global $conn;
    $sql = "SELECT time_slot FROM appointments WHERE date = '$date' AND is_available = 1";
    $result = $conn->query($sql);
    $timeslots = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $timeslots[] = $row['time_slot'];
        }
    }
    return $timeslots;
}

// Get available timeslots for a specific date
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date'])) {
    $date = $_POST['date'];
    $sql = "SELECT time_slot FROM appointments WHERE date = '$date' AND is_available = 1";
    $result = $conn->query($sql);
    $options = "";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Assuming time_slot is stored in HH:MM format in the database
            $options .= "<option value='".$row['time_slot']."'>".$row['time_slot']."</option>";
        }
    } else {
        $options .= "<option value='' disabled>No available timeslots for this date</option>";
    }
    echo $options;
    exit();
}
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
                                    <label for="date">Select Date:</label>
                                    <input class="date" type="date" id="date" name="date"
                                        min="<?php echo date('Y-m-d'); ?>">
                                </td>
                            </tr>
                            <br><br>
                            <tr>
                                <td>
                                    <label for="time">Select Time:</label>
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
    <script>
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
                url: 'set-appointment.php',
                data: {
                    date: date
                },
                success: function(response) {
                    $('#time').html(response);
                }
            });
        });

        $('#appointmentForm').submit(function(e) {
            e.preventDefault();
            var date = $('#date').val();
            var time = $('#time').val();
            $.ajax({
                type: 'POST',
                url: 'set-appointment.php',
                data: {
                    date: date,
                    time: time
                },
                success: function(response) {
                    alert(response);
                }
            });
        });
    });
    </script>
</body>

</html>
<?php 
$host = 'smtp.hostinger.com';
$port = ' 465'; // Port number may vary, check Hostinger's documentation
$username_smtp = 'info@brgymanagment.online';
$password_smtp = 'Barangay#188';
$from_email = 'info@brgymanagment.online';
$from_name = 'Barangay 188 Tala Caloocan City'; 

    


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
$_SESSION['email'] = $email;
$_SESSION['appointment']="<div class='success'>Successful to set appointment</div>";
header("Location:".SITEURL.'residents/summary.php');
exit();
}
else{
// data not inserted
$_SESSION['appointment'] = " <div class='error'> Failed to set appointment. pleas try again</div>";
header("location:".SITEURL.'residents/my-appointment.php');
exit();
}
}
?>