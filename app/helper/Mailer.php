<?php

// /app/helpers/Mailer.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';  // Adjust path if using Composer

class Mailer {
    public static function sendEmail($to, $subject, $message) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();  // Set mailer to use SMTP
            $mail->Host = 'smtp.example.com';  // SMTP server address
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email@example.com'; // SMTP username
            $mail->Password = 'your-email-password'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('no-reply@cinemaregistration.com', 'Cinema Registration');
            $mail->addAddress($to); // Add recipient

            // Content
            $mail->isHTML(false); // Send as plain text
            $mail->Subject = $subject;
            $mail->Body    = $message;

            // Send the email
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;  // Return false if there was an error sending the email
        }
    }
}


?>