// JavaScript code for sidebar and content toggling
function toggleSidebar() {
    const sidebar = document.getElementById("mySidebar");
    sidebar.classList.toggle("active");
}



function toggleContent(contentId) {
    // Get the container and all content divs
    const container = document.getElementById("content-container");
    const contentDivs = container.getElementsByClassName("content");

    // Loop through content divs and show the selected one while hiding others
    for (let i = 0; i < contentDivs.length; i++) {
        const content = contentDivs[i];
        if (content.id === contentId + "-content") {
            content.style.display = "block";
        } else {
            content.style.display = "none";
        }
    }
}

// FUNCTIONS FOR BUTTONS
// Function to toggle content based on the button clicked
function toggleContent(contentId) {
    // Get all content sections
    const contentSections = document.getElementsByClassName('content');

    // Hide all content sections
    for (const section of contentSections) {
        section.style.display = 'none';
    }

    // Display the selected content section
    const selectedContent = document.getElementById(`${contentId}-content`);
    if (selectedContent) {
        selectedContent.style.display = 'block';
    }
}

// Function to handle the "View All" button click
function viewAll(type) {
    // Replace this with your desired action for the "View All" button
    alert(`View All ${type}`);
}

// CLICKABLE CARDS

