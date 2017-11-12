<?php

require_once '../include/PHPMaile/PHPMailerAutoload.php';
require_once '../include/config.php';

class Email{
    
    private $destino;
    private $origem;
    private $msg;
    
    
    function getDestino() {
        return $this->destino;
    }

    function getOrigem() {
        return $this->origem;
    }

    function getMsg() {
        return $this->msg;
    }

    function setDestino($destino) {
        $this->destino = $destino;
    }

    function setOrigem($origem) {
        $this->origem = $origem;
    }

    function setMsg($msg) {
        $this->msg = $msg;
    }

    
    
    function enviar(){
        
    
        /**
         * This example shows settings to use when sending via Google's Gmail servers.
         */

        //SMTP needs accurate times, and the PHP time zone MUST be set
        //This should be done in your php.ini, but this is how to do it if you don't have access to that
        date_default_timezone_set('Etc/UTC');



            //Create a new PHPMailer instance
        $mail = new PHPMailer;

       //Tell PHPMailer to use SMTP
       $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 2;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        //$mail->Host = '64.233.186.108';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6



        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = TRUE;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = EMAIL;

        //Password to use for SMTP authentication
        $mail->Password = EMAILPWD;

        //Set who the message is to be sent from
        $mail->setFrom(EMAIL);

        //Set an alternative reply-to address
        //$mail->addReplyTo('replyto@example.com', 'First Last');

        //Set who the message is to be sent to
        $mail->addAddress($this->destino);
		//$mail->addAddressCC(EMAIL);
		$mail->addCC(EMAIL);

        //Set the subject line
        $mail->Subject = 'PHPMailer - REPOSTA TCC';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($this->msg);

        //Replace the plain text body with one created manually
        //$mail->AltBody = 'This is a plain-text message body';

        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
                return false;
        } else {
                echo "Message sent!";
                return TRUE;
        }
    }

    
    
    
    
}