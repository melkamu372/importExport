<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once '../vendor/autoload.php';
$mail = new PHPMailer(true);
try {
  //$mail->SMTPDebug = 2;                 //Enable verbose debug output
  $mail->isSMTP();                         // Send using SMTP
  $mail->Host       = 'josicon.com';          // Set the SMTP server to send through
  $mail->SMTPAuth   = true;                   // Enable SMTP authentication
  $mail->Username   = 'contact@josicon.com';     // SMTP username
  $mail->Password   = '';           // SMTP password
  $mail->SMTPSecure = 'tls';         
  $mail->Port       = 587;             
    // Recipients
  $mail->FromName = $_POST['name'];
  $mail->setFrom($_POST['email'], 'Contact Form');
  $mail->addAddress('contact@josicon.com', 'Josicon Engineering PLC');     // Add a recipient
  //$mail->addReplyTo($_POST['email'], 'Information');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');
  $mail->Subject = $_POST['subject'];
  $mail->Body    = $_POST['message'];
  //$mail->send();
  if(!$mail->send())
  {
  die( 'Message could not be sent');
  }
  else
  {
  echo "OK";
     }
  } catch (Exception $e) {
      echo "Message could not be sent.try later."  ;
      //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
  
?>