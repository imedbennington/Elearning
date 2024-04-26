<?php
session_start(); // Start the session

include_once('db_functions.php');
include_once('check_mail.php');
$conn = db_connect();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpass = $_POST['confirmpass'];

    // Validate if all required fields are filled
    if (!empty($name) && !empty($surname) && !empty($email) && !empty($password) && !empty($confirmpass)) {
            // Check if the email already exists in the database
            if (!checkEmailExists($conn, $email)) {
                // Hash the password for security
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                // Prepare and execute SQL statement to insert user data into the database
                $stmt = $conn->prepare("INSERT INTO users (name, surname, email, password) VALUES (:name, :surname, :email, :password)");
                
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':surname', $surname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->execute();

                // Registration successful
                $_SESSION['message_user'] = "Registration successful!";
                $_SESSION['messageType'] = "success";
                header("Location: ../Front/user_profile.php");
                exit();
                
            } else {
                // Email already exists
                $_SESSION['message_user'] = "Email already exists!";
                $_SESSION['email_error'] = true; 
                header("Location: ../Front/registration.php");
                // Signal JavaScript que l'e-mail existe déjà
                exit();
            }
    } else {
        // Required fields are not filled
        $_SESSION['message_user'] = "Please fill in all fields!";
        //$_SESSION['messageType'] = "warning";
    }
}

// Redirect to the registration page if there's no POST data
exit();
?>
