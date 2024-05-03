document.addEventListener('DOMContentLoaded', function() {
    // Other code remains unchanged

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