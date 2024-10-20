<?php
header("Content-Type: application/json");

// Get the input message from the frontend
$input = json_decode(file_get_contents("php://input"), true);
$message = isset($input['message']) ? trim($input['message']) : '';

$response = "";

// Define possible responses based on user input
if ($message) {
    $loweredMessage = strtolower($message); // Normalize input for easier matching

    if (strpos($loweredMessage, 'hello') !== false || strpos($loweredMessage, 'hi') !== false) {
        $response = "Hello! How can I assist you today?";
    } elseif (strpos($loweredMessage, 'login help') !== false) {
        $response = "Are you having trouble logging in? Make sure you entered the correct credentials.";
    } elseif (strpos($loweredMessage, 'forgot password') !== false) {
        $response = "If you forgot your password, try using the password recovery option.";
    } elseif (strpos($loweredMessage, 'how are you') !== false) {
        $response = "I'm just a bot, but thanks for asking! How can I help you?";
    } elseif (strpos($loweredMessage, 'what is your name') !== false) {
        $response = "I'm your friendly chatbot! What's your name?";
    } elseif (strpos($loweredMessage, 'my name is') !== false) {
        $name = substr($loweredMessage, strlen('my name is ')); // Extract name from user input
        $response = "Nice to meet you, " . htmlspecialchars(trim($name)) . "!";
    } else {
        $response = "Sorry, I don't understand that. Could you please rephrase?";
    }
} else {
    $response = "No message received.";
}

echo json_encode(['response' => $response]);
?>
