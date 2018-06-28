<?php
    require "conexion.php";
    $responsedos = new stdClass();
    $data =array();
                          
    $idacabado1=$_POST['idacabado1'];
    
    $sql="SELECT ID_ACABADO, DESCRIPCION, IMPORTE, UNIDAD FROM acabados WHERE ID_ACABADO = $idacabado1 AND ACTIVO = 1";
    $stmt=sqlsrv_query($conn,$sql);

         while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
        {
            $data[] = array("id_Acabado"=>$row["ID_ACABADO"],
                "descripcion"=>$row["DESCRIPCION"],
                "importe"=>$row["IMPORTE"],
                "unidad"=>$row["UNIDAD"]
                );
        }

    $responsedos->data = $data;
    echo json_encode ($responsedos);
?>