<?php
require('../PDF/fpdf.php');

$Titulo = utf8_decode($_REQUEST["Titulo"]);
$Fecha = $_REQUEST["Fecha"];
$Tarea = utf8_decode($_REQUEST["Tarea"]);
$Nusuario = $_REQUEST["Nusuario"];
$Compromiso = $_REQUEST["Compromiso"];
$Agente = utf8_decode($_REQUEST["Agente"]);

class PDF extends FPDF
{
//Cabecera de página
	function Header()
	{
    //Logo
		$this->Image("../images/logo_b.png" , 10 , 10, 0, 10, "PNG");
    //Arial bold 15
		$this->SetFont('Helvetica','B', 24);
    //Movernos a la derecha
		$this->Cell(90);
    //Título
		$this->Cell(60,10,'Mensajeria',0,0,'C');
    //Salto de línea
		$this->Ln();

	}

   //Tabla simple
	function Tabla1($Titulo, $Fecha, $Tarea, $Nusuario, $Compromiso, $Agente)
	{
		$this->SetFont('','', 10);
		$this->Cell(130,7,"ASUNTO: $Titulo",0);
		$this->Cell(65,7,"FECHA REGISTRO: $Fecha",0,0,'R');
		$this->Ln();
		$this->Cell(130,7,"",0);
		$this->Cell(65,7,"FECHA ASIGNACION: $Fecha",0,0,'R');
		$this->Ln(15);
		$this->MultiCell(0, 5, "DETALLE: $Tarea", 0);
		$this->Ln();
		$this->Cell(140,7,"SOLICITA: $Nusuario", 0);
		$this->Cell(30,7,"[   ] Entregado", 0);
		$this->Ln();
		$this->Cell(140,7,"FECHA COMPROMISO: $Compromiso", 0);
		$this->Cell(30,7,"[   ] No entregado", 0);
		$this->Ln();
		$this->Cell(140,7,"", 0);
		$this->Cell(30,7,"[   ] Cancelado", 0);
		$this->Ln();
		$this->Cell(0, 5,"Notas:", 0);
		$this->Ln();
		$this->Cell(0, 5, "________________________________________________________________________________________________", 0);
		$this->Ln();
		$this->Cell(0, 5, "________________________________________________________________________________________________", 0);
		$this->Ln();
		$this->Cell(0, 5, "________________________________________________________________________________________________", 0);
		$this->Ln();
		$this->Cell(0, 5, "________________________________________________________________________________________________", 0);
		$this->Ln(15);
		$this->Cell(95,7,'_____________________________',0,0,'C');
		$this->Cell(95,7,'_____________________________',0,0,'C');
		$this->Ln();
		$this->Cell(95,7,"Agente: $Agente",0,0,'C');
		$this->Cell(95,7,"Recibe: _____________________",0,0,'C');
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
$pdf->Tabla1($Titulo, $Fecha, $Tarea,$Nusuario, $Compromiso, $Agente);
/*/Segunda página
$pdf->AddPage();
$pdf->SetY(65);
$pdf->TablaColores($header);*/
$pdf->Output();
?>