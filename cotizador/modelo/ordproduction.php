<?php
    require "conexion.php";
    
    $response = new stdClass();
    
    $Folio=$_REQUEST['foliob'];
    
    $insertar = mysql_query("INSERT INTO or_produccion(FOLIO) VALUES ('$Folio')", $con);
    
    $idproduction=mysql_insert_id();
    if ($insertar) 
    {
        $response->validacion="true";
        $response->orprod=$idproduction;
    }
    else
    {
        $response->validacion="false";
    }
    echo json_encode ($response);
?>

    