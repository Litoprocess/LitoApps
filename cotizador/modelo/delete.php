<?php
    require "conexion.php";

    $response=new StdClass();

    $idMat=$_REQUEST['idMat'];

    $borrar = "DELETE FROM materiales_cotizador WHERE ID_MATERIAL=$idMat";
    $result=mysql_query($borrar);

    if ($result)//si se realiza la eliminacion
    {
        $response->validacion="true";
    }
    else
    {
        $response->validacion="false"; 
    }

    echo json_encode ($response);
?>


