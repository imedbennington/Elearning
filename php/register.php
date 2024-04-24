<?php
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
        // Check if passwords match
        if ($password == $confirmpass) {
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Connect to your database
            $conn = db_connect(); 
            // Prepare and execute SQL statement to insert user data into the database
            $stmt = $conn->prepare("INSERT INTO users (name, surname, email, password) VALUES (:name, :surname, :email, :password)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':surname', $surname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->execute();

            // Registration successful
            $message = "Registration successful!";
            $messageType = "success";
            header("Location: ../Front/user_profile.php");
        } else {
            // Passwords don't match
            $message = "Passwords do not match!";
            $messageType = "danger";
        }
    } else {
        // Required fields are not filled
        $message = "Please fill in all fields!";
        $messageType = "warning";
    }
}

// Function to establish database connection
function db_connect() {
    $server_name = "localhost";
    $user_name ="root";
    $password = "";
    $database = "elearning";

    try {
        $conn = new PDO("mysql:host=$server_name;dbname=$database", $user_name, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
