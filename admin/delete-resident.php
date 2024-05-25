<?php
include('../config/connection.php');
ob_start();
$id = $_GET['id'];

$sql_select = "SELECT * FROM tbl_resident WHERE id=$id";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        // Step 4: Insert the retrieved data into the second table
        while ($row = $result->fetch_assoc()) {
            $data_to_insert = $row['Fname'];
            $data_to_insert1 = $row['Mname'];
            $data_to_insert2 = $row['Lname'];
            $data_to_insert3 = $row['img_name'];
            $data_to_insert4 = $row['Birthday'];
            $data_to_insert5 = $row['age'];
            $data_to_insert6 = $row['gender'];
            $data_to_insert7 = $row['s'];
            $data_to_insert8 = $row['email'];
            $data_to_insert9 = $row['a'];
            $data_to_insert10 = $row['username'];
            $data_to_insert11 = $row['password'];
            $data_to_insert12 = $row['resident_type'];
            $data_to_insert13 = $row['voters_type'];
            
            $sql_insert = "INSERT INTO resident_archive (Fname, Mname, Lname, img_name, Birthday, age, s, email, a, username, password, resident_type, voters_type) VALUES ('$data_to_insert', '$data_to_insert1', '$data_to_insert2', '$data_to_insert3', '$data_to_insert4', '$data_to_insert5', '$data_to_insert6', '$data_to_insert7', '$data_to_insert8' '$data_to_insert9', '$data_to_insert10', '$data_to_insert11', '$data_to_insert12', '$data_to_insert13')";
            
            if ($conn->query($sql_insert) === FALSE) {
                echo "Error: " . $sql_insert . "<br>" . $conn->error;
                $_SESSION['delete'] = "<div class='error'>&nbsp Error: Try Again Later </div>";
                header('location:' . SITEURL . 'admin/residents.php');
            }
        }
        echo "Data successfully moved to second table.";
        $_SESSION['delete'] = "<div class='success'>&nbsp Resident Deleted Successfully </div>";
        header('location:' . SITEURL . 'admin/residents.php');
    } else {
        echo "No data found to move.";
        $_SESSION['delete'] = "<div class='error'>&nbsp Error: Try Again Later </div>";
    header('location:' . SITEURL . 'admin/residents.php');
    }

// Step 2: Delete data from the first table
$sql_delete = "DELETE FROM tbl_resident WHERE id=$id";

if ($conn->query($sql_delete) === TRUE) {
    // Step 3: Retrieve the deleted data
    $_SESSION['delete'] = "<div class='success'>&nbsp Resident Deleted Successfully </div>";
    header('location:' . SITEURL . 'admin/residents.php');
    
} else {
    echo "Error deleting data: " . $conn->error;
    $_SESSION['delete'] = "<div class='error'>&nbsp Error: Try Again Later </div>";
    header('location:' . SITEURL . 'admin/residents.php');
}

// Close connection
$conn->close();
?>