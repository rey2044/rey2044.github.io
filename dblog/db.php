<?php
$host = 'localhost';
$dbUsername = 'your_username';
$dbPassword = 'your_password';
$dbName = 'login_system';

// Establishing database connection
$conn= new mysqli('localhost','root','','login_system')or die("Could not connect to mysql".mysqli_error($con));


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
