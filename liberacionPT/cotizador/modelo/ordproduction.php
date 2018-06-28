<?php
    require "conexion.php";
    
    $response = new stdClass();
    
    $Folio=$_REQUEST['foliob'];

    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    //$folio="SELECT @@IDENTITY AS folio";
    $idproduction = "SELECT TOP(1) ID_PRODUCTION as ID_PRODUCTION FROM or_produccion ORDER BY ID_PRODUCTION DESC";
    $stmt2=sqlsrv_query($conn,$idproduction,$params,$options);
    $num = sqlsrv_num_rows( $stmt2 );

    while ($row =sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC)) 
    {
       $id_production = trim($row["ID_PRODUCTION"]);

    }
    $id_production = $id_production+1;
    
    $insertar = "INSERT INTO or_produccion(ID_PRODUCTION,FOLIO) VALUES ('$id_production','$Folio')";
    $stmt = sqlsrv_query($conn,$insertar);

    if($insertar){
        $response->validacion="true";
        $response->orprod=$id_production;    
    } else {
        $response->validacion="false";
    }
    echo json_encode ($response);
?>

    