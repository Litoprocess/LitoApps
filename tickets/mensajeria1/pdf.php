<?php
require('../PDF/fpdf.php');

include 'php/conn.php';

$IdTicket = $_REQUEST["IdTicket"];

$sql = "SELECT * FROM Tickets WHERE IdTicket = $IdTicket";

$stmt = sqlsrv_query($conn,$sql);

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$Titulo=$row['Titulo'];
	$FechaRegistro = $row["FechaRegistro"]->format("d-m-Y");
	$NombreEmpresa = $row["NombreEmpresa"];
	$Domicilio = $row["Domicilio"];
	$NombreContacto = $row["NombreContacto"];
	$TelefonoContacto = $row["TelefonoContacto"];
	$Prioridad = $row["Prioridad"];
	$Detalles = $row["Detalles"];
	$NombreUsuario = $row["NombreUsuario"];
	$FechaEntrega = $row["FechaEntrega"]->format("d-m-Y");
	$Hora1 = "";

	if($row["HoraEntrega1"]->format("H:i")!= "00:00"){
		$Hora1 = $row["HoraEntrega1"]->format("H:i");
	}

	$Hora2 = "";
	if($row["HoraEntrega1"]->format("H:i")!= "00:00"){
		$Hora2 = $row["HoraEntrega2"]->format("H:i");
	}
	
	$HoraEntrega = $Hora1." - ".$Hora2;

}

/*class PDF extends FPDF
{
//Cabecera de página
	function Header()
	{
		$Encabezado = utf8_decode('SOLICITUD DE ENVÍO');
    //Logo
		$pdf->Image("../images/logo_b.png" , 10 , 10, 0, 15, "PNG");
    //Arial bold 15
		$pdf->SetFont('Helvetica','B', 20);
    //Título
		$pdf->Cell(0,10,$Encabezado,0,0,'R');
    //Salto de línea
		$pdf->Ln();

	}

   //Tabla simple
	function Tabla1($Titulo, $FechaRegistro, $NombreEmpresa, $Domicilio, $NombreContacto, $TelefonoContacto, $Prioridad, $Detalles,
	$Detalles, $NombreUsuario, $FechaEntrega, $HoraEntrega)
	{
		$pdf->SetFont('','', 10);
		$pdf->Cell(130,6,"ASUNTO: $Titulo",0);
		$pdf->Cell(0,6,"FECHA REGISTRO: $FechaRegistro",0,0,'R');
		$pdf->Ln(12
			);
		
		//DATOS DE LA EMPRESA
		$pdf->Cell(0, 10,'DESTINO', 0, 0,'C');
		$pdf->Ln(15);
		$pdf->Cell(25, 6,'EMPRESA:', 0, 0);
		$pdf->MultiCell(0, 6, "$NombreEmpresa", 0);
		$pdf->Ln();
		$pdf->Cell(25, 6,'DIRECCION:', 0, 0);
		$pdf->MultiCell(0, 6, "$Domicilio", 0);
		$pdf->Ln();
		$pdf->Cell(25, 6,'CONTACTO:', 0, 0);
		$pdf->MultiCell(0, 6, "$NombreContacto", 0);
		$pdf->Ln();
		$pdf->Cell(25, 6,'TELEFONO:', 0, 0);
		$pdf->Cell(75,6,"$TelefonoContacto",0,0);
		$pdf->Cell(0,6,"PRIORIDAD: $Prioridad",0,0,'R');
		$pdf->Ln(12);
		$pdf->Cell(35, 6,'INSTRUCCIONES:', 0, 0);
		$pdf->MultiCell(0, 6, "$Detalles", 0);
		$pdf->Ln(12);

		//INFORMACION GENERAL
		$pdf->Cell(0, 10,'INFORMACION DE ENTREGA', 0, 0,'C');
		$pdf->Ln(15);
		$pdf->Cell(140,6,"SOLICITA: $NombreUsuario", 0);
		$pdf->Cell(30,6,"[   ] Entregado", 0);
		$pdf->Ln();
		$pdf->Cell(140,6,"FECHA DE ENTREGA: $FechaEntrega", 0);
		$pdf->Cell(30,6,"[   ] No entregado", 0);
		$pdf->Ln();
		$pdf->Cell(140,6,"HORA DE ENTREGA: $HoraEntrega", 0);
		$pdf->Cell(30,6,"[   ] Cancelado", 0);
		$pdf->Ln(15);
		$pdf->Cell(0, 6,"NOTAS:", 0);
		$pdf->Ln(10);
		$pdf->Cell(0, 0, "", 1);
		$pdf->Ln(6);
		$pdf->Cell(0, 0, "", 1);
		$pdf->Ln(6);
		$pdf->Cell(0, 0, "", 1);
		$pdf->Ln(6);
		$pdf->Cell(0, 0, "", 1);
		$pdf->Ln(15);
		$pdf->Cell(95,7,'_____________________________',0,0,'C');
		$pdf->Cell(95,7,'_____________________________',0,0,'C');
		$pdf->Ln();
		$pdf->Cell(95,7,"FIRMA DEL AGENTE",0,0,'C');
		$pdf->Cell(95,7,"DESTINATARIO",0,0,'C');
	}*/

   /*Tabla coloreada
	function TablaColores($header)
	{
//Colores, ancho de línea y fuente en negrita
		$pdf->SetFillColor(255,0,0);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(128,0,0);
		
		$pdf->SetFont('','');
//Cabecera

		for($i=0;$i<count($header);$i++)
			$pdf->Cell(40,7,$header[$i],1,0,'C',1);
		$pdf->Ln();
//Restauración de colores y fuentes
		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
//Datos
		$fill=false;
		$pdf->Cell(40,6,"hola",'LR',0,'L',$fill);
		$pdf->Cell(40,6,"hola2",'LR',0,'L',$fill);
		$pdf->Cell(40,6,"hola3",'LR',0,'R',$fill);
		$pdf->Cell(40,6,"hola4",'LR',0,'R',$fill);
		$pdf->Ln();
		$fill=!$fill;
		$pdf->Cell(40,6,"col",'LR',0,'L',$fill);
		$pdf->Cell(40,6,"col2",'LR',0,'L',$fill);
		$pdf->Cell(40,6,"col3",'LR',0,'R',$fill);
		$pdf->Cell(40,6,"col4",'LR',0,'R',$fill);
		$fill=true;
		$pdf->Ln();
		$pdf->Cell(160,0,'','T');
	}*/



