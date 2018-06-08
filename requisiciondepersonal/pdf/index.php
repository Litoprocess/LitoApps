<?php
include_once('ReporteOperador.php');
require('../php/conexionMetrics.php');


    $response = new stdClass();
    $data =array();
                          
    $operador=$_GET['operador'];
	$fechainicio = date("d-m-Y",strtotime($_GET['fechainicio']));
	$fechafin = date("d-m-Y",strtotime($_GET['fechafin']));

    $sql="execute dbo.ReporteOperador '$fechainicio','$fechafin','$operador'";
    $stmt = sqlsrv_query($conn,$sql);

		while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
		{
			$data[]=array(
				"NumOrden"=>$row['NumOrden'],
				"NombreTrabajo"=>utf8_encode($row['NombreTrabajo']),
				"IdAct"=>$row['IdAct'],
				"Descripcion"=>utf8_encode($row['Descripcion']),
				//"KeyProceso"=>$row['KeyProceso'],
				"Proceso"=>utf8_encode($row['Proceso']),
				"Cantidad"=>$row['Cantidad'],
				"Tiempo"=>number_format($row['Tiempo'],2),
				"HoraInicio" => $row['HoraInicio']->format('d-m-Y'),
				"HoraFin" => $row['HoraFin']->format('d-m-Y'),
				"Operador" => $row['Operador']
				);

			//$pdf = new FPDF();
			//$pdf->AddPage();
					

		//$datosReporte = $data
       
		}
	
		$pdf = new PDF();
		 
		$pdf->AddPage();
		 
		$miCabecera = array( 'NO.ORDEN', 'N.TRABAJO', 'ID.ACT','DESCRIPCION','PROCESO','CANTIDAD','TIEMPO','H.INICIO','H.FIN','OPERADOR');
		 
		$pdf->tablaHorizontal($miCabecera, $data);
		 
		$pdf->Output(); //Salida al navegador

	$response->validacion="true";    
	$response->data = $data;      
	echo json_encode ($response);	

 ?>