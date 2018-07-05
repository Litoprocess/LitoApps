<?php
require('fpdf.php');
include_once '../DAO/RequisicionDAO.php';

$dto = new stdClass();	
$dto->id = $_GET['id'];

$dao = new RequisicionDAO();
$datos = $dao->pdf($dto);

	foreach ($datos as $row) {
			$id = $row['Id'];
			$fechaelaboracion = date("m-d-Y", strtotime($row['FechaRegistro']));
			$departamento = $row['DepartamentoSolicitante'];
			$nombresolicitante = $row['NombreSolicitante'];
			$puestolicitante = $row['PuestoSolicitante'];
			$gerencia = $row['GerenciaSolicitante'];
			$puestosolicitado = $row['PuestoSolicitado'];
			$jefeinmediato = $row['JefeInmediato'];
			$puestojefeinmediato = $row['PuestoJefeInmediato'];
			$origenvacante = $row['OrigenVacante'];
			$tipocontrato = $row['TipoContrato'];
			$contratomeses = $row['ContratoMeses'];
			$objetivopuesto = $row['ObjetivoPuesto'];			
			$rangode = number_format($row['RangoSueldoDe']);
			$rangohasta = number_format($row['RangoSueldoHasta']);
			$escolaridad = $row['Escolaridad'];
			$conocimientostecnicos = $row['ConocimientosTeoricos'];
			$capacidadintelectual = $row['CapacidadIntelectual'];
			$idioma1 = $row['Idioma1'];
			$porcentaje1 = $row['PorcentajeIdioma1'];
			$iniciativayempuje = $row['IniciativayEmpuje'];
			$idioma2 = $row['Idioma2'];
			$porcentaje2 = $row['PorcentajeIdioma2'];	
			$manejodepersonal = $row['ManejodePersonal'];
			$experiencia = $row['Experiencia']	;
			$tomadedesiciones = $row['TomadeDesiciones'];
			$relinterpersonales = $row['RelacionesInterpersonales'];
			$estabilidademocional = $row['EstabilidadEmocional'];
			$disponibilidadviajar = $row['DisponibilidadViajar'];
			$tiempoviajar = $row['PorcentajeTiempoViajar'];
			$toleranciapresion = $row['ToleranciaPresion'];
			$organizacion = $row['Organizacion'];
			$cambioresidencia = $row['DisponibilidadCambioResidencia'];
			$apegoanoramas = $row['ApegoaNormas'];
			$otra = $row['Otra'];
			$fechadeseadacontratacion = $row['FechaDeseadaContratacion'];
			$nombrecandidato = $row['NombreCandidatoInterno'];	
			$comentariosadicionales = $row['ComentariosAdicionales'];
	}

