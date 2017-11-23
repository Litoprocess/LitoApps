<?php

date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();

$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tsl';
$mail->SMTPAuth = true;
$mail->Username = "cuenta de gmail correo servidor";
$mail->Password = "aqui tu pass";
$mail->setFrom('cuenta de gmail correo servidor', 'ssfff');
$mail->CharSet = 'UTF-8';

$mail->addAddress("rhernandez@imprimart.com.mx","Ricardo Olais");
$mail->Subject = 'Gracias por Abrigar un Alma';


$mensaje="HOLA MIC ORREOC D ";


$mail->msgHTML("$mensaje");
$mail->AltBody = 'fotosmile';

if (!$mail->send()) {
  echo "no se envió";
  
} else {

  echo "enviado";      
}

?>