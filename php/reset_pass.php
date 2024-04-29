<?php
include('check_mail.php');
include('db_functions.php');
require 'vendor/autoload.php'; // Require the Composer autoloader for PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$conn = db_connect();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Check if the email exists in the database
    $emailExists = checkEmailExists($conn, $email);

    if ($emailExists) {
        // Generate a unique token
        try {
            $token = bin2hex(random_bytes(16));
        } catch (\Random\RandomException $e) {
        }

        // Save the token and email in the database
        // This step involves inserting the token and email into your database table for password reset requests

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
            $mail->Host = 'smtp.example.com';  // Specify your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@example.com'; // SMTP username
            $mail->Password = 'your_password'; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `ssl` also accepted
            $mail->Port = 587; // TCP port to connect to

            //Recipients
            $mail->setFrom('your_email@example.com', 'Your Name');
            $mail->addAddress($to);

            //Content
            $mail->isHTML(false); // Set email format to plain text
            $mail->Subject = $subject;
            $mail->Body = $message;

            // Send the email
            $mail->send();
            echo "Password reset instructions sent to your email.";
        } catch (Exception $e) {
            echo "Failed to send password reset instructions: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email does not exist in the database.";
    }
}
?>