//}

$pdf=new FPDF();

$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(35);
//$pdf->AddPage();
/*$pdf->Tabla1($Titulo, $FechaRegistro, $NombreEmpresa, $Domicilio, $NombreContacto, $TelefonoContacto, $Prioridad, $Detalles,
	$Detalles, $NombreUsuario, $FechaEntrega, $HoraEntrega);*/
		$Encabezado = 'SOLICITUD DE ENVÍO';
    //Logo
		$pdf->Image("../images/logo_b.png" , 10 , 10, 0, 15, "PNG");
    //Arial bold 15
		$pdf->SetFont('Helvetica','B', 20);
    //Título
		$pdf->Cell(0,10,$Encabezado,0,0,'R');
    //Salto de línea
		$pdf->Ln();

		$pdf->SetFont('','', 10);
		$pdf->Cell(130,6,"ASUNTO: $Titulo",0);
		$pdf->Cell(0,6,"FECHA REGISTRO: $FechaRegistro",0,0,'R');
		$pdf->Ln(12
			);
		
		//DATOS DE LA EMPRESA
		$pdf->Cell(0, 10,'DESTINO', 0, 0,'C');
		$pdf->Ln(15);
		$pdf->Cell(25, 6,'EMPRESA:', 0, 0);
		$pdf->MultiCell(0, 6, "$NombreEmpresa", 0);
		$pdf->Ln();
		$pdf->Cell(25, 6,'DIRECCION:', 0, 0);
		$pdf->MultiCell(0, 6, "$Domicilio", 0);
		$pdf->Ln();
		$pdf->Cell(25, 6,'CONTACTO:', 0, 0);
		$pdf->MultiCell(0, 6, "$NombreContacto", 0);
		$pdf->Ln();
		$pdf->Cell(25, 6,'TELEFONO:', 0, 0);
		$pdf->Cell(75,6,"$TelefonoContacto",0,0);
		$pdf->Cell(0,6,"PRIORIDAD: $Prioridad",0,0,'R');
		$pdf->Ln(12);
		$pdf->Cell(35, 6,'INSTRUCCIONES:', 0, 0);
		$pdf->MultiCell(0, 6, "$Detalles", 0);
		$pdf->Ln(12);

		//INFORMACION GENERAL
		$pdf->Cell(0, 10,'INFORMACION DE ENTREGA', 0, 0,'C');
		$pdf->Ln(15);
		$pdf->Cell(140,6,"SOLICITA: $NombreUsuario", 0);
		$pdf->Cell(30,6,"[   ] Entregado", 0);
		$pdf->Ln();
		$pdf->Cell(140,6,"FECHA DE ENTREGA: $FechaEntrega", 0);
		$pdf->Cell(30,6,"[   ] No entregado", 0);
		$pdf->Ln();
		$pdf->Cell(140,6,"HORA DE ENTREGA: $HoraEntrega", 0);
		$pdf->Cell(30,6,"[   ] Cancelado", 0);
		$pdf->Ln(15);
		$pdf->Cell(0, 6,"NOTAS:", 0);
		$pdf->Ln(10);
		$pdf->Cell(0, 0, "", 1);
		$pdf->Ln(6);
		$pdf->Cell(0, 0, "", 1);
		$pdf->Ln(6);
		$pdf->Cell(0, 0, "", 1);
		$pdf->Ln(6);
		$pdf->Cell(0, 0, "", 1);
		$pdf->Ln(15);
		$pdf->Cell(95,7,'_____________________________',0,0,'C');
		$pdf->Cell(95,7,'_____________________________',0,0,'C');
		$pdf->Ln();
		$pdf->Cell(95,7,"FIRMA DEL AGENTE",0,0,'C');
		$pdf->Cell(95,7,"DESTINATARIO",0,0,'C');		

/*/Segunda página
$pdf->AddPage();
$pdf->SetY(65);
$pdf->TablaColores($header);*/
$pdf->Output();
?>