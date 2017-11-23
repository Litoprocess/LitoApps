<?php
    require "conexion.php";
    
    $response = new stdClass();
    
    $foliob = $_POST['foliob'];
    
    $comparacion = mysql_query("SELECT * FROM v_bitacora WHERE FOLIO='$foliob'", $con);
    //echo $selectv = "SELECT * FROM v_bitacora WHERE FOLIO='$foliob'";
    
    $registros = mysql_num_rows($comparacion);
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

    