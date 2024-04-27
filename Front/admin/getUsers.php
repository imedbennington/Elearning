<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/Projects/Elearning/css/users.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>List of Users</title>
</head>
<body>
    <h1>List of Users</h1>

    <?php
    // Include database connection
    include '../../php/db_functions.php'; // Replace with actual database connection file

    // Function to get users from the database
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
    $users = getUsers();

    // Check if there are users
    if ($users && !empty($users)) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr><th>Username</th><th>Email</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        // Loop through each user and display their information in a table row
        foreach ($users as $user) {
            echo '<tr><td>' . $user['name'] . '</td><td>' . $user['email'] . '</td> <td><button>Delete</button></td></tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        // No users found
        echo '<p>No users found.</p>';
    }
    ?>
</body>
</html>
