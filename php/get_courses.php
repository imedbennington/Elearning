<?php
// Include database connection
include 'db_functions.php'; // Replace with actual database connection file

function getCourses() {
    try {
        // Initialize database connection
        $conn = db_connect(); // Assuming db_connect() is a function in db_functions.php
        
        // Prepare SQL statement
        $sql = "SELECT * FROM courses"; // Assuming 'courses' is the table name
        
        // Execute query
        $stmt = $conn->query($sql);
        
        // Fetch courses
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Close database connection
        $conn = null;
        
        // Return courses
        return $courses;
    } catch (PDOException $e) {
        // Handle database connection error
        return array('error' => 'Database error: ' . $e->getMessage());
    }
}

// Get courses from the database
$courses = getCourses(); // Assume you have a function to get courses from the database

// Return courses as JSON
echo json_encode($courses);
?>
