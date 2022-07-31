<?php
namespace App\Mails;

use App\Mails\Contracts\Mail;
use PHPMailer\PHPMailer\Exception;
class VerificationCodeMail extends Mail {
    public function send() :bool
    {
        try {
            $this->mail->setFrom($this->mailFrom,$this->mailFromName);
            $this->mail->addAddress($this->mailTo);     
            $this->mail->isHTML(true);                                  
            $this->mail->Subject = $this->subject;
            $this->mail->Body    = $this->body;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}