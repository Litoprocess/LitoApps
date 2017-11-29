<?php
    require "conexion.php";
    
    $response = new stdClass();
    
    $Folio=$_REQUEST['foliob'];
    
    $insertar = "INSERT INTO or_produccion(FOLIO) VALUES ('$Folio')";
    $stmt = sqlsrv_query($conn,$insertar);

    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $id="SELECT @@IDENTITY AS id";
    $stmt2=sqlsrv_query($conn,$id,$params,$options);
    $num = sqlsrv_num_rows( $stmt2 );

    while ($row =sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC)) 
    {
    $idproduction = trim($row["id"]);
    } 

    if($num>0){
        $response->validacion="true";
        $response->orprod=$idproduction;    
    } else {
        $response->validacion="false";
    }
    echo json_encode ($response);
?>

    