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
function fetchUsers() {
    
    fetch('../../php/get_users.php')
    .then(response => response.json())
    .then(users => {
        linkCSS();
                const userTable = document.getElementById('user-table');
                userTable.classList.add('users-table');

                // Clear existing user table content
                userTable.innerHTML = '';

                // Create table header row
                const headerRow = document.createElement('tr');

                const headerCell0 = document.createElement('th');
                headerCell0.textContent = 'ID'; 
                headerRow.appendChild(headerCell0);

                const headerCell1 = document.createElement('th');
                headerCell1.textContent = 'Name'; 
                headerRow.appendChild(headerCell1);

                const headerCell2 = document.createElement('th');
                headerCell2.textContent = 'Family name'; 
                headerRow.appendChild(headerCell2);

                const headerCell3 = document.createElement('th');
                headerCell3.textContent = 'Email'; 
                headerRow.appendChild(headerCell3);

                const headerCell4 = document.createElement('th');
                headerCell4.textContent = 'Actions'; 
                headerRow.appendChild(headerCell4);
                // Add additional header cells if needed

                userTable.appendChild(headerRow);

               // Create table rows for each user
        users.forEach(user => {
            const row = document.createElement('tr');
            
            const cell0 = document.createElement('td');
            cell0.textContent = user.id;
            row.appendChild(cell0);

            const cell1 = document.createElement('td');
            cell1.textContent = user.name;
            row.appendChild(cell1);

            const cell2 = document.createElement('td');
            cell2.textContent = user.surname;
            row.appendChild(cell2);

            const cell3 = document.createElement('td');
            cell3.textContent = user.email;
            row.appendChild(cell3);

            const actionCell = document.createElement('td');
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete user';
            // Add additional cells for other user data if needed
            actionCell.appendChild(deleteButton); // Append the delete button to the action cell
            row.appendChild(actionCell); // Append the action cell to the row
            deleteButton.addEventListener('click', () => {
                
                const userId = row.querySelector('td:first-child').textContent;
    
    // Send an AJAX request to delete the user
                fetch('delete_user.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ user_id: userId }),
                })
                .then(response => {
                    if (response.ok) {
                        // If deletion is successful, remove the row from the table
                        row.remove();
                    } else {
                        // If deletion fails, show an error message
                        console.error('Error deleting user:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Error deleting user:', error);
                });
                row.remove();
            });
            userTable.appendChild(row);
        });
        })
        .catch(error => console.error('Error fetching users:', error));
}
function fetchCourses() {
    linkCSS(); // Assuming this function is defined elsewhere
    // Make AJAX request to fetch courses data
    // Replace the URL with your actual endpoint for fetching courses
    fetch('../../php/get_courses.php')
    .then(response => response.json())
    .then(courses => {
        const courseTable = document.getElementById('course-table');
        courseTable.classList.add('courses-table'); 
        
        // Clear existing table content
        courseTable.innerHTML = '';

        // Create table header row
        const headerRow = document.createElement('tr');

        const headerCell0 = document.createElement('th');
        headerCell0.textContent = 'ID';
        headerRow.appendChild(headerCell0);

        const headerCell1 = document.createElement('th');
        headerCell1.textContent = 'Course Name';
        headerRow.appendChild(headerCell1);

        const headerCell2 = document.createElement('th');
        headerCell2.textContent = 'Author';
        headerRow.appendChild(headerCell2);

        const headerCell3 = document.createElement('th');
        headerCell3.textContent = 'Date';
        headerRow.appendChild(headerCell3);

        const headerCell4 = document.createElement('th');
        headerCell4.textContent = 'Actions'; 
        headerRow.appendChild(headerCell4);

        courseTable.appendChild(headerRow);

        // Create table rows for each course
        courses.forEach(course => {
            const row = document.createElement('tr');

            const cell0 = document.createElement('td');
            cell0.textContent = course.id; // Use course.id instead of courses.id
            row.appendChild(cell0);
            
            const cell1 = document.createElement('td');
            cell1.textContent = course.name; // Use course.name instead of courses.name
            row.appendChild(cell1);

            const cell2 = document.createElement('td');
            cell2.textContent = course.author; // Use course.author instead of courses.author
            row.appendChild(cell2);

            const cell3 = document.createElement('td');
            cell3.textContent = course.date; // Use course.date instead of courses.date
            row.appendChild(cell3);
            
            const actionCell = document.createElement('td');
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete'; // Update button text
            actionCell.appendChild(deleteButton);
            row.appendChild(actionCell);
            deleteButton.addEventListener('click', () => {
                // Handle delete action here
                const courseId = course.id; // Use course.id instead of row.querySelector('td:first-child').textContent
                deleteUser(courseId); // Assuming deleteUser function exists
                row.remove();
            });

            courseTable.appendChild(row);
        });
    })
    .catch(error => console.error('Error fetching courses:', error));
}

