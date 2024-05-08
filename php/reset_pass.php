<?php
require_once 'check_mail.php';
require_once 'db_functions.php';
require_once '../vendor/autoload.php';
require_once 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$smtpHost = Config::$smtpHost;
$smtpPort = Config::$smtpPort;
$smtpUsername = Config::$smtpUsername;
$smtpPassword = Config::$smtpPassword;
try {
    $conn = db_connect();
} catch (Exception $e) {
    exit("Failed to connect to the database.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailAddress = $_POST['email'];
    $password = $_POST['password'];
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    if (!$email) {
        exit("Invalid email address.");
    }

    try {
        $emailExists = checkEmailExists($conn, $email);
    } catch (Exception $e) {
        exit("Error checking email existence.");
    }

    if ($emailExists) {
        $token = bin2hex(random_bytes(16));

        try {
            saveTokenInDatabase($conn, $token, $email);
        } catch (Exception $e) {
            exit("Error saving token in the database.");
        }

        $to = $email;
        $subject = "Password Reset";
        $message = "Click the link below to reset your password:\n\n";
        $message .= "https://yourwebsite.com/reset_password.php?token=$token";

        $mail = new PHPMailer(true);

        // var_dump($email->isSMTP());

        try {
//            $mail->isSMTP();
//            $mail->Host = $smtpHost;
//            $mail->SMTPAuth = true;
//            $mail->AuthType = 'LOGIN';
//            $mail->Username = $smtpUsername;
//            $mail->Password = $smtpPassword;
//            $mail->SMTPSecure = 'tls';
//            $mail->Port = $smtpPort;


//            $mail->setFrom('your_email@example.com', 'Your Name');
//            $mail->addAddress($to);
//
//            $mail->isHTML(false);
            $mail->AddReplyTo('name@yourdomain.com', 'First Last');
            $mail->AddAddress('whoto@otherdomain.com', 'John Doe');
            $mail->SetFrom('bouzidy.imed@gmail.com', 'First Last');
            $mail->AddReplyTo('name@yourdomain.com', 'First Last');
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            echo "Password reset instructions sent to your email.";
        } catch (Exception $e) {
            echo "Failed to send password reset instructions. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email does not exist in the database.";
    }
}
?>
