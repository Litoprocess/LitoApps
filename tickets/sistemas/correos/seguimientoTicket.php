<?php
session_start();

//Asignacion de variables

$IdTicket = $_POST['Ticket'];
$Notas = utf8_decode(mb_strtoupper($_POST['Notas']));
$CorreoAtencion = $_POST['CorreoUsuario'];
$NombreUser = $_POST['NombreUsuario'];
$Correo2 = $_POST['Correo2'];

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
$mail->Username = "sistemas@litoprocess.com";
$mail->Password = "s444st33";
$mail->setFrom('sistemas@litoprocess.com', 'SISTEMAS');
$mail->CharSet = 'UTF-8';

$mail->addAddress($CorreoAtencion, $NombreUser);
$mail->AddCC($Correo2);
$mail->Subject = "Hay una actualización en el ticket N° ".$IdTicket;

$mail->msgHTML("<b>Seguimiento del ticket N° $IdTicket</b><br><br>".utf8_encode($Notas)."<br><br>Para ver el seguimiento completo del ticket <a href='http://201.149.83.216/litoapps/login.php'>haz click aquí.</a>
	<br><br><br><br><br><br><br>
	<p style='color:#a1a1a1;'>Este e-mail se ha generado por un sistema automático. Por favor, no respondas a este e-mail directamente.</p>");
$mail->AltBody = 'Litoprocess';
$mail->send();

?>