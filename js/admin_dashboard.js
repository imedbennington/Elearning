document.addEventListener('DOMContentLoaded', function() {
    // Fetch users from the server and populate user grid
    fetchUsers();
    
    // Fetch courses from the server and populate course grid
    fetchCourses();
});

function fetchUsers() {
    // Make AJAX request to fetch users data
    // Replace the URL with your actual endpoint for fetching users
    fetch('get_users.php')
    .then(response => response.json())
    .then(users => {
        const userGrid = document.getElementById('user-grid');
        users.forEach(user => {
            const gridItem = document.createElement('div');
            gridItem.classList.add('grid-item');
            gridItem.textContent = user.username; // Adjust based on your user data
            userGrid.appendChild(gridItem);
        });
    })
    .catch(error => console.error('Error fetching users:', error));
}

function fetchCourses() {
    // Make AJAX request to fetch courses data
    // Replace the URL with your actual endpoint for fetching courses
    fetch('get_courses.php')
    .then(response => response.json())
    .then(courses => {
        const courseGrid = document.getElementById('course-grid');
        courses.forEach(course => {
            const gridItem = document.createElement('div');
            gridItem.classList.add('grid-item');
            gridItem.textContent = course.course_name; // Adjust based on your course data
            courseGrid.appendChild(gridItem);
        });
    })
    .catch(error => console.error('Error fetching courses:', error));
}
