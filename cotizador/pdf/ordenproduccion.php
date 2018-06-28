<?php session_start();
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once('fpdf/fpdf.php');
require_once('fpdi/src/autoload.php');
require('../php/conexion.php');


    $response = new stdClass();
    $data =array();
                          
    $foliob=$_GET['foliob'];
   
    $sql="SELECT * FROM v_abrircotizaciones WHERE FOLIO='$foliob'";
    $stmt = sqlsrv_query($conn,$sql);

   while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
   {
    $data[] = array(
		"FOLIO"=>$row['FOLIO'],
		"FECHA_HORA"=>$row['FECHA_HORA'],
		"CLIENTE"=>$row['CLIENTE'],
		"TRABAJO"=>$row['TRABAJO'],
		"CANTIDAD"=>$row['CANTIDAD'],
		"ANCHO"=>$row['ANCHO'],
		"ALTO"=>$row['ALTO'],
		"MEDIANIL_ANCHO"=>$row['MEDIANIL_ANCHO'],
		"MEDIANIL_ALTO"=>$row['MEDIANIL_ALTO'],
		"MAT_ESPECIAL"=>$row['MAT_ESPECIAL'],
		"ID_MAT_ESPECIAL"=>$row['ID_MAT_ESPECIAL'],
		"ID_MATERIAL"=>$row['ID_MATERIAL'],
		"MEDIDA"=>$row['MEDIDA'],
		"MATANCHO"=>$row['MATANCHO'],
		"MATALTO"=>$row['MATALTO'],
		"MATENTRAN"=>$row['MATENTRAN'],
		"ORIENTA"=>$row['ORIENTA'],
		"APROVECHAMIENTO"=>$row['APROVECHAMIENTO'],
		"RESOLUCION"=>$row['RESOLUCION'],
		"BLANCO"=>$row['BLANCO'],
		"ID_ACABADO1"=>$row['ID_ACABADO1'],
		"ID_ACABADO2"=>$row['ID_ACABADO2'],
		"ID_ACABADO3"=>$row['ID_ACABADO3'],
		"ID_ACABADO4"=>$row['ID_ACABADO4'],
		"ID_ACABADO5"=>$row['ID_ACABADO5'],
		"ID_ACABADO6"=>$row['ID_ACABADO6'],
		"A1_DESC"=>$row['A1_DESC'],
		"A1_PRECIO"=>$row['A1_PRECIO'],
		"A2_DESC"=>$row['A2_DESC'],
		"A2_PRECIO"=>$row['A2_PRECIO'],
		"A3_DESC"=>$row['A3_DESC'],
		"A3_PRECIO"=>$row['A3_PRECIO'],
		"A4_DESC"=>$row['A4_DESC'],
		"A4_PRECIO"=>$row['A4_PRECIO'],
		"A5_DESC"=>$row['A5_DESC'],
		"A5_PRECIO"=>$row['A5_PRECIO'],
		"A6_DESC"=>$row['A6_DESC'],
		"A6_PRECIO"=>$row['A6_PRECIO'],
		"OBSERVACIONES"=>$row['OBSERVACIONES'],
		"SUBTOTAL"=>$row['SUBTOTAL'],
		"PORMARGEN"=>$row['PORMARGEN'],
		"PUNITARIO"=>$row['PUNITARIO'],
		"MARGEN"=>$row['MARGEN'],
		"TOTAL"=>$row['TOTAL'],
		"PORCOMISION"=>$row['PORCOMISION'],
		"PROVEEDOR"=>$row['PROVEEDOR'],
		"COMISION"=>$row['COMISION'],
		"PRECIO_ACABADO1"=>$row['PRECIO_ACABADO1'],
		"PRECIO_ACABADO2"=>$row['PRECIO_ACABADO2'],
		"PRECIO_ACABADO3"=>$row['PRECIO_ACABADO3'],
		"PRECIO_ACABADO4"=>$row['PRECIO_ACABADO4'],
		"PRECIO_ACABADO5"=>$row['PRECIO_ACABADO5'],
		"PRECIO_ACABADO6"=>$row['PRECIO_ACABADO6'],
		"CANT_MAT"=>$row['CANT_MAT'],
		"PRECIO_MAT"=>$row['PRECIO_MAT'],
		"PRECIO_IMP"=>$row['PRECIO_IMP'],
		"DESC_ACAB1"=>$row['DESC_ACAB1'],
		"DESC_ACAB2"=>$row['DESC_ACAB2'],
		"DESC_ACAB3"=>$row['DESC_ACAB3'],
		"DESC_ACAB4"=>$row['DESC_ACAB4'],
		"DESC_ACAB5"=>$row['DESC_ACAB5'],
		"DESC_ACAB6"=>$row['DESC_ACAB6'],
		"TIPO_CANT_MAT"=>$row['TIPO_CANT_MAT'],
		"ID_PRODUCCION"=>$row['ID_PRODUCCION'],
		"OR_MATRIX"=>$row['OR_MATRIX'],
		"FECHA_ENTREGA"=>$row['FECHA_ENTREGA'],		
		);	    

		// initiate FPDI
		$pdf = new Fpdi();
		// add a page
		$pdf->AddPage();
		// set the source file
		$pdf->setSourceFile('OrdenProduccionPlotterSinDatos2.pdf');
		// import page 1
		$tplIdx = $pdf->importPage(1);
		// use the imported page and place it at position 10,10 with a width of 100 mm
		$pdf->useTemplate($tplIdx, 10, 10, 200);

		// now write some text above the imported page
		$pdf->SetFont('Arial','','10');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(177, 30.5);
		$pdf->Cell(16,5,$row['FOLIO'],0,0,'R');
		//$pdf->Write(0, $row['FOLIO']);

		$pdf->SetFont('Arial','','10');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(177, 35);
		$pdf->Cell(16,5,$row['ID_PRODUCCION'],0,0,'R');
		//$pdf->Write(0, $row['ID_PRODUCCION']);

		$pdf->SetFont('Arial','','10');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(177, 39.7);
		$pdf->Cell(16,5,$row['OR_MATRIX'],0,0,'R');
		//$pdf->Write(0, strtoupper($row['OR_MATRIX']));	

		$pdf->SetFont('Arial','','10');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(42, 51);
		$pdf->Cell(93,5,$row['TRABAJO'],0,0,'L');
		//$pdf->Write(0, $row['TRABAJO']);

		$pdf->SetFont('Arial','','10');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(59, 37.5);
		$pdf->Write(0, $row['FECHA_HORA']);	

		$pdf->SetFont('Arial','','10');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(64, 43);
		$pdf->Write(0, date('d-m-Y',strtotime($row['FECHA_ENTREGA'])));		

		$pdf->SetFont('Arial','','10');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(42, 60.5);
		$pdf->Cell(93,5,$row['CLIENTE'],0,0,'L');
		//$pdf->Write(0, $row['CLIENTE']);

		$pdf->SetFont('Arial','','10');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(153, 60.5);
		$pdf->Cell(30,5,$row['CANTIDAD'],0,0,'C');
		//$pdf->Write(0, number_format($row['CANTIDAD']));	

		//////////////////////////////////////////////
		//              ESPECIFICACIONES			//
		//////////////////////////////////////////////
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(53, 79);
		$pdf->Cell(20,5,number_format($row['ANCHO']),0,0,'R');
		//$pdf->Write(0, $row['ANCHO']);		

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(53, 84.5);
		$pdf->Cell(20,5,number_format($row['ANCHO']),0,0,'R');
		//$pdf->Write(0, $row['ALTO']);		

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(53, 90);
		$pdf->Cell(20,5,number_format($row['MEDIANIL_ANCHO']),0,0,'R');
		//$pdf->Write(0, $row['MEDIANIL_ANCHO']);						

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(53, 95.5);
		$pdf->Cell(20,5,number_format($row['MEDIANIL_ALTO']),0,0,'R');
		//$pdf->Write(0, $row['MEDIANIL_ALTO']);

		$totancho = $row['ANCHO'] + $row['MEDIANIL_ANCHO'];

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(53, 101.3);
		$pdf->Cell(20,5,number_format($totancho),0,0,'R');
		//$pdf->Write(0, $totancho);		

		$totalto = $row['ALTO'] + $row['MEDIANIL_ALTO'];

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(53, 107.5);
		$pdf->Cell(20,5,number_format($totalto),0,0,'R');
		//$pdf->Write(0, $totalto);

		//////////////////////////////////////////////
		//                MATERIAL					//
		//////////////////////////////////////////////
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 79);
		$pdf->Cell(20,5,number_format($row['MATANCHO']),0,0,'R');
		//$pdf->Write(0, $row['MATANCHO']);				

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 84.5);
		$pdf->Cell(20,5,number_format($row['MATALTO']),0,0,'R');
		//$pdf->Write(0, $row['MATALTO']);		

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 90);
		$pdf->Cell(20,5,number_format($row['MATENTRAN']),0,0,'C');
		//$pdf->Write(0, $row['MATENTRAN']);						

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 95.5);
		$pdf->Cell(20,5,number_format($row['APROVECHAMIENTO']),0,0,'C');
		//$pdf->Write(0, $row['APROVECHAMIENTO']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 101.3);
		$pdf->Cell(20,5,$row['ORIENTA'],0,0,'R');
		//$pdf->Write(0, $row['ORIENTA']);	

		if($row['MAT_ESPECIAL'] == "on")
		{
			$matespecial=$row['ID_MAT_ESPECIAL'];
			$sql3="SELECT NOMBRE_MATERIAL,TIPO,PROVEEDOR FROM materiales_especiales WHERE ID_MAT_ESPECIAL='$matespecial'";
			$stmt3 = sqlsrv_query($conn,$sql3);
		    while($row3 = sqlsrv_fetch_array($stmt3,SQLSRV_FETCH_ASSOC))
		    {
		    	if($row3['TIPO'] == 'F')
		    	{
		    		$tipo = "FLEXIBLE";
		    	}
		    	else if($row3['TIPO'] == 'R')
		    	{
		    		$tipo = "RIGIDO";
		    	} 
		    	else if($row3['TIPO'] == 'P')
		    	{
					$tipo = "FOTOGRAFICO";
		    	}
				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(118, 110);
				$pdf->Write(0, $tipo);

				$pdf->SetFont('Arial','B','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(85, 117);
				$pdf->Write(0, substr($row3['NOMBRE_MATERIAL'],0,28));	
				$pdf->SetFont('Arial','B','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(85, 121);
				$pdf->Write(0, substr($row3['NOMBRE_MATERIAL'],29,50));	
				$pdf->SetFont('Arial','B','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(85, 125);
				$pdf->Write(0, "Proveedor:  ".$row3['PROVEEDOR']);									
			}
		}
		else
		{
			$idmaterial=$row['ID_MATERIAL'];
			$sql3="SELECT NOMBRE_MATERIAL,TIPO,PROVEEDOR FROM materiales_cotizador WHERE ID_MATERIAL='$idmaterial'";
			$stmt3 = sqlsrv_query($conn,$sql3);
		    while($row3 = sqlsrv_fetch_array($stmt3,SQLSRV_FETCH_ASSOC))
		    {
		    	if($row3['TIPO'] == 'F')
		    	{
		    		$tipo = "FLEXIBLE";
		    	}
		    	else if($row3['TIPO'] == 'R')
		    	{
		    		$tipo = "RIGIDO";
		    	} 
		    	else if($row3['TIPO'] == 'P')
		    	{
					$tipo = "FOTOGRAFICO";
		    	}
				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(118, 110);
				$pdf->Write(0, $tipo);

				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(85, 117);
				$pdf->Write(0, substr($row3['NOMBRE_MATERIAL'],0,28));	
				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(85, 121);
				$pdf->Write(0, substr($row3['NOMBRE_MATERIAL'],29,50));	
				$pdf->SetFont('Arial','B','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(85, 125);
				$pdf->Write(0, "Proveedor:  ".$row3['PROVEEDOR']);												
			}
		}				
		
		//////////////////////////////////////////////
		//                IMPRESION					//
		//////////////////////////////////////////////
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(60, 128);
		$pdf->Write(0, $row['RESOLUCION']);		

		if($row['BLANCO'] > 0)
		{
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(60, 134);
		$pdf->Write(0, "SI");
		
		}
		else
		{
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(62, 117);
		$pdf->Write(0, "NO");
		}

		//////////////////////////////////////////////
		//                ACABADOS					//
		//////////////////////////////////////////////
		if($row['ID_ACABADO1'] > 0)
		{
			$idacabado=$row['ID_ACABADO1'];
	    	$sql2="SELECT DESCRIPCION,IMPORTE FROM acabados WHERE ID_ACABADO='$idacabado'";
	    	$stmt2 = sqlsrv_query($conn,$sql2);
	        while($row2 = sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC))
		    {
				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(32, 147.5);
				$pdf->Write(0, $row2['DESCRIPCION']);			   			   
			}			
		}
		if($row['ID_ACABADO2'] > 0)
		{
			$idacabado=$row['ID_ACABADO2'];
	    	$sql2="SELECT DESCRIPCION,IMPORTE FROM acabados WHERE ID_ACABADO='$idacabado'";
	    	$stmt2 = sqlsrv_query($conn,$sql2);
	        while($row2 = sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC))
		    {
				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(32, 153);
				$pdf->Write(0, $row2['DESCRIPCION']);				   	
			}			
		}		
		if($row['ID_ACABADO3'] > 0)
		{
			$idacabado=$row['ID_ACABADO3'];
	    	$sql2="SELECT DESCRIPCION,IMPORTE FROM acabados WHERE ID_ACABADO='$idacabado'";
	    	$stmt2 = sqlsrv_query($conn,$sql2);
	        while($row2 = sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC))
		    {
				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(32, 159);
				$pdf->Write(0, $row2['DESCRIPCION']);
			}			
		}	
		if($row['ID_ACABADO4'] > 0)
		{
			$idacabado=$row['ID_ACABADO4'];
	    	$sql2="SELECT DESCRIPCION,IMPORTE FROM acabados WHERE ID_ACABADO='$idacabado'";
	    	$stmt2 = sqlsrv_query($conn,$sql2);
	        while($row2 = sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC))
		    {
				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(32, 164.5);
				$pdf->Write(0, $row2['DESCRIPCION']);
			}			
		}
		if($row['ID_ACABADO5'] > 0)
		{
			$idacabado=$row['ID_ACABADO5'];
	    	$sql2="SELECT DESCRIPCION,IMPORTE FROM acabados WHERE ID_ACABADO='$idacabado'";
	    	$stmt2 = sqlsrv_query($conn,$sql2);
	        while($row2 = sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC))
		    {
				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(32, 170);
				$pdf->Write(0, $row2['DESCRIPCION']);
			}			
		}	
		if($row['ID_ACABADO6'] > 0)
		{
			$idacabado=$row['ID_ACABADO6'];
	    	$sql2="SELECT DESCRIPCION,IMPORTE FROM acabados WHERE ID_ACABADO='$idacabado'";
	    	$stmt2 = sqlsrv_query($conn,$sql2);
	        while($row2 = sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC))
		    {
				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(32, 175.5);
				$pdf->Write(0, $row2['DESCRIPCION']);
			}			
		}			
		//////////////////////////////////////////////
		//                ADICIONALES				//
		//////////////////////////////////////////////
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 191);
		$pdf->Write(0, $row['A1_DESC']);		

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 196.5);
		$pdf->Write(0, $row['A2_DESC']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 202);
		$pdf->Write(0, $row['A3_DESC']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 208);
		$pdf->Write(0, $row['A4_DESC']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 213.5);
		$pdf->Write(0, $row['A5_DESC']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 219);
		$pdf->Write(0, $row['A6_DESC']);

		//////////////////////////////////////////////
		//               OBSERVACIONES			    //
		//////////////////////////////////////////////
		$pdf->SetFont('Arial','B','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(138, 72);
		$pdf->Write(0, "TIEMPO DE PRODUCCION:	".$row['TIEMPO_PRODUCCION'] . "		HRS.");

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 242);
		$pdf->Write(0, strtoupper(substr($row['OBSERVACIONES'],0,65)) );

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 246);
		$pdf->Write(0, strtoupper(substr($row['OBSERVACIONES'],66,130)) );

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 250);
		$pdf->Write(0, strtoupper(substr($row['OBSERVACIONES'],131,195)) );

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 254);
		$pdf->Write(0, strtoupper(substr($row['OBSERVACIONES'],196,260)) );		

		$pdf->Output();	           
    }

$response->validacion="true";    
$response->data = $data;      
echo json_encode ($response);

	

 ?>