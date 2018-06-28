<?php
require "conexion.php";
 $response = new stdClass();
    $data =array();

$id_mat = $_POST['id_meterial'];
$cantidad=$_POST['cantidad2'];;
 

	$sql= "SELECT * FROM Costos_Materiales_Solventes WHERE id_material = $id_mat ";

$stmt = sqlsrv_query($conn,$sql);



 while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
        {
        	if ($cantidad>0 && $cantidad<= 200)
			{
	
        		$total=$row["0-200"];
        		$response->total = $cantidad * $total;

        	}
        	else if ($cantidad>201 && $cantidad<= 500) 
        	{
        		$total=$row["201-500"];
        		$response->total = $cantidad * $total;

        	}
			else if ($cantidad>501 && $cantidad<= 1000)
			 {
				$total=$row["501-1000"];
				$response->total = $cantidad * $total;

			}
			else if ($cantidad>1001 && $cantidad<= 5000) 
			{
				$total=$row["1000-5000"];
				$response->total =$cantidad * $total;

			}
			else if ($cantidad>=5001 )
			{
				$total=$row["5001-adelante"];
				$response->total =$cantidad *  $total;

			}
		}



          echo json_encode ($response);

?>