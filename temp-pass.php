<!DOCTYPE html>
<html>

<head>
    <title>Barangay 188 Tala Caloocan City</title>
</head>

<body>
    <h2>Login</h2>
    <form method="post" action="temp-pass.php"">
        <label for=" email">Email:</label><br>
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
    $temp_password1 = $_POST['temp_password1'];

    // Retrieve the user from the database using the email - ADMIN
    $sql1 = "SELECT * FROM tbl_admin WHERE email='$email'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        $user = $result1->fetch_assoc();
        $hashed_password1 = $user['password'];

        // Verify the temporary password against the hashed password
        if (password_verify($temp_password1, $hashed_password1)) {
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

elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $temp_password2 = $_POST['temp_password2'];

    // Retrieve the user from the database using the email - EMPLOYEE
    $sql2 = "SELECT * FROM tbl_employee WHERE email='$email'";
    $result2 = $conn->query($sql1);

    if ($result2->num_rows > 0) {
        $user = $result2->fetch_assoc();
        $hashed_password2 = $user['password'];

        // Verify the temporary password against the hashed password
        if (password_verify($temp_password2, $hashed_password2)) {
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

elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $temp_password3 = $_POST['temp_password3'];

    // Retrieve the user from the database using the email - EMPLOYEE
    $sql3 = "SELECT * FROM tbl_resident WHERE email='$email'";
    $result2 = $conn->query($sql1);

    if ($result3->num_rows > 0) {
        $user = $result3->fetch_assoc();
        $hashed_password23= $user['password'];

        // Verify the temporary password against the hashed password
        if (password_verify($temp_password3, $hashed_password3)) {
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