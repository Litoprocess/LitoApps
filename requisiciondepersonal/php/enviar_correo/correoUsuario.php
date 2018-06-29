<?php 

date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';

$nombreusuario = $_SESSION['Permisos']['NombreUsuario'];
$correousuario = $_SESSION['Permisos']['CorreoUsuario'];

$message = "Hola " . $nombreusuario . "<br><br> Tu Solicitud de Personal ha sido registrada y recibida por el Departamento de Capital Humano.".
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

	$mail->addAddress($correousuario,$nombreusuario);
	$mail->Subject = 'Solicitud de Personal enviada';
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