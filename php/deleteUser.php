<?php
include('db_functions.php');
$conn = db_connect();
if(isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    // Assume you have a function to delete the user from the database
    $user_id = $_POST['user_id'];
$sql = "DELETE FROM users WHERE id = $user_id";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    $conn->close();

}
?>