<?PHP
session_start();

include 'conn.php';

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM cat_Usuarios WHERE Login = '$usuario' AND Password = '$password'";
$stmt = sqlsrv_query($conn,$sql);
$response = new stdClass(); 
$response->validacion= "false";
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

    $_SESSION["NombreUsuario"] = trim(utf8_encode($row['Nombre']));
    $_SESSION["IdUsuario"] = $row['Id_Usuario'];
    $_SESSION["UserSistemas"] = $row['TipoUsuarioTSistemas'];
    $_SESSION["UserManto"] = $row['TipoUsuarioTMantto'];
    $_SESSION["UserMensaje1"] = $row['TipoUsuarioTMensajeria1'];
    $_SESSION["UserMensaje2"] = $row['TipoUsuarioTMensajerias2'];
    $_SESSION["UserLibera"] = $row['TipoUsuarioLibera'];

    $_SESSION["MenuSistemas"] = $row['EstatusTSistemas'];
    $_SESSION["MenuManto"] = $row['EstatusTMantto'];
    $_SESSION["MenuMensaje1"] = $row['EstatusTMensajerias1'];
    $_SESSION["MenuMensaje2"] = $row['EstatusTMensajerias2'];
    $_SESSION["MenuLibera"] = $row['EstatusLibera'];
    
    $_SESSION["Departamento"] = $row['Departamento'];
    $_SESSION["CorreoUsuario"] = $row['Correo'];

    $_SESSION["CorreoCopia"] = $row['Correo2'];


    //$response->Estatus=$row['Estatus'];
    //$response->TipoUsuario=$row['TipoUsuario'];
    $response->validacion= "true";

}

echo json_encode($response);


?>