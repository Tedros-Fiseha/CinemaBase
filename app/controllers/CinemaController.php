<?php

require_once __DIR__ . '/../models/Cinema.php';
require_once __DIR__ . '/../helper/EmailHelper.php';
class CinemaController
{
    private $delay = 10; // Time delay in seconds (modifiable)


    // Show the registration form
    public function register()
    {
        require_once __DIR__ . '/../views/register.php';
    }

    // Handle form submission and store data
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ensure the upload directory exists
            $uploadDir = __DIR__ . '/../../uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Function to validate and process time inputs
            function formatTime($time, $default = '08:00 AM')
            {
                return ($time && strtotime($time)) ? date("H:i:s", strtotime($time)) : date("H:i:s", strtotime($default));
            }

            // Function to handle file uploads
            function uploadFile($file, $prefix, $uploadDir)
            {
                // Allowed file types
                $allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
                // Max file size (e.g., 5MB)
                $maxFileSize = 5 * 1024 * 1024;

                // Check if file is set and there are no upload errors
                if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
                    // Validate file size
                    if ($file['size'] > $maxFileSize) {
                        throw new Exception("File size exceeds the allowed limit of 5MB.");
                    }

                    // Validate file type
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $fileType = finfo_file($finfo, $file['tmp_name']);
                    finfo_close($finfo);

                    if (!in_array($fileType, $allowedFileTypes)) {
                        throw new Exception("Invalid file type. Allowed types are JPEG, PNG, GIF, and PDF");
                    }

                    // Sanitize the file name
                    $originalName = basename($file['name']);
                    $sanitizedFileName = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $originalName);

                    // Generate a unique file name
                    $filename = time() . "_{$prefix}_" . $sanitizedFileName;
                    $target = $uploadDir . $filename;

                    // Move the file to the upload directory
                    if (move_uploaded_file($file['tmp_name'], $target)) {
                        return $filename;
                    } else {
                        throw new Exception("Failed to upload the file. Please try again.");
                    }
                } else {
                    throw new Exception("No file uploaded or an error occurred during the upload process.");
                }
            }


            // Upload files
            $cinema_logo = uploadFile($_FILES['cinema_logo'] ?? null, 'cinema_logo', $uploadDir);
            $business_license = uploadFile($_FILES['business_license'] ?? null, 'business_license', $uploadDir);
            $admin_id_card = uploadFile($_FILES['admin_id_card'] ?? null, 'admin_id_card', $uploadDir);
            $admin_employment_document = uploadFile($_FILES['admin_employment_document'] ?? null, 'admin_employment_document', $uploadDir);

            // Validate inputs
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email address.";
                return;
            }

            if (empty($_POST['cinema_name']) || empty($_POST['location']) || empty($_POST['cinema_phone'])) {
                echo "Cinema name, location, and phone are required.";
                return;
            }

            $operatingHours = [];
            foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day) {
                $startKey = strtolower($day) . '_start_time';
                $endKey = strtolower($day) . '_end_time';

                $operatingHours[$day] = [
                    'start_time' => formatTime($_POST[$startKey] ?? null, '08:00 AM'), // Default start time
                    'end_time' => formatTime($_POST[$endKey] ?? null, '1:00 AM'),     // Default end time
                ];
            }

            $tin = htmlspecialchars($_POST['tin_number'] ?? '');

            // Validate TIN (12-digit numeric)
            if (!preg_match('/^\d{12}$/', $tin)) {
                echo "Invalid TIN number.";
                return;
            }

            // Generate a random password for the admin
            $plainPassword = bin2hex(random_bytes(8)); // Example: 'aB3#dE9!'
            $hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);

            // Prepare form data
            $data = [
                // Basic Information
                'cinema_name'   => htmlspecialchars($_POST['cinema_name'] ?? ''),
                'location'      => htmlspecialchars($_POST['location'] ?? ''),
                'cinema_phone'  => htmlspecialchars($_POST['cinema_phone'] ?? ''),
                'email'         => htmlspecialchars($_POST['email'] ?? ''),
                'website'       => htmlspecialchars($_POST['website'] ?? ''),
                'cinema_logo'   => $cinema_logo, // No need to sanitize file path

                // Operational Details
                'op_hours' => htmlspecialchars($_POST['op_hours'] ?? ''),
                'screen_rooms' => htmlspecialchars($_POST['screen_rooms'] ?? ''),
                'seating_capacity' => htmlspecialchars($_POST['seating_capacity'] ?? ''),
                'facilities' => htmlspecialchars($_POST['facilities'] ?? ''),  

                // Operating Hours
                'operating_hours' => $operatingHours,

                // Languages (Ensure this is a string)
                'languages' => htmlspecialchars(implode(',', $_POST['language'] ?? ['English', 'Amharic'])),

                // Financial Information
                'tin_number' => $tin,
                'business_license' => $business_license,
                'payment_methods' => htmlspecialchars(implode(',', $_POST['payment_methods'] ?? [])),

                // Admin Information
                'admin_name' => htmlspecialchars($_POST['admin_name'] ?? ''),
                'admin_contact' => htmlspecialchars($_POST['admin_contact'] ?? ''),
                'admin_email' => htmlspecialchars($_POST['admin_email'] ?? ''),
                'admin_password' => $hashedPassword, // Store hashed password
                'admin_id_card' => $admin_id_card,
                'admin_employment_document' => $admin_employment_document,
            ];

            sleep($this->delay);

            // Save to the database
            $cinemaModel = new Cinema();
            if ($cinemaModel->saveCinema($data)) {

                // Send email with credentials
                $emailHelper = new EmailHelper();
                $emailSent = EmailHelper::sendAdminCredentials(
                    $data['admin_email'],
                    $data['admin_name'],
                    $plainPassword, // Send the plain password in the email
                    'http://localhost:8080/index?page=Login&l=1' // Replace with actual dashboard URL
                );


                if ($emailSent) {
                    header("Location: /cinema/success"); // Redirect to success page
                    exit();
                } else {
                    echo "Failed to send email.";
                }
            } else {
                echo "Failed to save data.";
            }
        } else {
            echo "Invalid request method.";
        }
    }



    public function success()
    {
        // Render the success page
        require_once __DIR__ . '/../views/success.php';
    }
}
