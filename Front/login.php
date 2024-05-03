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
            $_SESSION['id'] = $user['id'];
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
    <link rel="stylesheet" type="text/css" href="/Projects/Elearning/css/Styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>login</title>
</head>
<body>
    <header>
        <div class="logo img" style="height: 100px; width: 100px;">
            <img src="../images/2.png">
        </div>
        <div class="navbar">
            <a class="active" href="home.html"><i class="fa fa-fw fa-home"></i> Home</a>
            <a href="login.html" target="_blank"><i class="fa fa-fw fa-user"></i> Login</a>
        </div>
    </header>  
  <section class="">
    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
              <div class="error-message">
                <?php if (isset($error_message)) : ?>
                  <p><?php echo $error_message; ?></p>
                <?php endif; ?>
              </div>
            
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-outline mb-4">
                  <label class="form-label" for="form1Example13" style="font-size: large;">Email address</label>
                  <input type="email" name = "email" id="form1Example13" class="form-control form-control-lg" style="border: 2px solid black"/>
                  
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form1Example23" style="font-size: large;">Password</label>
                  <input type="password" name = "password" id="form1Example23" class="form-control form-control-lg" style="border: 2px solid black"/>
                  
                </div>
      
                <div class="d-flex justify-content-around align-items-center mb-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                  </div>
                  
                </div>
                <div>
                    <a href="reset_pass.html">Forgot password?</a>
                </div>
                
                <div>
                    <button type="submit"  class="btn btn-primary btn-lg btn-block" style="width: 100%; margin: 10px;">Sign in</button>
                    <button type="button" onclick="window.location.href='registration.php'" class="btn btn-primary btn-lg btn-block" style="width: 100%; margin: 10px;">
                      Create account
                  </button>
                         <a href="registration.php"> create account </a>
                </div>
                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0 text-muted">OR continue with </p>
                </div>
                <div class="social-icons">
                          <a href="#"><i class="fab fa-facebook"></i></a>
                          <a href="#"><i class="fab fa-twitter"></i></a>
                          <a href="#"><i class="fab fa-instagram"></i></a>
                          <a href="#"><i class="fa-brands fa-google"></i></a>
                          
                      </div>
              </form>
            </div>
          </div>
        </div>
      </section>
  </section>  
  <footer>
    <p> Copyrights Bouzidi imed - Ghofrane dridi iteam 2023</p>
</footer>
</body>
</html>