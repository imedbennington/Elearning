<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Calendar</title>
    <style>
        .calendar {
            display: flex;
            flex-wrap: wrap;
        }
        .day {
            width: calc(100% / 7);
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="calendar" id="calendar"></div>

<script>
    // Function to create a calendar
    function createCalendar(year, month) {
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDayIndex = new Date(year, month, 1).getDay();
        const lastDayIndex = new Date(year, month, daysInMonth).getDay();
        const calendar = document.getElementById("calendar");
        const months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];
        calendar.innerHTML = '';
        for (let i = 0; i < firstDayIndex; i++) {
            calendar.innerHTML += `<div class="day"></div>`;
        }
        for (let i = 1; i <= daysInMonth; i++) {
            calendar.innerHTML += `<div class="day" id="day${i}">${i}</div>`;
        }
        for (let i = 0; i < 6 - lastDayIndex; i++) {
            calendar.innerHTML += `<div class="day"></div>`;
        }
        const monthName = months[month];
        const yearMonth = document.createElement('h2');
        yearMonth.textContent = `${monthName} ${year}`;
        calendar.insertBefore(yearMonth, calendar.firstChild);
    }

    // Add a task to a specific date
    function addTask(date, task) {
        const day = document.getElementById(`day${date}`);
        if (day) {
            const taskElement = document.createElement('div');
            taskElement.textContent = task;
            day.appendChild(taskElement);
        } else {
            console.error(`Day ${date} does not exist in the calendar.`);
        }
    }

    // Usage example
    createCalendar(2024, 4); // May 2024
    addTask(5, "Meeting with client");
    addTask(15, "Submit project report");
</script>
</body>
</html>
