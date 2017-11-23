<?php
    require "conexion.php";

    $response = new stdClass();
                          
    $Folio=$_REQUEST['FOLIO'];
    $clientes="SELECT OR_MATRIX, FECHA_ENTREGA FROM or_produccion WHERE FOLIO=$Folio";
    $consulta=mysql_query($clientes);
    $num= mysql_num_rows($consulta);
                     
    if ( $num >0) 
    {
        for($i=0;$i<$num;$i++)
        {
            $OR_MATRIX=mysql_result($consulta,$i,"OR_MATRIX");
            $FECHA_ENTREGA=mysql_result($consulta,$i,"FECHA_ENTREGA");

            $rows[] = array("matrix"=>$OR_MATRIX,"fentrega"=>$FECHA_ENTREGA);
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