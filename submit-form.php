<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and sanitize them
    $fullname = filter_var($_POST["fullname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST["subject"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = htmlspecialchars($_POST["message"]);

    // Prepare the email
    $to = "cabahitjaypee1@gmail.com"; // Your email address
    $subject = "New Contact Form Submission: " . $subject;
    $body = "Name: $fullname\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message\n";

    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your message. We'll get back to you soon.";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
}
?>
