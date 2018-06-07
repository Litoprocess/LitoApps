<?php
session_start();

include 'conn.php';

//Asignacion de variables

$NombreUsuario = $_SESSION['Permisos']["NombreUsuario"];
$SelectEstatus = "";

$sql = "SELECT * FROM Tickets WHERE Asignado = '$NombreUsuario'";
$stmt = sqlsrv_query($conn, $sql);

//Verifica instruccion SQL
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$response = new stdClass();
$data = array();

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

    $EstatusBD = $row['Estado'];

    if ($row['FechaCompromiso'] == null) {

        $Compromiso = "<input type='date' class='Fcompro' value=''>";
    } else {

        $Compromiso = "<input type='date' class='Fcompro' value='" . $row['FechaCompromiso']->format("Y-m-d") . "' readonly>";
    }

    if ($row['FechaFinalizado'] == null) {

        $FechaVencimiento = "SIN FINALIZAR";
    } else {
        $FechaVencimiento = $row['FechaFinalizado']->format("Y-m-d");
    }

    //Select Estatus
    require 'DB Table/select-estatus.php';

    $data[] = array("Folio" =>$row['Id_Ticket'],
        "Solicita" => $row['Solicitante'],
        "Titulo" => $row['Titulo'],
        "Descripcion" => mb_strtoupper(($row['Tarea'])),
        "Registro" => $row['FechaRegistro']->format("Y-m-d"),
        "Prioridad" => $row['Prioridad'],
        "Compromiso" => $Compromiso,
        "Estatus" => $SelectEstatus,
        "Finalizado" => $FechaVencimiento,
        "Correo" => $row['CorreoSolicitante']
            );
    
}

$response->data = $data;

echo json_encode($response);
?>