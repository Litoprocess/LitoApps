<?php
    require "conexion.php";
    $responsedos = new stdClass();
                          
    $id=$_REQUEST['id'];
    
    $tintas="SELECT ID_TINTA, TINTA, BAJA, ALTA FROM tintas_plotter WHERE ID_TINTA = '$id' AND ACTIVO = 1";
    $consulta_Tintas = sqlsrv_query($conn,$tintas);
    $CT = sqlsrv_fetch_array($consulta_Tintas,SQLSRV_FETCH_ASSOC);    
                     
    if ( $CT >0) 
    {
        for($i=0;$i<$CT;$i++)
        {
            $ID_TINTA=mysql_result($consulta_Tintas,$i,"ID_TINTA");
            $TINTA=mysql_result($consulta_Tintas,$i,"TINTA");
            $BAJA=mysql_result($consulta_Tintas,$i,"BAJA");
            $ALTA=mysql_result($consulta_Tintas,$i,"ALTA");
            
            $rowdos[] = array("id_Tinta"=>$ID_TINTA,"tinta"=>$TINTA,"baja"=>$BAJA,"alta"=>$ALTA);
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