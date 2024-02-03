<?php
session_start();
require_once('../config/users.php');

$userObject = new Users();

if (isset($_SESSION['user'])) {
    $role = $_SESSION['user']['role'];
    if ($role == 'superadmin' || $role == 'admin') {
        // Check if user_id is set and is a numeric value
        if (isset($_GET['user_id']) && is_numeric($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
            
            // Delete the user
            $deleteResult = $userObject->deleteUser($user_id);
            
            if ($deleteResult) {
                $_SESSION['userDeleteSuccess'] = 'User deleted successfully';
            } else {
                $_SESSION['userDeleteError'] = 'Failed to delete user';
            }
        } else {
            $_SESSION['userDeleteError'] = 'Invalid user ID';
        }

        header("Location: admin_users.php");
        exit();
    } else {
        header("Location: admin_users.php");
        exit();
    }
} else {
    header("Location: ../auth/login.php");
    exit();
}
?>
