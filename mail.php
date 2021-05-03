<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
include 'connection.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'in-v3.mailjet.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'c5996b3d637ea17c0c6cb87e85b0476c';
$mail->Password = '78a83616792480126d485be15d33ebeb';
$mail->setFrom('rahmadbastanta00@gmail.com', 'Olimpiade - ENAM MEDIA');
$mail->addReplyTo('rahmadbastanta00@gmail.com', 'Olimpiaded - ENAM MEDIA');
$mail->addAddress('rahmadbastanta00@gmail.com', 'Rahmad Bastanta');
$mail->Subject = 'TEST';
$mail->MsgHTML('TEST');
if (!$mail->send()) {
    http_response_code(500);
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    http_response_code(200);
    echo 'The email message was sent.';
}
?>