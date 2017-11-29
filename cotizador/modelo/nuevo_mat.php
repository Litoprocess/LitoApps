<?php
    require "conexion.php";

    $response = new stdClass();

    $Nombre = strtoupper($_POST['nom_form']);
    $Ancho1 = $_POST['ancho1_form'];
    $Alto1 = $_POST['alto1_form'];
    $Ancho2 = $_POST['ancho2_form'];
    $Alto2 = $_POST['alto2_form'];
    $Ancho3 = $_POST['ancho3_form'];
    $Alto3 = $_POST['alto3_form'];
    $Ancho4 = $_POST['ancho4_form'];
    $Alto4 = $_POST['alto4_form'];
    $Ancho5 = $_POST['ancho5_form'];
    $Alto5 = $_POST['alto5_form'];
    $Tipo = $_POST['material_form'];
    $Importe = $_POST['importe_form'];
    $Moneda = $_POST['moneda_form'];
    $Proveedor = strtoupper($_POST['proveedor_form']);
    $traslucido = $_POST['traslucido_form'];
    $Corte = $_POST['corte_form'];
    
    $insertar = "INSERT INTO materiales_cotizador (NOMBRE_MATERIAL, ANCHO1, ALTO1, ANCHO2, ALTO2, ANCHO3, ALTO3, ANCHO4, ALTO4, ANCHO5, ALTO5, TIPO, IMPORTE, MONEDA, PROVEEDOR, ACTIVO, TRASLUCIDO, CORTE) VALUES ('$Nombre', '$Ancho1', '$Alto1', '$Ancho2', '$Alto2', '$Ancho3', '$Alto3', '$Ancho4', '$Alto4', '$Ancho5', '$Alto5', '$Tipo', '$Importe', '$Moneda', '$Proveedor', '1', '$traslucido', '$Corte')";
    $stmt = sqlsrv_query($conn,$insertar);

    if ($stmt) 
    {
        $response->validacion="true";
    }
    else
    {
        $response->validacion="false";
    }
    echo json_encode ($response);
?>

    