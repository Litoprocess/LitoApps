<?php 

date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';

$Nombre = $_POST['Nombre'];
$Login = $_POST['Login'];
$Contrasena = $_POST['Contrasena'];
$Correo = $_POST['Correo'];

$message = "<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<title>Document</title>
</head>
<body>
Hola, " . $Nombre . "<br><br>" .
"En el departamento de Sistemas hemos desarrollado un portal que concentra todos lo programas que son necesarios para desempeñar las actividades que se llevan acabo en Litoprocess." .
"<br><br>" .
"A continuacion te hacemos entrega de los datos de acceso a Litoapps:" .
"<br>" .
"URL: http://apps.impresos.litoprocess.com/litoapps/login.php" .
"<br><br>".
"Usuario: " . $Login .  
"<br>" .
"Contraseña: " . $Contrasena . 
"<br><br>" .
"Si tienes algún problema para ingresar a la plataforma o te gustaria conocer a que aplicaciones tienes acceso, por favor contacta al departamento de Sistemas. <br><br>".
"<br><br>" .
"<font size='4' color='#000099'><b>Sergio Garcia |</font><font size='4' color='#666666'> Desarrollador de Software</b></font><br>
<font size='3' color='#666666'><u>T +52 (55)</u></font><font size='3' color='blue'><u> 2122 5600 ext. 224 |</u></font><br><br>
<font size='3' color='blue'><u>Litoprocess SA de CV</u></font><br><br>
<font size='3' color='#666666'><u>Calzada San Francisco Cuautlalpan 102A
53569 Naucalpan, Estado de Mexico
www.litoprocess.com </u></font>
<br>
<br>
<img src='cid:Logos_mail' alt='Logos_lito'>
<br>	 
<br>
<font size='2' color='#003399'>Este mensaje de datos contiene informacion confidencial que puede constituir un secreto industrial y esta dirigido solamente para la persona indicada. Si usted no es la persona para quien se dirige, debe abstenerse de reenviarlo, distribuirlo o copiarlo. Favor de notificar de inmediato por correo electronico al remitente, en caso de recibir este mensaje por error y eliminarlo de su sistema. Si usted no es el destinatario, se le notifica que la revelacion, uso, apoderamiento, copia, distribucion y/o tomar cualquier accion basada en el contenido de esta informacion, esta estrictamente prohibido. Para conocer nuestro Aviso de Privacidad, relacionado con el tratamiento de sus datos personales, favor de consultar la pagina:</font> <font size='2' color='blue'><u>www.litoprocess.com</u></font>
</body>
</html>";

	$mail = new PHPMailer;
	$mail->isSMTP();

	$mail->SMTPDebug = 0;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tsl';
	$mail->SMTPAuth = true;
	$mail->Username = "sgarcia@litoprocess.com";
	$mail->Password = "s33g2rc4";
	$mail->setFrom('sgarcia@litoprocess.com', 'Sistemas');
	$mail->CharSet = 'UTF-8';

	$mail->addAddress($Correo,$Nombre);
	//$mail->addAddress("mlegorreta@litoprocess.com","Mario Legorreta");
	//$mail->addAddress("mcharabati@litoprocess.com","Moises Charabati");
	//$mail->addAddress("vmartinez@litoprocess.com","Victor Martinez");
	//$mail->addAddress("mvega@litoprocess.com","");
	//$mail->addAddress("gmedrano@litoprocess.com","Guillermo Medrano");
	$mail->Subject = 'Te presentamos Litoapps';
	$mail->AddEmbeddedImage("../../img/Logos_mail.jpg","Logos_mail");
	$mensaje=$message;
	$mail->msgHTML("$mensaje");
	$mail->AltBody = 'Litoprocess';

	if (!$mail->send()) {
	  echo "no se envió";
	  
	} else {

	  echo "enviado";
	}


?>