<?php
session_start();
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password before saving it to the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);  

    // Insert user data into the database
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../assets/images/logo.png">
    <title>Sign Up Form - Gold Abodes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <a href="../index.php"><i class="fa fa-arrow-left"></i></a>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up as Admin</h2>
                        <form method="POST" class="register-form" id="register-form" onsubmit="validateSignUpForm()">
                            <div class="form-group">
                                <label for="name"><i class="fa fa-user"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" />
                            </div>
                            <div class="error d-none">
                                <span id="nameError"></span>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fa fa-envelope"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="error d-none">
                                <span id="emailError"></span>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fa fa-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>
                            <div class="error d-none">
                                <span id="passwordError"></span>
                            </div>
                            <div class="form-group">
                                <label for="repeat_password"><i class="fa fa-lock"></i></label>
                                <input type="password" name="repeat_password" id="repeat_password"
                                    placeholder="Repeat your password" />
                            </div>
                            <div class="error d-none">
                                <span class="error" id="repeatPasswordError"></span>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../assets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already a member!</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="../assets/js/login.js"></script>
</body>

</html>
