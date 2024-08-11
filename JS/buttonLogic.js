// Author: Tyus Irvine
// Variables for the form and the div containing the buttons
const form = document.getElementById("loginForm");
const buttons = document.getElementById("toBeHidden");

// If the user presses the register button he is redirected to the register page
function registerRedirect() {
    window.location = "register.php";
}

// If the user presses the login button then the login form is displayed
function displayLogin() {
    buttons.classList.add("hidden");
    form.classList.remove("hidden");
}