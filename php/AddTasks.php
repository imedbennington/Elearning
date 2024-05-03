<?php
// Handle task insertion
include ('db_functions.php');
$conn = db_connect();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];
    $date = $_POST['date'];
    $userId = $_POST['userId'];
    $userName = $_POST['userName'];

    // Prepare SQL statement for insertion
    $sql = "INSERT INTO tasks (description, date, userid, usermail) VALUES (?, ?, ?, ?)";
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssis", $task, $date, $userId, $userName);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Task inserted successfully.";
    } else {
        echo "Error inserting task: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

}
?>
