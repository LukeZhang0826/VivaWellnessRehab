<?php

$name = $_POST["appointmentName"];
$email = $_POST["appointmentEmail"];
$date = $_POST["appointmentDate"];
$time = $_POST["appointmentTime"];
$serivice = $_POST["appointmentService"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPOMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;


$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "info@example.com";
$mail->Password = "password";

$mail->setFrom($email, $name);
$mail->addAddress("dave@example.com", "Dave");

$mail->Subject = $name." ".$service." Appointment Request";
$mail->Body = $name." (".$email.") - ".$service." appointment request for ".$date." ".$time;

$mail->send();

echo "email sent";

?>
