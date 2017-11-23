<?php
    require "conexion.php";
    $response = new stdClass();
                          
    $Id_Material=$_REQUEST['Id_Material'];
    
    $Medida_Material="SELECT ID_MATERIAL, NOMBRE_MATERIAL, ANCHO1, ALTO1, ANCHO2, ALTO2, ANCHO3, ALTO3, ANCHO4, ALTO4, ANCHO5, ALTO5, TIPO, IMPORTE, MONEDA, PROVEEDOR, ACTIVO, TRASLUCIDO, CORTE FROM materiales_cotizador WHERE ID_MATERIAL=$Id_Material";
    $consulta_Medida = sqlsrv_query($conn,$Medida_Material);
    $CMM = sqlsrv_fetch_array($consulta_Medida,SQLSRV_FETCH_ASSOC);
                     
    if ( $CMM >0) 
    {
        for($i=0;$i<$CMM;$i++)
        {
            $V_ANCHO1=mysql_result($consulta_Medida,$i,"ANCHO1");
            $V_ALTO1=mysql_result($consulta_Medida,$i,"ALTO1");
            
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
                $ANCHO1=mysql_result($consulta_Medida,$i,"ANCHO1");
                $ALTO1=mysql_result($consulta_Medida,$i,"ALTO1");
                $M_Mat1= "Medida 1: ".$ANCHO1." X ".$ALTO1;
            }

            $V_ANCHO2=mysql_result($consulta_Medida,$i,"ANCHO2");
            $V_ALTO2=mysql_result($consulta_Medida,$i,"ALTO2");
            
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
                $ANCHO2=mysql_result($consulta_Medida,$i,"ANCHO2");
                $ALTO2=mysql_result($consulta_Medida,$i,"ALTO2");
                $M_Mat2= "Medida 2: ".$ANCHO2." X ".$ALTO2;
            }

            $V_ANCHO3=mysql_result($consulta_Medida,$i,"ANCHO3");
            $V_ALTO3=mysql_result($consulta_Medida,$i,"ALTO3");
            
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
                $ANCHO3=mysql_result($consulta_Medida,$i,"ANCHO3");
                $ALTO3=mysql_result($consulta_Medida,$i,"ALTO3");
                $M_Mat3= "Medida 3: ".$ANCHO3." X ".$ALTO3;
            }

            $V_ANCHO4=mysql_result($consulta_Medida,$i,"ANCHO4");
            $V_ALTO4=mysql_result($consulta_Medida,$i,"ALTO4");
            
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
                $ANCHO4=mysql_result($consulta_Medida,$i,"ANCHO4");
                $ALTO4=mysql_result($consulta_Medida,$i,"ALTO4");
                $M_Mat4= "Medida 4: ".$ANCHO4." X ".$ALTO4;
            }

            $V_ANCHO5=mysql_result($consulta_Medida,$i,"ANCHO5");
            $V_ALTO5=mysql_result($consulta_Medida,$i,"ALTO5");
            
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
                $ANCHO5=mysql_result($consulta_Medida,$i,"ANCHO5");
                $ALTO5=mysql_result($consulta_Medida,$i,"ALTO5");
                $M_Mat5= "Medida 5: ".$ANCHO5." X ".$ALTO5;
            }
            
            $V_Tipo=mysql_result($consulta_Medida,$i,"TIPO");
            
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
            
            $Importe=mysql_result($consulta_Medida,$i,"IMPORTE");
            $Traslucido=mysql_result($consulta_Medida,$i,"TRASLUCIDO");
            $Corte=mysql_result($consulta_Medida,$i,"CORTE");
            
            
            $rows[] = array("Medida_Mat_1"=>$Medida_Mat_1,"M_Mat1"=>$M_Mat1,"ANCHO1"=>$ANCHO1,"ALTO1"=>$ALTO1,"Medida_Mat_2"=>$Medida_Mat_2,"M_Mat2"=>$M_Mat2,"ANCHO2"=>$ANCHO2,"ALTO2"=>$ALTO2,"Medida_Mat_3"=>$Medida_Mat_3,"M_Mat3"=>$M_Mat3,"ANCHO3"=>$ANCHO3,"ALTO3"=>$ALTO3,"Medida_Mat_4"=>$Medida_Mat_4,"M_Mat4"=>$M_Mat4,"ANCHO4"=>$ANCHO4,"ALTO4"=>$ALTO4,"Medida_Mat_5"=>$Medida_Mat_5,"M_Mat5"=>$M_Mat5,"ANCHO5"=>$ANCHO5,"ALTO5"=>$ALTO5,"Tipo"=>$Tipo,"M_Tipo"=>$M_Tipo,"Importe"=>$Importe,"Traslucido"=>$Traslucido,"Corte"=>$Corte);
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