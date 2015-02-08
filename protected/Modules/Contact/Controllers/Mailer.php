<?php

require 'PHPMailer';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('verablajennaya@mail.ru', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('veramir10@gmail.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('veramir10@gmail.com', 'Вера');
//Set the subject line
$mail->Subject = 'PHPMailer mail() test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file

//send the message, check for errors
if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
} else {
      echo "Message sent!";
}