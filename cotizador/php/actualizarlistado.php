<?php
    require "conexion.php";

    $id_material = $_POST['id_material'];
    $importe= $_POST['importe'];

    $sql = "UPDATE materiales_cotizador SET IMPORTE = '$importe' WHERE ID_MATERIAL = '$id_material'";
    $stmt = sqlsrv_query($conn,$sql);

    $response = new stdClass(); 

    if($sql)
    {
        $response->validacion="true";
    }
    else
    {
        $response->validacion="false";
    }

    echo json_encode ($response);


?>