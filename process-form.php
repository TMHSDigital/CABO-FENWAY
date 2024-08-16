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
    $formattedData = "New Interest Form Submission\n\n";
    $formattedData .= "Name: $name\n";
    $formattedData .= "Email: $email\n";
    $formattedData .= "Phone: $phone\n";
    $formattedData .= "Facebook: $facebook\n";
    $formattedData .= "Instagram: $instagram\n";
    $formattedData .= "Twitter: $twitter\n";
    $formattedData .= "Submitted on: " . date('Y-m-d H:i:s') . "\n";

    // Option 1: Save to a file
    $file = 'form_responses.txt';
    file_put_contents($file, $formattedData . "\n\n", FILE_APPEND);

    // Option 2: Send an email
    $to = 'your-email@example.com'; // Replace with your email address
    $subject = 'New Interest Form Submission - Cape Verdean Night';
    $headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $formattedData, $headers);

    // Send a response back to the client
    echo json_encode(['status' => 'success', 'message' => 'Form submitted successfully']);
} else {
    // If not a POST request, return an error
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
