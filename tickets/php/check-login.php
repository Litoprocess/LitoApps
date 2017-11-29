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


    $_SESSION['Permisos']["IdUsuario"] = $row['Id_Usuario'];
    $_SESSION['Permisos']["NombreUsuario"] = trim(utf8_encode($row['Nombre']));
    $_SESSION['Permisos']["Departamento"] = $row['Departamento'];
    $_SESSION['Permisos']["CorreoUsuario"] = $row['Correo'];
    $_SESSION['Permisos']["CorreoCopia"] = $row['Correo2'];

    //Variables de tipo de usuario
    $_SESSION['Permisos']["UserSistemas"] = $row['TipoUsuarioTSistemas'];
    $_SESSION['Permisos']["UserManto"] = $row['TipoUsuarioTMantto'];
    $_SESSION['Permisos']["UserMensaje1"] = $row['TipoUsuarioTMensajeria1'];
    $_SESSION['Permisos']["UserMensaje2"] = $row['TipoUsuarioTMensajerias2'];

    //Variables de menu de usuario
    $_SESSION['Permisos']["MenuSistemas"] = $row['EstatusTSistemas'];
    $_SESSION['Permisos']["MenuManto"] = $row['EstatusTMantto'];
    $_SESSION['Permisos']["MenuMensaje1"] = $row['EstatusTMensajerias1'];
    $_SESSION['Permisos']["MenuMensaje2"] = $row['EstatusTMensajerias2'];
    


    //$response->Estatus=$row['Estatus'];
    //$response->TipoUsuario=$row['TipoUsuario'];
    $response->validacion= "true";

}

echo json_encode($response);


?>