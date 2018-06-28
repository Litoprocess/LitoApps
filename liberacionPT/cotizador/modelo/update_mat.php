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
    
    $insertar = "UPDATE materiales_cotizador SET NOMBRE_MATERIAL='$NOMBRE_MATERIAL', ANCHO1='$ANCHO1',ALTO1='$ALTO1', ANCHO2='$ANCHO2',ALTO2='$ALTO2',ANCHO3='$ANCHO3',ALTO3='$ALTO3',ANCHO4='$ANCHO4',ALTO4='$ALTO4',ANCHO5='$ANCHO5',ALTO5='$ALTO5',TIPO='$TIPO',IMPORTE='$IMPORTE',MONEDA='$MONEDA',PROVEEDOR='$PROVEEDOR',ACTIVO='$ACTIVO',TRASLUCIDO='$TRASLUCIDO',CORTE='$CORTE' WHERE ID_MATERIAL='$id_MAT'";
    $stmt = sqlsrv_query($conn,$insertar);

    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $mat="SELECT @@IDENTITY AS id_mat";
    $stmt2=sqlsrv_query($conn,$mat,$params,$options);
    $num = sqlsrv_num_rows( $stmt2 );

    while ($row =sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC)) 
    {
    $id_MAT = trim($row["id_mat"]);
    } 

    if($num>0){
        $response->validacion="true";
        $response->folio=$id_MAT;
    } else {
        $response->validacion="false";
    }
    echo json_encode ($response);      
?>