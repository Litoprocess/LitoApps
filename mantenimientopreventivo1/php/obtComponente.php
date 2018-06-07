<?php session_start();
include 'conexion.php';

if( $_POST['maquina'] == 'TODO')
{
	$sql = "SELECT DISTINCT Componente FROM maquinas_componentes";
	$stmt = sqlsrv_query($conn,$sql);	
}
else
{
	$maquina = $_POST['maquina'];
	$sql = "SELECT Componente FROM maquinas_componentes WHERE Maquina = '$maquina'";
	$stmt = sqlsrv_query($conn,$sql);
}

	$option="";
	while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
	{
		$option .= "<option value='".utf8_encode(strtoupper($row['Componente']))."'>".utf8_encode(strtoupper($row['Componente']))."</option>";
	}

echo "$option";

?>