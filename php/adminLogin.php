<?php
// Start session
session_start();

// Include database connection
include '../php/db_functions.php'; // Replace 'database_connection.php' with your actual database connection file
$conn = db_connect();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    try {
        // Prepare SQL statement
        $sql = "SELECT * FROM admin WHERE mail = :email AND password = :password";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':mail', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        
        // Execute statement
        $stmt->execute();
        
        // Fetch user
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Check if user exists
        if ($user) {
            // User authenticated, redirect to user_profile.php
            $_SESSION['email'] = $email;
            var_dump($user);
            header("Location: /Project/Elearning/Front/admin/admin_dashboard.php");
            exit();
        } else {
            // User not found, display error message
            $error_message = "Invalid email or password";
        }
    } catch (PDOException $e) {
        // Error executing query, display error message
        $error_message = "Error: " . $e->getMessage();
    }
}
?>