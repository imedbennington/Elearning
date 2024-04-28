<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/Projects/Elearning/css/styles_adminDashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container">
<h2>Users</h2>
        <table id="user-table" class="users-table">
            <!-- Table will be generated dynamically -->
        </table>

        <h2>Courses</h2>
        <table id="course-table" class="courses-table">
            <!-- Table will be generated dynamically -->
        </table>
    </div>
<!--
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchUsers();
            fetchCourses();
        });
        
        /*function fetchUsers() {
            fetch('../../php/get_users.php')
            .then(response => response.json())
            .then(users => {
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
                // Handle delete action here, for example, you can call a function to delete the user
                const userId = row.querySelector('td:first-child').textContent;
                deleteUser(userId); 
                // Assuming deleteUser function exists
                // Remove the row from the table after deleting the user
                row.remove();
            });
            userTable.appendChild(row);
        });
    })
    .catch(error => console.error('Error fetching users:', error));
        }*/

        function fetchCourses() {
            // Fetch courses data and populate course table
            // Your fetchCourses() function code here...
        }
    </script>-->

<script src="../../js/admin_dashboard.js"></script>
</body>
</html>