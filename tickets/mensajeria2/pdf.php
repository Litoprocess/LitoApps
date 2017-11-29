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



class PDF extends FPDF
{
//Cabecera de página
	function Header()
	{

		$Encabezado = utf8_decode('SOLICITUD DE ENVÍO');
    //Logo
		$this->Image("../images/logo_b.png" , 10 , 10, 0, 15, "PNG");
    //Arial bold 15
		$this->SetFont('Helvetica','B', 20);
    //Título
		$this->Cell(0,10,$Encabezado,0,0,'R');
    //Salto de línea
		$this->Ln();

	}

   //Tabla simple
	function Tabla1($Titulo, $FechaRegistro, $NombreEmpresa, $Domicilio, $NombreContacto, $TelefonoContacto, $Prioridad, $Detalles,
	$Detalles, $NombreUsuario, $FechaEntrega, $HoraEntrega)
	{
		$this->SetFont('','', 10);
		$this->Cell(130,6,"ASUNTO: $Titulo",0);
		$this->Cell(0,6,"FECHA REGISTRO: $FechaRegistro",0,0,'R');
		$this->Ln(12
			);
		
		//DATOS DE LA EMPRESA
		$this->Cell(0, 10,'DESTINO', 0, 0,'C');
		$this->Ln(15);
		$this->Cell(25, 6,'EMPRESA:', 0, 0);
		$this->MultiCell(0, 6, "$NombreEmpresa", 0);
		$this->Ln();
		$this->Cell(25, 6,'DIRECCION:', 0, 0);
		$this->MultiCell(0, 6, "$Domicilio", 0);
		$this->Ln();
		$this->Cell(25, 6,'CONTACTO:', 0, 0);
		$this->MultiCell(0, 6, "$NombreContacto", 0);
		$this->Ln();
		$this->Cell(25, 6,'TELEFONO:', 0, 0);
		$this->Cell(75,6,"$TelefonoContacto",0,0);
		$this->Cell(0,6,"PRIORIDAD: $Prioridad",0,0,'R');
		$this->Ln(12);
		$this->Cell(35, 6,'INSTRUCCIONES:', 0, 0);
		$this->MultiCell(0, 6, "$Detalles", 0);
		$this->Ln(12);

		//INFORMACION GENERAL
		$this->Cell(0, 10,'INFORMACION DE ENTREGA', 0, 0,'C');
		$this->Ln(15);
		$this->Cell(140,6,"SOLICITA: $NombreUsuario", 0);
		$this->Cell(30,6,"[   ] Entregado", 0);
		$this->Ln();
		$this->Cell(140,6,"FECHA DE ENTREGA: $FechaEntrega", 0);
		$this->Cell(30,6,"[   ] No entregado", 0);
		$this->Ln();
		$this->Cell(140,6,"HORA DE ENTREGA: $HoraEntrega", 0);
		$this->Cell(30,6,"[   ] Cancelado", 0);
		$this->Ln(15);
		$this->Cell(0, 6,"NOTAS:", 0);
		$this->Ln(10);
		$this->Cell(0, 0, "", 1);
		$this->Ln(6);
		$this->Cell(0, 0, "", 1);
		$this->Ln(6);
		$this->Cell(0, 0, "", 1);
		$this->Ln(6);
		$this->Cell(0, 0, "", 1);
		$this->Ln(15);
		$this->Cell(95,7,'_____________________________',0,0,'C');
		$this->Cell(95,7,'_____________________________',0,0,'C');
		$this->Ln();
		$this->Cell(95,7,"FIRMA DEL AGENTE",0,0,'C');
		$this->Cell(95,7,"DESTINATARIO",0,0,'C');
	}

   /*/Tabla coloreada
	function TablaColores($header)
	{
//Colores, ancho de línea y fuente en negrita
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		
		$this->SetFont('','');
//Cabecera

		for($i=0;$i<count($header);$i++)
			$this->Cell(40,7,$header[$i],1,0,'C',1);
		$this->Ln();
//Restauración de colores y fuentes
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
//Datos
		$fill=false;
		$this->Cell(40,6,"hola",'LR',0,'L',$fill);
		$this->Cell(40,6,"hola2",'LR',0,'L',$fill);
		$this->Cell(40,6,"hola3",'LR',0,'R',$fill);
		$this->Cell(40,6,"hola4",'LR',0,'R',$fill);
		$this->Ln();
		$fill=!$fill;
		$this->Cell(40,6,"col",'LR',0,'L',$fill);
		$this->Cell(40,6,"col2",'LR',0,'L',$fill);
		$this->Cell(40,6,"col3",'LR',0,'R',$fill);
		$this->Cell(40,6,"col4",'LR',0,'R',$fill);
		$fill=true;
		$this->Ln();
		$this->Cell(160,0,'','T');
	}*/



}

$pdf=new PDF();

$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(35);
//$pdf->AddPage();

$pdf->Tabla1($Titulo, $FechaRegistro, $NombreEmpresa, $Domicilio, $NombreContacto, $TelefonoContacto, $Prioridad, $Detalles,
	$Detalles, $NombreUsuario, $FechaEntrega, $HoraEntrega);

/*/Segunda página
$pdf->AddPage();
$pdf->SetY(65);
$pdf->TablaColores($header);*/
$pdf->Output();
?>