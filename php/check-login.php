<?php
session_start();

include 'conn.php';

$usuario = htmlspecialchars($_POST['usuario']);
$usuario = strtolower($_POST['usuario']);
$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
$password = $_POST['password'];

$sql = "SELECT * FROM cat_Usuarios WHERE Login = ? AND Password = ?";
$params = array(&$usuario, &$password);
$stmt = sqlsrv_query($conn,$sql,$params);

if( !$stmt ) {
    die( print_r( sqlsrv_errors(), true));
}
$response = new stdClass(); 
$permisos = array();
$response->validacion= "false";
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

    $permisos = array(
        "NombreUsuario" => trim(utf8_encode($row['Nombre'])),
        "usuario" => $row['Login'],
        "password" => $row['Password'],
        "IdUsuario" => $row['Id_Usuario'],
        "UserSistemas" => $row['TipoUsuarioTSistemas'],
        "UserManto" => $row['TipoUsuarioTMantto'],
        "UserMensaje1" => $row['TipoUsuarioTMensajeria1'],
        "UserMensaje2" => $row['TipoUsuarioTMensajerias2'],

        "MenuSistemas" => $row['EstatusTSistemas'],
        "MenuManto" => $row['EstatusTMantto'],
        "MenuMensaje1" => $row['EstatusTMensajerias1'],
        "MenuMensaje2" => $row['EstatusTMensajerias2'],
        
        "Departamento" => $row['Departamento'],
	"Puesto" => $row['Puesto'],
        "CorreoUsuario" => $row['Correo'],
        "CorreoCopia" => $row['Correo2'],

        "MenuTickets"=>$row['EstatusTickets'],
        //"UserTickets"=>$row['TipoUsuarioTickets'],
        "MenuLibera"=>$row['EstatusLibera'],
        "UserLibera"=>$row['TipoUsuarioLibera'],
        "MenuMaquilas"=>$row['EstatusMaquilas'],
        "UserMaquilas" => $row['TipoUsuarioMaquilas'],
        "MenuMuestras"=>$row['EstatusMuestras'],
        "UserMuestras" => $row['TipoUsuarioMuestras'],
        "MenuRevBDD"=>$row['EstatusRevBDD'],
        "UserRevBDD" => $row['TipoUsuarioRevBDD'], 
        "MenuReprocesos"=>$row['EstatusReprocesos'],
        "UserReprocesos" => $row['TipoUsuarioReprocesos'],        
        "MenuCapacitacion" => $row['EstatusCapacitacion'],
        "UserCapacitacion" => $row['TipoUsuarioCapacitacion'],
        "MenuiDashboards" => $row['EstatusiDashboards'], 
        "MenuDBxtra" => $row['EstatusDBxtra'],  
        "MenuStarbucks" => $row['EstatusStarbucks'],
        "MenuStarbucks2" => $row['EstatusStarbucks2'],
        "MenuKrispykreme" => $row['EstatusKrispyKreme'],
        "MenuInventario" => $row['EstatusInventario'],
        "UserInventario" => $row['TipoUsuarioInventario'],
        "MenuNissan" => $row['EstatusNissan'],
        "UserNissan" => $row["TipoUsuarioNissan"],    
        "MenuCotizador" => $row['EstatusCotizador'],
        "UserCotizador" => $row["TipoUsuarioCotizador"],
        "UserListadoCotizador" => $row["TipoUsuarioListadoCotizador"],
        "MenuReportesProduccion" => $row['EstatusReportesProduccion'],
        "UserReportesProduccion" => $row['TipoUsuarioReportesProduccion'],
        "MenuPreviewOP" => $row['EstatusPreviewOP'],
        "UserPreviewOP" => $row['TipoUsuarioPreviewOP'],
        "MenuMantenimiento" => $row['EstatusMantenimiento'],
        "UserMantenimiento" => $row['TipoUsuarioMantenimiento']        

        );

        $_SESSION['Permisos']=$permisos;
        $response->validacion= "true";
        $response->Estatus=$row['EstatusLitoApps'];
    //$response->TipoUsuario=$row['TipoUsuario'];    
}

echo json_encode($response);


?>