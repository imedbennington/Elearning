<?php
// Include the file containing db_connect() function
include 'db_functions.php';

// Check database connection status
try {
    // Attempt to establish a database connection
    $conn = db_connect();

    // If connection is successful, return success
    $response = array('connected' => true);
} catch (PDOException $e) {
    // If connection fails, return error message
    $response = array('connected' => false, 'error' => $e->getMessage());
}

// Return the connection status as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

