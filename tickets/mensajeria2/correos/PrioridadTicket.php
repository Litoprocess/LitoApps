<?php
session_start();

$IdTicket = $_POST['IdTicket'];
$NombreUsuario = $_POST["NombreUsuario"];
$data = $_POST['data'];
$cAgente = $_POST['cagente'];
$nAgente = $_POST['nagente'];

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

$mail->addAddress($cAgente, $nAgente);
$mail->Subject = "La prioridad del ticket N° ".$IdTicket." cambió.";

$mail->msgHTML("La prioridad del ticket cambió a: <strong>$data</strong>"."<br><br>Para dar seguimiento al ticket <a href='http://201.149.83.216/litoapps/login.php'>haz click aquí.</a>
	<br><br><br><br><br><br><br>
	<p style='color:#a1a1a1;'>Este e-mail se ha generado por un sistema automático. Por favor, no respondas a este e-mail directamente.</p>");
$mail->AltBody = 'Litoprocess';
$mail->send();


?>