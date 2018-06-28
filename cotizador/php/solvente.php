<?php
require "conexion.php";

$id_mat = $_POST['id_mat'];


$sql= "SELECT * FROM materiales_cotizador WHERE ID_MATERIAL = '$id_mat' and SOLVENTE = 1 Order by NOMBRE_MATERIAL ASC";
$stmt = sqlsrv_query($conn,$sql);



if ($stmt) {
   $rows = sqlsrv_has_rows( $stmt );
   if ($rows === true)
      echo "true";
   else 
      echo "false";
}


sqlsrv_free_stmt( $stmt );

?>