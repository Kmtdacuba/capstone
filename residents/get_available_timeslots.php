<?php
include('../config/connection.php');


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