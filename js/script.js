const signUpButton = document.getElementById('signUpButton');
const signInButton = document.getElementById('signInButton');
const signInForm = document.getElementById('signIn');
const signUpForm = document.getElementById('signup');

if (signUpButton) {
    signUpButton.addEventListener('click', function () {
        signInForm.style.display = "none";
        signUpForm.style.display = "block";
    });
}

if (signInButton) {
    signInButton.addEventListener('click', function () {
        signInForm.style.display = "block";
        signUpForm.style.display = "none";
    });
}

function toggleForm(formType) {
    if (formType === 'signup') {
        document.getElementById('signIn').style.display = 'none';
        document.getElementById('signup').style.display = 'block';
        document.getElementById('loginBtn').classList.remove('active');
        document.getElementById('signupBtn').classList.add('active');
    } else {
        document.getElementById('signup').style.display = 'none';
        document.getElementById('signIn').style.display = 'block';
        document.getElementById('signupBtn').classList.remove('active');
        document.getElementById('loginBtn').classList.add('active');
    }
}

