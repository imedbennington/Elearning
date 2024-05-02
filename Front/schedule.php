<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=7, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Styles.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyOckneL+O5pa0e5K/J7Z9o5hpv6Y1bp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Schedule</title>
</head>
<body><!--
    <header>
        <div class="logo img" style="height: 100px; width: 100px;">
        <img src="/2.png">
    </div>
    <div class="navbar">
        <a class="active" href="user_profile.html"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="uploads.php"><i class="fa fa-fw fa-search"></i> Search</a>
        <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
        <a href="login.html" target="_blank"><i class="fa fa-fw fa-user"></i> Log out</a>
    </div>
    </header>-->
        
        <section>
            
            <div class="schedule-container">
                <h1>My schedule</h1>
                <div class="description"><button onclick="window.location.href='addtask.html'">Add new task</button></div>
                <div class="day">Monday</div>
                <div class="event">
                    <div class="time">9:00 AM - 10:30 AM</div>
                    <div class="description">Meeting with Team</div>
                    <div class="description"><button>Remove</button></div>
                </div>
                <div class="event">
                    <div class="time">1:00 PM - 2:30 PM</div>
                    <div class="description">Client Presentation</div>
                    <div class="description"><button>Remove</button></div>
                </div>
    
                <div class="day">Tuesday</div>
                <div class="event">
                    <div class="time">10:00 AM - 11:30 AM</div>
                    <div class="description">Training Session</div>
                    <div class="description"><button>Remove</button></div>
                </div>
                <div class="event">
                    <div class="time">3:00 PM - 4:30 PM</div>
                    <div class="description">Project Review</div>
                </div>
    
            </div>
        </section>
</body>
</html>