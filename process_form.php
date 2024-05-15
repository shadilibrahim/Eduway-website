<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ? $_POST["email"] : null;
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate email
    if ($email !== null) {
        // Construct the email message
        $to = "thejaskrizzz@gmail.com";
        $headers = "From: $email";
        $mailMessage = "Name: $name\n\nEmail: $email\n\nSubject: $subject\n\nMessage:\n$message";

        // Send the email
        if (mail($to, $subject, $mailMessage, $headers)) {
            // Redirect or display a success message
            header("Location: index.html"); // Replace with your thank you page
            exit();
        } else {
            echo "Error sending email. Please try again later.";
        }
    } else {
        echo "Invalid email address. Please enter a valid email.";
    }
}
?>
