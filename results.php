<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.html"); // Redirect to login page if not logged in
    exit;
}

// Check if responses are available
if (!isset($_SESSION['responses'])) {
    echo "No responses found.";
    exit;
}

// Retrieve responses
$responses = $_SESSION['responses'];
$username = htmlspecialchars($_SESSION['username']); // Sanitize username for safety

// Analyze responses (this is just a basic example, you can expand this logic)
$analysis = "Based on your responses: ";
if ($responses[0] > 2) {
    $analysis .= "You may experience anxiety symptoms. ";
}
if ($responses[1] > 2) {
    $analysis .= "You may be feeling depressed. ";
}
// Add more analysis based on your criteria...

// Clear the responses from the session
unset($_SESSION['responses']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Results</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Analysis Based on Your Responses</h1>
    <p>Dear <?php echo $username; ?>, based on your responses:</p>
    <ul>
        <?php
        foreach ($responses as $index => $response) {
            echo "<li>Question " . ($index + 1) . ": " . ($response == 0 ? "Never" : ($response == 1 ? "Occasionally" : ($response == 2 ? "Frequently" : "Almost all the time"))) . "</li>";
        }
        ?>
    </ul>
    <p><?php echo $analysis; ?></p>
    <p><em>Note: This is a general analysis. Please consult a mental health professional for accurate diagnosis and treatment.</em></p>
</body>
</html>