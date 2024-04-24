<?php
// Start session
session_start();

// Include database connection
include 'db_functions.php'; // Replace 'database_connection.php' with your actual database connection file
$conn = db_connect();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    try {
        // Prepare SQL statement
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        
        // Execute statement
        $stmt->execute();
        
        // Fetch user
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Check if user exists
        if ($user) {
            // User authenticated, redirect to user_profile.php
            $_SESSION['email'] = $email;
            header("Location: ../front/user_profile.php");
            exit();
        } else {
            // User not found, display error message
            echo "Invalid email or password";
        }
    } catch (PDOException $e) {
        // Error executing query, display error message
        echo "Error: " . $e->getMessage();
    }
}

// Close database connection
$pdo = null;
?>
