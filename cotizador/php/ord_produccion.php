<?php
    require "conexion.php";
    
    $response = new stdClass();
    
    $Folio=$_REQUEST['foliob'];
        $arreglo = array();
    $sql = "INSERT INTO ord_produccion(FOLIO) VALUES ('$Folio')";
    $sql .= "SELECT Scope_Identity() as id";

    $stmt = sqlsrv_query($conn,$sql);

    sqlsrv_next_result($stmt);
    //$folio = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
        $arreglo[]=array("id_ordproduccion"=>$row['id']);
    }


    if($sql)
    {
        $response->validacion="true";
        $response->data=$arreglo;
    }
    else
    {
        $response->validacion="false";
    }

    echo json_encode ($response);
?>