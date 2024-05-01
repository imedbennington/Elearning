<?php
require_once 'check_mail.php'; // Use require_once instead of include to halt execution if the file is not found
require_once 'db_functions.php';
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Establish a database connection
try {
    $conn = db_connect();
} catch (Exception $e) {
    // Handle database connection error
    exit("Failed to connect to the database.");
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the email input
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    if (!$email) {
        exit("Invalid email address.");
    }

    // Check if the email exists in the database
    try {
        $emailExists = checkEmailExists($conn, $email);
    } catch (Exception $e) {
        // Handle database query error
        exit("Error checking email existence.");
    }

    if ($emailExists) {
        // Generate a unique token
        $token = bin2hex(random_bytes(16));

        // Save the token and email in the database
        try {
            saveTokenInDatabase($conn, $token, $email); // Implement this function to insert token into the database
        } catch (Exception $e) {
            // Handle database insertion error
            exit("Error saving token in the database.");
        }

        // Compose the email
        $to = $email;
        $subject = "Password Reset";
        $message = "Click the link below to reset your password:\n\n";
        $message .= "https://yourwebsite.com/reset_password.php?token=$token";

        // Instantiate PHPMailer
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@example.com';
            $mail->Password = 'your_password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('your_email@example.com', 'Your Name');
            $mail->addAddress($to);

            //Content
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $message;

            // Send the email
            $mail->send();
            echo "Password reset instructions sent to your email.";
        } catch (Exception $e) {
            // Handle email sending error
            echo "Failed to send password reset instructions.";
        }
    } else {
        echo "Email does not exist in the database.";
    }
}
?>