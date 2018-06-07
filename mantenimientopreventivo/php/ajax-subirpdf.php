<?php 
if (isset($_FILES["file"]))
{
    $file = $_FILES["file"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = 'C:/xampp/htdocs/LitoApps/mantenimientopreventivo/manuales/';


    if ($tipo != 'application/pdf')
    {
      echo "Error, el archivo no es una documento PDF"; 
    }
    else
    {
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        //move_uploaded_file($_FILES['file']['tmp_name'], SITE_ROOT.'imagenes/');
        echo $src;
    }

}
?>