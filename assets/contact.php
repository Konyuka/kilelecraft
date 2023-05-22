<?php

require_once '../vendor/autoload.php'; // Include the PHPMailer autoloader

// Create a new PHPMailer instance
$mail = new PHPMailer\PHPMailer\PHPMailer();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {    
    // Set the SMTP server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.googlemail.com'; // Replace with your SMTP server hostname
    $mail->Port = 465; // Replace with your SMTP server port number
    $mail->SMTPAuth = true;
    $mail->Username = 'michaelsaiba84@gmail.com'; // Replace with your SMTP server username
    $mail->Password = 'ygxvsqgfobrtmbof'; // Replace with your SMTP server password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption


    //Recipients
    $mail->setFrom('info@kilelecraft.com', 'Kilele Craft');
    // $mail->addAddress('michaelsaiba84@gmail.com', 'Sales Kilele Craft');
    $mail->addAddress('sales@kilelecraft.com', 'Sales Kilele Craft');
    $mail->addReplyTo('info@kilelecraft.com', 'Information');
    
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'New contact from ' . $_POST['name'];
    $mail->Body = "Name: {$_POST['name']}\nEmail: {$_POST['email']}\nSubject: {$_POST['subject']}\nMessage: {$_POST['message']}";

    $mail->send();
    header("Location: ../index.html?success=1");
    exit;
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>