<?php

require_once('connection.php');
class Login extends Connection
{
    public function login($email, $password)
    {
        $result = mysqli_query($this->connection, "SELECT * FROM users WHERE email = '$email'");

        $user = mysqli_fetch_assoc($result);

        if (!$user) {
            $_SESSION["loginError"] = "User does not exist";

            header("Location: login.php");
            exit();
        }

        $hashedPassword = $user['password'];
        if (password_verify($password, $hashedPassword)) {
            $_SESSION["user"] = $user;

            header("Location: ../admin/admin_dashboard.php");
            exit();
        } else {
            $_SESSION["loginError"] = "Incorrect password";

            header("Location: login.php");
            exit();
        }
    }
}