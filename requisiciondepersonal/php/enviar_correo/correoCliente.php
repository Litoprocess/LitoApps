<?php 

date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';

$nombreusuario = $_SESSION['Permisos']['NombreUsuario'];

$message = "Te informamos que " . $nombreusuario . " ha registrado una solicitud de personal".
	"<br><br>Para conocer más información ingresa a Litoapps o <a href='http://192.168.2.209/litoapps/login.php'>haz click aquí.</a>".
	"<br><br><br><br>".
	"<p style='color:#a1a1a1;'>Este e-mail se ha generado por un sistema automático. Por favor, no respondas a este e-mail directamente.</p>";

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
	$mail->setFrom('sistemas@litoprocess.com', 'Sistemas');
	$mail->CharSet = 'UTF-8';

	$mail->addAddress("integracion@litoprocess.com","Diana Santos");
	$mail->addAddress("enhernandez@litoprocess.com","Enrique Hernandez");
	$mail->addAddress("sgarcia@litoprocess.com","Sergio Garcia");
	$mail->addAddress("maflores@litoprocess.com","Alejandro Flores");
	$mail->Subject = 'Notificación de Nueva Requisición';
	//$mail->AddEmbeddedImage("../../imagenes/" . $file, 'imagen');
	$mensaje=$message;

	$mail->msgHTML("$mensaje");
	$mail->AltBody = 'Litoprocess';

	if (!$mail->send()) {
	  echo "no se envió";
	  
	} else {

	  echo "enviado";
	}


?>