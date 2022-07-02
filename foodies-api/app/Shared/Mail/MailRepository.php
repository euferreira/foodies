<?php

namespace App\Shared\Mail;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class MailRepository
{
    /**
     * @throws Exception
     */
    public static function send(string $to, $body, $subject = 'Código de confirmação'): void
    {
        try {
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = env('MAIL_AUTH');
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->CharSet = 'UTF-8';
            $mail->Port = env('MAIL_PORT');

            $mail->setFrom(env('MAIL_USERNAME'), 'Mailer');
            $mail->addAddress($to);
            $mail->isHTML();
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->send();
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), 400);
        }
    }
}
