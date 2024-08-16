<?php
// process-form.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $facebook = isset($_POST['facebook']) ? htmlspecialchars($_POST['facebook']) : '';
    $instagram = isset($_POST['instagram']) ? htmlspecialchars($_POST['instagram']) : '';
    $twitter = isset($_POST['twitter']) ? htmlspecialchars($_POST['twitter']) : '';

    // Format the data
    $formattedData = "New Interest Form Submission\n";
    $formattedData .= "Date: " . date('Y-m-d H:i:s') . "\n";
    $formattedData .= "Name: $name\n";
    $formattedData .= "Email: $email\n";
    $formattedData .= "Phone: $phone\n";
    $formattedData .= "Facebook: $facebook\n";
    $formattedData .= "Instagram: $instagram\n";
    $formattedData .= "Twitter: $twitter\n";
    $formattedData .= "-----------------------------\n\n";

    // Specify the file to save responses
    $file = 'responses.txt';

    // Append the formatted data to the file
    if (file_put_contents($file, $formattedData, FILE_APPEND | LOCK_EX) !== false) {
        // Success response
        echo json_encode(['status' => 'success', 'message' => 'Form submitted successfully']);
    } else {
        // Error response if unable to write to file
        echo json_encode(['status' => 'error', 'message' => 'Unable to save form data']);
    }
} else {
    // If not a POST request, return an error
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
