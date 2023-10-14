function toggleForm(formType) {
    const loginForm = document.querySelector('.form.login');
    const signupForm = document.querySelector('.form.signup');

    if (formType === 'login') {
        loginForm.classList.add('active');
        signupForm.classList.remove('active');
    } else if (formType === 'signup') {
        loginForm.classList.remove('active');
        signupForm.classList.add('active');
    }
}

function login() {
    const username = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;

    // Add your login logic here
    console.log(`Login with Username: ${username}, Password: ${password}`);
}

function register() {
    const name = document.getElementById('signupName').value;
    const number = document.getElementById('signupNumber').value;
    const password = document.getElementById('signupPassword').value;

    // Add your registration logic here
    console.log(`Register with Name: ${name}, Email: ${number}, Password: ${password}`);
}