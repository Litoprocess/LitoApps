<?php session_start();
include 'conexion.php';
$replace= array(",","$");

$orden = $_POST['orden'];
$notas = $_POST['notas'];

$amanual = str_replace($replace, "", $_POST['amanual']);
$aespecial = str_replace($replace, "", $_POST['aespecial']);
$alito = str_replace($replace, "", $_POST['alito']);
$almacen = str_replace($replace, "", $_POST['almacen']);
$cal = str_replace($replace, "", $_POST['cal']);
$cli = str_replace($replace, "", $_POST['cli']);
$entrega = str_replace($replace, "", $_POST['entrega']);
$lite = str_replace($replace, "", $_POST['lite']);
$off = str_replace($replace, "", $_POST['off']);
$ope = str_replace($replace, "", $_POST['ope']);
$prepre = str_replace($replace, "", $_POST['prepre']);
$maqInterna = str_replace($replace, "", $_POST['maqInterna']);
$maqExterna = str_replace($replace, "", $_POST['maqExterna']);
$siste = str_replace($replace, "", $_POST['siste']);
$venta = str_replace($replace, "", $_POST['venta']);
$indi = str_replace($replace, "", $_POST['indi']);
$nubera = str_replace($replace, "", $_POST['nubera']);
$buskr = str_replace($replace, "", $_POST['buskr']);

$sql = "UPDATE Reprocesos
set Nota ='$notas', Preprensa = '$prepre', Offset = '$off', AcabLito = '$alito', AcabEsp = '$aespecial', Ventas = '$venta', AcabMan = '$amanual', MaqExt = '$maqExterna', Operaciones = '$ope', 
MaqInt = '$maqInterna', Almacen = '$almacen', Sistemas = '$siste', Calidad = '$cal', LitVW = '$lite', Entregas = '$entrega', Cliente = '$cli' , Indigo = '$indi', Nuberas = '$nubera', Buskro = '$buskr' WHERE NumOrden ='$orden'";
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();

	$response->validation="true";
	echo json_encode($response);



?>