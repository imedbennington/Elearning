<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyOckneL+O5pa0e5K/J7Z9o5hpv6Y1bp" crossorigin="anonymous">
    -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Your custom CSS -->
    <link rel="stylesheet" type="text/css" href="/Projects/Elearning/css/Styles.css" />


    <!--<link rel="stylesheet" type="text/css" href="/Projects/Elearning/css/userProfile.css" />-->
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .container-fluid {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            flex-shrink: 0; /* Prevent navbar from shrinking */
        }
        .row.flex-nowrap {
            flex-grow: 1;
            overflow-y: auto;
        }
        #menu {
            width: 100%; /* Ensure the menu takes up full width */
        }
        .nav-link {
            width: 100%; /* Make nav links full width */
        }
        .collapse {
            width: calc(100% - 20px); /* Adjust for scrollbar */
            padding-right: 20px; /* Add padding to prevent overlap */
        }
        #connectionIndicator {
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }
        .connected #connectionIndicator {
            background-color: #04f604;
        }
        #connectionIndicator.red {
            background-color: red;
        }
    </style>
</head>
<body style="background-color: rgba(238,238,255,255);">
<header>
    <div class="logo img" style="height: 100px; width: 100px;">
        <img src="../images/2.png">
    </div>
    <div class="navbar">
        <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="uploads.php"><i class="fa fa-fw fa-search"></i> Search</a>
        <a href="contact.html"><i class="fa fa-fw fa-envelope"></i> Contact</a>
        <a href="../php/logout.php"><i class="fa fa-fw fa-sign-out-alt"></i> Logout</a>
        <?php
        // Start session
        session_start();

        // Include database connection
        include '../php/db_functions.php'; // Replace 'database_connection.php' with your actual database connection file
        $conn = db_connect();

        // Check if the user is not logged in
        if (!isset($_SESSION['id']) || !isset($_SESSION['email'])) {
            // Redirect to login page if user is not logged in
            header("Location: login.php");
            exit;
        }

        // Retrieve user ID and email from session variables
        $userId = $_SESSION['id'];
        $userEmail = $_SESSION['email'];
        ?>

        <p>Your User ID is: <?php echo $userId; ?></p>
        <p>Your email is: <?php echo $userEmail; ?></p>
        <!-- Moved the button here -->
        <button id="connectionIndicator" class="red"></button>
    </div>
</header>
<section class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link align-middle px-0" onclick="window.location.reload()">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home <i class="fa-solid fa-house"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-bs-toggle="collapse" class="nav-link px-0 align-middle" onclick="window.location.reload()">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> <i class="fa-solid fa-bars"></i></a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="uploads.php" class="nav-link px-0"> <span class="d-none d-sm-inline">My courses</span> <i class="fa-solid fa-book"></i></a>
                            </li>
                            <li>
                                <a href="Myhomeworks.php" class="nav-link px-0"> <span class="d-none d-sm-inline">My homeworks</span> <i class="fa-solid fa-book"></i></a>
                            </li>
                            <li>
                                <a href="addtask.php" class="nav-link px-0"> <span class="d-none d-sm-inline">My tasks</span> <i class="fa-solid fa-book"></i></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col py-3" id="mainContent">

        </div>
    </div>
</section>

<!-- Hidden fields to store user ID and email -->
<input type="hidden" id="userId" value="<?php echo isset($userId) ? $userId : ''; ?>">
<input type="hidden" id="userEmail" value="<?php echo isset($userName) ? $userName : ''; ?>">

<script>
    function checkConnectionStatus(callback) {
        alert("Checking connection status...");
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                alert("XHR request done. Status: " + xhr.status);
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    alert("Response from server: " + JSON.stringify(response));
                    callback(response.connected); // Pass the connection status to the callback function
                } else {
                    console.error('Error checking connection status:', xhr.status);
                    callback(false); // Pass false to the callback indicating connection status couldn't be determined
                }
            }
        };
        xhr.open('GET', '../php/check_connection.php', true); // Update the URL to match your endpoint
        xhr.send();
    }

    function updateConnectionIndicator() {
        var connectionIndicator = document.getElementById("connectionIndicator");
        checkConnectionStatus(function(isConnected) {
            if (isConnected) {
                connectionIndicator.classList.add("connected");
                connectionIndicator.classList.remove("red");
            } else {
                connectionIndicator.classList.remove("connected");
                connectionIndicator.classList.add("red");
            }
        });
    }

    updateConnectionIndicator();

</script>

<script src="../js/loadContents.js"></script>
</body>
</html>
