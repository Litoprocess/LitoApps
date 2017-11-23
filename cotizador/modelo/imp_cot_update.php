<?php
    require "conexion.php";
    
    $response = new stdClass();
    
    $foliob = $_POST['foliob'];
    
    $TOTAL_ANCHO = $_POST['totancho'];
    $TOTAL_ALTO = $_POST['totalto'];
    
    $M_MEDIDA = $_POST['m_medida'];
    $M_ANCHO = $_POST['m_ancho'];
    $M_ALTO = $_POST['m_alto'];
    $M_ENTRA = $_POST['m_entra'];
    $M_APROV = $_POST['m_aprov'];
    $M_ORIENTA = $_POST['m_orienta'];
    
    $RES_CANT = $_POST['resCant'];
    $TIT_CANT_MAT = $_POST['titCantMat'];
    $RES_PRECIO = $_POST['resPrecio'];
    
    $RES_TINTA = $_POST['resTinta'];
    $RES_BARNIZ = $_POST['resB'];
    $RES_BLANCO = $_POST['resBlanco'];
    
    $RES_ACAB1 = $_POST['resAcab1'];
    $RES_ACAB2 = $_POST['resAcab2'];
    $RES_ACAB3 = $_POST['resAcab3'];
    $RES_ACAB4 = $_POST['resAcab4'];
    $RES_ACAB5 = $_POST['resAcab5'];
    $RES_ACAB6 = $_POST['resAcab6'];
    $RES_LAM = $_POST['resLamina'];
    
    $RES_ADIC1 = $_POST['resAdic1'];
    $RES_ADIC2 = $_POST['resAdic2'];
    $RES_ADIC3 = $_POST['resAdic3'];
    $RES_ADIC4 = $_POST['resAdic4'];
    $RES_ADIC5 = $_POST['resAdic5'];
    $RES_ADIC6 = $_POST['resAdic6'];
    
    $RES_SUBTOTAL = $_POST['resSubtotal'];
    $RES_MARGEN = $_POST['resMargen'];
    $RES_COMISION = $_POST['resComision'];
    $RES_PRECIO_UNITARIO = $_POST['resPreUnit'];
    $RES_IMPRIMART = $_POST['resImprimart'];
    $RES_LITO = $_POST['resLito'];
    
    $actualizar = mysql_query("UPDATE botacora_complemento SET TOTAL_ANCHO='$TOTAL_ANCHO', TOTAL_ALTO='$TOTAL_ALTO', M_MEDIDA='$M_MEDIDA', M_ANCHO='$M_ANCHO', M_ALTO='$M_ALTO', M_ENTRA='$M_ENTRA', M_APROV='$M_APROV', M_ORIENTA='$M_ORIENTA', RES_CANT='$RES_CANT', TIT_CANT_MAT='$TIT_CANT_MAT', RES_PRECIO='$RES_PRECIO', RES_TINTA='$RES_TINTA', RES_BARNIZ='$RES_BARNIZ', RES_BLANCO='$RES_BLANCO', RES_ACAB1='$RES_ACAB1', RES_ACAB2='$RES_ACAB2', RES_ACAB3='$RES_ACAB3', RES_ACAB4='$RES_ACAB4', RES_ACAB5='$RES_ACAB5', RES_ACAB6='$RES_ACAB6', RES_LAM='$RES_LAM', RES_ADIC1='$RES_ADIC1', RES_ADIC2='$RES_ADIC2', RES_ADIC3='$RES_ADIC3', RES_ADIC4='$RES_ADIC4', RES_ADIC5='$RES_ADIC5', RES_ADIC6='$RES_ADIC6', RES_SUBTOTAL='$RES_SUBTOTAL', RES_MARGEN='$RES_MARGEN', RES_COMISION='$RES_COMISION', RES_PRECIO_UNITARIO='$RES_PRECIO_UNITARIO', RES_IMPRIMART='$RES_IMPRIMART', RES_LITO='$RES_LITO' where FOLIO='$foliob'", $con);

    if ($actualizar) 
    {
        $response->validacion="true";
        //$response->folio=$foliob;
    }
    else
    {
        $response->validacion="false";
    }
    
    echo json_encode ($response);
?>

    