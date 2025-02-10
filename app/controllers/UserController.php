<?php
require_once __DIR__ . '/../models/User.php';

class UserController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        include __DIR__ . '/../views/login.php';
    }

    /**
     * Show the registration form.
     */
    public function showRegisterForm()
    {
        include __DIR__ . '/../views/manager/signup.php';
    }

    /**
     * Show the verification form.
     */
    public function showVerify()
    {
        include __DIR__ . '/../views/verify.php';
    }

    /**
     * Register a Manager
     */
    public function register()
    {
        $error = '';
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $error = "Email and password are required.";
            return $error;
        }

        $result = $this->user->register($username, $email, $password);

        if ($result === true) {
            // Send verification code to the manager's email
            $verificationCode = $this->user->generateVerificationCode($email);
            $subject = "Your Verification Code";
            $message = "Your verification code is: <strong>$verificationCode</strong>";
            $emailSent = EmailHelper::sendVerificationCode($email, $subject, $message);

            if ($emailSent) {
                header("Location: /verify");
                exit();
            } else {
                $error = "Failed to send verification code.";
            }
        } else {
            $error = $result;
        }
        include __DIR__ . '/../views/manager/signup.php';
    }


    public function login()
    {
        $error = '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $error = "Email and password are required.";
        } else {
            $result = $this->user->login($email, $password);

            if (is_array($result)) {
                // Store email and role in session for verification
                $_SESSION['verify_email'] = $result['email'];
                $_SESSION['role'] = $result['role'];

                // Redirect to the verification page
                header("Location: /verify");
                exit();
            } else {
                $error = $result;
            }
        }

        include __DIR__ . '/../views/login.php';
    }


    public function verifyCode()
    {
        $error = '';
        $code1 = $_POST['code1'] ?? '';
        $code2 = $_POST['code2'] ?? '';
        $code3 = $_POST['code3'] ?? '';
        $code4 = $_POST['code4'] ?? '';
        $code5 = $_POST['code5'] ?? '';
        $code6 = $_POST['code6'] ?? '';

        // Combine the code parts into a single string
        $code = $code1 . $code2 . $code3 . $code4 . $code5 . $code6;

        if (empty($code)) {
            $error =  "Verification code is required.";
            return $error;
        }

        $result = $this->user->verifyCode($code);

        if ($result === "superadmin") {
            header("Location: /superadmin/home");
        } elseif ($result === "manager") {
            header("Location: /cinema/register");
        } else {
            $error = $result;
        }
        include __DIR__ . '/../views/verify.php';
    }


    /**
     * Show the superadmin home page.
     */
    public function superadminHome()
    {

        include __DIR__ . '/../views/superadmin/pages/home.php';
    }
    public function superadminAdmin()
    {
        $admins = $this->user->getAdminsForSuperAdmin();

        // Calculate total admins
        $totalAdmins = count($admins);

        // Count admins per cinema
        $cinemaCounts = [];
        foreach ($admins as $admin) {
            $cinemaId = $admin['cinema_id'];
            if (!isset($cinemaCounts[$cinemaId])) {
                $cinemaCounts[$cinemaId] = 0;
            }
            $cinemaCounts[$cinemaId]++;
        }

        include __DIR__ . '/../views/superadmin/pages/admins.php';
    }



    public function superadminCashiers()
    {
        $cashiers = $this->user->getCashiersForSuperAdmin();
        include __DIR__ . '/../views/superadmin/pages/cashiers.php';
    }


    public function superadminCinemas()
    {
        $cinemas = $this->user->getCinemasForSuperAdmin();
        include __DIR__ . '/../views/superadmin/pages/cinemas.php';
    }


    public function superadminMovies()
    {
        $movies = $this->user->getmoviesForSuperAdmin();
        include __DIR__ . '/../views/superadmin/pages/movies.php';
    }


    public function superadminAppusers()
    {
        $appUsers = $this->user->getAppUsersForSuperAdmin();
        include __DIR__ . '/../views/superadmin/pages/appusers.php';
    }


    public function superadminTickets()
    {
        include __DIR__ . '/../views/superadmin/pages/tickets.php';
    }


    public function logout()
    {
        session_unset();
        session_destroy();

        header("Location: /login");
        exit();
    }
}
