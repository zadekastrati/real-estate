<?php
session_start();

// Unset all session variables
unset($_SESSION["user"]);

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit();
?>
