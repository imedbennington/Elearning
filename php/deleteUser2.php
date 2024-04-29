<?php
include ('db_functions.php');
$conn = db_connect();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userId'])) {
    $userId = $_POST['userId'];

    try {
        // Perform deletion query
        $query = "DELETE FROM users WHERE id = :userId";
        $statement = $conn->prepare($query);
        $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
        $result = $statement->execute();

        if ($result) {
            // Deletion successful
            echo "User deleted successfully!";
        } else {
            // Error occurred
            echo "Error deleting user!";
        }
    } catch (PDOException $e) {
        // Handle PDOException
        echo "Error: " . $e->getMessage();
    }
}
?>


