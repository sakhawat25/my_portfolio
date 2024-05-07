<?php

namespace App\Traits;

use Illuminate\Support\Facades\View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

/**
 * Trait EmailSenderTrait.
 *
 * Trait for sending emails.
 */
trait EmailSenderTrait
{
    /**
     * Send an email.
     *
     * @param string $to          the recipient's email address
     * @param string $to_name     the recipient's name
     * @param string $subject     the subject of the email
     * @param string $view        the email view/template name
     * @param array  $data        the data to be passed to the email view/template
     * @param array  $attachments a 2D array containing each element as an associative array with 'path' and 'name' array keys
     *
     * @return bool true if the mail was successfully accepted for delivery, false otherwise
     */
    public function sendEmail(string $to, string $to_name, string $subject, string $view, array $data = [], ...$attachments): bool
    {
        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;             // Enable verbose debug output
        $mail->isSMTP();                                // Send using SMTP
        $mail->Host = config('mail.mailers.smtp.host');                 // Set the SMTP server to send through
        $mail->SMTPAuth = true;                         // Enable SMTP authentication
        $mail->Username = config('mail.mailers.smtp.username');         // SMTP username
        $mail->Password = config('mail.mailers.smtp.password');         // SMTP password
        $mail->SMTPSecure = config('mail.mailers.smtp.encryption');     // Enable implicit TLS encryption
        $mail->Port = config('mail.mailers.smtp.port');                 // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Recipients
        $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
        $mail->addAddress($to, $to_name);     // Add a recipient
        $mail->addReplyTo(config('mail.from.address'), config('mail.from.name'));

        // Attachments
        foreach ($attachments as $attachment) {
            $mail->addAttachment($attachment['path'], $attachment['name']);
        }

        // Render the email template
        $emailTemplate = View::make('emails.'.$view, $data)->render();

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $emailTemplate;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        return $mail->send();
    }
}
