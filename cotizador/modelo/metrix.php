<?php
    require "conexion.php";

    $response = new stdClass();
    $rows =array();    
                          
    $Folio=$_REQUEST['FOLIO'];
    $clientes="SELECT OR_MATRIX, FECHA_ENTREGA FROM or_produccion WHERE FOLIO=$Folio";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );    
    $consulta=sqlsrv_query($conn,$clientes,$params,$options);
    $num= sqlsrv_num_rows($consulta);
                     
    if ( $num >0) 
    {
        while ($row =sqlsrv_fetch_array($consulta,SQLSRV_FETCH_ASSOC)) 
        { 
            $rows[] = array(
                "matrix"=>$row["OR_MATRIX"],
                "fentrega"=>$row["FECHA_ENTREGA"]
                );
            $response->rows = $rows;
        }
    }
    if ($num) 
    {
        $response->validacion="true";
    }
    else
    {
        $response->validacion="false";
    }
    echo json_encode ($response);
?>