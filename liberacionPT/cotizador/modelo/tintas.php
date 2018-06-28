<?php
    require "conexion.php";
    $responsedos = new stdClass();
    $rowdos =array();
                          
    $id=$_REQUEST['id'];
    
    $tintas="SELECT ID_TINTA, TINTA, BAJA, ALTA FROM tintas_plotter WHERE ID_TINTA = '$id' AND ACTIVO = 1";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $consulta_Tintas = sqlsrv_query($conn,$tintas,$params, $options);
    $CT = sqlsrv_num_rows( $consulta_Tintas );   
                     
    if ( $CT >0) 
    {
        while($row = sqlsrv_fetch_array($consulta_Tintas,SQLSRV_FETCH_ASSOC))
        {            
            $rowdos[] = array("id_Tinta"=>$row["ID_TINTA"],
                "tinta"=>$row["TINTA"],
                "baja"=>$row["BAJA"],
                "alta"=>$row["ALTA"]
                );
            $responsedos->rowdos = $rowdos;
            //echo var_dump($rowdos);
        }
    }
    
    if ($CT) 
    {
        $responsedos->validacion_tinta="true";
    }
    else
    {
        $responsedos->validacion_tinta="false";
    }
    
    echo json_encode ($responsedos);
?>