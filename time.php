<?php

include('config/connection.php');
ob_start();

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
<html>

<head>
    <title>Appointment Scheduler</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div class="main-content">
        <div class="wrapper">
            <div class="add_admin_content">
                <h2>Appointment Scheduler</h2>
                <form id="appointmentForm">
                    <table class="table-size">
                        <label for="date">Select Date:</label>
                        <!-- Set min attribute to current date -->
                        <input class="date" type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>">
                        <br><br>
                        <label for="time">Select Time:</label>
                        <select class="time input-responsive" id="time" name="time"></select>
                        <br><br>
                        <button type="submit">Book Appointment</button>
                    </table>
                </form>
            </div>
        </div>
    </div>
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
                url: 'time.php',
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
                url: 'book_appointment.php',
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