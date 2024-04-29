<?php
// Include database connection
include('db_functions.php');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Retrieve the user ID from the request body
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    if(isset($data->id) && !empty($data->id)) {
        // Get the user ID from the JSON payload
        $userId = $data->id;

        // Log the received user ID for debugging
        $htmlOutput = "<div>Received user ID: $userId</div>";

        // Connect to the database
        $conn = db_connect();

        // Prepare the SQL statement to delete the user
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);

        // Bind the user ID parameter
        $stmt->bind_param("i", $userId);

        // Execute the statement
        if ($stmt->execute()) {
            // Send a success response
            http_response_code(200); // OK
            echo json_encode(array('message' => 'User deleted successfully'));
        } else {
            // Send an error response
            http_response_code(500); // Internal Server Error
            echo json_encode(array('error' => 'Error deleting user'));
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    } else {
        // Send a bad request response if user ID is not provided
        http_response_code(400); // Bad Request
        echo json_encode(array('error' => 'User ID is required'));
    }
} else {
    // Send a method not allowed response for non-POST requests
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('error' => 'Method Not Allowed'));
}
?>
