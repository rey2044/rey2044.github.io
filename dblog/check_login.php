<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to index.html if not logged in
    header("Location: index.html");
    exit();
}
?>
