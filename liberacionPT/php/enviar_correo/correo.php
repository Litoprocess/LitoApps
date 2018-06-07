<?php 

date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';

$nombre = $_SESSION['NombreUsuario'];
$orden = $_POST['orden'];
$muestraRechazada = $_POST['muestraRechazada'];
$rechazado = $_POST['rechazado'];
$tabla = $_POST['tabla'];
$tamlote = $_POST['tamlote'];
$observaciones = $_POST['observaciones'];
$file = $_POST['file'];

$message = "Te informamos que Calidad ha rechazado la liberación de la orden: " . "<br><br>" .
"<b>" . $orden . "</b>". "<br><br>" . 
"Ya que se rechararon " . "<b>" . $muestraRechazada . "</b>". " piezas, siendo que el máximo permitido es de " . 
"<b>" . $rechazado . "</b>" . "<br>" . " de acuerdo a la tabla de Inspección nivel " . "<b>" . $tabla . "</b>". 
" autorizada." . "<br><br>" . " El tamaño  del lote rechazado es de " . "<b>" . $tamlote . "</b>" . " piezas." . "<br><br>" .
"Teniendo las siguientes observaciones: " . "<br>" . $observaciones . "<br><br>" .
"Cualquier aclaración hacerla directamente con el " . "<b>Ing. Mario Legorreta</b>" . "<br><br>" . "--" . "<br><br>" .
"<b>" . $nombre . "</b>" . " | Auditor de Calidad";


	$mail = new PHPMailer;
	$mail->isSMTP();

	$mail->SMTPDebug = 0;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tsl';
	$mail->SMTPAuth = true;
	$mail->Username = "calidad@litoprocess.com";
	$mail->Password = "c21444d2";
	$mail->setFrom('calidad@litoprocess.com', 'Calidad');
	$mail->CharSet = 'UTF-8';

	$mail->addAddress("sgarcia@litoprocess.com","Sergio Garcia");
	$mail->addAddress("mlegorreta@litoprocess.com","Mario Legorreta");
	$mail->addAddress("mcharabati@litoprocess.com","Moises Charabati");
	$mail->addAddress("vmartinez@litoprocess.com","Victor Martinez");
	$mail->addAddress("mvega@litoprocess.com","");
	$mail->addAddress("gmedrano@litoprocess.com","Guillermo Medrano");
	$mail->Subject = 'Notificacion de muestra rechazada';
	$mail->AddEmbeddedImage($file, 'imagen');
	$mensaje=$message;

	$mail->msgHTML("$mensaje");
	$mail->AltBody = 'Litoprocess';

	if (!$mail->send()) {
	  echo "no se envió";
	  
	} else {

	  echo "enviado";
	}


?>