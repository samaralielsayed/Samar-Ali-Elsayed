<?php
namespace App\Mails\Contracts;

//use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
abstract class Mail {
    protected string $mailHost = 'smtp-mail.outlook.com';
    protected int $mailPort = 587;
    protected string $mailEncryption = 'tls';
    protected string $mailFrom = 'samarnti20@outlook.com';
    protected string $mailFromPassword = 'samar12345';
    protected PHPMailer $mail;
    protected string $mailTo,$subject,$body,$mailFromName;
    public function __construct($mailTo,$subject,$body,$mailFromName = 'Ecommerce') {
        $this->mailTo = $mailTo;
        $this->subject = $subject;
        $this->body = $body;
        $this->mailFromName = $mailFromName;
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;                      
        $this->mail->isSMTP();                                            
        $this->mail->Host       = $this->mailHost;                     
        $this->mail->SMTPAuth   = true;                             
        $this->mail->Username   = $this->mailFrom;                    
        $this->mail->Password   = $this->mailFromPassword;                               
        $this->mail->SMTPSecure = $this->mailEncryption;         
        $this->mail->Port       = $this->mailPort;      

    }
    protected abstract function send();
}

