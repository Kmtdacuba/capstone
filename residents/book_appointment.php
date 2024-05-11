<?php
include('../config/connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date']) && isset($_POST['time'])) {
$date = $_POST['date'];
$time = $_POST['time'];

// Perform any necessary validation on the date and time

// Insert appointment into the database
$sql = "INSERT INTO tbl_appointment (date, time) VALUES ('$date', '$time')";
if ($conn->query($sql) === TRUE) {
echo "Appointment booked successfully!";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
} else {
echo "Invalid request!";
}
?>