<?php


class AuthMiddleware
{
    public static function handle($allowedRole)
    {
        // Debugging: Check session data
        error_log("Session role: " . ($_SESSION['role'] ?? 'NOT SET'));

        // Check if the user is logged in
        if (!isset($_SESSION['role'])) {
            // Redirect to the login page
            header("Location: /login");
            exit();
        }

        // Check if the user's role matches the allowed role
        if ($_SESSION['role'] !== $allowedRole) {
            // Redirect to the appropriate home page based on the user's role
            if ($_SESSION['role'] === 'manager') {
                header("Location: /manager/home");
            } elseif ($_SESSION['role'] === 'superadmin') {
                header("Location: /superadmin/home");
            } else {
                header("Location: /login");
            }
            exit();
        }
    }
}