<?php

    // Start session
    session_start();
   // Create constant to store non repeating values
   define('SITEURL','https://brgymanagment.online/');
   define('LOCALHOST', 'localhost: 3307');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_NAME', 'capstone');
   // execure query and save data into databse
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());// database connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>