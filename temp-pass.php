<!DOCTYPE html>
<html>

<head>
    <title>Barangay 188 Tala Caloocan City</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="favicon.png">
</head>

<body class="bg">
    <div>
        <a href="">
            <img src="images/Logo Name.png" alt="" width=100%>
        </a>
    </div>
    <center>
        <div class="login">
            <h1>Temporary Password</h1><br>

            <?php
            if(isset($_SESSION['temp']))
            {
                echo $_SESSION['temp'];
                unset($_SESSION['temp']);
            }
            ?>
            <table class="table-size">
                <form method="post" action="temp-pass.php">
                    <tr>
                        <input class="login-responsive" type=" email" id="email" name="email"
                            placeholder="Input Email Address" required>
                    </tr>
                    <tr>
                        <input class="login-responsive" type="password" id="temp_password" name="temp_password"
                            placeholder="Input Temporary Password" required>
                    </tr><br>
                    <tr>
                        <input class="btn-second" type="submit" value="Verify">
                    </tr>
                </form>
            </table>
    </center>
    </div>
</body>

</html>
<?php
include('config/connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $temp_password = $_POST['temp_password'];

    // Retrieve the user from the database using the email - ADMIN
    $sql1 = "SELECT * FROM tbl_admin WHERE email='$email'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        $user = $result1->fetch_assoc();
        $hashed_password1 = $user1['password'];

        // Verify the temporary password against the hashed password
        if (password_verify($temp_password, $hashed_password1)) {
            // Temporary password matches, set session variables and redirect to change password page
          
            $_SESSION['user_id'] = $user1['id'];
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
    $temp_password = $_POST['temp_passwor'];

    // Retrieve the user from the database using the email - EMPLOYEE
    $sql2 = "SELECT * FROM tbl_employee WHERE email='$email'";
    $result2 = $conn->query($sql1);

    if ($result2->num_rows > 0) {
        $user = $result2->fetch_assoc();
        $hashed_password2 = $user2['password'];

        // Verify the temporary password against the hashed password
        if (password_verify($temp_password, $hashed_password2)) {
            // Temporary password matches, set session variables and redirect to change password page
            $_SESSION['user_id'] = $user2['id'];
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
    $temp_password = $_POST['temp_password'];

    // Retrieve the user from the database using the email - RESIDENT
    $sql3 = "SELECT * FROM tbl_resident WHERE email='$email'";
    $result2 = $conn->query($sql1);

    if ($result3->num_rows > 0) {
        $user = $result3->fetch_assoc();
        $hashed_password3= $user3['password'];

        // Verify the temporary password against the hashed password
        if (password_verify($temp_password, $hashed_password3)) {
            // Temporary password matches, set session variables and redirect to change password page
            $_SESSION['user_id'] = $user3['id'];
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