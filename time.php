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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <h2>Appointment Scheduler</h2>
    <form id="appointmentForm">
        <label for="date">Select Date:</label>
        <input type="date" id="date" name="date">
        <br><br>
        <label for="time">Select Time:</label>
        <select id="time" name="time"></select>
        <br><br>
        <button type="submit">Book Appointment</button>
    </form>

    <script>
    $(document).ready(function() {
        $('#date').change(function() {
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