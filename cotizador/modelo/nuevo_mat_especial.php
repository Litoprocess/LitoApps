<?php
    require "conexion.php";

    $response = new stdClass();
    
    if(!$_POST['nom_form_mat'] == "" && !$_POST['ancho_form_mat'] == "" && !$_POST['alto_form_mat'] == "" && !$_POST['importe_form_mat'] == "")
    {
        $Nombre = strtoupper($_POST['nom_form_mat']);
        $Ancho = $_POST['ancho_form_mat'];
        $Alto = $_POST['alto_form_mat'];
        $Tipo = $_POST['material_form_mat'];
        $Importe = $_POST['importe_form_mat'];
        $Moneda = "PESOS";
        $Proveedor = strtoupper($_POST['proveedor_form_mat']);
        $Activo = "1";
        $traslucido = $_POST['traslucido_form_mat'];
        $Corte = $_POST['corte_form_mat'];
        
        $insertar = mysql_query("INSERT INTO materiales_especiales_cotizador (NOMBRE_MATERIAL, ANCHO, ALTO, TIPO, IMPORTE, MONEDA, PROVEEDOR, ACTIVO, TRASLUCIDO, CORTE) VALUES ('$Nombre', '$Ancho', '$Alto', '$Tipo', '$Importe', '$Moneda', '$Proveedor', '$Activo', '$traslucido', '$Corte')", $con);
    }
    else
    {
        $insertar = mysql_query("INSERT INTO materiales_especiales_cotizador (ID_MAT_ESPECIAL, NOMBRE_MATERIAL, ANCHO, ALTO, TIPO, IMPORTE, MONEDA, PROVEEDOR, ACTIVO, TRASLUCIDO, CORTE) VALUES ()", $con);
    }
    
    $idMat=mysql_insert_id();
    
    if ($insertar) 
    {
        $response->validacion="true";
        $response->idMat=$idMat;
        $response->Nombre=$Nombre;
        $response->Tipo=$Tipo;
    }
    else
    {
        $response->validacion="false";
    }
    
    echo json_encode ($response);
?>

    