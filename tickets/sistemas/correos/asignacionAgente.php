<?php
session_start();

$IdTicket = $_POST['IdTicket'];
$Titulo = $_POST['titulo'];
$data = $_POST['data'];
$NombreUsuario = $_POST["NombreUsuario"];
$cAgente = $_POST['cagente'];
$Problema = $_POST['Problema'];

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

$mail->addAddress($cAgente, $data);
$mail->Subject = "Se te asigno el ticket N° ".$IdTicket;

$mail->msgHTML("<b>$Titulo</b><br><br>$Problema<br><br>Para dar seguimiento al ticket <a href='http://201.149.83.216/litoapps/login.php'>haz click aquí.</a>
	<br><br><br><br><br><br><br>
	<p style='color:#a1a1a1;'>Este e-mail se ha generado por un sistema automático. Por favor, no respondas a este e-mail directamente.</p>");
$mail->AltBody = 'Litoprocess';
$mail->send();


?>