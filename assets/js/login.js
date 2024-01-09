// Validation for the Sign Up form
function validateSignUpForm() {
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var repeat_password = document.getElementById("repeat_password");

    var isNameValid = validateInput(name, "Name", "nameError");
    var isEmailValid = validateInput(email, "Email", "emailError");
    var isPasswordValid = validateInput(password, "Password", "passwordError");
    var isRepeatPasswordValid = validateInput(repeat_password, "Repeat Password", "repeatPasswordError");

    if (isNameValid && isEmailValid && isPasswordValid && isRepeatPasswordValid) {
        document.getElementsByTagName("form")[0].submit();
    } else {
        window.event.preventDefault();
    }

    return false;
}

function validateInput(inputElement, fieldName, errorId) {
    var value = inputElement.value;
    var errorElement = document.getElementById(errorId);

    resetErrorElement(errorElement);

    if (value.trim() === "") {
        addErrorElement(errorElement, fieldName + " should not be empty.");
        return false;
    }

    return true;
}

function addErrorElement(errorElement, message) {
    errorElement.innerHTML = message;
}

function resetErrorElement(errorElement) {
    errorElement.innerHTML = "";
    errorElement.parentNode.classList.remove('d-none');
}

// Validation for the Login  form
function validateLogInForm() {
    var email = document.getElementById('email');
    var password = document.getElementById('password');

    var isEmailValid = validateInput(email, "Email", "emailError");
    var isPasswordValid = validateInput(password, "Password", "passwordError");

    if (isEmailValid && isPasswordValid) {
        document.getElementsByTagName("form")[0].submit();
    } else {
        window.event.preventDefault();
    }

    return false;
}