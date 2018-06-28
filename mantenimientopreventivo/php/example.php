<?php session_start();

include 'conexion.php';

if($_POST['maquina'] == "TODO")
{
    $sql = "SELECT * FROM mantenimientos";
    $stmt = sqlsrv_query($conn,$sql);        
}
else
{
    $maquina = $_POST['maquina'];
    $sql = "SELECT * FROM mantenimientos WHERE maquina = '$maquina'";
    $stmt = sqlsrv_query($conn,$sql);
}
//$response = new stdClass();
$arreglo = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

if( $row['tipo'] == 'unico' )
{
    $color = '#9e9e9e';
    $textColor = 'transparent';
    $editable = false;
}
if( $row['tipo'] == 'diario' )
{
    $color = '#ef9a9a';
    $textColor = 'transparent';
    $editable = false;
}
else if( $row['tipo'] == 'semanal' )
{
    $color = '#fff59d';
    $textColor = 'transparent';
    $editable = false;
}
else if( $row['tipo'] == 'mensual' )
{
   $color = '#90caf9'; 
   $textColor = 'transparent';
   $editable = false;
}
else if( $row['tipo'] == 'semestral' )
{
    $color = '#a5d6a7';
    $textColor = 'transparent';
    $editable = false;
}
else if( $row['tipo'] == 'anual' )
{
    $color = '#b39ddb';
    $textColor = 'transparent';
    $editable = false;
}
else
{
    $color = 'grey';
    $textColor = 'transparent';
    $editable = false;
}

    $arreglo[]=array(
        "id" => $row['id'],
        "title"=>$row['titulo'],
        "start"=>$row['fecha_inicio']->format('Y-m-d'),
        "end"=>$row['fecha_fin']->format('Y-m-d'),
        "color"=>$color,
        "textColor"=>$textColor
    );              
}

header('Content-Type: application/json');
echo json_encode($arreglo);