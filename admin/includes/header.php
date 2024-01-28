<!DOCTYPE html>
<html>

<head>
    <!-- Favicon -->
    <link rel="icon" href="assets/images/logo.png">
    <!-- Title and external CSS -->
    <title>Gold Abodes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <!-- Header Section 1 -->
    <div class="header1 padding-lr-100">
        <div class="social-icons">
            <a href="https://www.linkedin.com/">
                <i class="fa-brands fa-linkedin"></i>
            </a>
            <a href="https://www.facebook.com/">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://www.instagram.com/">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://twitter.com/">
                <i class="fa-brands fa-twitter"></i>
            </a>
        </div>
        <div class="authentication">
            <a href="auth/login.php"><i class="fa-solid fa-right-to-bracket"></i> Log In</a>
            <a href="auth/register.php"><i class="fa-solid fa-user-plus"></i> Sign Up </a>
        </div>
    </div>
    <!-- Header Section 2 -->
    <div class="header2 padding-lr-100">
        <div class="logo">
            <a href="index.php">
                <img src="assets/images/logo.png" alt="Logo">
            </a>
        </div>
        <div class="menu">
            <!-- Navigation links -->
            <a href="index.php"
                class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">Home</a>
            <a href="categories.php"
                class="<?php echo (basename($_SERVER['PHP_SELF']) == 'categories.php') ? 'active' : ''; ?>">Categories</a>
            <a href="aboutus.php"
                class="<?php echo (basename($_SERVER['PHP_SELF']) == 'aboutus.php') ? 'active' : ''; ?>">About Us</a>
            <a href="contactus.php"
                class="<?php echo (basename($_SERVER['PHP_SELF']) == 'contactus.php') ? 'active' : ''; ?>">Contact
                Us</a>
        </div>
    </div>