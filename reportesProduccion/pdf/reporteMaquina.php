<?php 
//require('fpdf/fpdf.php');
require('fpdf_javascript/pdf_js.php');
require('../php/conexionMetrics.php');


$response = new stdClass();
$data =array();

$maquina=$_GET['maquina'];
$fechainicio = date("d-m-Y",strtotime($_GET['fechainicio']));
$fechafin = date("d-m-Y",strtotime($_GET['fechafin']));

$sql1="execute dbo.ReporteProceso '$fechainicio','$fechafin','$maquina'";
$stmt1 = sqlsrv_query($conn,$sql1);
while($row1 = sqlsrv_fetch_array($stmt1,SQLSRV_FETCH_ASSOC))
{
   $data1[]=array(
    "Maquina" => $row1['Maquina']
    );
}

class PDF_AutoPrint extends PDF_JavaScript
{
  function AutoPrint($printer='')
  {
    // Open the print dialog
    if($printer)
    {
      $printer = str_replace('\\', '\\\\', $printer);
      $script = "var pp = getPrintParams();";
      $script .= "pp.interactive = pp.constants.interactionLevel.full;";
      $script .= "pp.printerName = '$printer'";
      $script .= "print(pp);";
    }
    else
      $script = 'print(true);';
    $this->IncludeJS($script);
  }
}

$pdf = new PDF_AutoPrint();
$pdf->AddPage();
//int PageNo();
$pdf->SetAutoPageBreak(1,10);

$y_axis_initial = 25;
$pdf->Image('../img/logo_b.png',10,10,45);
$pdf->SetFont('Arial','B',12); 
$pdf->Cell(190,6,'REPORTE DE PROCESOS X MAQUINA',0,0,'C');
$pdf->Ln(15);
$pdf->SetFont('Arial','B',8);
//$pdf->Cell(20,4,'',1,0,'C');
$pdf->Cell(22,4,'',0,0,'L');
$pdf->Cell(10,4,'',0,0,'C');
$pdf->Cell(15,4,'MAQUINA: ',0,0,'L');

   $pdf->Cell(40,4,$data1[0]['Maquina'],0,0,'C');
   $pdf->Cell(24,4,'',0,0,'C');
   $pdf->Cell(24,4,'FECHA DEL DIA:',0,0,'C');
   $pdf->Cell(19,4,$fechainicio,0,0,'C');
   $pdf->Cell(17,4,'AL DIA:',0,0,'C');
   $pdf->Cell(19,4,$fechafin,0,0,'C');

   $pdf->Ln(5);

   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(9,8,'Orden',0,0,'C');
   $pdf->Cell(36,8,'Nombre Trabajo',0,0,'C');
   //$pdf->Cell(10,8,'ID.ACT',0,0,'C');
   $pdf->Cell(32,8,'Descripcion',0,0,'C');
   $pdf->Cell(17,8,'Proceso',0,0,'C');
   $pdf->Cell(13,8,'Cantidad',0,0,'C');
   $pdf->Cell(12,8,'Tiempo',0,0,'C');
   $pdf->Cell(19,8,'Hr.Inicio',0,0,'C');
   $pdf->Cell(19,8,'Hr.Fin',0,0,'C');
   $pdf->Cell(12,8,'F.Turno',0,0,'C');
   $pdf->Cell(20,8,'Notas',0,0,'L');
   //$pdf->Cell(20,6,'OPERADOR',0,0,'C');
   $pdf->Ln(3);

