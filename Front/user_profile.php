<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyOckneL+O5pa0e5K/J7Z9o5hpv6Y1bp" crossorigin="anonymous">
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
        <a href="home.html" target="_blank"><i class="fa fa-fw fa-user"></i> Log out</a>
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
                                <a href="schedule.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Schedule</span> <i class="fa-regular fa-calendar-days"></i></a>
                            </li>
                            <li>
                                <a href="Myhomeworks.php" class="nav-link px-0"> <span class="d-none d-sm-inline">My homeworks</span> <i class="fa-solid fa-book"></i></a>
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

<script src="../js/loadContents.js"></script>
</body>
</html>