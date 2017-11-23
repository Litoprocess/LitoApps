<?php
class enviomensaje {

    function enviar($email,$cliente){



date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';

        
                    $mail = new PHPMailer;
                    $mail->isSMTP();

                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput = 'html';
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPAuth = true;
                    $mail->Username = "correo@imprimart.com.mx";
                    $mail->Password = "12345";
                    $mail->setFrom('servicioaclientes@fotosmile.com.mx', 'Servicio a clientes FOTOsmile');
                    $mail->CharSet = 'UTF-8';
                                               //envio de correo de 1 día
                    $mail->addAddress($maill,$clie);
                    $mail->Subject = 'AVISO DE PENDIENTE DE PAGO';


                    $mensaje="prueba";
                  


        $mail->msgHTML("$mensaje");
        $mail->AltBody = 'fotosmile';

       }

}