<?php
    include "conexion.php";
    
    $response = new stdClass();
    
    $foliob = $_POST['foliob'];
    
    $comparacion = "SELECT * FROM v_bitacora WHERE FOLIO='$foliob'";
    $stmt = sqlsrv_query($conn,$comparacion);
    //echo $selectv = "SELECT * FROM v_bitacora WHERE FOLIO='$foliob'";
    
    $registros = sqlsrv_num_rows($stmt);
    var_dump($registros);
    exit();
    if($registros>0)
    {
        $response->validacion="true";
        //$response->folio=$foliob;
    }
    else
    {
        $response->validacion="false";
    }
    
    echo json_encode ($response);
?>

    