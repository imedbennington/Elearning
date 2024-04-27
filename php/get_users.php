<?php
// Include database connection
include 'db_functions.php'; // Replace with actual database connection file
function getUsers() {
    try {
        // Initialize database connection
        $conn = db_connect(); // Assuming db_connect() is a function in db_functions.php
        
        // Prepare SQL statement
        $sql = "SELECT * FROM users"; // Assuming 'users' is the table name
        
        // Execute query
        $stmt = $conn->query($sql);
        
        // Fetch users
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Close database connection
        $conn = null;
        
        // Return users
        return $users;
    } catch (PDOException $e) {
        // Handle database connection error
        return array('error' => 'Database error: ' . $e->getMessage());
    }
}
// Get users from the database
$users = getUsers(); // Assume you have a function to get users from the database

// Return users as JSON
echo json_encode($users);
?>
