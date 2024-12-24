<?php

// /app/controllers/CinemaController.php
require_once __DIR__ . '/../models/Cinema.php';
require_once __DIR__ . '/../helper/JsonResponse.php';

class CinemaController
{
    
    public function getCinemaDetailsAPI()
    {
        // Check for GET request and valid cinema_id
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['cinema_id'])) {
            $cinemaId = intval($_GET['cinema_id']);
            $cinemaModel = new Cinema();

            // Fetch cinema basic details
            $cinemaDetails = $cinemaModel->getCinemaDetails($cinemaId);

            // Fetch operating hours
            $operatingHours = $cinemaModel->getOperatingHours($cinemaId);

            if ($cinemaDetails) {
                // Structure the data as needed
                $response = [
                    'cinema' => [
                        'cinema_name' => $cinemaDetails['cinema_name'],
                        'location' => $cinemaDetails['location'],
                        'cinema_phone' => $cinemaDetails['cinema_phone'],
                        'website' => $cinemaDetails['website'],
                        'cinema_logo' => $cinemaDetails['cinema_logo'],
                    ],
                    'operational_details' => [
                        'op_hours' => $cinemaDetails['op_hours'],
                        'seating_capacity' => $cinemaDetails['seating_capacity'],
                        'screen_rooms' => $cinemaDetails['screen_rooms'],
                    ],
                    'operating_hours' => $operatingHours,
                    'additional_details' => [
                        'payment_methods' => $cinemaDetails['payment_methods'],
                        'languages' => $cinemaDetails['languages'],
                    ],
                ];

                // Send the successful JSON response
                sendJsonResponse('success', $response);
            } else {
                // Send an error response if cinema not found
                sendJsonResponse('error', null, 'Cinema not found');
            }
        } else {
            // If GET request or cinema_id is missing, send an error response
            sendJsonResponse('error', null, 'Invalid request');
        }
    }

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
                if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
                    $filename = time() . "_{$prefix}_" . basename($file['name']);
                    $target = $uploadDir . $filename;

                    if (move_uploaded_file($file['tmp_name'], $target)) {
                        return $filename;
                    }
                }
                return null;
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
                'facilities' => htmlspecialchars($_POST['facilities'] ?? ''),  // Treat as a single string

                // Operating Hours
                'operating_hours' => $operatingHours, 

                // Languages (Ensure this is a string)
                'languages' => htmlspecialchars(implode(',', $_POST['language'] ?? ['English','Amharic'])),

                // Financial Information
                'tin_number'  => htmlspecialchars($_POST['tin_number'] ?? ''),
                'business_license' => $business_license,
                'payment_methods' => htmlspecialchars(implode(',', $_POST['payment_methods'] ?? [])),

                // Admin Information
                'admin_name' => htmlspecialchars($_POST['admin_name'] ?? ''),
                'admin_contact' => htmlspecialchars($_POST['admin_contact'] ?? ''),
                'admin_email' => htmlspecialchars($_POST['admin_email'] ?? ''),
                'admin_password' => htmlspecialchars($_POST['admin_password'] ?? ''),
                'admin_id_card' => $admin_id_card,
                'admin_employment_document' => $admin_employment_document,
            ];



            // Save to the database
            $cinemaModel = new Cinema();
            if ($cinemaModel->saveCinema($data)) {
                header("Location: /cinema/success"); // Redirect to success page
                exit();
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
