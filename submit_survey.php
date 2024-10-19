<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.html"); // Redirect to login page if not logged in
    exit;
}

// Get the username from the session
$username = htmlspecialchars($_SESSION['username']); // Sanitize username for safety
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Questionnaire</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('question.jpg'); /* Replace with your image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-top: 30px;
        }
        form {
            max-width: 600px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.8); /* Slight transparency */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        p {
            font-weight: bold;
            color: #444;
        }
        label {
            font-weight: normal;
            display: block;
            margin: 10px 0;
            color: #333;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        button {
            display: block;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>Mental Health Questionnaire</h2>

<form action="process_questionnaire.php" method="POST">
    <p>1. How often do you feel excessively worried or anxious?</p>
    <label><input type="radio" name="question1" value="Never" required> Never</label>
    <label><input type="radio" name="question1" value="Occasionally"> Occasionally</label>
    <label><input type="radio" name="question1" value="Frequently"> Frequently</label>
    <label><input type="radio" name="question1" value="Almost all the time"> Almost all the time</label>

    <p>2. Do you experience persistent feelings of sadness, hopelessness, or emptiness?</p>
    <label><input type="radio" name="question2" value="Rarely" required> Rarely</label>
    <label><input type="radio" name="question2" value="Sometimes"> Sometimes</label>
    <label><input type="radio" name="question2" value="Frequently"> Frequently</label>
    <label><input type="radio" name="question2" value="Almost every day"> Almost every day</label>

    <p>3. How often do you have trouble sleeping (e.g., difficulty falling asleep, staying asleep, or waking up too early)?</p>
    <label><input type="radio" name="question3" value="Never" required> Never</label>
    <label><input type="radio" name="question3" value="Occasionally"> Occasionally</label>
    <label><input type="radio" name="question3" value="Frequently"> Frequently</label>
    <label><input type="radio" name="question3" value="Almost every day"> Almost every day</label>

    <p>4. Do you often feel overwhelmed by stress, even with everyday tasks?</p>
    <label><input type="radio" name="question4" value="Never" required> Never</label>
    <label><input type="radio" name="question4" value="Occasionally"> Occasionally</label>
    <label><input type="radio" name="question4" value="Frequently"> Frequently</label>
    <label><input type="radio" name="question4" value="Almost all the time"> Almost all the time</label>

    <p>5. Have you experienced sudden and unexpected panic attacks or feelings of intense fear?</p>
    <label><input type="radio" name="question5" value="Never" required> Never</label>
    <label><input type="radio" name="question5" value="Occasionally"> Occasionally</label>
    <label><input type="radio" name="question5" value="Frequently"> Frequently</label>
    <label><input type="radio" name="question5" value="Almost all the time"> Almost all the time</label>
    
    <p>6. Do you avoid social situations because of fear of being judged, embarrassed, or humiliated?</p>
    <label><input type="radio" name="question6" value="Rarely" required> Rarely</label>
    <label><input type="radio" name="question6" value="Sometimes"> Sometimes</label>
    <label><input type="radio" name="question6" value="Often"> Often</label>
    <label><input type="radio" name="question6" value="Almost always"> Almost always</label>

    <p>7. Do you find yourself engaging in repetitive behaviors or rituals (like checking, cleaning, counting) to reduce anxiety?</p>
    <label><input type="radio" name="question7" value="Never" required> Never</label>
    <label><input type="radio" name="question7" value="Occasionally"> Occasionally</label>
    <label><input type="radio" name="question7" value="Frequently"> Frequently</label>
    <label><input type="radio" name="question7" value="Almost all the time"> Almost all the time</label>

    <p>8. Have you experienced or witnessed a traumatic event, and do you have flashbacks, nightmares, or distressing memories about it?</p>
    <label><input type="radio" name="question8" value="No" required> No</label>
    <label><input type="radio" name="question8" value="Yes, but rarely"> Yes, but rarely</label>
    <label><input type="radio" name="question8" value="Yes, but occasionally"> Yes, but occasionally</label>
    <label><input type="radio" name="question8" value="Yes, but frequently"> Yes, but frequently</label>

    <p>9. How often do you have difficulty concentrating, staying organized, or completing tasks?</p>
    <label><input type="radio" name="question9" value="Never" required> Never</label>
    <label><input type="radio" name="question9" value="Occasionally"> Occasionally</label>
    <label><input type="radio" name="question9" value="Frequently"> Frequently</label>
    <label><input type="radio" name="question9" value="Almost all the time"> Almost all the time</label>

    <p>10. Have you noticed any significant changes in your eating habits, like overeating or undereating?</p>
    <label><input type="radio" name="question10" value="No change" required> No change</label>
    <label><input type="radio" name="question10" value="Mild change"> Mild change</label>
    <label><input type="radio" name="question10" value="Noticeable change"> Noticeable change</label>
    <label><input type="radio" name="question10" value="Severe change"> Severe change</label>

    <p>11. Do you have a habit of using substances (like alcohol, drugs) to cope with stress or emotions?</p>
    <label><input type="radio" name="question11" value="Never" required> Never</label>
    <label><input type="radio" name="question11" value="Occasionally"> Occasionally</label>
    <label><input type="radio" name="question11" value="Frequently"> Frequently</label>
    <label><input type="radio" name="question11" value="Almost all the time"> Almost all the time</label>

    <p>12. Have you experienced extreme mood swings (from feeling extremely happy or energetic to very sad or irritable)?</p>
    <label><input type="radio" name="question12" value="Never" required> Never</label>
    <label><input type="radio" name="question12" value="Occasionally"> Occasionally</label>
    <label><input type="radio" name="question12" value="Frequently"> Frequently</label>
    <label><input type="radio" name="question12" value="Almost all the time"> Almost all the time</label>

    <p>13. How often do you find yourself feeling restless, hyperactive, or impulsive?</<p>13. How often do you find yourself feeling restless, hyperactive, or impulsive?</p>
    <label><input type="radio" name="question13" value="Never" required> Never</label>
    <label><input type="radio" name="question13" value="Occasionally"> Occasionally</label>
    <label><input type="radio" name="question13" value="Frequently"> Frequently</label>
    <label><input type="radio" name="question13" value="Almost all the time"> Almost all the time</label>

    <p>14. Do you have persistent feelings of low self-esteem or a sense of worthlessness?</p>
    <label><input type="radio" name="question14" value="Never" required> Never</label>
    <label><input type="radio" name="question14" value="Occasionally"> Occasionally</label>
    <label><input type="radio" name="question14" value="Frequently"> Frequently</label>
    <label><input type="radio" name="question14" value="Almost every day"> Almost every day</label>    

    <p>15. Do you find it challenging to maintain stable relationships, or do you experience frequent conflicts with others?</p>
    <label><input type="radio" name="question15" value="No" required> No</label>
    <label><input type="radio" name="question15" value="Sometimes"> Sometimes</label>
    <label><input type="radio" name="question15" value="Frequently"> Frequently</label>
    <label><input type="radio" name="question15" value="Almost always"> Almost always</label>

    <!-- Repeat this pattern for each question -->

    <button type="submit">Submit Questionnaire</button>
</form>

</body>
</html>