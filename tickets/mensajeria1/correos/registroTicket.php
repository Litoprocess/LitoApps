<?php
session_start();

//Asignacion de variables

$IdTicket = $_POST["IdTicket"];
$NombreUsuario = $_POST["NombreUsuario"];
$Departamento = $_POST["Departamento"];
$Correo = $_POST["CorreoUsuario"];
$Correo2 = $_POST['Correo2'];

$Id_Categoria = $_POST['selCategoria'];
$Titulo =  mb_strtoupper($_POST['txtTitulo']);
$Tarea =  mb_strtoupper($_POST['txtNotas']);
$Fecha = date("d-m-Y H:i:s");

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

$mail->addAddress($Correo, $NombreUsuario);
$mail->AddCC($Correo2);

$mail->Subject = "Su ticket ha sido registrado con el Folio N° ".$IdTicket;

$mail->msgHTML("Detalles del ticket N° <b>$IdTicket</b>.
	<br><br>Asunto: ".$Tarea."
	<br><br>Categoría: $Id_Categoria
	<br><br>Fecha de registro: $Fecha
	<br><br>Para conocer más información <a href='http://201.149.83.216/litoapps/login.php'>haz click aquí.</a>
	<br><br><br><br><br><br><br>
	<p style='color:#a1a1a1;'>Este e-mail se ha generado por un sistema automático. Por favor, no respondas a este e-mail directamente.</p>");
$mail->AltBody = 'Litoprocess';
$mail->send();

?>