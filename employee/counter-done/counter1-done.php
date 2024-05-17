<?php
include('../../config/connection.php');
ob_start();
$queue_no = $_GET['queue_no'];

$sql_select = "SELECT * FROM tbl_queuing WHERE queue_no=$queue_no";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        // Step 4: Insert the retrieved data into the second table
        while ($row = $result->fetch_assoc()) {
            $data_to_insert = $row['queue_no'];
            $data_to_insert1 = $row['queue_type'];
            $data_to_insert2 = $row['age'];
            $data_to_insert3 = $row['appointment_no'];
            $data_to_insert4 = $row['date_time'];
            $data_to_insert5 = $row['status'];
            
            $sql_insert = "INSERT INTO queuing_archive (queue_no, queue_type, age, appointment_no, date_time, status) VALUES ('$data_to_insert', '$data_to_insert1', '$data_to_insert2', '$data_to_insert3', '$data_to_insert4', '$data_to_insert5')";
            
            if ($conn->query($sql_insert) === FALSE) {
                echo "Error: " . $sql_insert . "<br>" . $conn->error;
                $_SESSION['done'] = " <div class='error'> &nbsp; Error: Try again!</div>";
                header("location:".SITEURL.'employee/counter-one.php');
            }
        }
        echo "Data successfully moved to second table.";
            $_SESSION['done'] = " <div class='success'> &nbsp; Queuing done </div>";
                header("location:".SITEURL.'employee/counter-one.php');
    } else {
        echo "No data found to move.";
        $_SESSION['done'] = " <div class='error'> &nbsp; Error: Try again!</div>";
        header("location:".SITEURL.'employee/counter-one.php');
    }

// Step 2: Delete data from the first table
$sql_delete = "DELETE FROM tbl_queuing WHERE queue_no=$queue_no";

if ($conn->query($sql_delete) === TRUE) {
    // Step 3: Retrieve the deleted data
    $_SESSION['done'] = " <div class='success'> &nbsp; Transaction done </div>";
    header("location:".SITEURL.'employee/counter-one.php');
    
} else {
    echo "Error deleting data: " . $conn->error;
    $_SESSION['done'] = " <div class='error'> &nbsp; Error: Try again!</div>";
    header("location:".SITEURL.'employee/counter-one.php');
}

// Close connection
$conn->close();
?>