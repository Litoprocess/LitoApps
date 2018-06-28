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
		$pdf->setSourceFile('CotizacioPlotterSinDatos2.pdf');
		// import page 1
		$tplIdx = $pdf->importPage(1);
		// use the imported page and place it at position 10,10 with a width of 100 mm
		$pdf->useTemplate($tplIdx, 10, 10, 200);

		// now write some text above the imported page
		$pdf->SetFont('Arial','B','10');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(178, 21.3);
		$pdf->Cell(16,5,$row['FOLIO'],0,1,'R');
		//$pdf->Write(0, $row['FOLIO']);

		$pdf->SetFont('Arial','','10');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(42, 34.5);
		$pdf->Cell(93,5,$row['TRABAJO'],0,1,'L');
		//$pdf->Write(0, $row['TRABAJO']);

		$pdf->SetFont('Arial','','10');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(143, 34);
		$pdf->Cell(50,5,$row['FECHA_HORA'],0,1,'C');
		//$pdf->Write(0, $row['FECHA_HORA']);	

		$pdf->SetFont('Arial','','10');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(42, 43.5);
		$pdf->Cell(93,5,$row['CLIENTE'],0,1,'L');
		//$pdf->Write(0, $row['CLIENTE']);

		$pdf->SetFont('Arial','','10');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(153, 43.5);
		$pdf->Cell(30,5,number_format($row['CANTIDAD']),0,1,'C');
		//$pdf->Write(0, number_format($row['CANTIDAD']));		

		//////////////////////////////////////////////
		//              ESPECIFICACIONES			//
		//////////////////////////////////////////////
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(53, 62.5);
		$pdf->Cell(20,5,number_format($row['ANCHO']),0,1,'R');		
		//$pdf->Write(0, $row['ANCHO']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(53, 67.5);
		$pdf->Cell(20,5,number_format($row['ALTO']),0,1,'R');		
		//$pdf->Write(0, $row['ALTO']);		

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(53, 73.5);
		$pdf->Cell(20,5,number_format($row['MEDIANIL_ANCHO']),0,1,'R');		
		//$pdf->Write(0, $row['MEDIANIL_ANCHO']);						

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(53, 79);
		$pdf->Cell(20,5,number_format($row['MEDIANIL_ALTO']),0,1,'R');		
		//$pdf->Write(0, $row['MEDIANIL_ALTO']);

		$totancho = $row['ANCHO'] + $row['MEDIANIL_ANCHO'];

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(53, 84.5);
		$pdf->Cell(20,5,number_format($totancho),0,1,'R');		
		//$pdf->Write(0, $totancho);		

		$totalto = $row['ALTO'] + $row['MEDIANIL_ALTO'];

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(53, 90);
		$pdf->Cell(20,5,number_format($totalto),0,1,'R');		
		//$pdf->Write(0, $totalto);

		//////////////////////////////////////////////
		//                MATERIAL					//
		//////////////////////////////////////////////
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 62.5);
		$pdf->Cell(20,5,$row['MATANCHO'],0,1,'R');		
		//$pdf->Write(0, $row['MATANCHO']);				

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 67.5);
		$pdf->Cell(20,5,$row['MATALTO'],0,1,'R');		
		//$pdf->Write(0, $row['MATALTO']);		

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 73.5);
		$pdf->Cell(20,5,$row['MATENTRAN'],0,1,'R');		
		//$pdf->Write(0, $row['MATENTRAN']);						

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 79.5);
		$pdf->Cell(20,5,$row['APROVECHAMIENTO'],0,1,'C');		
		//$pdf->Write(0, $row['APROVECHAMIENTO']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 85);
		$pdf->Cell(20,5,$row['ORIENTA'],0,1,'C');		
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
				$pdf->SetXY(118, 93);
				$pdf->Write(0, $tipo);

				$pdf->SetFont('Arial','B','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(85, 100);
				$pdf->Write(0, substr($row3['NOMBRE_MATERIAL'],0,28));	
				$pdf->SetFont('Arial','B','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(85, 104);
				$pdf->Write(0, substr($row3['NOMBRE_MATERIAL'],29,50));	
				$pdf->SetFont('Arial','B','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(85, 110);
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
				$pdf->SetXY(118, 93);
				$pdf->Write(0, $tipo);

				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(85, 100);
				$pdf->Write(0, substr($row3['NOMBRE_MATERIAL'],0,28));	
				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(85, 104);
				$pdf->Write(0, substr($row3['NOMBRE_MATERIAL'],29,50));	
				$pdf->SetFont('Arial','B','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(85, 110);
				$pdf->Write(0, "Proveedor:  ".$row3['PROVEEDOR']);							
			}
		}

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(174, 62.5);
		$pdf->Cell(20,5,$row['CANT_MAT'],0,1,'R');
		//$pdf->Write(0, $row['CANT_MAT']);	

		//$pdf->SetFont('Arial','','9');
		//$pdf->SetTextColor(0, 0, 0);
		//$pdf->SetXY(185, 65);
		//$pdf->Write(0, $row['TIPO_CANT_MAT']);	

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(174, 68);
		$pdf->Cell(20,5,"$" . number_format($row['PRECIO_MAT']),0,1,'R');
		//$pdf->Write(0, "$" . number_format($row['PRECIO_MAT']));				
		
		//////////////////////////////////////////////
		//                IMPRESION					//
		//////////////////////////////////////////////
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(60, 112);
		$pdf->Write(0, $row['RESOLUCION']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(174, 79.5);
		$pdf->Cell(20,5,"$" . number_format($row['PRECIO_IMP']),0,1,'R');
		//$pdf->Write(0, "$" . number_format($row['PRECIO_IMP']) );		

		if($row['BLANCO'] > 0)
		{
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(60, 117);
		$pdf->Write(0, "SI");

		$pdf->SetFont('Arial','','8');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(157.5, 88);
		$pdf->Write(0, "Blanco:");

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(174, 85.5);
		//$pdf->Write(0, "$" . $row['BLANCO'] );		
		$pdf->Cell(20,5,"$" . number_format($row['BLANCO']),0,1,'R');
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
				$pdf->SetXY(32, 131);
				$pdf->Write(0, $row2['DESCRIPCION']);

				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(143, 100);
				$pdf->Write(0, substr($row2['DESCRIPCION'],0,15));				   	
		    
			$pdf->SetFont('Arial','','9');
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetXY(113, 128);
			$pdf->Cell(20,5,"$" . number_format($row2['IMPORTE']),0,1,'R');			
			//$pdf->Write(0, "$".number_format($row2['IMPORTE']));

			$pdf->SetFont('Arial','','9');
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetXY(174, 97.5);
			$pdf->Cell(20,5,"$" . number_format($row['PRECIO_ACABADO1']),0,1,'R');			
			//$pdf->Write(0, "$".number_format($row['PRECIO_ACABADO1']));
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
				$pdf->SetXY(32, 136.5);
				$pdf->Write(0, $row2['DESCRIPCION']);

				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(143, 105);
				$pdf->Write(0, substr($row2['DESCRIPCION'],0,15));				   	
		    
			$pdf->SetFont('Arial','','9');
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetXY(113, 134);
			$pdf->Cell(20,5,"$" . number_format($row2['IMPORTE']),0,1,'R');			
			//$pdf->Write(0, "$".number_format($row2['IMPORTE']));

			$pdf->SetFont('Arial','','9');
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetXY(174, 102);
			$pdf->Cell(20,5,"$" . number_format($row['PRECIO_ACABADO2']),0,1,'R');
			//$pdf->Write(0, "$".number_format($row['PRECIO_ACABADO2']));
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
				$pdf->SetXY(32, 142);
				$pdf->Write(0, $row2['DESCRIPCION']);

				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(143, 110);
				$pdf->Write(0, substr($row2['DESCRIPCION'],0,15));				   	
		    
			$pdf->SetFont('Arial','','9');
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetXY(113, 139);
			$pdf->Cell(20,5,"$" . number_format($row2['IMPORTE']),0,1,'R');
			//$pdf->Write(0, "$".number_format($row2['IMPORTE']));

			$pdf->SetFont('Arial','','9');
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetXY(174, 107.5);
			$pdf->Cell(20,5,"$" . number_format($row['PRECIO_ACABADO3']),0,1,'R');
			//$pdf->Write(0, "$".number_format($row['PRECIO_ACABADO3']));
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
				$pdf->SetXY(32, 147.5);
				$pdf->Write(0, $row2['DESCRIPCION']);

				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(143, 115);
				$pdf->Write(0, substr($row2['DESCRIPCION'],0,15));				   	
		    
			$pdf->SetFont('Arial','','9');
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetXY(113, 145);
			$pdf->Cell(20,5,"$" . number_format($row2['IMPORTE']),0,1,'R');
			//$pdf->Write(0, "$".number_format($row2['IMPORTE']));

			$pdf->SetFont('Arial','','9');
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetXY(174, 112.5);
			$pdf->Cell(20,5,"$" . number_format($row['PRECIO_ACABADO4']),0,1,'R');
			//$pdf->Write(0, "$".number_format($row['PRECIO_ACABADO4']));
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
				$pdf->SetXY(32, 153);
				$pdf->Write(0, $row2['DESCRIPCION']);

				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(143, 120);
				$pdf->Write(0, substr($row2['DESCRIPCION'],0,15));				   	
		    
			$pdf->SetFont('Arial','','9');
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetXY(113, 151);
			$pdf->Cell(20,5,"$" . number_format($row2['IMPORTE']),0,1,'R');
			//$pdf->Write(0, "$".number_format($row2['IMPORTE']));

			$pdf->SetFont('Arial','','9');
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetXY(174, 117.5);
			$pdf->Cell(20,5,"$" . number_format($row['PRECIO_ACABADO5']),0,1,'R');
			//$pdf->Write(0, "$".number_format($row['PRECIO_ACABADO5']));
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
				$pdf->SetXY(32, 159);
				$pdf->Write(0, $row2['DESCRIPCION']);

				$pdf->SetFont('Arial','','9');
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetXY(143, 125);
				$pdf->Write(0, substr($row2['DESCRIPCION'],0,15));				   	
		    
			$pdf->SetFont('Arial','','9');
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetXY(113, 157);
			$pdf->Cell(20,5,"$" . number_format($row2['IMPORTE']),0,1,'R');
			//$pdf->Write(0, "$".number_format($row2['IMPORTE']));

			$pdf->SetFont('Arial','','9');
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetXY(174, 122.5);
			$pdf->Cell(20,5,"$" . number_format($row['PRECIO_ACABADO6']),0,1,'R');
			//$pdf->Write(0, "$".number_format($row['PRECIO_ACABADO6']));
			}			
		}			
		//////////////////////////////////////////////
		//                ADICIONALES				//
		//////////////////////////////////////////////
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 174);
		$pdf->Write(0, $row['A1_DESC']);		

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 172);
		$pdf->Cell(20,5,"$" . number_format($row['A1_PRECIO']),0,1,'R');
		//$pdf->Write(0, "$".number_format($row['A1_PRECIO']));	

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(143, 141);
		$pdf->Write(0, substr($row['A1_DESC'],0,24));

		$totaladic1 = $row['CANTIDAD'] * $row['A1_PRECIO'];
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(174, 138);
		//$pdf->Write(0, "$".number_format($totaladic1));
		$pdf->Cell(20,5,"$" .number_format($totaladic1),0,1,'R');

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 179.5);
		$pdf->Write(0, $row['A2_DESC']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 177);
		//$pdf->Write(0, "$".number_format($row['A2_PRECIO']));
		$pdf->Cell(20,5,"$" .number_format($row['A2_PRECIO']),0,1,'R');	

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(143, 146);
		$pdf->Write(0, substr($row['A2_DESC'],0,24));

		$totaladic2 = $row['CANTIDAD'] * $row['A2_PRECIO'];
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(174, 143);
		//$pdf->Write(0, "$".number_format($totaladic2));
		$pdf->Cell(20,5,"$" .number_format($totaladic2),0,1,'R');	

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 185.5);
		$pdf->Write(0, $row['A3_DESC']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 182.5);
		$pdf->Cell(20,5,"$" . number_format($row['A3_PRECIO']),0,1,'R');
		//$pdf->Write(0, "$".number_format($row['A3_PRECIO']));	

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(143, 151);
		$pdf->Write(0, substr($row['A3_DESC'],0,24));

		$totaladic3 = $row['CANTIDAD'] * $row['A3_PRECIO'];
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(174, 148);
		$pdf->Cell(20,5,"$" .number_format($totaladic3),0,1,'R');
		//$pdf->Write(0, "$".number_format($totaladic3));


		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 191);
		$pdf->Write(0, $row['A4_DESC']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 188.5);
		$pdf->Cell(20,5,"$" . number_format($row['A4_PRECIO']),0,1,'R');
		//$pdf->Write(0, "$".number_format($row['A4_PRECIO']));	

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(143, 156);
		$pdf->Write(0, substr($row['A4_DESC'],0,24));

		$totaladic4 = $row['CANTIDAD'] * $row['A4_PRECIO'];
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(174, 153);
		$pdf->Cell(20,5,"$" .number_format($totaladic4),0,1,'R');
		//$pdf->Write(0, "$".number_format($totaladic4));

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 196.5);
		$pdf->Write(0, $row['A5_DESC']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 194);
		$pdf->Cell(20,5,"$" . number_format($row['A4_PRECIO']),0,1,'R');
		//$pdf->Write(0, "$".number_format($row['A5_PRECIO']));	

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(143, 161);
		$pdf->Write(0, substr($row['A5_DESC'],0,24));

		$totaladic5 = $row['CANTIDAD'] * $row['A5_PRECIO'];
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(174, 158);
		$pdf->Cell(20,5,"$" .number_format($totaladic5),0,1,'R');
		//$pdf->Write(0, "$".number_format($totaladic5));

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 202);
		$pdf->Write(0, $row['A6_DESC']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(113, 199.5);
		$pdf->Cell(20,5,"$" . number_format($row['A4_PRECIO']),0,1,'R');
		//$pdf->Write(0, "$".number_format($row['A6_PRECIO']));	

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(143, 166);
		$pdf->Write(0, substr($row['A6_DESC'],0,24));

		$totaladic6 = $row['CANTIDAD'] * $row['A6_PRECIO'];
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(174, 163);
		$pdf->Cell(20,5,"$" .number_format($totaladic6),0,1,'R');
		//$pdf->Write(0, "$".number_format($totaladic6));

		//////////////////////////////////////////////
		//                  TOTALES  				//
		//////////////////////////////////////////////
		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(171.3, 175);
		$pdf->Cell(20,5,"$" .number_format($row['SUBTOTAL']),0,1,'R');

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(143.5, 183.5);
		$pdf->Write(0, $row['PORMARGEN']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(171.3, 180.5);
		$pdf->Cell(20,5,"$" .number_format($row['MARGEN']),0,1,'R');
		//$pdf->Write(0, "$".number_format($row['MARGEN']) );		

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(143.5, 189);
		$pdf->Write(0, $row['PORCOMISION']);

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(171.3, 186.5);
		$pdf->Cell(20,5,"$" .number_format($row['COMISION']),0,1,'R');
		//$pdf->Write(0, "$".number_format($row['COMISION']) );			

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(171.3, 192);
		$pdf->Cell(20,5,"$" .number_format($row['PUNITARIO']),0,1,'R');
		//$pdf->Write(0, "$".number_format($row['PUNITARIO']) );	

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(171.3, 198);
		$pdf->Cell(20,5,"$" .number_format($row['TOTAL']),0,1,'R');
		//$pdf->Write(0, "$".number_format($row['TOTAL']) );		

		//////////////////////////////////////////////
		//               OBSERVACIONES			    //
		//////////////////////////////////////////////

		$pdf->SetFont('Arial','B','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(138, 208);
		$pdf->Write(0, "TIEMPO DE PRODUCCION:	" . $row['TIEMPO_PRODUCCION'] . "	HRS.");

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 232);
		$pdf->Write(0, strtoupper(substr($row['OBSERVACIONES'],0,65)) );

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 236);
		$pdf->Write(0, strtoupper(substr($row['OBSERVACIONES'],66,130)) );

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 240);
		$pdf->Write(0, strtoupper(substr($row['OBSERVACIONES'],131,195)) );

		$pdf->SetFont('Arial','','9');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(32, 244);
		$pdf->Write(0, strtoupper(substr($row['OBSERVACIONES'],196,260)) );		

		$pdf->Output();	           
    }

$response->validacion="true";    
$response->data = $data;      
echo json_encode ($response);

	

 ?>