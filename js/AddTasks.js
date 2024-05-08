/*document.addEventListener('DOMContentLoaded', function() {
    // Other code remains unchanged
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
    // Handle form submission
    $('#addTaskForm').submit(function(event) {
        event.preventDefault();
        var task = $('#taskInput').val();
        var date = $('#selectedDate').val();
        var userId = $('#userId').val(); // Get user ID
        var userName = $('#usermail').val(); // Get user name
        // Add the task to the calendar
        calendar.addEvent({
            title: task,
            start: date,
            allDay: true, // Assuming tasks are for the whole day
            userId: userId, // Add user ID to the event
            userName: userName // Add user name to the event
        });
        // Hide the task form
        $('#taskForm').hide(); // Hide instead of show
        // Reset input field
        $('#taskInput').val('');
    });

    // Toggle connection indicator button color
    $('#connectionIndicator').click(function() {
        $(this).css('background-color', function(_, value) {
            return value === 'green' ? 'red' : 'green';
        });
    });
});
*/




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
        $('#taskForm').hide();
        // Reset input field
        $('#taskInput').val('');
    });
});