$sql="execute dbo.ReporteProceso '$fechainicio','$fechafin','$maquina'";
$stmt = sqlsrv_query($conn,$sql);
$i=0;
   while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
   {
    $i++;
       $data[]=array(
        "NumOrden"=>$row['NumOrden'],
        "NombreTrabajo"=>utf8_encode($row['NombreTrabajo']),
        "IdAct"=>$row['IdAct'],
        "Descripcion"=>utf8_encode($row['Descripcion']),
        "Proceso"=>utf8_encode($row['Proceso']),
        "Cantidad"=>$row['Cantidad'],
        "Tiempo"=>number_format($row['Tiempo'],2),
        "HoraInicio" => $row['HoraInicio']->format('d-m-Y'),
        "HoraFin" => $row['HoraFin']->format('d-m-Y'),
        "Operador" => $row['Operador'],
        "AjusteLito" => $row['AjusteLito'],
        "Tiros" => $row['Tiros'],
        "TiempoReportado" => $row['TiempoReportado'],
        "TiempoPrevisto" => $row['TiempoPrevisto'],
        "TiempoReportado" => $row['TiempoReportado'],
        "VelocidadStd" => $row['VelocidadStd'],
        "TiempoAjuste" => $row['TiempoAjuste'],
        "AjusteStd" => $row['AjusteStd'],
        "AjusteVWStd" => $row['AjusteVWStd'],
        "TiempoMuertoPropio" => $row['TiempoMuertoPropio'],
        "TiempoTiro" => $row['TiempoTiro'],
        "TiempoSinRegistro" => $row['TiempoSinRegistro'],
        "TiempoMuertoAjeno" => $row['TiempoMuertoAjeno'],
        "TiempoSinTurno" => $row['TiempoSinTurno'],
        "AjusteVW" => $row['AjusteVW']

        );

$pdf->SetFont('Arial','',6);
$pdf->Cell(9,8,$row['NumOrden'],0,0,'C');
$pdf->Cell(36,8,substr($row['NombreTrabajo'],0,25),0,0,'L');
//$pdf->Cell(10,8,$row['IdAct'],0,0,'C');
$pdf->Cell(32,8,substr($row['Descripcion'],0,25),0,0,'L');
$pdf->Cell(17,8,substr($row['Proceso'],0,14),0,0,'L');
$pdf->Cell(13,8,$row['Cantidad'],0,0,'C');
$pdf->Cell(12,8,$row['Tiempo'],0,0,'C');
$pdf->Cell(19,8,$row['HoraInicio']->format('d-m-Y H:i'),0,0,'C');
$pdf->Cell(19,8,$row['HoraFin']->format('d-m-Y H:i'),0,0,'C');
$pdf->Cell(12,8,$row['FechaProduccion']->format('d-m-Y'),0,0,'C');
$pdf->Cell(20,8,substr($row['Notas'],0,13),0,0,'L',false);
//$pdf->Cell(20,6,$row['Maquina'],0,0,'C');
$pdf->Ln(3);

}
$pdf->Ln(3);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(26,4,"TOTAL DE REGISTROS:",0,0,'L');
$pdf->Cell(15,4,$i,0,0,'L');
$pdf->Ln(5);

$TiempoDeseado = ($data[0]['AjusteStd'] * $data[0]['AjusteLito']) + ($data[0]['AjusteVWStd'] * $data[0]['AjusteVW']) + ($data[0]['Tiros'] / $data[0]['VelocidadStd']);
$TIempoAjusteTiro = ($data[0]['TiempoAjuste'] + $data[0]['TiempoTiro'] + $data[0]['TiempoMuertoPropio']);
$eficiencia = $TiempoDeseado / $TIempoAjusteTiro;
$porcentaje = $eficiencia * 100;
$pdf->SetFont('Arial','B',12);
$pdf->Cell(113,4,"EFICIENCIA: ",0,0,'R');
$pdf->Cell(20,4,number_format($porcentaje,2) . " %",0,0,'R'); 

if($eficiencia >= 0.80)
{
    $pdf->Cell(11,11, $pdf->Image('../icon/pulgar-arriba.png', $pdf->GetX()+5, $pdf->GetY()-5,11),0);
}
else if($eficiencia < 0.80)
{
    $pdf->Cell(11,11, $pdf->Image('../icon/pulgar-abajo.png', $pdf->GetX()+5, $pdf->GetY()-5,11),0);
}
else
{
    $pdf->Cell(11,11, $pdf->Image('../icon/pulgar-abajo.png', $pdf->GetX()+5, $pdf->GetY()-5,11),0);
}

$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(23,5,"SE HICIERON:",0,0,'L');
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
//$pdf->Cell(16,4,"SE HICIERON:",0,0,'L');
$pdf->Cell(15,4,number_format($data[0]['AjusteLito'],2),0,0,'R');
$pdf->SetFont('Arial','',8);
$pdf->Cell(31,4,"AJUSTES NORMALES",0,0,'L');
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,4,number_format($data[0]['AjusteVW'],2),0,0,'R');
$pdf->SetFont('Arial','',8);
$pdf->Cell(38,4,"AJUSTES DE LITERATURA",0,0,'L');
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,4,number_format($data[0]['Tiros']),0,0,'R');
$pdf->SetFont('Arial','',8);
$pdf->Cell(23,4,"TIROS",0,0,'L');

