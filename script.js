// Validation for the Sign Up form
function validateSignUpForm() {
    var name = document.getElementById("name");
    var lastname = document.getElementById("lastname");
    var email = document.getElementById("email");
    var phone = document.getElementById("phone");
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var repeatPassword = document.getElementById("repeatPassword");
    var birthday = document.getElementById("birthday");
    var gender = document.getElementById("gender");

    validateInput(name, "Name", "nameError");
    validateInput(lastname, "Last Name", "lastnameError");
    validateInput(email, "Email", "emailError");
    validateInput(phone, "Phone", "phoneError");
    validateInput(username, "Username", "usernameError");
    validateInput(password, "Password", "passwordError");
    validateInput(repeatPassword, "Repeat Password", "repeatPasswordError");
    validateInput(birthday, "Birthday", "birthdayError");
    validateInput(gender, "Gender", "genderError");

    return false;  
}

function validateInput(inputElement, fieldName, errorId) {
    var value = inputElement.value;
    var errorElement = document.getElementById(errorId);

    resetErrorElement(errorElement);

    if (value.trim() === "") {
        addErrorElement(errorElement, fieldName + " should not be empty.");
    }
}

function addErrorElement(errorElement, message) {
    errorElement.innerHTML = message;
}

function resetErrorElement(errorElement) {
    errorElement.innerHTML = "";
}

