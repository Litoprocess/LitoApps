<?php session_start();
include 'conexion.php';

$folio2 = $_POST['folio2'];

$sql = "SELECT * FROM v_abrircotizaciones WHERE FOLIO = '$folio2'";
$stmt = sqlsrv_query($conn,$sql);

$response = new stdClass();
$arreglo = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

	$arreglo[]=array(
		"FOLIO"=>$row['FOLIO'],
		"FECHA_HORA"=>$row['FECHA_HORA'],
		"CLIENTE"=>$row['CLIENTE'],
		"TRABAJO"=>$row['TRABAJO'],
		"CANTIDAD"=>$row['CANTIDAD'],
		"ANCHO"=>$row['ANCHO'],
		"ALTO"=>$row['ALTO'],
		"MEDIANIL_ANCHO"=>$row['MEDIANIL_ANCHO'],
		"MEDIANIL_ALTO"=>$row['MEDIANIL_ALTO'],
		"MAT_ESPECIAL"=>$row['MAT_ESPECIAL'],
		"ID_MAT_ESPECIAL"=>$row['ID_MAT_ESPECIAL'],
		"ID_MATERIAL"=>$row['ID_MATERIAL'],
		"MEDIDA"=>$row['MEDIDA'],
		"MATANCHO"=>$row['MATANCHO'],
		"MATALTO"=>$row['MATALTO'],
		"MATENTRAN"=>$row['MATENTRAN'],
		"ORIENTA"=>$row['ORIENTA'],
		"APROVECHAMIENTO"=>$row['APROVECHAMIENTO'],
		"RESOLUCION"=>$row['RESOLUCION'],
		"BLANCO"=>$row['BLANCO'],
		"ID_ACABADO1"=>$row['ID_ACABADO1'],
		"ID_ACABADO2"=>$row['ID_ACABADO2'],
		"ID_ACABADO3"=>$row['ID_ACABADO3'],
		"ID_ACABADO4"=>$row['ID_ACABADO4'],
		"ID_ACABADO5"=>$row['ID_ACABADO5'],
		"ID_ACABADO6"=>$row['ID_ACABADO6'],
		"A1_DESC"=>$row['A1_DESC'],
		"A1_PRECIO"=>$row['A1_PRECIO'],
		"A2_DESC"=>$row['A2_DESC'],
		"A2_PRECIO"=>$row['A2_PRECIO'],
		"A3_DESC"=>$row['A3_DESC'],
		"A3_PRECIO"=>$row['A3_PRECIO'],
		"A4_DESC"=>$row['A4_DESC'],
		"A4_PRECIO"=>$row['A4_PRECIO'],
		"A5_DESC"=>$row['A5_DESC'],
		"A5_PRECIO"=>$row['A5_PRECIO'],
		"A6_DESC"=>$row['A6_DESC'],
		"A6_PRECIO"=>$row['A6_PRECIO'],
		"OBSERVACIONES"=>$row['OBSERVACIONES'],
		"SUBTOTAL"=>$row['SUBTOTAL'],
		"PORMARGEN"=>$row['PORMARGEN'],
		"PUNITARIO"=>$row['PUNITARIO'],
		"MARGEN"=>$row['MARGEN'],
		"TOTAL"=>$row['TOTAL'],
		"PORCOMISION"=>$row['PORCOMISION'],
		"PROVEEDOR"=>$row['PROVEEDOR'],
		"COMISION"=>$row['COMISION'],
		"PRECIO_ACABADO1"=>$row['PRECIO_ACABADO1'],
		"PRECIO_ACABADO2"=>$row['PRECIO_ACABADO2'],
		"PRECIO_ACABADO3"=>$row['PRECIO_ACABADO3'],
		"PRECIO_ACABADO4"=>$row['PRECIO_ACABADO4'],
		"PRECIO_ACABADO5"=>$row['PRECIO_ACABADO5'],
		"PRECIO_ACABADO6"=>$row['PRECIO_ACABADO6'],
		"CANT_MAT"=>$row['CANT_MAT'],
		"PRECIO_MAT"=>$row['PRECIO_MAT'],
		"PRECIO_IMP"=>$row['PRECIO_IMP'],
		"DESC_ACAB1"=>$row['DESC_ACAB1'],
		"DESC_ACAB2"=>$row['DESC_ACAB2'],
		"DESC_ACAB3"=>$row['DESC_ACAB3'],
		"DESC_ACAB4"=>$row['DESC_ACAB4'],
		"DESC_ACAB5"=>$row['DESC_ACAB5'],
		"DESC_ACAB6"=>$row['DESC_ACAB6'],
		"TIPO_CANT_MAT"=>$row['TIPO_CANT_MAT'],
		"ID_PRODUCCION"=>$row['ID_PRODUCCION'],
		"OR_MATRIX"=>$row['OR_MATRIX'],
		"FECHA_ENTREGA"=>$row['FECHA_ENTREGA'],
		"MATALOANCHO"=>$row['MATALOANCHO'],
		"MATALOALTO"=>$row['MATALOALTO']		
		);	

}

$response->data=$arreglo;
echo json_encode($response);
?>