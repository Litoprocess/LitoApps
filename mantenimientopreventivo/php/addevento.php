<?php session_start();

include 'conexion.php';

$usuario_registra = $_SESSION['Permisos']['NombreUsuario'];
$tipoOp = $_POST['group2'];
$maquina = $_POST['maquina'];
$componente = $_POST['componente'];
$titulo = $_POST['titulo'];
$material = $_POST['material'];
$detalle = $_POST['detalle'];
$dia = $_POST['dia'];
$duracion = $_POST['duracion'];
$tipo = $_POST['group1'];
$estatus = $_POST['estatus'];
$secuencia = $_POST['secuencia'];
$manual = $_POST['manual'];

$fechainicio =  $dia;
//echo $fechafin = $dia + $duracion;

$nuevafecha = strtotime ( '+' . $duracion . 'day' , strtotime ( $fechainicio ) ) ;
$fechafin = date ( 'Y-m-d' , $nuevafecha );

$response = new stdClass();
$sql = "INSERT INTO mantenimientos (titulo,maquina,componente,material,detalle,fecha_inicio,fecha_fin,tipo,estatus,fecha_registro,usuario_registra,tipoOp,secuencia,manual) VALUES('$titulo','$maquina','$componente','$material','$detalle', convert(datetime,'$fechainicio',102),convert(datetime,'$fechafin',102), '$tipo', '$estatus', getdate(),'$usuario_registra','$tipoOp','$secuencia','$manual')";
//var_dump($sql);
//exit();
$stmt = sqlsrv_query($conn,$sql);
//var_dump($stmt);
//exit();
//header('Content-Type: application/json');
$response->validacion = true;
echo json_encode($response);