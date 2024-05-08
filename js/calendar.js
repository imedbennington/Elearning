// Function to generate calendar
function generateCalendar(year, month) {
    // Your calendar generation logic here
}

// Function to add task to a date
function addTask() {
    const taskDate = document.getElementById('taskDate').value;
    const taskDescription = document.getElementById('taskDescription').value;

    // Your logic to save the task goes here
    console.log("Task added on " + taskDate + ": " + taskDescription);
}

// Get current date
const currentDate = new Date();
const currentYear = currentDate.getFullYear();
const currentMonth = currentDate.getMonth() + 1;

// Call the generateCalendar function with current year and month
generateCalendar(currentYear, currentMonth);
