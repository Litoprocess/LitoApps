<?php
    require "conexion.php";
    $responsedos = new stdClass();
                          
    $id=$_REQUEST['id'];
    
    $acabados="SELECT ID_ACABADO, DESCRIPCION, IMPORTE, UNIDAD FROM acabados_plotter WHERE ID_ACABADO = '$id' AND ACTIVO = 1";
    $consulta_Acabados=mysql_query($acabados);
    $CA= mysql_num_rows($consulta_Acabados);
                     
    if ( $CA >0) 
    {
        for($i=0;$i<$CA;$i++)
        {
            $ID_ACABADO=mysql_result($consulta_Acabados,$i,"ID_ACABADO");
            $DESCRIPCION=mysql_result($consulta_Acabados,$i,"DESCRIPCION");
            $IMPORTE=mysql_result($consulta_Acabados,$i,"IMPORTE");
            $UNIDAD=mysql_result($consulta_Acabados,$i,"UNIDAD");
            
            $rowdos[] = array("id_Acabado"=>$ID_ACABADO,"descripcion"=>$DESCRIPCION,"importe"=>$IMPORTE,"unidad"=>$UNIDAD);
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