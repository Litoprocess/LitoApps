<?php
    require "conexion.php";
    
    $response = new stdClass();
    
    $id_MAT = $_POST['id_MAT'];
    $NOMBRE_MATERIAL = strtoupper($_POST['NOMBRE_MATERIAL']);
    $ANCHO1 = $_POST['ANCHO1'];
    $ALTO1 = $_POST['ALTO1'];
    $ANCHO2 = $_POST['ANCHO2'];
    $ALTO2 = $_POST['ALTO2'];
    $ANCHO3 = $_POST['ANCHO3'];
    $ALTO3 = $_POST['ALTO3'];
    $ANCHO4 = $_POST['ANCHO4'];
    $ALTO4 = $_POST['ALTO4'];
    $ANCHO5 = $_POST['ANCHO5'];
    $ALTO5 = $_POST['ALTO5'];
    $TIPO = $_POST['TIPO'];
    $IMPORTE = $_POST['IMPORTE'];
    $MONEDA = $_POST['MONEDA'];
    $PROVEEDOR = strtoupper($_POST['PROVEEDOR']);
    $ACTIVO =$_POST['ACTIVO'];
    $TRASLUCIDO = $_POST['TRASLUCIDO'];
    $CORTE = $_POST['CORTE'];
    
    $insertar = mysql_query("UPDATE materiales_cotizador SET NOMBRE_MATERIAL='$NOMBRE_MATERIAL', ANCHO1='$ANCHO1',ALTO1='$ALTO1', ANCHO2='$ANCHO2',ALTO2='$ALTO2',ANCHO3='$ANCHO3',ALTO3='$ALTO3',ANCHO4='$ANCHO4',ALTO4='$ALTO4',ANCHO5='$ANCHO5',ALTO5='$ALTO5',TIPO='$TIPO',IMPORTE='$IMPORTE',MONEDA='$MONEDA',PROVEEDOR='$PROVEEDOR',ACTIVO='$ACTIVO',TRASLUCIDO='$TRASLUCIDO',CORTE='$CORTE' WHERE ID_MATERIAL='$id_MAT'", $con);
    
    $id_MAT=mysql_insert_id();
//    var_dump($insertar);
    if ($insertar) 
    {
        $response->validacion="true";
        $response->folio=$id_MAT;
    }
    else
    {
        $response->validacion="false";
    }
    echo json_encode ($response);
?>