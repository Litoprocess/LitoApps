<?php
    require "conexion.php";
    $responsedos = new stdClass();
                          
    $id=$_REQUEST['id'];
    
    $laminado="SELECT ID_LAMINADO, DESCRIPCION, IMPORTE, POR_METRO FROM laminado_plotter WHERE ID_LAMINADO = '$id' AND ACTIVO = 1";
    $consulta_Laminado=mysql_query($laminado);
    $CL= mysql_num_rows($consulta_Laminado);
                     
    if ( $CL >0) 
    {
        for($i=0;$i<$CL;$i++)
        {
            $ID_LAMINADO=mysql_result($consulta_Laminado,$i,"ID_LAMINADO");
            $DESCRIPCION=mysql_result($consulta_Laminado,$i,"DESCRIPCION");
            $IMPORTE=mysql_result($consulta_Laminado,$i,"IMPORTE");
            $POR_METRO=mysql_result($consulta_Laminado,$i,"POR_METRO");
            
            $rowdos[] = array("id_Laminado"=>$ID_LAMINADO,"descripcion"=>$DESCRIPCION,"importe"=>$IMPORTE,"por_Metro"=>$POR_METRO);
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