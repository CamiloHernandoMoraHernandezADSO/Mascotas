<?php

namespace adso\Mascotas\libs;


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email {

    function sendEmail($email, $id) {
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Port = 587;
            $mail->Username = 'liamreyes2704@gmail.com';
            $mail->Password = 'xkkwlzcouiqusbdu';
    
            //Recipients
            $mail->setFrom('liamreyes2704@gmail.com', 'Liam Reyes');
            // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
            $mail->addAddress($email);               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
    
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password update request';
            $mail->Body    = 'Ingresa a este <a href="'.URL.'/login/updatepassword/'.$id.'>link</a> si deseas cambiar tu contraseña';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}