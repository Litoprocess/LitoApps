<?php
    require "conexion.php";
    
    $response = new stdClass();
    
    $Folio=$_REQUEST['foliob'];
    $fentrega=$_REQUEST['fentrega'];
    $ormetrix=$_REQUEST['ormetrix'];
    
    //echo $insertar = "UPDATE OR_PRODUCCION SET FECHA_ENTREGA='".$fentrega."', OR_MATRIX='".$ormetrix."' where FOLIO='".$Folio."'";
    
    $insertar = mysql_query("UPDATE or_produccion SET FECHA_ENTREGA='$fentrega', OR_MATRIX='$ormetrix' where FOLIO='$Folio'", $con);
    
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

    