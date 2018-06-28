<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


include 'DAO.php';
include 'conexion.php';

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$imss = $_POST['imss'];
$proveedor = $_POST['proveedor'];


//consultamos registros en relaci�n al proveedor

$sqlconsulta = "SELECT * from Registro_de_empleados_de_Maquila WHERE ClaveID LIKE '%$proveedor%'";
$stmt = sqlsrv_query($conn, $sqlconsulta);
$row_count = sqlsrv_num_rows($stmt);
$contador = count($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC));

sqlsrv_free_stmt($stmt);

$response = new stdClass();
if ($contador == 0) {
    $Clave = $proveedor . "001";
    $sql = "INSERT INTO Registro_de_empleados_de_Maquila  VALUES ('$nombre',$edad,'$genero',$imss,'$proveedor','$Clave')";
    $empleado = sqlsrv_query($conn, $sql);
    $response->clave = $Clave;
    echo json_encode($response);
} else {

    $sqlconsulta = "SELECT top 1  * from Registro_de_empleados_de_Maquila WHERE ID_proveedor LIKE '%$proveedor%'  ORDER BY ID DESC";

   
    $dao = new DAO();
    $data = $dao->getData($sqlconsulta);


    //echo count(sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC));

    $row = $data[0];




    //while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

    
    $ids = $row['ClaveID'];
    if ($proveedor == "INT") {
        $cla = intval(substr($ids, 3));
    } else {
        $cla = intval(substr($ids, 2));
    }


    $ID = $cla + 1;

    if (strlen($ID) == 1) {
        $ID = "00" . $ID;
    }
    if (strlen($ID) == 2) {
        $ID = "0" . $ID;
    }

    /* $consecutivo= trim($cla, "0"); 
      $ID=$consecutivo+1;
      $ceros=strlen($ID);
      if($ceros==1){
      $ClaveDos=$proveedor."00".$ID;
      }
      else if($ceros==2){

      } */
    $ClaveDos = $proveedor . $ID;

    //insertamos
    $sql = "INSERT INTO Registro_de_empleados_de_Maquila  VALUES ('$nombre',$edad,'$genero',$imss,'$proveedor','$ClaveDos')";


    $empleado = sqlsrv_query($conn, $sql);

//consultar Clave de registro
    $response->clave = $ClaveDos;




    echo json_encode($response);


    //    }
}