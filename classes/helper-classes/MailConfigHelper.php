
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";

class MailConfigHelper
{
    public static function getMailer():PHPMailer
    {
        $mail = new PHPMailer();
        //$mail->SMTPDebug = 4;
        $mail->isSMTP();
        $mail->Host ="smtp.mailtrap.io";
        $mail->SMTPAuth = true;
        $mail->Username = "a2b6ad841062d6";
        $mail->Password = "d83be9220e7ff7";
        $mail->Port = 2525;
        $mail->SMTPSecure = "tls";
        $mail->isHTML(true);
        $mail->setFrom("muskanaswani25@gmail.com","<Muskaan Aswani>");
        
        return $mail;
    }
}
