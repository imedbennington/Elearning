document.addEventListener('DOMContentLoaded', function() {

    var deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = this.getAttribute('data-user-id');
            alert('clicked');
            // AJAX request to the PHP file
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../php/deleteUser2.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // If deletion is successful, remove the row from the table
                        document.getElementById('user_' + userId).remove();
                    } else {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                }
            };
            xhr.send('userId=' + encodeURIComponent(userId));
        });
    });
});
