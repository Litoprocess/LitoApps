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
        
        $insertar = "INSERT INTO materiales_especiales_cotizador (NOMBRE_MATERIAL, ANCHO, ALTO, TIPO, IMPORTE, MONEDA, PROVEEDOR, ACTIVO, TRASLUCIDO, CORTE) VALUES ('$Nombre', '$Ancho', '$Alto', '$Tipo', '$Importe', '$Moneda', '$Proveedor', '$Activo', '$traslucido', '$Corte')";
        $stmt = sqlsrv_query($conn,$insertar);
    }
    else
    {
        $insertar = "INSERT INTO materiales_especiales_cotizador (ID_MAT_ESPECIAL, NOMBRE_MATERIAL, ANCHO, ALTO, TIPO, IMPORTE, MONEDA, PROVEEDOR, ACTIVO, TRASLUCIDO, CORTE) VALUES ()";
        $stmt = sqlsrv_query($conn,$insertar);
    }
    
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $mat="SELECT @@IDENTITY AS idmat";
    $stmt2=sqlsrv_query($conn,$mat,$params,$options);
    $num = sqlsrv_num_rows( $stmt2 );

    while ($row =sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC)) 
    {
    $idMat = trim($row["idmat"]);
    } 

    if($num>0){
        $response->validacion="true";
        $response->idMat=$idMat;
        $response->Nombre=$Nombre;
        $response->Tipo=$Tipo;  
    } else {
        $response->validacion="false";
    }
    echo json_encode ($response);
    
?>

    