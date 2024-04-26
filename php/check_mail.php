<?php
include_once('db_functions.php');
$conn = db_connect();

// Function to check if email exists in the database
function checkEmailExists($conn, $email) {
     
        // Prepare SQL statement to select email
        $sql = "SELECT COUNT(*) as count FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        // Fetch the result
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $row["count"];
        
        return $count > 0; // Return true if email exists, false otherwise
    
}

// Main logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming email is submitted through a form field named 'email'
    $email = $_POST["email"];

    // Check if email exists
    $emailExists = checkEmailExists($conn, $email);

    // Return response
    if ($emailExists) {
        echo "Email already exists in the database.";
    } else {
        echo "Email does not exist in the database.";
    }
}
?>