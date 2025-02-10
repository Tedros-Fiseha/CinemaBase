<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../helper/EmailHelper.php';

class User
{

    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /**
     * Register a Manager (SuperAdmins are manually added)
     */
    public function register($username, $email, $password)
    {
        // Check if email or username already exists
        $checkQuery = "SELECT id FROM users WHERE email = ? OR username = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("ss", $email, $username);
        $checkStmt->execute();
        $checkStmt->store_result();
        if ($checkStmt->num_rows > 0) {
            return "Email or username already exists.";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = 'manager';
        $_SESSION['verify_email'] = $email;

        $query = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $role);

        if ($stmt->execute()) {
            return true;
        } else {
            return "Error: " . $stmt->error;
        }
    }
    /**
     * Generate and save a verification code for the user.
     */
    public function generateVerificationCode($email)
    {
        $verificationCode = rand(100000, 999999);

        // Save verification code in the database
        $updateQuery = "UPDATE users SET verification_code = ? WHERE email = ?";
        $updateStmt = $this->conn->prepare($updateQuery);
        $updateStmt->bind_param("ss", $verificationCode, $email);
        $updateStmt->execute();

        return $verificationCode;
    }

    /**
     * Log in User (SuperAdmin or Manager) and send a verification email.
     */
    public function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return "Email not found.";
        }

        $user = $result->fetch_assoc();

        if (!password_verify($password, $user['password'])) {
            return "Invalid password.";
        }

        $verificationCode = rand(100000, 999999);

        // Save verification code in the database
        $updateQuery = "UPDATE users SET verification_code = ? WHERE id = ?";
        $updateStmt = $this->conn->prepare($updateQuery);
        $updateStmt->bind_param("si", $verificationCode, $user['id']);
        $updateStmt->execute();

        // Send verification code via email
        $subject = "Your Verification Code";
        $message = "Your verification code is: <strong>$verificationCode</strong>";
        $emailSent = EmailHelper::sendVerificationCode($email, $subject, $message);

        if (!$emailSent) {
            return "Failed to send verification code.";
        }

        // Store email in session for verification
        $_SESSION['verify_email'] = $email;
        error_log("Session verify_email set to: " . $_SESSION['verify_email']);

        // Debugging: Check if session is set
        error_log("Session verify_email set to: " . $_SESSION['verify_email']);

        // Redirect to the verification page
        header("Location: /verify");
        exit();
    }
    /**
     * Verify the entered code and redirect based on role.
     */
    public function verifyCode($code)
    {
        $email = $_SESSION['verify_email'] ?? '';

        if (empty($email)) {
            return "Session expired. Please log in again.";
            
        }

        $query = "SELECT * FROM users WHERE email = ? AND verification_code = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $email, $code);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return "Invalid verification code.";
        }

        $user = $result->fetch_assoc();
        $role = $user['role'];

        // Clear the verification code after successful login
        $updateQuery = "UPDATE users SET verification_code = NULL WHERE email = ?";
        $updateStmt = $this->conn->prepare($updateQuery);
        $updateStmt->bind_param("s", $email);
        $updateStmt->execute();

        // Set the user's role and email in the session
        $_SESSION['role'] = $role;
        $_SESSION['email'] = $email; // Store the email in the session

        // Clear the session email used for verification
        unset($_SESSION['verify_email']);

        // Redirect based on role
        if ($role === "superadmin") {
            header("Location: /superadmin/home");
        } elseif ($role === "manager") {
            header("Location: /cinema/register");
        } else {
            echo "Invalid role.";
        }
        exit();
    }



    public function getAdminsForSuperAdmin()
    {
        $query = "SELECT id,cinema_id,admin_name,admin_contact,admin_email,admin_id_card,admin_employment_document,created_at FROM admins";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $admins = [];
        while ($row = $result->fetch_assoc()) {
            $admins[] = $row;
        }

        return $admins;
    }
    public function getCinemasForSuperAdmin()
    {
        $query = "SELECT id, cinema_name, location, cinema_phone, email, website, cinema_logo, created_at FROM cinemas";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $cashiers = [];
        while ($row = $result->fetch_assoc()) {
            $cashiers[] = $row;
        }

        return $cashiers;
    }
    public function getMoviesForSuperAdmin()
    {
        $query = "SELECT id, cinema_id, title, poster, overview, release_date,runtime,genre,rating,created_at FROM cinema_movies";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $movies = [];
        while ($row = $result->fetch_assoc()) {
            $movies[] = $row;
        }

        return $movies;
    }
    public function getAppUsersForSuperAdmin()
    {
        $query = "SELECT user_id,username,phone_no,created_at FROM app_user";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $appUsers = [];
        while ($row = $result->fetch_assoc()) {
            $appUsers[] = $row;
        }

        return $appUsers;
    }
    public function getCashiersForSuperAdmin()
    {
        $query = "SELECT id, cinema_id, fullname, phone, username, created_at FROM cashier";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $cashiers = [];
        while ($row = $result->fetch_assoc()) {
            $cashiers[] = $row;
        }

        return $cashiers;
    }
}
