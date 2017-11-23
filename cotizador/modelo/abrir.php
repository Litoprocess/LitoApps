<?php
    require "conexion.php";

    $response = new stdClass();
    $rows =array();
    
    $Folio2=$_POST['FOLIO2'];
    $Folio3=$_POST['FOLIO3'];
    $Folio4=$_POST['FOLIO4'];
    
    if(isset($Folio2) && $Folio2!="" && isset($Folio3) && $Folio3!="" && isset($Folio4) && $Folio4!="")
    {
        $clientes="SELECT * FROM v_abrir WHERE FOLIO = '$Folio2' AND ID_PRODUCTION = '$Folio3' AND OR_MATRIX = '$Folio4'";
    }
    else if(isset($Folio2) && $Folio2!="" && isset($Folio4) && $Folio4!="")
    {
        $clientes="SELECT * FROM v_abrir WHERE FOLIO = '$Folio2' AND OR_MATRIX = '$Folio4'";
    }
    else if(isset($Folio3) && $Folio3!="" && isset($Folio4) && $Folio4!="")
    {
        $clientes="SELECT * FROM v_abrir WHERE ID_PRODUCTION = '$Folio3' AND OR_MATRIX = '$Folio4'";
    }
    else if(isset($Folio2) && $Folio2!="")
    {
        //$BUSCAR = $Folio2;
        //$BUSCAR2 = "FOLIO";
        $clientes="SELECT * FROM v_abrir WHERE FOLIO = '$Folio2'";
        //var_dump($clientes);
        //exit();
    }
    else if(isset($Folio3) && $Folio3!="")
    {
        //$BUSCAR = $Folio3;
        //$BUSCAR2 = "ID_PRODUCTION";
        $clientes="SELECT * FROM v_abrir WHERE ID_PRODUCTION = '$Folio3'";
    }
    else if(isset($Folio4) && $Folio4!="")
    {
        //$BUSCAR = $Folio4;
        //$BUSCAR2 = "OR_MATRIX";
        $clientes="SELECT * FROM v_abrir WHERE OR_MATRIX = '$Folio4'";
    }
    
    //$clientes="SELECT * FROM v_abrir where ".$BUSCAR2." = '".$BUSCAR."'";
    $consulta = sqlsrv_query($conn,$clientes);
    //$consulta=mysql_query($clientes);
    //$num= mysql_num_rows($consulta);

                     
   // if ( $num >0) 
    //{
while($row = sqlsrv_fetch_array($consulta,SQLSRV_FETCH_ASSOC)){
            $rows[] = array("orprod"=>$row["ID_PRODUCTION"],
                "ormetrics"=>$row["OR_MATRIX"],
                "foliob"=>$row["FOLIO"],
                "fecha"=>$row["FECHA_HORA"],
                "cliente"=>$row["CLIENTE"],
                "trabajo"=>$row["TRABAJO"],
                "cantidad"=>$row["CANTIDAD"],
                //"ancho"=>$ANCHO,"alto"=>$row["ALTO"],
                "medancho"=>$row["MEDIANIL_ANCHO"],
                "medalto"=>$row["MEDIANIL_ALTO"],
                //"mat_especial"=>$row["MAT_ESPECIAL"],
                "id_mat_especial"=>$row["ID_MAT_ESPECIAL"],
                "material"=>$row["ID_MATERIAL"],
                "medida"=>$row["MEDIDA"],
                "resolucion"=>$row["RESOLUCION"],
                "imp_pasadas"=>$row["IMP_PASADAS"],
                "barniz"=>$row["BARNIZ"],
                "barniz_pasadas"=>$row["BARNIZ_PASADAS"],
                "blanco"=>$row["BLANCO"],
                "acab1"=>$row["ID_ACABADO1"],
                "acab2"=>$row["ID_ACABADO2"],
                "acab3"=>$row["ID_ACABADO3"],
                "acab4"=>$row["ID_ACABADO4"],
                "acab5"=>$row["ID_ACABADO5"],
                "acab6"=>$row["ID_ACABADO6"],
                "laminado"=>$row["ID_LAMINADO"],
                "adic1"=>$row["A1_DESC"],
                "costoadic1"=>$row["A1_PRECIO"],
                "adic2"=>$row["A2_DESC"],
                "costoadic2"=>$row["A2_PRECIO"],
                "adic3"=>$row["A3_DESC"],
                "costoadic3"=>$row["A3_PRECIO"],
                "adic4"=>$row["A4_DESC"],
                "costoadic4"=>$row["A4_PRECIO"],
                "adic5"=>$row["A5_DESC"],
                "costoadic5"=>$row["A5_PRECIO"],
                "adic6"=>$row["A6_DESC"],
                "costoadic6"=>$row["A6_PRECIO"],
                "observaciones"=>$row["OBSERVACIONES"],
                "porcientoMargen"=>$row["MARGEN"],
                "porcientoComision"=>$row["COMISION"],
                "resTotal2"=>$row["TOTAL"],
                "lito2"=>$row["LITO2"],
                "lito3"=>$row["LITO3"],
                "lito4"=>$row["LITO4"],
                "lito5"=>$row["LITO5"],
                "lito6"=>$row["LITO6"],
                "lito7"=>$row["LITO7"],
                "lito8"=>$row["LITO8"],
                "lito9"=>$row["LITO9"],
                "lito10"=>$row["LITO10"],
                "lito11"=>$row["LITO11"],
                "lito12"=>$row["LITO12"],
                "lito13"=>$row["LITO13"],
                "lito14"=>$row["LITO14"],
                "lito15"=>$row["LITO15"],
                "lito16"=>$row["LITO16"],
                "lito17"=>$row["LITO17"],
                "lito18"=>$row["LITO18"]
                );            
        }
    //}
    $response->rows = $rows;
    if ($row) 
    {
        $response->validacion="true";
    }
    else
    {
        $response->validacion="false";
    }
    
    echo json_encode ($response);