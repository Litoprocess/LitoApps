<?php
    require "conexion.php";
    
    $response = new stdClass();
    
    $Folio=$_REQUEST['foliob'];
    $fentrega=$_REQUEST['fentrega'];
    $ormetrix=$_REQUEST['ormetrix'];
    
    //echo $insertar = "UPDATE OR_PRODUCCION SET FECHA_ENTREGA='".$fentrega."', OR_MATRIX='".$ormetrix."' where FOLIO='".$Folio."'";
    
    $insertar = "UPDATE or_produccion SET FECHA_ENTREGA='$fentrega', OR_MATRIX='$ormetrix' where FOLIO='$Folio'";
    $stmt = sqlsrv_query($conn,$insertar);

    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $prod="SELECT ID_PRODUCTION FROM or_produccion WHERE FECHA_ENTREGA='$fentrega' AND OR_MATRIX='$ormetrix' AND FOLIO='$Folio'";
    $stmt2=sqlsrv_query($conn,$prod,$params,$options);

    $num = sqlsrv_num_rows( $stmt2 );

    while ($row =sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC)) 
    {
    $idproduction = trim($row["ID_PRODUCTION"]);
    }

    if($insertar){
        $response->validacion="true";
        $response->orprod=$idproduction; 
    } else {
        $response->validacion="false";
    }
    echo json_encode ($response);    
?>

    