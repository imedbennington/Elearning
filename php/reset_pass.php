<?php
include('check_mail.php');
include('db_functions.php');
$conn = db_connect();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Check if the email exists in the database
    $emailExists = checkEmailExists($conn, $email);

    if($emailExists) {
        // Generate a unique token
        $token = bin2hex(random_bytes(16));

        // Save the token and email in the database
        // This step involves inserting the token and email into your database table for password reset requests

        // Compose the email
        $to = $email;
        $subject = "Password Reset";
        $message = "Click the link below to reset your password:\n\n";
        $message .= "https://yourwebsite.com/reset_password.php?token=$token";
        $headers = "From: your_email@example.com\r\n";
        $headers .= "Reply-To: your_email@example.com\r\n";

        // Send the email
        if(mail($to, $subject, $message, $headers)) {
            echo "Password reset instructions sent to your email.";
        } else {
            echo "Failed to send password reset instructions.";
        }
    } else {
        echo "Email does not exist in the database.";
    }
}
?>
