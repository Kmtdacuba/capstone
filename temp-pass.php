<!DOCTYPE html>
<html>

<head>
    <title>Barangay 188 Tala Caloocan City</title>
</head>

<body>
    <h2>Login</h2>
    <form method="post" action="temp-pass.php">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="temp_password">Temporary Password:</label><br>
        <input type="password" id="temp_password" name="temp_password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>
<?php
include('config/connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $temp_password = $_POST['temp_password'];

    // Retrieve the user from the database using the email
    $sql = "SELECT * FROM tbl_admin WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashed_password = $user['password'];

        // Verify the temporary password against the hashed password
        if (password_verify($temp_password, $hashed_password)) {
            // Temporary password matches, set session variables and redirect to change password page
            $_SESSION['user_id'] = $user['id'];
            header("Location: change-pass.php");
            exit();
        } else {
            echo "Invalid email or temporary password.";
        }
    } else {
        echo "Invalid email or temporary password.";
    }
}

$conn->close();
?>