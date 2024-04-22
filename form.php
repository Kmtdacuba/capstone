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
$sql = "SELECT * FROM tbl_admin WHERE email = '$email'";
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
$temp_password = generateRandomPassword();

// Update the user's password in the database
$hashed_password = md5($temp_password, PASSWORD_DEFAULT);
$sql_update1 = "UPDATE tbl_admin SET password = '$hashed_password' WHERE email = '$email'";
$conn->query($sql_update1);

// Send the temporary password via email
$to = $email;
$subject = 'Password Reset';
$message = 'Your temporary password is: <span style="font-size: larger; font-weight: bold;">' . $temp_password . '</span>
 Please use this password to log in and change your password.';
$headers = 'From: ' . $from_name . ' <' . $from_email . '>' ; if (mail($to, $subject, $message, $headers)) {
    echo "Temporary password sent to your email. Please check your inbox." ; 
    header('location: temp-pass.php'); 
} else {
    echo "Failed to send temporary password. Please try again later." ; } 
} 

// FOR EMPLOYEE

elseif ($result2->num_rows > 0) {
    // Generate a temporary password
    $temp_password = generateRandomPassword();
    
    // Update the user's password in the database
    $hashed_password = md5($temp_password, PASSWORD_DEFAULT);
    $sql_update2 = "UPDATE tbl_employee SET password = '$hashed_password' WHERE email = '$email'";
    $conn->query($sql_update2);
    
    // Send the temporary password via email
    $to = $email;
    $subject = 'Password Reset';
    $message = 'Your temporary password is: <span style="font-size: larger; font-weight: bold;">' . $temp_password . '</span>
     Please use this password to log in and change your password.';
    $headers = 'From: ' . $from_name . ' <' . $from_email . '>' ; if (mail($to, $subject, $message, $headers)) {
        echo "Temporary password sent to your email. Please check your inbox." ; 
        header('location: temp-pass.php'); 
    } else {
        echo "Failed to send temporary password. Please try again later." ; } 
    } 

    // FOR RESIDENTS
elseif ($result3->num_rows > 0) {
    // Generate a temporary password
    $temp_password = generateRandomPassword();
    
    // Update the user's password in the database
    $hashed_password = md5($temp_password, PASSWORD_DEFAULT);
    $sql_update3 = "UPDATE tbl_employee SET password = '$hashed_password' WHERE email = '$email'";
    $conn->query($sql_update3);
    
    // Send the temporary password via email
    $to = $email;
    $subject = 'Password Reset';
    $message = 'Your temporary password is: <span style="font-size: larger; font-weight: bold;">' . $temp_password . '</span>
     Please use this password to log in and change your password.';
    $headers = 'From: ' . $from_name . ' <' . $from_email . '>' ; if (mail($to, $subject, $message, $headers)) {
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