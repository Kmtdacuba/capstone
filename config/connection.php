<?php

    // Start session
    session_start();
   // Create constant to store non repeating values
   define('SITEURL','https://brgymanagment.online/');
   define('LOCALHOST', 'localhost');
   define('DB_USERNAME', 'u783461092_khayeng19');
   define('DB_PASSWORD', 'Feb#192021');
   define('DB_NAME', 'u783461092_capstone');
   // execure query and save data into databse
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());// database connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>
