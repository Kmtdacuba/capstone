<?php
include('../config/connection.php');
ob_start();
$id = $_GET['id'];

$sql_select = "SELECT * FROM tbl_admin WHERE id=$id";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        // Step 4: Insert the retrieved data into the second table
        while ($row = $result->fetch_assoc()) {
            $data_to_insert = $row['Fname'];
            $data_to_insert1 = $row['img_name'];
            $data_to_insert2 = $row['username'];
            $data_to_insert3 = $row['password'];
            
            $sql_insert = "INSERT INTO admin_archive (Fname, img_name, username, password) VALUES ('$data_to_insert', '$data_to_insert1', '$data_to_insert2', '$data_to_insert3')";
            
            if ($conn->query($sql_insert) === FALSE) {
                echo "Error: " . $sql_insert . "<br>" . $conn->error;
                $_SESSION['delete'] = "<div class='error'>&nbsp Error: Try Again Later </div>";
                header('location:' . SITEURL . 'admin/admin.php');
            }
        }
        echo "Data successfully moved to second table.";
        $_SESSION['delete'] = "<div class='success'>&nbsp Admin Deleted Successfully </div>";
        header('location:' . SITEURL . 'admin/admin.php');
    } else {
        echo "No data found to move.";
        $_SESSION['delete'] = "<div class='error'>&nbsp Error: Try Again Later </div>";
    header('location:' . SITEURL . 'admin/admin.php');
    }

// Step 2: Delete data from the first table
$sql_delete = "DELETE FROM tbl_admin WHERE id=$id";

if ($conn->query($sql_delete) === TRUE) {
    // Step 3: Retrieve the deleted data
    $_SESSION['delete'] = "<div class='success'>&nbsp Admin Deleted Successfully </div>";
    header('location:' . SITEURL . 'admin/admin.php');
    
} else {
    echo "Error deleting data: " . $conn->error;
    $_SESSION['delete'] = "<div class='error'>&nbsp Error: Try Again Later </div>";
    header('location:' . SITEURL . 'admin/admin.php');
}

// Close connection
$conn->close();
?>