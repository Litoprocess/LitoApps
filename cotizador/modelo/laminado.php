<?php
    require "conexion.php";
    $responsedos = new stdClass();
    $rowdos =array();
                          
    $id=$_REQUEST['id'];
    
    $laminado="SELECT ID_LAMINADO, DESCRIPCION, IMPORTE, POR_METRO FROM laminado_plotter WHERE ID_LAMINADO = '$id' AND ACTIVO = 1";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );    
    $consulta_Laminado=sqlsrv_query($conn,$laminado, $params, $options);
    $CL= sqlsrv_num_rows($consulta_Laminado);
                     
    if ( $CL >0) 
    {
        while($row = sqlsrv_fetch_array($consulta_Laminado,SQLSRV_FETCH_ASSOC))
        {
            $rowdos[] = array("id_Laminado"=>$row["ID_LAMINADO"],
                "descripcion"=>$row["DESCRIPCION"],
                "importe"=>$row["IMPORTE"],
                "por_Metro"=>$row["POR_METRO"]
                );
            $responsedos->rowdos = $rowdos;
            //echo var_dump($rowdos);
        }
    }
    
    if ($CL) 
    {
        $responsedos->validacion_laminado="true";
    }
    else
    {
        $responsedos->validacion_laminado="false";
    }
    
    echo json_encode ($responsedos);
?>