$pdf->Ln();
$pdf->SetFont('Arial','',8);
$pdf->Cell(15,4,"EN: ",0,0,'R');
$pdf->SetFont('Arial','B',8);
$tiempoajustetiro = $data[0]['TiempoAjuste'] + $data[0]['TiempoTiro'] + $data[0]['TiempoMuertoPropio'];
$pdf->Cell(8,4,number_format($tiempoajustetiro,2),0,0,'C');  
$pdf->SetFont('Arial','',8);
$pdf->Cell(7,4,'HRS.',0,0,'C');
$pdf->Ln();
$pdf->Cell(41,4,'SE DEBIO HABER HECHO EN:',0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,4,number_format($TiempoDeseado,2),0,0,'C');  
$pdf->SetFont('Arial','',8);
$pdf->Cell(8,4,'HRS.',0,0,'C');

$pdf->Ln(6);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(93,5,"Indicadores: ");
$pdf->Ln(6);
$pdf->SetFont('Arial','',6);
$pdf->SetLeftMargin(17);
$pdf->Cell(38,4,'TOTAL DE TIEMPO REPORTADO:',0,0,'L');
$pdf->Cell(10,4,number_format($data[0]['TiempoReportado'],2),0,0,'R');
$pdf->Cell(5,4,'',0,0,'L');
$pdf->Cell(40,4,'TOTAL DE TIEMPO MUERTO PROPIO:',0,0,'L');
$pdf->Cell(13,4,number_format($data[0]['TiempoMuertoPropio'],2),0,0,'R');
$pdf->Cell(50,4,'ESTANDAR DE AJUSTE NORMAL:',0,0,'R');
$pdf->Cell(15,4,number_format($data[0]['AjusteStd'],2),0,0,'R');
$pdf->Ln();
$pdf->Cell(38,4,'TOTAL DE TIEMPO DE AJUSTE:',0,0,'L');
$pdf->Cell(10,4,number_format($data[0]['TiempoAjuste'],2),0,0,'R');
$pdf->Cell(5,4,'',0,0,'L');
$pdf->Cell(38,4,'TOTAL DE TIEMPO MUERTO AJENO:',0,0,'L');
$pdf->Cell(15,4,number_format($data[0]['TiempoMuertoAjeno'],2),0,0,'R');
$pdf->Cell(50,4,'ESTANDAR DE AJUSTE LITERATURA:',0,0,'R');
$pdf->Cell(15,4,number_format($data[0]['AjusteVWStd'],2),0,0,'R');
$pdf->Ln();
$pdf->Cell(38,4,'TOTAL DE TIEMPO DE TIRO:',0,0,'L');
$pdf->Cell(10,4,number_format($data[0]['TiempoTiro'],2),0,0,'R');
$pdf->Cell(5,4,'',0,0,'L');
$pdf->Cell(38,4,'TOTAL DE TIEMPO SIN TURNO:',0,0,'L');
$pdf->Cell(15,4,number_format($data[0]['TiempoSinTurno'],2),0,0,'R');
$pdf->Cell(50,4,'ESTANDAR DE VELOCIDAD DE TIRO:',0,0,'R');
$pdf->Cell(15,4,number_format($data[0]['VelocidadStd']),0,0,'R');
$pdf->Ln(); 
$pdf->Cell(38,4,':',0,0,'R');
$pdf->Cell(15,4,'',0,0,'R');        
$pdf->Cell(38,4,'TOTAL DE TIEMPO SIN REGISTRO:',0,0,'L');
$pdf->Cell(15,4,number_format($data[0]['TiempoSinRegistro'],2),0,0,'R');

$pdf->Ln(25);     

$pdf->Cell(60,4,'____________________________________________',0,0,'R');
$pdf->Cell(60,4,'',0,0,'C');
$pdf->Cell(60,4,'____________________________________________',0,0,'L');
$pdf->Ln();
$pdf->Cell(60,4,'FIRMA DEL SUPERVISOR',0,0,'C');
$pdf->Cell(60,4,'',0,0,'C');
$pdf->Cell(60,4,'FIRMA DEL OPERADOR',0,0,'C');        
$pdf->AutoPrint();
$pdf->Output();

$response->validacion="true";    
$response->data = $data;      
echo json_encode ($response);   
?>