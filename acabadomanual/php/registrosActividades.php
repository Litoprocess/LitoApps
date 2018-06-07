<?php session_start();

include 'conexion.php';

$departamento = $_SESSION['Permisos']["Departamento"]; 

$response = new stdClass();
$rows = array();

  switch ($departamento) {

    case 'INT':

    $sql = "SELECT * FROM V_registros2 WHERE ID_empleado NOT LIKE 'M%' ORDER BY id DESC";
    $stmt = sqlsrv_query( $conn,$sql );
    break;

    case 'M1':
    $sql = "SELECT * FROM V_registros2 WHERE ID_empleado LIKE 'M1%' ORDER BY id DESC";
    $stmt = sqlsrv_query( $conn,$sql );
    break;

    case 'M2':

    $sql = "SELECT * FROM V_registros2 WHERE ID_empleado LIKE 'M2%' ORDER BY id DESC";
    $stmt = sqlsrv_query( $conn,$sql );
    break;

    case 'M3':

    $sql = "SELECT * FROM V_registros2 WHERE ID_empleado LIKE 'M3%' ORDER BY id DESC";
    $stmt = sqlsrv_query( $conn,$sql );
    break;

    case 'M4':

    $sql = "SELECT * FROM V_registros2 WHERE ID_empleado LIKE 'M4%' ORDER BY id DESC";
    $stmt = sqlsrv_query( $conn,$sql );
    break;

    case 'M5':

    $sql = "SELECT * FROM V_registros2 WHERE ID_empleado LIKE 'M5%' ORDER BY id DESC";
    $stmt = sqlsrv_query( $conn,$sql );
    break;

    case 'M6':

    $sql = "SELECT * FROM V_registros2 WHERE ID_empleado LIKE 'M6%' ORDER BY id DESC";
    $stmt = sqlsrv_query( $conn,$sql );
    break;

    case 'M7':

    $sql = "SELECT * FROM V_registros2 WHERE ID_empleado LIKE 'M7%' ORDER BY id DESC";
    $stmt = sqlsrv_query( $conn,$sql );
    break;

    case 'M8':

    $sql = "SELECT * FROM V_registros2 WHERE ID_empleado LIKE 'M8%' ORDER BY id DESC";
    $stmt = sqlsrv_query( $conn,$sql );
    break;    

    case 'M9':

    $sql = "SELECT * FROM V_registros2 WHERE ID_empleado LIKE 'M9%' ORDER BY id DESC";
    $stmt = sqlsrv_query( $conn,$sql );
    break;        

    default:
    # code...
    break;
  }

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$arreglo[]=array(
		"id" => $row['id'],
		"id_empleado" => $row['ID_empleado'],
		"actividad" => $row['Actividad'],
		"fechainicio" => $row['FechaInicio']->format('d-m-Y H:i'),
		"fechafin" => $row['FechaFin']->format('d-m-Y H:i'),
		"cantidad" => $row['Cantidad'],
		"op" => $row['OP'],
		"tiempo" => $row['Tiempo'],
		"otra_actividad" => $row['Otra_Actividad'],
		"tipo_actividad" => $row['Tipo_Actividad'],
		"tipo_maquina" => $row['Tipo_Maquina']
		);				
}

$response->data=$arreglo;
echo json_encode($response);
?>