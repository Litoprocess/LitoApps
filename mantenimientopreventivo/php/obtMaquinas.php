<?php session_start();
include 'conexion.php';

	$sql = "SELECT DISTINCT Maquina FROM maquinas_componentes ORDER BY Maquina ASC";

	$stmt = sqlsrv_query($conn,$sql);

	$option = "";
	while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

	$option .= "<option value='".$row['Maquina']."'>".$row['Maquina']."</option>";
}
echo "$option";

?>