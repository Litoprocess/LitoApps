<?php

include 'conexion.php';

$id=$_POST['id'];

$sql = "DELETE FROM Registro_de_Actividad WHERE id=$id";
$empleado = sqlsrv_query( $conn,$sql);

//var_dump($sql);

$response="true";
echo json_encode($response);



?>