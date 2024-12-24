<?php

// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

class Email
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    // Method to send email
    public function sendEmail($to, $subject, $message)
    {
        try {
            // Server settings
            $this->mail->isSMTP();  // Send using SMTP
            $this->mail->Host = 'smtp.yourdomain.com'; // Set the SMTP server
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'your_email@example.com'; // SMTP username
            $this->mail->Password = 'your_email_password'; // SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $this->mail->Port = 587;

            // Recipients
            $this->mail->setFrom('no-reply@yourdomain.com', 'Cinema Registration');
            $this->mail->addAddress($to); // Add recipient

            // Content
            $this->mail->isHTML(true);  // Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $message;

            // Send email
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            // If email fails
            return false;
        }
    }
}
