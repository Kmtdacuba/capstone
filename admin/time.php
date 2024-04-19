<?php
include('../config/connection.php');

// Initialize consumed time array
if (!isset($_SESSION['consumed_time'])) {
    $_SESSION['consumed_time'] = array();
}

// Function to check if a date is a weekend (Saturday or Sunday)
function isWeekend($date) {
    return (date('N', strtotime($date)) >= 6);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected date and time
    $selectedDate = $_POST["selected_date"];
    $selectedTime = $_POST["selected_time"];

    // Check if it's a weekend
    if (isWeekend($selectedDate)) {
        echo "Sorry, you cannot select Saturday or Sunday. Please choose a weekday.";
    } else {
        // Check if consumed time for the selected date is set, if not, initialize it
        if (!isset($_SESSION['consumed_time'][$selectedDate])) {
            $_SESSION['consumed_time'][$selectedDate] = 0;
        }

        // Update consumed time for the selected date
        $_SESSION['consumed_time'][$selectedDate] += intval($selectedTime);

        // Check if consumed time exceeds the limit (8 hours per day)
        $timeLimit = 8 * 60; // 8 hours in minutes
        if ($_SESSION['consumed_time'][$selectedDate] >= $timeLimit) {
            // Disable further selection for this date
            echo "<script>";
            echo "document.getElementById('datepicker').setAttribute('disabled', 'disabled');";
            echo "</script>";
        }

        // Insert the date into the database
        $sql = "INSERT INTO your_table (date_column, time_column) VALUES ('$selectedDate', '$selectedTime')";

        if ($conn->query($sql) === TRUE) {
            echo "Date and time have been successfully saved into the database.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Date and Time Selection</title>
</head>

<body>
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
                       }
                   }
        ?>

    <h2>Select Date and Time</h2>
    <form method="post">
        Select Date: <input type="date" id="datepicker" name="selected_date"><br><br>
        Select Time:
        <select name="selected_time">
            <option value="30">09:00 AM</option>
            <option value="30">09:30 AM</option>
            <option value="30">10:00 AM</option>
            <option value="30">10:30 AM</option>
            <!-- Add more time options as needed -->
        </select><br><br>

        <tr>
            <td>
                <label class="lbl_update" for="">Full Name:</label> <br>
                <input type="text" name="name" value="<?php echo $Fname, ' ', $Mname, ' ', $Lname; ?>"
                    class="input-responsive" readonly>
            </td>
        </tr><br>
        <tr>
            <td>
                <label for="type">Transaction Type:</label>
                <select id="type" name="type">
                    <option value="Barangay Certificate">Barangay Certificate</option>
                    <option value="Barangay Indigency">Barangay Indigency</option>
                    <option value="Barangay Clearance">Barangay Clearance</option>
                    <option value="Barangay Business Permit">Barangay Business Permit</option>
                    <option value="Barangay Facilities & Properties">Barangay Facilities & Properties</option>
                    <option value="Barangay Identification Card">Barangay Identification Card</option>
                    <option value="Barangay Records, Data & Similar Documents">Barangay Records, Data & Similar
                        Documents</option>
                    <option name="type" value="other">Other</option>
                </select><br><br>
            </td>
        </tr>
        <input type="submit" value="Submit">
    </form>

</body>

</html>

<?php 
  if(isset($_POST['submit'])) {

    // Get data from form
    $appointment_no = rand(0, 99999);
    $name = $_POST['name'];
    $type = $_POST['type'];
    $selected_time = $_POST['selected_time'];
    $selected_date = $_POST['selected_date'];

    $sql1 = "SELECT * FROM tbl_appointment";
    $res1 = mysqli_query($conn, $sql1) or die(mysqli_error);

         // Sql query to serve the data into database
    $sql = "INSERT INTO tbl_appointment SET
    appointment_no = '$appointment_no',
    name = '$name',
    type = '$type',
    selected_time = '$selected_time',
    selected_date = '$selected_date'
";
// EXECUTE QUERY AND SAVE DATA IN DATABASE
$res = mysqli_query($conn, $sql) or die(mysqli_error());

// check if data is inserted or not and display message;

if($res == TRUE){
// data inserted
// variable to display message;
$_SESSION['appointment']="<div class='success'>Successful to set appointment</div>";
header("Location:".SITEURL.'residents/summary.php');
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