<?php
    require "conexion.php";
    $responsedos = new stdClass();
    $rowdos =array();
                          
    $id=$_REQUEST['id'];
    
    $acabados="SELECT ID_ACABADO, DESCRIPCION, IMPORTE, UNIDAD FROM acabados_plotter WHERE ID_ACABADO = '$id' AND ACTIVO = 1";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $consulta_Acabados=sqlsrv_query($conn,$acabados, $params, $options);
    $CA= sqlsrv_num_rows($consulta_Acabados);
                     
    if ( $CA >0) 
    {
        while($row = sqlsrv_fetch_array($consulta_Acabados,SQLSRV_FETCH_ASSOC))
        {            
            $rowdos[] = array("id_Acabado"=>$row["ID_ACABADO"],
                "descripcion"=>$row["DESCRIPCION"],
                "importe"=>$row["IMPORTE"],
                "unidad"=>$row["UNIDAD"]
                );
            $responsedos->rowdos = $rowdos;
            //echo var_dump($rowdos);
        }
    }
    
    if ($CA) 
    {
        $responsedos->validacion_acabados="true";
    }
    else
    {
        $responsedos->validacion_acabados="false";
    }
    
    echo json_encode ($responsedos);
?>