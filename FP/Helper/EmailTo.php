<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26-09-16
 * Time: 5:07 PM
 */
require "PHPMailer-master/PHPMailerAutoload.php";
class EmailTo
{
    protected static $mail;
    function __construct($senderName,$subject,$recipientEmail,$recipientName,$contentBody)
    {
        self::$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
        self::$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
       self::$mail->SMTPDebug =1;
//Ask for HTML-friendly debug output
        self::$mail->Debugoutput = 'html';
//Set the hostname of the mail server
        self::$mail->Host = 'smtp.gmail.com';
// use
// self::$mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
        self::$mail->CharSet="UTF-8";
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        self::$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
        self::$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
        self::$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
        self::$mail->Username = "cornucopiafp@gmail.com";
//Password to use for SMTP authentication
        self::$mail->Password = "cornucopiafpfp";
//Set who the message is to be sent from
        self::$mail->setFrom("cornucopiafp@gmail.com", $subject);
//Set an alternative reply-to address
        self::$mail->addReplyTo("cornucopiafp@gmail.com", $senderName);
//Set who the message is to be sent to
        self::$mail->addAddress($recipientEmail, $recipientName);
//Set the subject line
        self::$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//self::$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
       // self::$mail->AltBody = 'This is a plain-text message body';
        self::$mail->isHTML(true);
        self::$mail->Body=$contentBody;
//Attach an image file
//self::$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors



    }

    public function send(){
        if (!self::$mail->send()) {
            echo "Mailer Error: " . self::$mail->ErrorInfo;
            return false;
        } else {
            return true;
        }

    }
}