<?php
    require "conexion.php";
    
    $response = new stdClass();
    
    $foliob = $_POST['foliob'];
    
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $comparacion = "SELECT * FROM v_bitacora WHERE FOLIO='$foliob'";
    $stmt = sqlsrv_query($conn,$comparacion, $params, $options);
    $num = sqlsrv_num_rows( $stmt );
    //echo $selectv = "SELECT * FROM v_bitacora WHERE FOLIO='$foliob'";

    if($num>0)
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

    