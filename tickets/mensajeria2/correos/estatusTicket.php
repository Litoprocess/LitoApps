<?php
session_start();

$IdTicket = $_POST['IdTicket'];
$data = $_POST['data'];
$NombreUsuario = $_POST["NombreUsuario"];
$CorreoSolicita = $_POST['mailSolicita'];
$NombreSolicita = $_POST['nameSolicita'];

date_default_timezone_set('Etc/UTC');
require '../enviar_correo/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();

$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tsl';
$mail->SMTPAuth = true;
$mail->Username = "envios2@litoprocess.com";
$mail->Password = "33nv44422";
$mail->setFrom('envios2@litoprocess.com', 'Mensajería 2 - Litoprocess');
$mail->CharSet = 'UTF-8';

$mail->addAddress($CorreoSolicita, $NombreSolicita);
$mail->Subject = "Ha habido una actualizacion en el ticket N° ".$IdTicket;

$mail->msgHTML("El estado actual del ticket N° <b>$IdTicket</b> cambió.<br><br>Su ticket se encuentra <b>$data</b>
	<br><br>Para conocer más información <a href='http://201.149.83.216/litoapps/login.php'>haz click aquí.</a>
	<br><br><br><br><br><br><br>
	<p style='color:#a1a1a1;'>Este e-mail se ha generado por un sistema automático. Por favor, no respondas a este e-mail directamente.</p>");

$mail->AltBody = 'Litoprocess';
$mail->send();

?>