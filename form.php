<?php
include('config/connection.php');
?>
<?php
$host = 'smtp.hostinger.com';
$port = ' 465'; // Port number may vary, check Hostinger's documentation
$username_smtp = 'info@brgymanagment.online';
$password_smtp = 'Barangay188#';
$from_email = 'info@brgymanagment.online';
$from_name = 'Barangay 188 Tala Caloocan City'; 

// Function to generate a random password
function generateRandomPassword($length = 10) {
return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
ceil($length/strlen($x)) )),1,$length);
}

if(isset($_POST['email'])) {
$email = $_POST['email'];

// Check if the email exists in the database - ADMIN
$sql1 = "SELECT * FROM tbl_admin WHERE email = '$email'";
$result1 = $conn->query($sql1);

// Check if the email exists in the database - EMPLOYEE
$sql2 = "SELECT * FROM tbl_employee WHERE email = '$email'";
$result2 = $conn->query($sql2);

// Check if the email exists in the database - RESIDENTS
$sql3 = "SELECT * FROM tbl_resident WHERE email = '$email'";
$result3 = $conn->query($sql3);

// FOR ADMIN
if ($result1->num_rows > 0) {
// Generate a temporary password
$temp_password1 = generateRandomPassword();

// Update the user's password in the database
$hashed_password1 = md5($temp_password1, PASSWORD_DEFAULT);
$sql_update1 = "UPDATE tbl_admin SET password = '$hashed_password1' WHERE email = '$email'";
$conn->query($sql_update1); 

// Send the temporary password via email
$to1 = $email;
$subject1 = 'Password Reset';
$message1 = 'Your temporary password is: ' . $temp_password1 . '
Please use this password to log in and change your password.';
$headers1 = 'From: ' . $from_name . ' <' . $from_email . '>' ; if (mail($to1, $subject1, $message1, $headers1)) {
    echo "Temporary password sent to your email. Please check your inbox." ; 
    header('location: temp-pass.php'); 
} else {
    echo "Failed to send temporary password. Please try again later." ; } 
} 

// FOR EMPLOYEE

elseif ($result2->num_rows > 0) {
    // Generate a temporary password
    $temp_password2 = generateRandomPassword();
    
    // Update the user's password in the database
    $hashed_password2 = md5($temp_password2, PASSWORD_DEFAULT);
    $sql_update2 = "UPDATE tbl_employee SET password = '$hashed_password2' WHERE email = '$email'";
    $conn->query($sql_update2);
    
    // Send the temporary password via email
    $to2 = $email;
    $subject2 = 'Password Reset';
    $message2 = 'Your temporary password is: ' . $temp_password2 . '
    Please use this password to log in and change your password.';
    
    $headers2 = 'From: ' . $from_name . ' <' . $from_email . '>' ; if (mail($to2, $subject2, $message2, $headers2)) {
        echo "Temporary password sent to your email. Please check your inbox." ; 
        header('location: temp-pass.php'); 
    } else {
        echo "Failed to send temporary password. Please try again later." ; } 
    } 

    // FOR RESIDENTS
elseif ($result3->num_rows > 0) {
    // Generate a temporary password
    $temp_password3 = generateRandomPassword();
    
    // Update the user's password in the database
    $hashed_password3 = md5($temp_password3, PASSWORD_DEFAULT);
    $sql_update3 = "UPDATE tbl_employee SET password = '$hashed_password3' WHERE email = '$email'";
    $conn->query($sql_update3);
    
    // Send the temporary password via email
    $to3 = $email;
    $subject3 = 'Password Reset';
    $message3 = 'Your temporary password is: ' . $temp_password3 . '
    Please use this password to log in and change your password.';
    $headers3 = 'From: ' . $from_name . ' <' . $from_email . '>' ; if (mail($to3, $subject3, $message3, $headers3)) {
        echo "Temporary password sent to your email. Please check your inbox." ; 
        header('location: temp-pass.php'); 
    } else {
        echo "Failed to send temporary password. Please try again later." ; } 
    } 
else {
    echo "Email not found in our records." ; 
} 


    }
    $conn->close();
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
</head>

<body>
    <h2>Forgot Password</h2>
    <form method="post" action="form.php">
        <label for=" email">Enter your email address:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Reset Password">
    </form>
</body>

</html>