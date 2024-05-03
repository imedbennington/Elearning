<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
    <title>Schedule</title>
    <style>
        /* Add your custom styles here */
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
        #taskForm {
            display: none;
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        #taskForm input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        #taskForm input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #taskForm input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div id="calendar"></div>

<div id="taskForm">
    <form id="addTaskForm">
        <input type="text" id="taskInput" placeholder="Enter task description">
        <input type="hidden" id="selectedDate">
        <!--
        <input type="hidden" id="userId" value="</*?php echo //$userId; */?>">
        <input type="hidden" id="usermail" value="</*?php echo $userName; */?>">
        <button id="connectionIndicator" style="background-color: red;"></button> -->
        <input type="submit" value="Add Task">
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            editable: true, // Enable drag and drop
            selectable: true, // Allow date selection
            select: function(info) {
                // Display task form
                document.getElementById('taskForm').style.display = 'block';
                // Store selected date
                document.getElementById('selectedDate').value = info.startStr;
            },
            events: [
                // Example events can be added here
                // { title: 'Meeting', start: '2024-05-03T10:00:00', end: '2024-05-03T12:00:00' },
            ]
        });

        calendar.render();

        // Handle form submission
        $('#addTaskForm').submit(function(event) {
            event.preventDefault();
            var task = $('#taskInput').val();
            var date = $('#selectedDate').val();
            // Add the task to the calendar
            calendar.addEvent({
                title: task,
                start: date,
                allDay: true // Assuming tasks are for the whole day
            });
            // Hide the task form
            $('#taskForm').show();
            // Reset input field
            $('#taskInput').val('');
        });
    });
</script>
<!--<script src="../js/AddTasks.js"></script>-->
</body>
</html>
