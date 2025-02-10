<?php

require_once __DIR__ . '/../../config/database.php';

class Cinema
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Function to save cinema data into the database
    public function saveCinema($data)
    {
        $this->conn->begin_transaction(); // Start transaction

        try {
            // Insert into `cinemas`
            $queryCinema = "INSERT INTO cinemas (cinema_name, location, cinema_phone, email, website, cinema_logo) 
                            VALUES (?, ?, ?, ?, ?, ?)";
            $stmtCinema = $this->conn->prepare($queryCinema);
            $stmtCinema->bind_param(
                "ssssss",
                $data['cinema_name'],
                $data['location'],
                $data['cinema_phone'],
                $data['email'],
                $data['website'],
                $data['cinema_logo']
            );
            $stmtCinema->execute();
            $cinemaId = $this->conn->insert_id; // Capture cinema ID after insertion

            // Insert into `cinema_details`
            $queryDetails = "INSERT INTO cinema_details (cinema_id, op_hours, screen_rooms, seating_capacity, languages, facilities, tin_number, business_license, payment_methods) 
                             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmtDetails = $this->conn->prepare($queryDetails);
            $stmtDetails->bind_param(
                "iiiisssss",
                $cinemaId,
                $data['op_hours'],
                $data['screen_rooms'],
                $data['seating_capacity'],
                $data['languages'],
                $data['facilities'],
                $data['tin_number'],
                $data['business_license'],
                $data['payment_methods']
            );
            $stmtDetails->execute();


            // Insert into `admins`
            $hashedPassword = $data['admin_password']; // It was already hashed before calling saveCinema()

            $queryAdmin = "INSERT INTO admins (cinema_id, admin_name, admin_contact, admin_email, admin_password, admin_id_card, admin_employment_document) 
                           VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmtAdmin = $this->conn->prepare($queryAdmin);
            $stmtAdmin->bind_param(
                "issssss",
                $cinemaId,
                $data['admin_name'],
                $data['admin_contact'],
                $data['admin_email'],
                $hashedPassword,
                $data['admin_id_card'],
                $data['admin_employment_document']
            );
            $stmtAdmin->execute();

            $queryHours = "INSERT INTO operating_hours (cinema_id, day, start_time, end_time) VALUES (?, ?, ?, ?)";
            $stmtHours = $this->conn->prepare($queryHours);

            foreach ($data['operating_hours'] as $day => $hours) {
                $stmtHours->bind_param("isss", $cinemaId, $day, $hours['start_time'], $hours['end_time']);
                $stmtHours->execute();
            }

            // Commit transaction
            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollback();
            return false;
        }
    }

}
