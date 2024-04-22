<!DOCTYPE html>
<html>

<head>
    <title>Change Password</title>
</head>

<body>
    <h2>Change Password</h2>
    <form method="post" action="change-pass.php">
        <label for=" new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br>
        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        <input type="submit" value="Change Password">
    </form>

</body>

</html>
<?php

/* FOR ADMIN */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password1 = $_POST['new_password1'];
    $confirm_password1 = $_POST['confirm_password1'];

    // Verify if passwords match
    if ($new_password1 === $confirm_password1) {
        // Hash the new password
        $hashed_password1 =  md5($new_password1, PASSWORD_DEFAULT);

        // Update password in the database
        $email = $_SESSION['email'];
        $sql1 = "UPDATE tbl_admin SET password='$hashed_password1' WHERE email='$email'";

        // Database connection and query execution code here...

        echo "Password changed successfully!";
        header('location: index.php');
    } else {
        echo "Passwords do not match.";
    }
}

/* FOR EMPLOYEE */
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password12 = $_POST['new_password2'];
    $confirm_password2 = $_POST['confirm_password2'];

    // Verify if passwords match
    if ($new_password2 === $confirm_password2) {
        // Hash the new password
        $hashed_password2 =  md5($new_password2, PASSWORD_DEFAULT);

        // Update password in the database
        $email = $_SESSION['email'];
        $sql2 = "UPDATE tbl_employee SET password='$hashed_password2' WHERE email='$email'";

        // Database connection and query execution code here...

        echo "Password changed successfully!";
        header('location: index.php');
    } else {
        echo "Passwords do not match.";
    }
}

elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password13 = $_POST['new_password3'];
    $confirm_password3 = $_POST['confirm_password3'];

    // Verify if passwords match
    if ($new_password3 === $confirm_password3) {
        // Hash the new password
        $hashed_password3 =  md5($new_password3, PASSWORD_DEFAULT);

        // Update password in the database
        $email = $_SESSION['email'];
        $sql3 = "UPDATE tbl_employee SET password='$hashed_password3' WHERE email='$email'";

        // Database connection and query execution code here...

        echo "Password changed successfully!";
        header('location: index.php');
    } else {
        echo "Passwords do not match.";
    }
}

?>