
function loadPage(url) {
    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.getElementById('mainContent').innerHTML = html;
        })
        .catch(error => console.error('Error fetching page:', error));
}

// Add event listeners to sidebar links to load corresponding pages
document.addEventListener('DOMContentLoaded', function() {
    const sidebarLinks = document.querySelectorAll('#menu a');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const url = this.getAttribute('href');
            loadPage(url);
        });
    });
});

// Function to load the schedule page into the userprofile element
function loadSchedulePage() {
    // Get the schedule page content
    const scheduleContent = document.getElementById('schedulePage').innerHTML;
    // Set the schedule page content to the userprofile element
    document.getElementById('userprofile').innerHTML = scheduleContent;
}

// Call the function to load the schedule page
loadSchedulePage();
