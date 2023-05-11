<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];

    // Sanitize the inputs to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $email = mysqli_real_escape_string($conn, $email);
    $name = mysqli_real_escape_string($conn, $name);
    $surname = mysqli_real_escape_string($conn, $surname);
    $phone = mysqli_real_escape_string($conn, $phone);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the data into the table
    $query = "INSERT INTO users (username, password, hash, email, name, surname, phone) VALUES ('$username', '$password', '$hashedPassword', '$email', '$name', '$surname', '$phone')";
    $result = $conn->query($query);

    if ($result) {
        // Insert successful
        echo "User registered successfully!";
    } else {
        // Error occurred
        echo "Error: " . $conn->error;
    }
}
?>
