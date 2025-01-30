<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

class EmailHelper
{
    public static function sendAdminCredentials($email, $adminUsername, $adminPassword, $dashboardLink)
    {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'teddytez000@gmail.com'; // Your email
            $mail->Password = 'rnbuhorluwigxnkr'; // Your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('no-reply@cinemaplus.com', 'Cinema Plus');
            $mail->addAddress($email);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Your Cinema Admin Credentials';

            $mail->Body = "
                <h3>Welcome to Cinema Plus!</h3>
                <p>Your cinema has been successfully registered. Below are your admin login details:</p>
                <ul>
                    <li><strong>Username:</strong> $adminUsername</li>
                    <li><strong>Password:</strong> $adminPassword</li>
                </ul>
                <p>You can log in using the following link: <a href='$dashboardLink'>Admin Dashboard</a></p>
                <p><strong>Note:</strong> You must change your password upon first login.</p>
                <p>Best Regards,<br>Cinema Plus Team</p>
            ";

            // Send email
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
