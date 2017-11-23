<?php
    require "conexion.php";

    $response = new stdClass();
                          
    $medidaEsp=$_REQUEST['medidaEsp'];
    
    $clientes="SELECT * FROM materiales_especiales_cotizador where ID_MAT_ESPECIAL=$medidaEsp";
    $consulta=mysql_query($clientes);
    $num= mysql_num_rows($consulta);
                     
    if ( $num >0) 
    {
        for($i=0;$i<$num;$i++)
        {
            $medidaEspecial=$_REQUEST['medidaEsp'];
            $NOMBRE_MATERIAL=mysql_result($consulta,$i,"NOMBRE_MATERIAL");
            $ANCHO=mysql_result($consulta,$i,"ANCHO");
            $ALTO=mysql_result($consulta,$i,"ALTO");
            $TIPO=mysql_result($consulta,$i,"TIPO");
            $IMPORTE=mysql_result($consulta,$i,"IMPORTE");
            $MONEDA=mysql_result($consulta,$i,"MONEDA");
            $PROVEEDOR=mysql_result($consulta,$i,"PROVEEDOR");
            $ACTIVO=mysql_result($consulta,$i,"ACTIVO");
            $TRASLUCIDO=mysql_result($consulta,$i,"TRASLUCIDO");
            $CORTE=mysql_result($consulta,$i,"CORTE");
            $DATE=mysql_result($consulta,$i,"DATE");

            $rows[] = array("medidaEspecial"=>$medidaEspecial,"NOMBRE_MATERIAL"=>$NOMBRE_MATERIAL,"ANCHO"=>$ANCHO,"ALTO"=>$ALTO,"TIPO"=>$TIPO,"IMPORTE"=>$IMPORTE,"MONEDA"=>$MONEDA,"PROVEEDOR"=>$PROVEEDOR,"ACTIVO"=>$ACTIVO,"TRASLUCIDO"=>$TRASLUCIDO,"CORTE"=>$CORTE,"DATE"=>$DATE);
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