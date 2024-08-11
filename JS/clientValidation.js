// Author: Tyus Irvine
// Variables for the various form elements
const userID = document.getElementById("userID");
const email = document.getElementById("email");
const username = document.getElementById("username");
const password = document.getElementById("password");
const confirm = document.getElementById("passConfirm");
const terms = document.getElementById("terms");
const reset = document.getElementById("reset");



// Creating the logic for setting fields incorrect
const setError = (element, message) => {
    const inputControl = element.parentElement;
    let errorDisplay = inputControl.querySelector('.formControl');

    errorDisplay.innerText = message;
    element.style.borderColor = "Red";
}

// Creating the logic for setting fields as valid
const setSuccess = element => {
    const inputControl = element.parentElement;
    let errorDisplay = inputControl.querySelector('.formControl');
    errorDisplay.innerText = '';
    element.style.borderColor = "Green";
}

function validateUserID() {
    let IDValue = userID.value.trim();

    if(IDValue === '') {
        setError(userID, 'x ID can\'t be left blank');
        return false;
    }
    else if(isNaN(IDValue)) {
        setError(userID, 'x ID must be a number');
        return false;
    }
    else {
        setSuccess(userID);
        return true;
    }
}

// Function to check the email format against a regular expression
function validateEmail() {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const emailValue = email.value.trim();

    if(emailPattern.test(emailValue.toLowerCase())) {
        setSuccess(email);
        return true;
    }
    else {
        setError(email, 'x Email is not in the required format: xyz@xyx.xyz');
        return false;
    }
}

// Function to ensure the username is less then 30 characters but isn't left blank
function validateUsername() {
    let usernameValue = username.value.trim();

    if(usernameValue === '') {
        setError(username, 'x Username can\'t be left blank');
        return false;
    }
    else if(usernameValue.length >= 30) {
        setError(username, 'x Username must be less then 30 characters');
        return false;
    }
    else {
        
        setSuccess(username);
        return true;
    }
}

// Function to ensure the password is 8 or more characters
function validatePassword() {
    const passValue = password.value.trim();

    if(passValue.length >= 8) {
        setSuccess(password);
        return true;
    }
    else {
        setError(password, 'x Password must be at least 8 characters');
        return false;
    }
}

// Function to ensure the password confirm field matches the password field
function validateConfirm() {
    const passValue = password.value.trim();
    const confirmValue = confirm.value.trim();

    if(confirmValue === '') {
        setError(confirm, 'x Confirmation can\'t be left blank');
        return false;
    }
    else if(passValue !== confirmValue) {
        setError(confirm, 'x Confirmation must match the original password');
        return false;
    }
    else {
        setSuccess(confirm);
        return true;
    }
}

// Function to ensure the terms and conditions box is checked
function validateTerms() {
    if(terms.checked) {
        setSuccess(terms);
        return true;
    }
    else {
        setError(terms, 'x Terms and conditions must be accepted before proceeding');
        return false;
    }
}

// Function to call all the above validating functions and prevent the form from being submitted untill all fields are correct 
function validate() {
    let emailValid = validateEmail();
    let usernameValid = validateUsername();
    let passwordValid = validatePassword();
    let confirmValid = validateConfirm();
    let termsValid = validateTerms();
    let idValid = validateUserID();

    // Condition for accepting the validation  
    if(emailValid && usernameValid && passwordValid && confirmValid && termsValid && idValid) {
        return true;
    }
    else {
        return false;
    }
}

// EventListener for resetting the error messages when the reset button is pressed
reset.addEventListener("click", () => {
    setError(userID, null);
    setError(email, null);
    setError(username, null);
    setError(password, null);
    setError(confirm, null);
    setError(terms, null);
    
    userID.style.borderColor = "Black";
    email.style.borderColor = "Black";
    username.style.borderColor = "Black";
    password.style.borderColor = "Black";
    confirm.style.borderColor = "Black";
});

// Event listeers on every field to dynamically update the error messages when the values are changed 
userID.addEventListener('input', validateUserID);
email.addEventListener('input', validateEmail);
username.addEventListener('input', validateUsername);
password.addEventListener('input', validatePassword);
passConfirm.addEventListener('input', validateConfirm);
terms.addEventListener('change', validateTerms);