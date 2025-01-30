<?php

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
    public function sendEmail($to, $subject, $message, $isHtml = true, $cc = [], $bcc = [])
    {
        try {
            // Server settings
            $this->mail->isSMTP();  // Send using SMTP
            $this->mail->Host = getenv('SMTP_HOST'); // Set the SMTP server
            $this->mail->SMTPAuth = true;
            $this->mail->Username = getenv('SMTP_USERNAME'); // SMTP username
            $this->mail->Password = getenv('SMTP_PASSWORD'); // SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $this->mail->Port = getenv('SMTP_PORT') ?: 587;

            // Recipients
            $this->mail->setFrom('no-reply@yourdomain.com', 'Cinema Registration');
            $this->mail->addAddress($to); // Add recipient

            // Add CC and BCC
            foreach ($cc as $email) {
                $this->mail->addCC($email);
            }
            foreach ($bcc as $email) {
                $this->mail->addBCC($email);
            }

            // Content
            $this->mail->isHTML($isHtml);  // Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $message;

            // Send email
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            // Log the error
            error_log("Email sending failed: " . $e->getMessage());
            return false;
        }
    }

    // Method to add attachments
    public function addAttachment($filePath, $fileName = '')
    {
        $this->mail->addAttachment($filePath, $fileName);
    }
}