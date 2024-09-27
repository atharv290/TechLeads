<?php
// save_score.php

// Database connection settings
$host = 'localhost'; // or your database host
$db = 'techleads'; // your database name
$user = 'root'; // your database username
$pass = ''; // your database password

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user ID and score from the POST request
$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0; // Ensure it's an integer
$score = isset($_POST['score']) ? intval($_POST['score']) : 0; // Ensure it's an integer

// Validate inputs
if ($user_id > 0 && $score >= 0) {
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO scores (user_id, game_name, score) VALUES (?, ?, ?)");
    $game_name = 'Math Game'; // Hardcoded game name
    $stmt->bind_param("isi", $user_id, $game_name, $score);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Score saved successfully!";
    } else {
        echo "Error saving score: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid user ID or score.";
}

// Close the connection
$conn->close();
?>
