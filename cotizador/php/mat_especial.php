<?php
require "conexion.php";

$response = new stdClass();
$data =array();

$medidaEsp = $_POST["MedEspecial"];

$clientes="SELECT * FROM materiales_especiales where ID_MAT_ESPECIAL=$medidaEsp";
$consulta=sqlsrv_query($conn,$clientes);

   while($row = sqlsrv_fetch_array($consulta,SQLSRV_FETCH_ASSOC))
   {
    $data[] = array(
        "medidaEspecial"=>$row["ID_MAT_ESPECIAL"],
        "NOMBRE_MATERIAL"=>$row["NOMBRE_MATERIAL"],
        "ANCHO"=>$row["ANCHO"],
        "ALTO"=>$row["ALTO"],
        "M_Tipo"=>$row["TIPO"],
        "Importe"=>$row["IMPORTE"],
        "MONEDA"=>$row["MONEDA"],
        "Proveedor"=>$row["PROVEEDOR"],
        "ACTIVO"=>$row["ACTIVO"],
        "Traslucido"=>$row["TRASLUCIDO"],
        "Corte"=>$row["CORTE"],
        "DATE"=>$row["DATE"]
        );        
    }

$response->validacion="true";    
$response->data = $data;      
echo json_encode ($response);
?>