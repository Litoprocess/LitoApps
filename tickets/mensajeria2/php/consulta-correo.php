<?PHP
session_start();

include 'conn.php';
    
    $agente = $_POST['data'];
	
	$sql = "SELECT * FROM v_catUsuarios WHERE Nombre = '$agente'";
    $stmt = sqlsrv_query($conn,$sql);
    $response = new stdClass(); 
    $response->validacion= "false";
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

        $response->nombreAgente=$row['Nombre'];
        $response->correoAgente=$row['Correo'];
        $response->validacion= "true";

     }

     echo json_encode($response);


?>