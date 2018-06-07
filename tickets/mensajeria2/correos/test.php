<?php
$to      = 'g.juarez.94@gmail.com';
$subject = 'Varela';
$message = 'hello';
$headers = 'From: desarrollo@live.com' . "\r\n" .    
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

echo "Enviado"

?>