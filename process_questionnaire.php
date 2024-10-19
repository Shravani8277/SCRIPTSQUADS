<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.html"); // Redirect to login page if not logged in
    exit;
}

// Get the username from the session
$username = htmlspecialchars($_SESSION['username']); // Sanitize username for safety

// Collect responses
$responses = [];
for ($i = 1; $i <= 15; $i++) {
    $responses["question$i"] = isset($_POST["question$i"]) ? $_POST["question$i"] : null;
}

// Example logic to determine potential issues based on responses
$analysis = [];

// Simplified example analysis logic based on user responses
if ($responses["question1"] == "Frequently" || $responses["question1"] == "Almost all the time") {
    $analysis[] = "Anxiety Disorders";
}

if ($responses["question2"] == "Frequently" || $responses["question2"] == "Almost every day") {
    $analysis[] = "Depression";
}

if ($responses["question5"] == "Frequently" || $responses["question5"] == "Almost all the time") {
    $analysis[] = "Panic Disorder";
}

// Add more conditions as needed based on your dataset and logic

// Display the results
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analysis Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        .result {
            margin-bottom: 20px;
            font-size: 18px;
        }
        .note {
            font-size: 14px;
            color: gray;
        }
    </style>
</head>
<body>
    <h1>Analysis Based on Your Responses</h1>
    <div class="result">
        Dear <?php echo $username; ?>, based on your responses, you may have:
        <ul>
            <?php
            if (empty($analysis)) {
                echo "<li>No significant issues detected.</li>";
            } else {
                foreach ($analysis as $issue) {
                    echo "<li>$issue</li>";
                }
            }
            ?>
        </ul>
    </div>
    
    <div class="note">
        Note: This is a general analysis. Please consult a mental health professional for accurate diagnosis and treatment.
    </div>
</body>
</html>