class PDF extends FPDF
{
	// Cabecera de pÃ¡gina
	function Header()
	{
	    // Logo
	    $this->Image('../img/logo_b.png',10,8,45);
	    // Arial bold 15
	    $this->SetFont('Arial','',12);
	    // Movernos a la derecha
	    $this->Cell(130);
	    // TÃ­tulo
	    $this->Cell(62,10,('REQUISICIÓN DE PERSONAL'),0,0,'C');
	    // Salto de lÃ­nea
	    $this->Ln(20);
	}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->SetTopMargin(5);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times','',12);
//$pdf->SetLeftMargin(15);
$pdf->Cell(3.7);
$pdf->Cell(40,4,('Fecha de elaboración: '),0,0,'R');
$pdf->Cell(62,4,$fechaelaboracion,0,0,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(55,29,95,29);

//$pdf->SetLeftMargin(60);
$pdf->Cell(40,4,('Fecha de recepción: '),0,0,'R');
$pdf->Cell(44,4,$fechaelaboracion,0,1,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(155,29,195,29);
$pdf->Ln(3);

//Contorno del formulario
$pdf->SetLineWidth(0.2);
$pdf->Rect(15,31,180,250);

$pdf->SetFont('Times','B',12);
$pdf->Cell(5);
$pdf->Cell(180,4,('INFORMACIÓN GENERAL'),0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Times','',12);
$pdf->Cell(8);
$pdf->Cell(47,4,'Departamento Solicitante: ',0,0,'R');
$pdf->Cell(130,4,substr($departamento,0,40),0,1,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(65,45,190,45);
$pdf->Ln(3);

$pdf->Cell(8);
$pdf->Cell(44,4,'Nombre del Solicitante: ',0,0,'L');
$pdf->Cell(133,4,substr($nombresolicitante,0,41),0,1,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(62,52,190,52);
$pdf->Ln(3);

$pdf->Cell(8);
$pdf->Cell(41,4,'Puesto del Solicitante: ',0,0,'L');
$pdf->Cell(136,4,substr($puestolicitante,0,42),0,1,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(59,59,190,59);
$pdf->Ln(3);

$pdf->Cell(8);
$pdf->Cell(20,4,'Gerencia: ',0,0,'L');
$pdf->Cell(157,4,substr($gerencia,0,49),0,1,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(38,66,190,66);
$pdf->Ln(5);

$pdf->SetFont('Times','B',12);
$pdf->Cell(5);
$pdf->Cell(180,4,('INFORMACIÓN DEL PUESTO A CUBRIR'),0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Times','',12);
$pdf->Cell(8);
$pdf->Cell(33,4,'Puesto Solicitado: ',0,0,'L');
$pdf->Cell(145,4,substr($puestosolicitado,0,45),0,1,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(52,84,190,84);
$pdf->Ln(3);

$pdf->Cell(8);
$pdf->Cell(49,4,'Nombre del Jefe Inmediato: ',0,0,'L');
$pdf->Cell(130,4,substr($jefeinmediato . " " . $puestojefeinmediato,0,39),0,1,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(68,91,190,91);
$pdf->Ln(3);

$pdf->Cell(8);
$pdf->Cell(41,4,'Origen de la Vacante: ',0,0,'L');
$pdf->Cell(8);
$pdf->Cell(20,4,('Reposición'),0,0,'C');
$pdf->Cell(10,4,($origenvacante == 'Reposicion') ? "x" : "",1,0,'C');
$pdf->Cell(8);
$pdf->Cell(27,4,'Puesto Nuevo',0,0,'C');
$pdf->Cell(10,4,($origenvacante == 'Puesto Nuevo') ? "x" : "",1,0,'C');
$pdf->Cell(8);
$pdf->Cell(20,4,'Temporal',0,0,'C');
$pdf->Cell(10,4,($origenvacante == 'Temporal') ? "x" : "",1,1,'C');
$pdf->Ln(3);

$pdf->Cell(8);
$pdf->Cell(41,4,'Tipo de Contrato',0,0,'L');
$pdf->Cell(8);
$pdf->Cell(15,4,'Planta',0,0,'C');
$pdf->Cell(10,4,($tipocontrato == 'Planta') ? "x" : "",1,0,'C');
$pdf->Cell(8);
$pdf->Cell(20,4,'Temporal',0,0,'C');
$pdf->Cell(10,4,($tipocontrato == 'Temporal') ? "x" : "",1,0,'C');
$pdf->Cell(8);
$pdf->Cell(8,4,'Por',0,0,'C');
$pdf->SetLineWidth(0.1);
$pdf->Line(148,105,158,105);
$pdf->Cell(14,4,($contratomeses !== "" ? $contratomeses : ""),0,0,'C');
$pdf->Cell(12,4,'Meses',0,1,'C');
$pdf->Ln(3);

$pdf->Cell(8);
$pdf->Cell(43,4,'Objetivo del Solicitado: ',0,0,'L');
$pdf->Cell(129,4,substr($objetivopuesto,0,42),0,1,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(60,112,190,112);
$pdf->Cell(8);
$pdf->Cell(172,4,substr($objetivopuesto,43,56),0,1,'L');
$pdf->Line(20,116,190,116);
$pdf->Cell(8);
$pdf->Cell(172,4,substr($objetivopuesto,57,56),0,1,'L');
$pdf->Line(20,120,190,120);
$pdf->Ln(5);

$pdf->SetFont('Times','B',12);
$pdf->Cell(5);
$pdf->Cell(180,4,'USO EXCLUSIVO DE CAPITAL HUMANO',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Times','',12);
$pdf->Cell(8);
$pdf->Cell(40,4,'Rango de Sueldo: ',0,0,'L');
$pdf->Cell(105,4,'Capital Humano ',0,1,'R');
$pdf->SetLineWidth(0.1);
$pdf->Line(163,138,190,138);
$pdf->Cell(8);
$pdf->Cell(34,4,'Contratacion De: $ ',0,0,'L');
$pdf->Cell(28,4,$rangode,0,0,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(53,142,80,142);
$pdf->Cell(23,4,'Hasta: $ ',0,0,'R');
$pdf->Cell(30,4,$rangohasta,0,0,'L');
$pdf->Cell(56.5,4,'Firma y Fecha',0,1,'R');
$pdf->SetLineWidth(0.1);
$pdf->Line(103,142,130,142);
$pdf->Ln(5);

$pdf->SetFont('Times','B',12);
$pdf->Cell(5);
$pdf->Cell(180,4,('CARACTERÍSTICAS DEL CANDIDATO'),0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times','',12);
$pdf->Cell(8);
$pdf->Cell(89,4,'',0,0,'C');
$pdf->Cell(44,4,'',0,0,'C');
$pdf->Cell(40,4,'Grado Requerido',1,1,'C');
$pdf->Cell(8);
$pdf->Cell(89,4,'',0,0,'C');
$pdf->Cell(44,4,'Competencias',1,0,'C');
$pdf->Cell(13,4,'Bajo',1,0,'C');
$pdf->Cell(14,4,'Prom',1,0,'C');
$pdf->Cell(13,4,'Alto',1,1,'C');
$pdf->Ln(2);

$pdf->Cell(8);
$pdf->Cell(23,4,'Escolaridad',0,0,'L');
$pdf->Cell(66,4,substr($escolaridad,0,19),0,0,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(42,167,100,167);
$pdf->Cell(44,4,'Capacidad Intelectual',1,0,'C');
$pdf->Cell(13,4,($capacidadintelectual == 'Bajo') ? "x" : "",1,0,'C');
$pdf->Cell(14,4,($capacidadintelectual == 'Promedio') ? "x" : "",1,0,'C');
$pdf->Cell(13,4,($capacidadintelectual == 'Alto') ? "x" : "",1,1,'C');
$pdf->Ln(2);

$pdf->Cell(8);
$pdf->Cell(31,4,('Conoc. Técnicos'),0,0,'L');
$pdf->Cell(58,4,substr($conocimientostecnicos,0,16),0,0,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(49,173,100,173);
$pdf->Cell(44,4,'Iniciativa y Empuje',1,0,'C');
$pdf->Cell(13,4,($iniciativayempuje == 'Bajo') ? "x" : "",1,0,'C');
$pdf->Cell(14,4,($iniciativayempuje == 'Promedio') ? "x" : "",1,0,'C');
$pdf->Cell(13,4,($iniciativayempuje == 'Alto') ? "x" : "",1,1,'C');
$pdf->Ln(2);

$pdf->Cell(8);
$pdf->Cell(17,4,'Idiomas',0,0,'L');
$pdf->Cell(36,4,$idioma1,0,0,'L');
$pdf->Cell(36,4,$porcentaje1 . "%",0,0,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(34,179,64,179);
$pdf->Line(70,179,100,179);
$pdf->Cell(44,4,'Manejo de Personal',1,0,'C');
$pdf->Cell(13,4,($manejodepersonal == 'Bajo') ? "x" : "",1,0,'C');
$pdf->Cell(14,4,($manejodepersonal == 'Promedio') ? "x" : "",1,0,'C');
$pdf->Cell(13,4,($manejodepersonal == 'Alto') ? "x" : "",1,1,'C');
$pdf->Ln(2);

$pdf->Cell(8);
$pdf->Cell(17,4,(''),0,0,'L');
$pdf->Cell(36,4,$idioma2,0,0,'L');
$pdf->Cell(36,4,$porcentaje2 . "%",0,0,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(34,185,64,185);
$pdf->Line(70,185,100,185);
$pdf->Cell(44,4,'Toma de Desiciones',1,0,'C');
$pdf->Cell(13,4,($tomadedesiciones == 'Bajo') ? "x" : "",1,0,'C');
$pdf->Cell(14,4,($tomadedesiciones == 'Promedio') ? "x" : "",1,0,'C');
$pdf->Cell(13,4,($tomadedesiciones == 'Alto') ? "x" : "",1,1,'C');
$pdf->Ln(2);

$pdf->Cell(8);
$pdf->Cell(23,4,('Experiencia'),0,0,'L');
$pdf->Cell(66,4,$experiencia,0,0,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(41,191,100,191);
$pdf->Cell(44,4,'Rel. Interpersonales',1,0,'C');
$pdf->Cell(13,4,($relinterpersonales == 'Bajo') ? "x" : "",1,0,'C');
$pdf->Cell(14,4,($relinterpersonales == 'Promedio') ? "x" : "",1,0,'C');
$pdf->Cell(13,4,($relinterpersonales == 'Alto') ? "x" : "",1,1,'C');
$pdf->Ln(2);

$pdf->Cell(8);
$pdf->Cell(89,4,'Disponibilidad para Viajar:',0,0,'L');
$pdf->Cell(44,4,'Estabilidad Emocional',1,0,'C');
$pdf->Cell(13,4,($estabilidademocional == 'Bajo') ? "x" : "",1,0,'C');
$pdf->Cell(14,4,($estabilidademocional == 'Promedio') ? "x" : "",1,0,'C');
$pdf->Cell(13,4,($estabilidademocional == 'Alto') ? "x" : "",1,1,'C');
$pdf->Ln(2);

$pdf->Cell(8);
$pdf->Cell(7,4,'Si',0,0,'L');
$pdf->Cell(10,4,($disponibilidadviajar == 'Si') ? "x" : "",1,0,'C');
$pdf->Cell(26,4,'% de tiempo',0,0,'R');
$pdf->SetLineWidth(0.1);
$pdf->Line(61,202.5,80,202.5);
$pdf->Cell(22,4,$tiempoviajar,0,0,'L');
$pdf->Cell(7,4,'No',0,0,'L');
$pdf->Cell(10,4,($disponibilidadviajar == 'No') ? "x" : "",1,0,'C');
$pdf->Cell(7,4,'',0,0,'C');
$pdf->Cell(44,4,('Tolerancia a la Presión'),1,0,'C');
$pdf->Cell(13,4,($toleranciapresion == 'Bajo') ? "x" : "",1,0,'C');
$pdf->Cell(14,4,($toleranciapresion == 'Promedio') ? "x" : "",1,0,'C');
$pdf->Cell(13,4,($toleranciapresion == 'Alto') ? "x" : "",1,1,'C');
$pdf->Ln(2);

$pdf->Cell(8);
$pdf->Cell(89,4,'Disponibilidad para Cambiar de Residencia:',0,0,'L');
$pdf->Cell(44,4,('Organización'),1,0,'C');
$pdf->Cell(13,4,($organizacion == 'Bajo') ? "x" : "",1,0,'C');
$pdf->Cell(14,4,($organizacion == 'Promedio') ? "x" : "",1,0,'C');
$pdf->Cell(13,4,($organizacion == 'Alto') ? "x" : "",1,1,'C');
$pdf->Ln(2);

$pdf->Cell(8);
$pdf->Cell(22,4,'',0,0,'R');
$pdf->Cell(7,4,'Si',0,0,'L');
$pdf->Cell(10,4,($cambioresidencia == 'Si') ? "x" : "",1,0,'C');
$pdf->Cell(10,4,'',0,0,'C');
$pdf->Cell(7,4,'No',0,0,'L');
$pdf->Cell(10,4,($cambioresidencia == 'No') ? "x" : "",1,0,'C');
$pdf->Cell(23,4,'',0,0,'C');
$pdf->Cell(44,4,'Apego a Normas',1,0,'C');
$pdf->Cell(13,4,($apegoanoramas == 'Bajo') ? "x" : "",1,0,'C');
$pdf->Cell(14,4,($apegoanoramas == 'Promedio') ? "x" : "",1,0,'C');
$pdf->Cell(13,4,($apegoanoramas == 'Alto') ? "x" : "",1,1,'C');
$pdf->Ln(2);

$pdf->Cell(8);
$pdf->Cell(89,4,'',0,0,'R');
$pdf->Cell(12,4,'Otra:',0,0,'L');
$pdf->Cell(76,4,$otra,0,1,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(118,221,190,221);
$pdf->Ln(5);

$pdf->SetFont('Times','B',12);
$pdf->Cell(5);
$pdf->Cell(180,4,('COMENTARIOS ADICIONALES'),0,1,'C');
$pdf->Ln(4);

$pdf->SetFont('Times','',12);
$pdf->Cell(8);
$pdf->Cell(55,4,('Fecha de Contratación deseada: '),0,0,'L');
$pdf->Cell(122,4,$fechadeseadacontratacion,0,0,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(74,238,190,238);
$pdf->Ln();

$pdf->Cell(8);
$pdf->Cell(85,4,'Nombre del Candidato(s) interno(s) a considerar: ',0,0,'L');
$pdf->Cell(37,4,substr($nombrecandidato,0,28),0,1,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(104,242,190,242);

$pdf->Cell(8);
$pdf->Cell(46,4,'Comentarios Adicionales: ',0,0,'L');
$pdf->Cell(131,4,substr($comentariosadicionales,0,42),0,1,'L');
$pdf->SetLineWidth(0.1);
$pdf->Line(64,246,190,246);
$pdf->Ln(4);

//AUTORIZACIONES
$pdf->SetFont('Times','B',12);
$pdf->Cell(5);
$pdf->Cell(180,4,'AUTORIZACIONES',0,1,'C');
$pdf->Ln(4);

$pdf->Cell(8);
$pdf->Cell(173,4,'',0,1,'C');
$pdf->Cell(173,4,'',0,1,'C');
$pdf->SetLineWidth(0.1);
$pdf->Line(18,262,57,262);
$pdf->Line(60,262,99,262);
$pdf->Line(101,262,140,262);
$pdf->Line(142,262,186,262);

$pdf->SetFont('Times','',12);
$pdf->Cell(8);
$pdf->Cell(39,4,'Solicitante',0,0,'C');
$pdf->Cell(2.5,4,'',0,0,'L');
$pdf->Cell(39,4,('Dirección General'),0,0,'C');
$pdf->Cell(2.5,4,'',0,0,'L');
$pdf->Cell(39,4,('Gerencia del Área'),0,0,'C');
$pdf->Cell(2.5,4,'',0,0,'L');
$pdf->Cell(43,4,('Integración y Desarrollo'),0,1,'C');
$pdf->Cell(2.5,4,'',0,0,'L');



/*for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Imprimiendo lí­nea número '.$i,0,1);*/

$pdf->Output();
?>