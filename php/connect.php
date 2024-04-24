<?php
include("db_functions.php");
$connection = db_connect();
function getUserByEmail($email, $connection) {
    // Sanitize the email to prevent SQL injection
    $safe_email = mysqli_real_escape_string($connection, $email);

    // Query to select user by email
    $query = "SELECT * FROM users WHERE email = '$safe_email'";

    // Perform the query
    $result = mysqli_query($connection, $query);

    // Check if query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        // User found, return user data as an associative array
        $user = mysqli_fetch_assoc($result);
        return $user;
    } else {
        // User not found
        return null;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Get user by email
    $user = getUserByEmail($email, $your_db_connection); // Pass the database connection variable

    // Check if user exists and password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Password is correct
        // Start a session and store user data if necessary
        session_start();
        $_SESSION['user_id'] = $user['id']; // Assuming 'id' is the column name for the user ID

        // Redirect to the profile page
        header("Location: profile.php");
        exit();
    } else {
        // Invalid email or password
        echo "Invalid email or password";
    }
}
?>
