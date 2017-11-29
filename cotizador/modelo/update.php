<?php
    require "conexion.php";
    
    $response = new stdClass();
    
    $fecha=date("d-m-Y");
    $foliob = $_POST['foliob'];
    $CLIENTE = strtoupper($_POST['cliente']);
    $TRABAJO = strtoupper($_POST['trabajo']);
    
    $CANTIDAD = $_POST['cantidad'];
    $ANCHO = $_POST['ancho'];
    $ALTO = $_POST['alto'];
    $MEDIANIL_ANCHO = $_POST['medancho'];
    $MEDIANIL_ALTO = $_POST['medalto'];
    
    if(isset($_POST['mat_especial']))
    {
        $MATERIAL_ESPECIAL = $_POST['mat_especial'];
        $ID_MATERIAL_ESPECIAL = $_POST['medidas_especial'];
        $ID_MATERIAL = '';
        $vmedida2 = '';
    }
    else
    {
        $MATERIAL_ESPECIAL = '';
        $ID_MATERIAL_ESPECIAL = '';
        $ID_MATERIAL = $_POST['material'];
        $vmedida2 = $_POST['medidas'];
    }
    
    //$ID_MATERIAL_ESPECIAL = $_POST['medidas_especial'];
    //$ID_MATERIAL = $_POST['material'];
    //$vmedida2 = $_POST['medidas'];
    
    $RESOLUCION = $_POST['resolucion'];
    $Pasadas_impresion = $_POST['pasadas_imp'];
    
    if(isset($_POST['barniz']))
    {
        $BARNIZ = $_POST['barniz'];
    }
    else 
    {
        $BARNIZ = '';
    }
    
    if(isset($_POST['barniz_pasadas']))
    {
        $BARNIZ_PASADAS = $_POST['barniz_pasadas'];
    }
    else 
    {
        $BARNIZ_PASADAS = '';
    }
    
    if(isset($_POST['blanco']))
    {
        $BLANCO = $_POST['blanco'];
    }
    else 
    {
        $BLANCO = '';
    }
    
    $ID_ACABADO1 = $_POST['acab1'];
    $ID_ACABADO2 = $_POST['acab2'];
    $ID_ACABADO3 = $_POST['acab3'];
    $ID_ACABADO4 = $_POST['acab4'];
    $ID_ACABADO5 = $_POST['acab5'];
    $ID_ACABADO6 = $_POST['acab6'];
    $ID_LAMINADO = $_POST['laminado'];
    
    $A1_DESC = strtoupper($_POST['adic1']);
    $A1_PRECIO1 = $_POST['costoadic1'];
    $A1_PRECIO2=str_replace(',','',$A1_PRECIO1);
    $A1_PRECIO = (float)$A1_PRECIO2;
    
    $A2_DESC = strtoupper($_POST['adic2']);
    $A2_PRECIO1 = $_POST['costoadic2'];
    $A2_PRECIO2=str_replace(',','',$A2_PRECIO1);
    $A2_PRECIO = (float)$A2_PRECIO2;
    
    $A3_DESC = strtoupper($_POST['adic3']);
    $A3_PRECIO1 = $_POST['costoadic3'];
    $A3_PRECIO2=str_replace(',','',$A3_PRECIO1);
    $A3_PRECIO = (float)$A3_PRECIO2;
    
    $A4_DESC = strtoupper($_POST['adic4']);
    $A4_PRECIO1 = $_POST['costoadic4'];
    $A4_PRECIO2=str_replace(',','',$A4_PRECIO1);
    $A4_PRECIO = (float)$A4_PRECIO2;
    
    $A5_DESC = strtoupper($_POST['adic5']);
    $A5_PRECIO1 = $_POST['costoadic5'];
    $A5_PRECIO2=str_replace(',','',$A5_PRECIO1);
    $A5_PRECIO = (float)$A5_PRECIO2;
    
    $A6_DESC = strtoupper($_POST['adic6']);
    $A6_PRECIO1 = $_POST['costoadic6'];
    $A6_PRECIO2=str_replace(',','',$A6_PRECIO1);
    $A6_PRECIO = (float)$A6_PRECIO2;
    
    $OBSERVACIONES = strtoupper($_POST['observaciones']);
    $PORCOMISION = $_POST['porcientoComision'];
    $PORMERGEN = $_POST['porcientoMargen'];
    $TOTAL = $_POST['resTotal'];
    
    $LITO2 = isset($_POST['lito2'])?$_POST['lito2']:"";
    $LITO3 = isset($_POST['lito3'])?$_POST['lito3']:"";
    $LITO4 = isset($_POST['lito4'])?$_POST['lito4']:"";
    $LITO5 = isset($_POST['lito5'])?$_POST['lito5']:"";
    $LITO6 = isset($_POST['lito6'])?$_POST['lito6']:"";
    $LITO7 = isset($_POST['lito7'])?$_POST['lito7']:"";
    $LITO8 = isset($_POST['lito8'])?$_POST['lito8']:"";
    $LITO9 = isset($_POST['lito9'])?$_POST['lito9']:"";
    $LITO10 = isset($_POST['lito10'])?$_POST['lito10']:"";
    $LITO11 = isset($_POST['lito11'])?$_POST['lito11']:"";
    $LITO12 = isset($_POST['lito12'])?$_POST['lito12']:"";
    $LITO13 = isset($_POST['lito13'])?$_POST['lito13']:"";
    $LITO14 = isset($_POST['lito14'])?$_POST['lito14']:"";
    $LITO15 = isset($_POST['lito15'])?$_POST['lito15']:"";
    $LITO16 = isset($_POST['lito16'])?$_POST['lito16']:"";
    $LITO17 = isset($_POST['lito17'])?$_POST['lito17']:"";
    $LITO18 = isset($_POST['lito18'])?$_POST['lito18']:"";
    
    $insertar = "UPDATE bitacora SET CLIENTE='$CLIENTE', FECHA_HORA='$fecha', TRABAJO='$TRABAJO', CANTIDAD='$CANTIDAD', ANCHO='$ANCHO', ALTO='$ALTO', MEDIANIL_ANCHO='$MEDIANIL_ANCHO', MEDIANIL_ALTO='$MEDIANIL_ALTO', MAT_ESPECIAL='$MATERIAL_ESPECIAL', ID_MAT_ESPECIAL='$ID_MATERIAL_ESPECIAL', ID_MATERIAL='$ID_MATERIAL', MEDIDA='$vmedida2', RESOLUCION='$RESOLUCION', IMP_PASADAS='$Pasadas_impresion', BARNIZ='$BARNIZ', BARNIZ_PASADAS='$BARNIZ_PASADAS', BLANCO='$BLANCO', ID_ACABADO1='$ID_ACABADO1', ID_ACABADO2='$ID_ACABADO2', ID_ACABADO3='$ID_ACABADO3', ID_ACABADO4='$ID_ACABADO4', ID_ACABADO5='$ID_ACABADO5', ID_ACABADO6='$ID_ACABADO6', ID_LAMINADO='$ID_LAMINADO', A1_DESC='$A1_DESC', A1_PRECIO='$A1_PRECIO', A2_DESC='$A2_DESC', A2_PRECIO='$A2_PRECIO', A3_DESC='$A3_DESC', A3_PRECIO='$A3_PRECIO', A4_DESC='$A4_DESC', A4_PRECIO='$A4_PRECIO', A5_DESC='$A5_DESC', A5_PRECIO='$A5_PRECIO', A6_DESC='$A6_DESC', A6_PRECIO='$A6_PRECIO', OBSERVACIONES='$OBSERVACIONES', TOTAL='$TOTAL', COMISION='$PORCOMISION', MARGEN='$PORMERGEN', LITO2='$LITO2', LITO3='$LITO3', LITO4='$LITO4', LITO5='$LITO5', LITO6='$LITO6', LITO7='$LITO7', LITO8='$LITO8', LITO9='$LITO9', LITO10='$LITO10', LITO11='$LITO11', LITO12='$LITO12', LITO13='$LITO13', LITO14='$LITO14', LITO15='$LITO15', LITO16='$LITO16', LITO17='$LITO17', LITO18='$LITO18' where FOLIO='$foliob'";
    $stmt = sqlsrv_query($conn,$insertar);

    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $folio="SELECT @@IDENTITY AS idfolio";
    $stmt2=sqlsrv_query($conn,$folio,$params,$options);
    $num = sqlsrv_num_rows( $stmt2 );

    while ($row =sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC)) 
    {
    $idfolio = trim($row["idfolio"]);
    } 

    if($num>0){
        $response->validacion="true";
        $response->folio=$idfolio;
    } else {
        $response->validacion="false";
    }
    echo json_encode ($response);  


?>

    