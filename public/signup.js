// Function to toggle between login and registration forms
function toggleForm(formType) {
    const loginForm = document.querySelector('.login-container');
    const registrationForm = document.querySelectorAll('.login-container')[1];

    window.location.href =  "/signup";
}

// Function to validate the login form
function login() {
    const loginUsername = document.getElementById('username').value;
    const loginPassword = document.getElementById('password').value;

    if (!loginUsername || !loginPassword) {
        alert('Please fill in all the required fields.');
        return false; // Prevent form submission
    }

    // Add your login logic here

    // If login is successful, you can redirect the user to another page
    return true; // Allow form submission
}

// Function to validate the registration form
function register() {
    const registrationUsername = document.getElementById('username').value;
    const registrationPassword = document.getElementById('password').value;

    if (!registrationUsername || !registrationPassword) {
        alert('Please fill in all the required fields.');
        return false; // Prevent form submission
    }

    // Add your registration logic here

    // If registration is successful, you can redirect the user to another page
    return true; // Allow form submission
}