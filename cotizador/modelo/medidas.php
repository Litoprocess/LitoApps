<?php
    require "conexion.php";
    $response = new stdClass();
    $rows =array();
                          
    $Id_Material=$_REQUEST['Id_Material'];
   
    $Medida_Material="SELECT ID_MATERIAL, NOMBRE_MATERIAL, ANCHO1, ALTO1, ANCHO2, ALTO2, ANCHO3, ALTO3, ANCHO4, ALTO4, ANCHO5, ALTO5, TIPO, IMPORTE, MONEDA, PROVEEDOR, ACTIVO, TRASLUCIDO, CORTE FROM materiales_cotizador WHERE ID_MATERIAL=$Id_Material";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $consulta_Medida = sqlsrv_query($conn,$Medida_Material, $params, $options);
    $CMM = sqlsrv_num_rows($consulta_Medida);
                     
    if ( $CMM >0) 
    {
        //or($i=0;$i<$CMM;$i++)
         while($row = sqlsrv_fetch_array($consulta_Medida,SQLSRV_FETCH_ASSOC))
        {
            $V_ANCHO1=$row["ANCHO1"];
            $V_ALTO1=$row["ALTO1"];
            
            if($V_ANCHO1==0||$V_ALTO1==0)
            {
                $Medida_Mat_1="";
                $ANCHO1="";
                $ALTO1="";
                $M_Mat1="";
            }
            else
            {
                $Medida_Mat_1="1";
                $ANCHO1= $row["ANCHO1"];
                $ALTO1= $row["ALTO1"];
                $M_Mat1= "Medida 1: ".$ANCHO1." X ".$ALTO1;
            }

            $V_ANCHO2=$row["ANCHO2"];
            $V_ALTO2=$row["ALTO2"];
            
            if($V_ANCHO2==0||$V_ALTO2==0)
            {
                $Medida_Mat_2="";
                $ANCHO2="";
                $ALTO2="";
                $M_Mat2="";
            }
            else
            {
                $Medida_Mat_2=2;
                $ANCHO2=$row["ANCHO2"];
                $ALTO2=$row["ALTO2"];
                $M_Mat2= "Medida 2: ".$ANCHO2." X ".$ALTO2;
            }

            $V_ANCHO3=$row["ANCHO3"];
            $V_ALTO3=$row["ALTO3"];
            
            if($V_ANCHO3==0||$V_ALTO3==0)
            {
                $Medida_Mat_3="";
                $ANCHO3="";
                $ALTO3="";
                $M_Mat3="";
            }
            else
            {
                $Medida_Mat_3=3;
                $ANCHO3=$row["ANCHO3"];
                $ALTO3=$row["ALTO3"];
                $M_Mat3= "Medida 3: ".$ANCHO3." X ".$ALTO3;
            }

            $V_ANCHO4=$row["ANCHO4"];
            $V_ALTO4=$row["ALTO4"];
            
            if($V_ANCHO4==0||$V_ALTO4==0)
            {
                $Medida_Mat_4="";
                $ANCHO4="";
                $ALTO4="";
                $M_Mat4="";
            }
            else
            {
                $Medida_Mat_4=4;
                $ANCHO4=$row["ANCHO4"];
                $ALTO4=$row["ALTO4"];
                $M_Mat4= "Medida 4: ".$ANCHO4." X ".$ALTO4;
            }

            $V_ANCHO5=$row["ANCHO5"];
            $V_ALTO5=$row["ALTO5"];
            
            if($V_ANCHO5==0||$V_ALTO5==0)
            {
                $Medida_Mat_5="";
                $ANCHO5="";
                $ALTO5="";
                $M_Mat5="";
            }
            else
            {
                $Medida_Mat_5=5;
                $ANCHO5=$row["ANCHO5"];
                $ALTO5=$row["ALTO5"];
                $M_Mat5= "Medida 5: ".$ANCHO5." X ".$ALTO5;
            }
            
            $V_Tipo=$row["TIPO"];
            
            if($V_Tipo=="R")
            {
                $Tipo="MATERIAL RIGIDO";
                $M_Tipo="R";
            }
            else if($V_Tipo=="F")
            {
                $Tipo="MATERIAL FLEXIBLE";
                $M_Tipo="F";
            }
            else if($V_Tipo=="P")
            {
                $Tipo="MATERIAL FOTOGRAFICO";
                $M_Tipo="P";
            }
            
            $Importe=$row["IMPORTE"];
            $Traslucido=$row["TRASLUCIDO"];
            $Corte=$row["CORTE"];
            
            
            $rows[] = array(
                "Medida_Mat_1"=>$Medida_Mat_1,
                "M_Mat1"=>$M_Mat1,
                "ANCHO1"=>$ANCHO1,
                "ALTO1"=>$ALTO1,
                "Medida_Mat_2"=>$Medida_Mat_2,
                "M_Mat2"=>$M_Mat2,
                "ANCHO2"=>$ANCHO2,
                "ALTO2"=>$ALTO2,
                "Medida_Mat_3"=>$Medida_Mat_3,
                "M_Mat3"=>$M_Mat3,
                "ANCHO3"=>$ANCHO3,
                "ALTO3"=>$ALTO3,
                "Medida_Mat_4"=>$Medida_Mat_4,
                "M_Mat4"=>$M_Mat4,
                "ANCHO4"=>$ANCHO4,
                "ALTO4"=>$ALTO4,
                "Medida_Mat_5"=>$Medida_Mat_5,
                "M_Mat5"=>$M_Mat5,"ANCHO5"=>$ANCHO5,
                "ALTO5"=>$ALTO5,
                "Tipo"=>$Tipo,
                "M_Tipo"=>$M_Tipo,
                "Importe"=>$Importe,
                "Traslucido"=>$Traslucido,
                "Corte"=>$Corte
                );
            $response->rows = $rows;
        }
    }
    
    if ($CMM) 
    {
        $response->validacion="true";
    }
    else
    {
        $response->validacion="false";
    }
    
    echo json_encode ($response);
?>