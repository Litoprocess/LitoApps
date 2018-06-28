<?php
    require "conexion.php";
    
    $response = new stdClass();
    
    $fecha=date("d-m-Y");
    $CLIENTE = strtoupper($_POST['cliente']);
    $TRABAJO = strtoupper($_POST['trabajo']);
    
    $CANTIDAD = $_POST['cantidad'];
    $ANCHO = $_POST['ancho'];
    $ALTO = $_POST['alto'];
    $MEDIANIL_ANCHO = $_POST['medancho'];
    $MEDIANIL_ALTO = $_POST['medalto'];

    $TOTAL_ALTO = $_POST['totalto'];
    $TOTAL_ANCHO = $_POST['totancho'];
    
    if(isset($_POST['mat_especial']))
    {
        $MATERIAL_ESPECIAL = $_POST['mat_especial'];
    }
    else
    {
        $MATERIAL_ESPECIAL = '';
    }
    
    $ID_MATERIAL_ESPECIAL = $_POST['medidas_especial'];
    $ID_MATERIAL = $_POST['material'];
    $MEDIDA = $_POST['tblmedida'];
    $MATANCHO = $_POST['tblancho'];
    $MATALTO = $_POST['tblalto'];
    $ORIENTACION = $_POST['tblorientacion'];
    $APROVECHAMIENTO = $_POST['tblaprovecha'];
    $ENTRAN = $_POST['tblentran'];
    
    $RESOLUCION = $_POST['resolucion'];
    
    $BLANCO = str_replace(',','',$_POST['resBlanco']);
    
    $ID_ACABADO1 = $_POST['acab1'];
    $ID_ACABADO2 = $_POST['acab2'];
    $ID_ACABADO3 = $_POST['acab3'];
    $ID_ACABADO4 = $_POST['acab4'];
    $ID_ACABADO5 = $_POST['acab5'];
    $ID_ACABADO6 = $_POST['acab6'];
    
    $A1_DESC = strtoupper($_POST['adic1']);
    $A1_PRECIO1 = $_POST['costoadic1'];
    $A1_PRECIO2=str_replace(',','',$A1_PRECIO1);
    $A1_PRECIO = $A1_PRECIO2;
    
    $A2_DESC = strtoupper($_POST['adic2']);
    $A2_PRECIO1 = $_POST['costoadic2'];
    $A2_PRECIO2=str_replace(',','',$A2_PRECIO1);
    $A2_PRECIO = $A2_PRECIO2;
    
    $A3_DESC = strtoupper($_POST['adic3']);
    $A3_PRECIO1 = $_POST['costoadic3'];
    $A3_PRECIO2=str_replace(',','',$A3_PRECIO1);
    $A3_PRECIO = $A3_PRECIO2;
    
    $A4_DESC = strtoupper($_POST['adic4']);
    $A4_PRECIO1 = $_POST['costoadic4'];
    $A4_PRECIO2=str_replace(',','',$A4_PRECIO1);
    $A4_PRECIO = $A4_PRECIO2;
    
    $A5_DESC = strtoupper($_POST['adic5']);
    $A5_PRECIO1 = $_POST['costoadic5'];
    $A5_PRECIO2=str_replace(',','',$A5_PRECIO1);
    $A5_PRECIO = $A5_PRECIO2;
    
    $A6_DESC = strtoupper($_POST['adic6']);
    $A6_PRECIO1 = $_POST['costoadic6'];
    $A6_PRECIO2=str_replace(',','',$A6_PRECIO1);
    $A6_PRECIO = $A6_PRECIO2;
    
    $OBSERVACIONES = strtoupper($_POST['observaciones']);
    $SUBTOTAL = str_replace(',','',$_POST['resSubtotal']);    
    $PORMARGEN = $_POST['porcientoMargen'];
    $MARGEN = str_replace(',','',$_POST['resMargen']);
    $PORCOMISION = $_POST['porcientoComision'];
    $COMISION = str_replace(',','',$_POST['resComision']);
    $PUNITARIO = str_replace(',','',$_POST['resPreUnit']);
    
    $TOTAL = str_replace(',','',$_POST['resTotal']);
    $PROVEEDOR = $_POST['proveedor'];

    $PRECIO_ACABADO1 = str_replace(',','',$_POST['resAcab1']);
    $PRECIO_ACABADO2 = str_replace(',','',$_POST['resAcab2']);
    $PRECIO_ACABADO3 = str_replace(',','',$_POST['resAcab3']);
    $PRECIO_ACABADO4 = str_replace(',','',$_POST['resAcab4']);
    $PRECIO_ACABADO5 = str_replace(',','',$_POST['resAcab5']);
    $PRECIO_ACABADO6 = str_replace(',','',$_POST['resAcab6']);

    $DESC_ACAB1 = $_POST['label-Acab1'];
    $DESC_ACAB2 = $_POST['label-Acab2'];
    $DESC_ACAB3 = $_POST['label-Acab3'];
    $DESC_ACAB4 = $_POST['label-Acab4'];
    $DESC_ACAB5 = $_POST['label-Acab5'];
    $DESC_ACAB6 = $_POST['label-Acab6'];

    $CANT_MAT = str_replace(',','',$_POST['resCant']);
    $PRECIO_MAT = str_replace(',','',$_POST['resPrecio']);
    $PRECIO_IMP = str_replace(',','',$_POST['resTinta']);
    $TIPO_CANT_MAT = $_POST['titCantMat'];

    $MATALOANCHO = $_POST['tblaloancho'];
    $MATALOALTO = $_POST['tblaloalto'];

    $TIEMPO_PRODUCCION = $_POST['tiempoproduccion'];
    
    $arreglo = array();
    $sql = "INSERT INTO cotizaciones(CLIENTE, FECHA_HORA, TRABAJO, CANTIDAD, ANCHO, ALTO, MEDIANIL_ANCHO, MEDIANIL_ALTO, MAT_ESPECIAL, ID_MAT_ESPECIAL, ID_MATERIAL, MEDIDA,MATANCHO,MATALTO,MATENTRAN,ORIENTA,APROVECHAMIENTO, RESOLUCION, BLANCO, ID_ACABADO1, ID_ACABADO2, ID_ACABADO3, ID_ACABADO4, ID_ACABADO5, ID_ACABADO6, A1_DESC, A1_PRECIO, A2_DESC, A2_PRECIO, A3_DESC, A3_PRECIO,  A4_DESC, A4_PRECIO, A5_DESC, A5_PRECIO, A6_DESC, A6_PRECIO, OBSERVACIONES,SUBTOTAL, TOTAL, PORCOMISION, COMISION, PORMARGEN,MARGEN, PUNITARIO, PROVEEDOR,PRECIO_ACABADO1,PRECIO_ACABADO2,PRECIO_ACABADO3,PRECIO_ACABADO4,PRECIO_ACABADO5,PRECIO_ACABADO6,DESC_ACAB1,DESC_ACAB2,DESC_ACAB3,DESC_ACAB4,DESC_ACAB5,DESC_ACAB6,CANT_MAT,PRECIO_MAT,PRECIO_IMP,TIPO_CANT_MAT,MATALOALTO,MATALOANCHO,TIEMPO_PRODUCCION)
    VALUES ('$CLIENTE','$fecha','$TRABAJO','$CANTIDAD','$ANCHO','$ALTO','$MEDIANIL_ANCHO','$MEDIANIL_ALTO','$MATERIAL_ESPECIAL','$ID_MATERIAL_ESPECIAL','$ID_MATERIAL','$MEDIDA','$MATANCHO','$MATALTO','$ENTRAN','$ORIENTACION','$APROVECHAMIENTO','$RESOLUCION','$BLANCO','$ID_ACABADO1','$ID_ACABADO2','$ID_ACABADO3','$ID_ACABADO4','$ID_ACABADO5','$ID_ACABADO6','$A1_DESC','$A1_PRECIO','$A2_DESC','$A2_PRECIO','$A3_DESC','$A3_PRECIO','$A4_DESC','$A4_PRECIO','$A5_DESC','$A5_PRECIO','$A6_DESC','$A6_PRECIO','$OBSERVACIONES','$SUBTOTAL','$TOTAL','$PORCOMISION','$COMISION','$PORMARGEN','$MARGEN','$PUNITARIO','$PROVEEDOR','$PRECIO_ACABADO1','$PRECIO_ACABADO2','$PRECIO_ACABADO3','$PRECIO_ACABADO4','$PRECIO_ACABADO5','$PRECIO_ACABADO6','$DESC_ACAB1','$DESC_ACAB2','$DESC_ACAB3','$DESC_ACAB4','$DESC_ACAB5','$DESC_ACAB6','$CANT_MAT','$PRECIO_MAT','$PRECIO_IMP','$TIPO_CANT_MAT','$MATALOANCHO','$MATALOALTO','$TIEMPO_PRODUCCION')";
    $sql .= "SELECT Scope_Identity() as id";
    //var_dump($sql);
    //exit();
    $stmt = sqlsrv_query($conn,$sql);
    //var_dump($sql);
    //exit();

    sqlsrv_next_result($stmt);
    //$folio = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
        $arreglo[]=array("folio"=>$row['id']);
    }


    if($sql)
    {
        $response->validacion="true";
        $response->data=$arreglo;
    }
    else
    {
        $response->validacion="false";
    }

    echo json_encode ($response);


?>