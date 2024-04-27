<?php
// Start session
session_start();

// Include database connection
include '../../php/db_functions.php'; // Replace 'database_connection.php' with your actual database connection file
$conn = db_connect();
// Initialize $user variable
$user = null;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    try {
        // Prepare SQL statement
        $sql = "SELECT * FROM admin WHERE mail = :email AND password = :password";
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
            header("Location: ../admin/admin_dashboard.php");
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
$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/Projects/Elearning/css/stylesAdmin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="transparent-form">
        <h2>Admin Login</h2>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
              <div class="error-message">
                <?php if (isset($error_message)) : ?>
                  <p><?php echo $error_message; ?></p>
                  <?php unset($error_message); ?>
                <?php endif; ?>
              </div>
        </div>
        <form class="trans-form" id="admin_login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    
          <label for="email">Email:</label>
          <input type="email" id="form3Example3" onblur="validating()" name="email">

          <label for="password">Password:</label>
          <input type="password" id="pass_input" name="password">
    
          <button type="submit">Submit</button>
          <button type="submit">Cancel</button>
        </form>
      </div>
      <script src="../../js/index.js"></script>
</body>
</html>