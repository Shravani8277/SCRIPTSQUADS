<?php
session_start(); // Start a session for tracking login state

// Valid credentials
$valid_username = "admin";
$valid_password = "password123"; // This should be your real password

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted username and password
    $username = trim($_POST['username']); // Trim to avoid extra spaces
    $password = trim($_POST['password']); // Trim to avoid extra spaces

    // Check if the entered username and password match the valid credentials
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['loggedin'] = true; // Set session variable for logged in state
        $_SESSION['username'] = $username; // Save username in session
        header("Location: dashboard.php"); // Redirect to dashboard
        exit(); // Important to stop further script execution
    } else {
        echo "Invalid username or password!";
    }
}
?>