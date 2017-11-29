<?php
session_start();

//Asignacion de variables

$IdTicket = $_POST['Ticket'];
$NombreUser = $_POST['NombreUsuario'];
$CorreoAtencion = $_POST['CorreoUsuario'];
$Notas = utf8_decode(mb_strtoupper($_POST['Notas']));
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
$mail->Username = "envios2@litoprocess.com";
$mail->Password = "33nv44422";
$mail->setFrom('envios2@litoprocess.com', 'Mensajería 2 - Litoprocess');
$mail->CharSet = 'UTF-8';

$mail->addAddress($CorreoAtencion, $NombreUser);
$mail->AddCC($Correo2);
$mail->Subject = "Ha habido un cambio en el ticket N° ".$IdTicket;

$mail->msgHTML("<b>Seguimiento del ticket N° $IdTicket</b><br><br>".utf8_encode($Notas)."<br><br>Para ver el seguimiento completo del ticket <a href='http://201.149.83.215:8080/tickets/mensajeria2/usuarios.php'>haz click aquí.</a>
	<br><br><br><br><br><br><br>
	<p style='color:#a1a1a1;'>Este e-mail se ha generado por un sistema automático. Por favor, no respondas a este e-mail directamente.</p>");

$mail->AltBody = 'Litoprocess';
$mail->send();

?>