<?php
require "conexion.php";

$response = new stdClass();
$rows =array();

$medidaEsp=$_REQUEST['medidaEsp'];

$clientes="SELECT * FROM materiales_especiales_cotizador where ID_MAT_ESPECIAL=$medidaEsp";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$consulta=sqlsrv_query($conn,$clientes, $params, $options);
$num=sqlsrv_num_rows($consulta);

if ( $num >0) 
{
        //for($i=0;$i<$num;$i++)
   while($row = sqlsrv_fetch_array($consulta,SQLSRV_FETCH_ASSOC))
   {
    $rows[] = array(
        "medidaEspecial"=>$$_REQUEST['medidaEsp'],
        "NOMBRE_MATERIAL"=>$row["NOMBRE_MATERIAL"],
        "ANCHO"=>$row["ANCHO"],
        "ALTO"=>$row["ALTO"],
        "TIPO"=>$row["TIPO"],
        "IMPORTE"=>$row["IMPORTE"],
        "MONEDA"=>$row["MONEDA"],
        "PROVEEDOR"=>$row["PROVEEDOR"],
        "ACTIVO"=>$row["ACTIVO"],
        "TRASLUCIDO"=>$row["TRASLUCIDO"],
        "CORTE"=>$row["CORTE"],
        "DATE"=>$row["DATE"]
        );
        $response->rows = $rows;
    }
        $response->validacion="true";    
}
else
{
    $response->validacion="false";
}

echo json_encode ($response);
?>