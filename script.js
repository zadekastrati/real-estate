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

document.addEventListener('DOMContentLoaded', function () {
    var imageUrls = [
        "images/slide1.jpg",
        "images/slide2.jpg",
        "images/slide3.jpg",
    ];

    var sliderContainer = document.getElementById("image-slider");

    imageUrls.forEach(function (imageUrl) {
        var imgElement = document.createElement("img");
        imgElement.src = imageUrl;
        imgElement.classList.add("slider-image");
        sliderContainer.appendChild(imgElement);
    });

    var currentIndex = 0;
    var sliderImages = document.querySelectorAll(".slider-image");

    function showImage(index) {
        sliderImages.forEach(function (img, i) {
            img.style.display = i === index ? "block" : "none";
        });
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % imageUrls.length;
        showImage(currentIndex);
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + imageUrls.length) % imageUrls.length;
        showImage(currentIndex);
    }

    showImage(currentIndex);
    document.getElementById("nextBtn").addEventListener("click", nextImage);
    document.getElementById("prevBtn").addEventListener("click", prevImage);
});
// Validation for the Login  form
function validateLogInForm() {
    
    function validateForm() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
    
        if (username === "" || password === "") {
            alert("Please fill in all fields");
            return false;
        }
    
        // Additional validation logic can be added here
    
        return true;
    }
