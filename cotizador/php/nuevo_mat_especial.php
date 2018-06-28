<?php
    require "conexion.php";

    $response = new stdClass();
    $arreglo = array();

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
    
    $insertar = "INSERT INTO materiales_especiales (NOMBRE_MATERIAL, ANCHO, ALTO, TIPO, IMPORTE, MONEDA, PROVEEDOR, ACTIVO, TRASLUCIDO, CORTE, DATE) VALUES ('$Nombre', '$Ancho', '$Alto', '$Tipo', '$Importe', '$Moneda', '$Proveedor', '$Activo', '$traslucido', '$Corte', getdate())";
    $insertar .= "SELECT Scope_Identity() as idMat";
    $stmt = sqlsrv_query($conn,$insertar);

    sqlsrv_next_result($stmt);
    while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
        $idMat=$row['idMat'];
    }    

    if($insertar){
        $response->validacion="true";
        $response->idMat=$idMat;
        $response->Nombre=$Nombre;
        $response->Tipo=$Tipo;  
    } else {
        $response->validacion="false";
    }
    echo json_encode ($response);
    
?>

    