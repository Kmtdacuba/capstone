<?php
include('../config/connection.php');
ob_start();
$id = $_GET['id'];

$sql_select = "SELECT * FROM tbl_employee WHERE id=$id";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        // Step 4: Insert the retrieved data into the second table
        while ($row = $result->fetch_assoc()) {
            $data_to_insert = $row['employee_no'];
            $data_to_insert1 = $row['Fname'];
            $data_to_insert2 = $row['Mname'];
            $data_to_insert3 = $row['Lname'];
            $data_to_insert4 = $row['Birthday'];
            $data_to_insert5 = $row['img_name'];
            $data_to_insert6 = $row['username'];
            $data_to_insert7 = $row['password'];
            
            $sql_insert = "INSERT INTO employee_archive (employee_no, Fname, Mname, Lname, Birthday, img_name, username, password) VALUES ('$data_to_insert', '$data_to_insert1', '$data_to_insert2', '$data_to_insert3', '$data_to_insert4', '$data_to_insert5', '$data_to_insert6', '$data_to_insert7')";
            
            if ($conn->query($sql_insert) === FALSE) {
                echo "Error: " . $sql_insert . "<br>" . $conn->error;
                $_SESSION['delete'] = "<div class='error'>&nbsp Error: Try Again Later </div>";
                header('location:' . SITEURL . 'admin/employee.php');
            }
        }
        echo "Data successfully moved to second table.";
        $_SESSION['delete'] = "<div class='success'>&nbsp Employee Deleted Successfully </div>";
        header('location:' . SITEURL . 'admin/employee.php');
    } else {
        echo "No data found to move.";
        $_SESSION['delete'] = "<div class='error'>&nbsp Error: Try Again Later </div>";
    header('location:' . SITEURL . 'admin/employee.php');
    }

// Step 2: Delete data from the first table
$sql_delete = "DELETE FROM tbl_employee WHERE id=$id";

if ($conn->query($sql_delete) === TRUE) {
    // Step 3: Retrieve the deleted data
    $_SESSION['delete'] = "<div class='success'>&nbsp Employee Deleted Successfully </div>";
    header('location:' . SITEURL . 'admin/employee.php');
    
} else {
    echo "Error deleting data: " . $conn->error;
    $_SESSION['delete'] = "<div class='error'>&nbsp Error: Try Again Later </div>";
    header('location:' . SITEURL . 'admin/employee.php');
}

// Close connection
$conn->close();
?>