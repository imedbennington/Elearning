<?php
include('../php/db_functions.php');
if (isset($message) && isset($messageType)) {
  echo '<div class="alert alert-' . $messageType . '">' . $message . '</div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/Projects/Elearning/css/Styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <header>
        <div class="logo img" style="height: 100px; width: 100px;">
            <img src="/Projects/Elearning/images/2.png">
        </div>
        <div class="navbar">
            <a class="active" href="home.html"><i class="fa fa-fw fa-home"></i> Home</a>
            <a href="login.html" target="_blank"><i class="fa fa-fw fa-user"></i> Login</a>
        </div>
    </header>   
<section class="">
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 100%)">
      <div class="container">
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h1 class="my-5 display-3 fw-bold ls-tight">
              The best Site <br />
              <span class="text-primary">for you to learn freely</span>
            </h1>
            <p style="color: hsl(217, 10%, 50.8%)">
              by creating an account, you can upload and download books and documents
              attending online courses and passing certifications
            </p>
          </div>
  
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5">
                
                <form id="registrationForm" action="../php/register.php" method="post">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                         <label class="form-label" for="form3Example1">First name</label>
                         <input type="text" id="form3Example1" class="form-control" name ="name" style="border: 2px solid black"/>
                        
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="form3Example2">Last name</label>
                        <input type="text" id="form3Example2" class="form-control" name="surname" style="border: 2px solid black"/>
                        
                      </div>
                    </div>
                  </div>
  
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Email address</label>
                    <input type="email" id="form3Example3" class="form-control" name="email" style="border: 2px solid black"/>
                    
                  </div>
  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Password</label>
                    <input type="password" id="password" class="form-control" name ="password" style="border: 2px solid black"/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Confirm password</label> 
                    <input type="password" id="confirmpass" name = "confirmpass" class="form-control" onblur="checkPassword()" style="border: 2px solid black"/>
  
                  </div>
                  
                  <p id="error-message" class="error-message"></p>

                  <!-- Submit button -->
                  <button type="submit" id="submitBtn" class="btn btn-primary btn-block mb-4" style="width: 100%;">
                    Sign up
                  </button>
                </form>
                  <div class="right_side">
                    <div>
                      <h2>Register with social media</h2>
                      <div class="social-icons">
                          <a href="#"><i class="fab fa-facebook"></i></a>
                          <a href="#"><i class="fab fa-twitter"></i></a>
                          <a href="#"><i class="fab fa-instagram"></i></a>
                          <a href="#"><i class="fa-brands fa-google"></i></a>
                          
                      </div>
                  </div>                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->
</body>
<script src="/Projects/Elearning/js/index.js"></script>
</html>