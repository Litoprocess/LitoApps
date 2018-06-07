<?php
session_start();

//Asignacion de variables

$IdTicket = $_POST['Ticket'];
$NombreUser = $_POST['NombreUsuario'];
$CorreoAtencion = $_POST['CorreoUsuario'];
$Notas = mb_strtoupper($_POST['Notas']);
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
$mail->Username = "envios1@litoprocess.com";
$mail->Password = "33nv4441";
$mail->setFrom('envios1@litoprocess.com', 'Mensajería 1 - Litoprocess');
$mail->CharSet = 'UTF-8';

$mail->addAddress($CorreoAtencion, $NombreUser);
$mail->AddCC($Correo2);
$mail->Subject = "Ha habido un cambio en el ticket N° ".$IdTicket;

$mail->msgHTML("<b>Seguimiento del ticket N° $IdTicket</b><br><br>".$Notas."<br><br>Para ver el seguimiento completo del ticket <a href='http://201.149.83.216/litoapps/login.php'>haz click aquí.</a>
	<br><br><br><br><br><br><br>
	<p style='color:#a1a1a1;'>Este e-mail se ha generado por un sistema automático. Por favor, no respondas a este e-mail directamente.</p>");
$mail->AltBody = 'Litoprocess';
$mail->send();

?>