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

    // Check if the username already exists in the database
    $query = "SELECT id FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database

        $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

        if ($conn->query($query) === TRUE) {
            echo "Signup successful!";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
