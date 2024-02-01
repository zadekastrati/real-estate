<?php
session_start();
require_once("../config/login.php");
if (isset($_POST["signin"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $loginObject = new Login();
    $loginObject->login($email, $password);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../assets/images/logo.png">
    <title>Sign In Form - Gold Abodes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <a href="../index.php"><i class="fa fa-arrow-left"></i></a>
    <div class="main">
        <!-- Sign in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../assets/images/signin-image.jpg" style="width: 300px;" alt="sing up image">
                        </figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <?php if (isset($_SESSION['loginError'])) { ?>
                            <p class="errorAlert" style="color: red;">
                                <?php echo $_SESSION['loginError'] ?>
                            </p>
                            <?php unset($_SESSION['loginError']); ?>
                        <?php } ?>
                        <form method="POST" class="register-form" id="login-form" onsubmit="validateLogInForm()">
                            <div class="form-group">
                                <label for="email"><i class="fa fa-envelope"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="error d-none">
                                <span id="emailError"></span>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fa fa-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>
                            <div class="error d-none">
                                <span id="passwordError"></span>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                        <div class="social-login">
                            <ul class="socials">
                                <li><a href="register.php" class="signup-image-link">Don't have an account? Sign up</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="../assets/js/login.js"></script>
</body>

</html>