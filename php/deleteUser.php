<?php
// Include database connection
include('db_functions.php');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the user ID from the request body
    if(isset($_POST['id']) && !empty($_POST['id'])) {
        // Get the user ID from the POST data
        $userId = $_POST['id'];
        var_dump($userId);
        $userIdHtml = "<div>User ID: $userId</div>";
        // Connect to the database
        $pdo = new PDO("mysql:host=localhost;dbname=elearning", "root", "");

        // Prepare the SQL statement to delete the user
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Bind the user ID parameter
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

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
<?php echo $userIdHtml; ?>