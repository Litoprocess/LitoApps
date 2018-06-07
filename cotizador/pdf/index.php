<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once('fpdf/fpdf.php');
require_once('fpdi/src/autoload.php');


		// initiate FPDI
		$pdf = new Fpdi();
		// add a page
		$pdf->AddPage();
		// set the source file
		$pdf->setSourceFile('Cotizacion_AR.pdf');
		// import page 1
		$tplIdx = $pdf->importPage(1);
		// use the imported page and place it at position 10,10 with a width of 100 mm
		$pdf->useTemplate($tplIdx, 10, 10, 200);

		// now write some text above the imported page

		$pdf->SetFont('Arial','B','20');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(145, 36);
		$pdf->Write(0, 'prueba');

		$pdf->Output();		

 ?>