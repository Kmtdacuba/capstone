<?php
include('../config/connection.php');
ob_start();
$id = $_GET['id'];

$sql_select = "SELECT * FROM tbl_appointment WHERE id=$id";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        // Step 4: Insert the retrieved data into the second table
        while ($row = $result->fetch_assoc()) {
            $data_to_insert = $row['name'];
            $data_to_insert1 = $row['type'];
            $data_to_insert2 = $row['appointment_no'];
            $data_to_insert3 = $row['time'];
            $data_to_insert4 = $row['date'];
            $data_to_insert5 = $row['email'];
            
            $sql_insert = "INSERT INTO appointment_archive (name, type, appointment_no, time, date, email) VALUES ('$data_to_insert', '$data_to_insert1', '$data_to_insert2', '$data_to_insert3', '$data_to_insert4', '$data_to_insert5')";
            
            if ($conn->query($sql_insert) === FALSE) {
                echo "Error: " . $sql_insert . "<br>" . $conn->error;
                $_SESSION['done'] = " <div class='error'> &nbsp; Error: Try again!</div>";
                header("location:".SITEURL.'admin/appointments.php');
            }
        }
        echo "Data successfully moved to second table.";
            $_SESSION['done'] = " <div class='success'> &nbsp; Transaction done </div>";
                header("location:".SITEURL.'admin/appointments.php');
    } else {
        echo "No data found to move.";
        $_SESSION['done'] = " <div class='error'> &nbsp; Error: Try again!</div>";
        header("location:".SITEURL.'admin/appointments.php');
    }

// Step 2: Delete data from the first table
$sql_delete = "DELETE FROM tbl_appointment WHERE id=$id";

if ($conn->query($sql_delete) === TRUE) {
    // Step 3: Retrieve the deleted data
    $_SESSION['done'] = " <div class='success'> &nbsp; Transaction done </div>";
    header("location:".SITEURL.'admin/appointments.php');
    
} else {
    echo "Error deleting data: " . $conn->error;
    $_SESSION['done'] = " <div class='error'> &nbsp; Error: Try again!</div>";
    header("location:".SITEURL.'admin/appointments.php');
}

// Close connection
$conn->close();
?>