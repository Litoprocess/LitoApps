<?php
    require "conexion.php";

    $metrics = $_POST['matrix'];
    $fechaentrega= $_POST['fentrega'];
    $folio = $_POST['foliob'];

    $sql = "UPDATE ord_produccion SET OR_MATRIX = '$metrics', FECHA_ENTREGA = '$fechaentrega' WHERE FOLIO = '$folio'";
    $stmt = sqlsrv_query($conn,$sql);

    $response = new stdClass(); 
    $arreglo = array();        
    $sql2 = "SELECT OR_MATRIX FROM ord_produccion WHERE FOLIO = '$folio'";
    $stmt2 = sqlsrv_query($conn,$sql2);

    while($row = sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC)){

    $arreglo[]=array(
                "or_matrix"=>$row["OR_MATRIX"]  );
    }

    if($sql2)
    {
        $response->validacion="true";
        $response->data=$arreglo;
    }
    else
    {
        $response->validacion="false";
    }

    echo json_encode ($response);


?>