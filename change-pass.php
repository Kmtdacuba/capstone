<!DOCTYPE html>
<html>

<head>
    <title>Change Password</title>
</head>

<body>
    <h2>Change Password</h2>
    <form method="post" action="change-pass.php">
        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br>
        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        <input type="submit" value="Change Password">
    </form>

</body>

</html>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Verify if passwords match
    if ($new_password === $confirm_password) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update password in the database
        $email = $_SESSION['email'];
        $sql = "UPDATE tbl_admin SET password='$hashed_password' WHERE email='$email'";

        // Database connection and query execution code here...

        echo "Password changed successfully!";
        header('location: index.php');
    } else {
        echo "Passwords do not match.";
    }
}
?>