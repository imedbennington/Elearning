<?php
/*
// Start session
session_start();

// Include database connection
include '../php/db_functions.php'; // Replace 'database_connection.php' with your actual database connection file
$conn = db_connect();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    try {
        // Prepare SQL statement
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        
        // Execute statement
        $stmt->execute();
        
        // Fetch user
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Check if user exists
        if ($user) {
            // User authenticated, redirect to user_profile.php
            $_SESSION['email'] = $email;
            header("Location: user_profile.php");
            exit();
        } else {
            // User not found, display error message
            $error_message = "Invalid email or password";
        }
    } catch (PDOException $e) {
        // Error executing query, display error message
        $error_message = "Error: " . $e->getMessage();
    }
}
*/
// Print data retrieved from the database if available
/*if ($user) {
    echo "User Data:<br>";
    foreach ($user as $key => $value) {
        echo $key . ": " . $value . "<br>";
    }
}
*/
// Close database connection
//$conn = null;
?>

<?php
/*
// Start session
session_start();

// Include database connection
include '../php/db_functions.php'; // Replace 'database_connection.php' with your actual database connection file
$conn = db_connect();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Prepare SQL statement
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        // Execute statement
        $stmt->execute();

        // Fetch user
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user exists
        if ($user) {
            // User authenticated, set session variable
            $_SESSION['email'] = $email;
            // Print user data
            echo "User Data:<br>";
            foreach ($user as $key => $value) {
                echo $key . ": " . $value . "<br>";
            }
            // Exit script
            exit();
        } else {
            // User not found, display error message
            $error_message = "Invalid email or password";
        }
    } catch (PDOException $e) {
        // Error executing query, display error message
        $error_message = "Error: " . $e->getMessage();
    }
}

// Close database connection
$conn = null;*/
?>
<?php
// Start session
session_start();

// Include database connection
include '../php/db_functions.php'; // Replace 'database_connection.php' with your actual database connection file
$conn = db_connect();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Prepare SQL statement
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        // Execute statement
        $stmt->execute();

        // Fetch user
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user exists
        if ($user) {
            // User authenticated, set session variable
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            // Redirect to user profile page
            header("Location: user_profile.php");
            exit(); // Ensure that subsequent code is not executed after redirection
        } else {
            // User not found, display error message
            $error_message = "Invalid email or password";
        }
    } catch (PDOException $e) {
        // Error executing query, display error message
        $error_message = "Error: " . $e->getMessage();
    }
}

// Close database connection
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Email address:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
