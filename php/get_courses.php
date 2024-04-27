<?php
// Include database connection
include 'db_functions.php'; // Replace with actual database connection file

// Get courses from the database
$courses = getCourses(); // Assume you have a function to get courses from the database

// Return courses as JSON
echo json_encode($courses);
?>
