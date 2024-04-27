document.addEventListener('DOMContentLoaded', function() {
    // Fetch users from the server and populate user grid
    fetchUsers();
    
    // Fetch courses from the server and populate course grid
    fetchCourses();
});
function linkCSS() {
    // Create a link element
    var link = document.createElement('link');

    // Set the attributes for the link element
    link.rel = 'stylesheet';
    link.type = 'text/css';
    link.href = '../../css/dynamic_users.css'; 

    // Append the link element to the <head> section of the document
    document.head.appendChild(link);
}
/*
function fetchUsers() {
    // Make AJAX request to fetch users data
    // Replace the URL with your actual endpoint for fetching users
    fetch('../../php/get_users.php')
    .then(response => response.json())
    .then(users => {
        const userGrid = document.getElementById('user-grid');
        users.forEach(user => {
            const gridItem = document.createElement('div');
            gridItem.classList.add('grid-item');
            gridItem.textContent = user.name;
            // Adjust based on your user data
            userGrid.appendChild(gridItem);
        });
    })
    .catch(error => console.error('Error fetching users:', error));
}*/
function fetchUsers() {
    linkCSS();
    // Make AJAX request to fetch users data
    // Replace the URL with your actual endpoint for fetching users
    fetch('../../php/get_users.php')
    .then(response => response.json())
    .then(users => {
        const userTable = document.createElement('table');
        userTable.classList.add('user-table');
        const userGrid = document.getElementById('user-grid');

        // Create table header
        const headerRow = document.createElement('tr');
        const usernameHeader = document.createElement('th');
        const surnameHeader = document.createElement('th');
        usernameHeader.textContent = 'name';
        surnameHeader.textContent ='family name';
        const emailHeader = document.createElement('th');
        emailHeader.textContent = 'email';
        const actionHeader = document.createElement('th');
        actionHeader.textContent = 'Actions';
        headerRow.appendChild(usernameHeader);
        headerRow.appendChild(surnameHeader);
        headerRow.appendChild(emailHeader);
        headerRow.appendChild(actionHeader);
        userTable.appendChild(headerRow);

        // Populate table with user data
        users.forEach(user => {
            const row = document.createElement('tr');
            const usernameCell = document.createElement('td');
            usernameCell.textContent = user.name;
            const surnameCell = document.createElement('td');
            surnameCell.textContent = user.surname;
            const emailCell = document.createElement('td');
            emailCell.textContent = user.email;
            row.appendChild(usernameCell);
            row.appendChild(surnameCell);
            row.appendChild(emailCell);
            const actionCell = document.createElement('td');
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.addEventListener('click', () => {
                // Handle delete action here, for example, you can call a function to delete the user
                deleteUser(user.id); // Assuming deleteUser function exists
                // Remove the row from the table after deleting the user
                row.remove();
            });
            actionCell.appendChild(deleteButton); // Append the delete button to the action cell
            row.appendChild(actionCell); // Append the action cell to the row
            userTable.appendChild(row); // Append the row to the table
        });

        // Append table to user grid container
        userGrid.appendChild(userTable);
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
