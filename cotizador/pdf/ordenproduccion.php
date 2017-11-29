<?php
require('fpdf.php');
class PDF extends FPDF
{

    function Tabla()
    {
        include '../modelo/conexion.php';

        $Folio=$_REQUEST['FOLIO'];
        
        $clientes="SELECT * FROM v_ord_prod where FOLIO=$Folio";
        $consulta=mysql_query($clientes);
        $num= mysql_num_rows($consulta);
        	
            if ( $num >0)
            {
                $folio=mysql_result($consulta,0,"FOLIO");
                $FECHA_HORA=mysql_result($consulta,0,"FECHA_HORA");
                $fentrega=mysql_result($consulta,0,"FECHA_ENTREGA");
                $orProd=mysql_result($consulta,0,"ID_PRODUCTION");
                $matrx=mysql_result($consulta,0,"OR_MATRIX");
                
                $trabajo=mysql_result($consulta,0,"TRABAJO");
                $cliente=mysql_result($consulta,0,"CLIENTE");
                
                $cantidad=mysql_result($consulta,0,"CANTIDAD");
                $ancho=mysql_result($consulta,0,"ANCHO");
                $alto=mysql_result($consulta,0,"ALTO");
                $medianil_ancho=mysql_result($consulta,0,"MEDIANIL_ANCHO");
                $madianil_alto=mysql_result($consulta,0,"MEDIANIL_ALTO");
                
                $totAncho=mysql_result($consulta,0,"TOTAL_ANCHO");
                $totAlto=mysql_result($consulta,0,"TOTAL_ALTO");
                
                $MAT_ESPECIAL=mysql_result($consulta,0,"MAT_ESPECIAL");
                $nomMaterial1=mysql_result($consulta,0,"NOMBRE_MATERIAL");
                if ($MAT_ESPECIAL=="on")
                {
                    $nomMaterial="Material Especial: ".$nomMaterial1;
                }
                else
                {
                    $nomMaterial="Material: ".$nomMaterial1;
                }
                

                $titMat=mysql_result($consulta,0,"TIPO");
                if ($titMat==R)
                {
                    $titMat1="MATERIAL RIGIDO";
                }
                else if ($titMat==F)
                {
                    $titMat1="MATERIAL FLEXIBLE";
                }
                
                $medida=mysql_result($consulta,0,"M_MEDIDA");
                $Ancho=mysql_result($consulta,0,"M_ANCHO");
                $Alto=mysql_result($consulta,0,"M_ALTO");
                $Entran=mysql_result($consulta,0,"M_ENTRA");
                $Aprox=mysql_result($consulta,0,"M_APROV");
                $Orientacion=mysql_result($consulta,0,"M_ORIENTA");
                
                $cantidad2=mysql_result($consulta,0,"RES_CANT");
                $txtcantidad=mysql_result($consulta,0,"TIT_CANT_MAT");
                
                
                
                $resolucion=mysql_result($consulta,0,"RESOLUCION");
                $imp_pasadas=mysql_result($consulta,0,"IMP_PASADAS");
                
                $barnizc=mysql_result($consulta,0,"BARNIZ");
                if ($barnizc=="on")
                {
                    $barniz="Si";
                    $barniz_pasadas=mysql_result($consulta,0,"BARNIZ_PASADAS");
                    $barniz_pasadas_txt="Pasadas: ".$barniz_pasadas;
                }
                else
                {
                    $barniz="No";
                    $barniz_pasadas="";
                    $barniz_pasadas_txt="";
                }
                
                $blancoc=mysql_result($consulta,0,"BLANCO");
                if ($blancoc==on)
                {
                    $blanco="Si";
                }
                else
                {
                    $blanco="No";
                }
                
                $id_Acabado1=mysql_result($consulta,0,"ID_ACABADO1");
                $acabado1="SELECT * FROM acabados where ID_ACABADO=$id_Acabado1";
                $consultaAcabado1=mysql_query($acabado1);
                $nomAcabado1=mysql_result($consultaAcabado1,0,"DESCRIPCION");
                $id_Acabado2=mysql_result($consulta,0,"ID_ACABADO2");
                $acabado2="SELECT * FROM acabados where ID_ACABADO=$id_Acabado2";
                $consultaAcabado2=mysql_query($acabado2);
                $nomAcabado2=mysql_result($consultaAcabado2,0,"DESCRIPCION");
                $id_Acabado3=mysql_result($consulta,0,"ID_ACABADO3");
                $acabado3="SELECT * FROM acabados where ID_ACABADO=$id_Acabado3";
                $consultaAcabado3=mysql_query($acabado3);
                $nomAcabado3=mysql_result($consultaAcabado3,0,"DESCRIPCION");
                $id_Acabado4=mysql_result($consulta,0,"ID_ACABADO4");
                $acabado4="SELECT * FROM acabados where ID_ACABADO=$id_Acabado4";
                $consultaAcabado4=mysql_query($acabado4);
                $nomAcabado4=mysql_result($consultaAcabado4,0,"DESCRIPCION");
                $id_Acabado5=mysql_result($consulta,0,"ID_ACABADO5");
                $acabado5="SELECT * FROM acabados where ID_ACABADO=$id_Acabado5";
                $consultaAcabado5=mysql_query($acabado5);
                $nomAcabado5=mysql_result($consultaAcabado5,0,"DESCRIPCION");
                $id_Acabado6=mysql_result($consulta,0,"ID_ACABADO6");
                $acabado6="SELECT * FROM acabados where ID_ACABADO=$id_Acabado6";
                $consultaAcabado6=mysql_query($acabado6);
                $nomAcabado6=mysql_result($consultaAcabado6,0,"DESCRIPCION");
                
//                $id_Laminado=mysql_result($consulta,0,"ID_LAMINADO");
//                $laminado="SELECT * FROM laminado_plotter where ID_LAMINADO=$id_Laminado";
//                $consultaLaminado=mysql_query($laminado);
//                $nomLaminado=mysql_result($consultaLaminado,0,"DESCRIPCION");
                
                $a1_desc=mysql_result($consulta,0,"A1_DESC");
                $a2_desc=mysql_result($consulta,0,"A2_DESC");
                $a3_desc=mysql_result($consulta,0,"A3_DESC");
                $a4_desc=mysql_result($consulta,0,"A4_DESC");
                $a5_desc=mysql_result($consulta,0,"A5_DESC");
                $a6_desc=mysql_result($consulta,0,"A6_DESC");
                $observaciones=mysql_result($consulta,0,"OBSERVACIONES");
                
                $this->Ln();
                $this->SetFont('Arial','B',11);
                $this->Cell(190,10,"ORDEN DE PRODUCCION",0,1,'R');
                $this->Cell(100,10,"No. Cotizacion: $folio",0,0,'');
                $this->Cell(50,10,"ODT NO. ",0,0,'R');
                $this->Cell(40,10,"$orProd",1,0,'C');
                
                $this->Ln();
                $this->Cell(100,8,"Fecha de OP: $FECHA_HORA",0,0,'');
                $this->Cell(50,10,"NO. REF. ",0,0,'R');
                $this->Cell(40,10,"$matrx",1,1,'C');
                $this->Cell(190,8,"Fecha de entrega: $fentrega",0,1,'');
                
                //Encabezado
                $this->Ln();
                $this->Cell(190,8,"Trabajo: $trabajo",0,1,'');
                $this->Cell(190,8,"Cliente: $cliente",0,0,'');
                
                $this->Ln();
                $this->Cell(190,10,"$nomMaterial",0,1,'C');
                //Encabezado
                
                $this->Ln();
                $this->SetFont('Arial','',8);
                $this->Cell(43,5,"",0,0);
                $this->Cell(87,5,"$titMat1",0,1,'C');
                $this->Cell(33,5,"Cantidad: $cantidad Pzas.",1,0);
                $this->Cell(10,5,"",0,0);
                $this->Cell(87,5,"Medida Cotizada",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(33,5,"Ancho: $ancho cm.",1,0);
                $this->Cell(10,5,"",0,0);
                $this->SetTextColor(255, 128, 0);
                $this->SetDrawColor(255, 128, 0);
                $this->Cell(13,5,"Medida",1,0,'C');
                $this->Cell(13,5,"Ancho",1,0,'C');
                $this->Cell(13,5,"Alto",1,0,'C');
                $this->Cell(13,5,"Entran",1,0,'C');
                $this->Cell(15,5,"%Aprox",1,0,'C');
                $this->Cell(20,5,"Orientacion",1,0,'C');
                $this->SetTextColor(0, 0, 0);
                $this->SetDrawColor(0, 0, 0);
                $this->Cell(10,5,"",0,0,'');
                $this->Cell(35,5,"  Cantidad: $cantidad2 $txtcantidad",1,0);
                
                $this->Ln();
                $this->SetFont('Arial','',8);
                $this->SetTextColor(0, 0, 0);
                $this->SetDrawColor(0, 0, 0);
                $this->Cell(33,5,"Alto: $alto cm.",1,0);
                $this->Cell(10,5,"",0,0);
                $this->SetTextColor(255, 128, 0);
                $this->SetDrawColor(255, 128, 0);
                $this->Cell(13,5,"$medida",1,0,'C');
                $this->SetTextColor(0, 0, 0);
                $this->Cell(13,5,"$Ancho",1,0,'C');
                $this->Cell(13,5,"$Alto",1,0,'C');
                $this->Cell(13,5,"$Entran",1,0,'C');
                $this->Cell(15,5,"$Aprox",1,0,'C');
                $this->Cell(20,5,"$Orientacion",1,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->SetFont('Arial','',8);
                $this->SetDrawColor(0, 0, 0);
                $this->Cell(33,5,"Medianil ancho: $medianil_ancho cm.",1,0);
                $this->Cell(10,5,"",0,0);
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(15,5,"",0,0,'C');
                $this->Cell(20,5,"",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->SetFont('Arial','',8);
                $this->SetDrawColor(0, 0, 0);
                $this->Cell(33,5,"Medianil alto: $madianil_alto cm.",1,0);
                $this->Cell(10,5,"",0,0);
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(15,5,"",0,0,'C');
                $this->Cell(20,5,"",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->SetFont('Arial','',8);
                $this->SetDrawColor(0, 0, 0);
                $this->Cell(33,5,"Total Ancho: $totAncho cm.",1,0);
                $this->Cell(10,5,"",0,0);
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(15,5,"",0,0,'C');
                $this->Cell(20,5,"",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->SetFont('Arial','',8);
                $this->SetDrawColor(0, 0, 0);
                $this->Cell(33,5,"Total Alto: $totAlto cm.",1,0);
                $this->Cell(10,5,"",0,0);
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(13,5,"",0,0,'C');
                $this->Cell(15,5,"",0,0,'C');
                $this->Cell(20,5,"",0,0,'C');
                $this->SetDrawColor(0, 0, 0);
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(130,5,"",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->SetFont('Arial','B',8);
                $this->SetDrawColor(255, 128, 0);
                $this->SetFillColor(255, 128, 0);
                $this->Cell(41,5,"Tintas",1,0,'C');
                $this->SetDrawColor(0, 0, 0);
                $this->SetFillColor(1, 1, 1);
                $this->Cell(89,5,"",0,0,'');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->SetFont('Arial','',8);
                $this->Cell(41,5,"Resolucion: $resolucion",'RL',0,'');
                $this->Cell(89,5,"",0,0,'');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->SetFont('Arial','',8);
                $this->Cell(41,5,"Impresion Pasadas: $imp_pasadas",'RL',0,'');
                $this->Cell(89,5,"",0,0,'');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(16,5,"Barniz: $barniz",'L',0,'');
                $this->Cell(25,5,"$barniz_pasadas_txt",'R',0,'');
                $this->Cell(89,5,"",0,0,'');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(41,5,"Blanco: $blanco",'RLB',0,'');
                $this->Cell(89,5,"",0,0,'');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(130,5,"",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->SetFont('Arial','B',8);
                $this->SetDrawColor(255, 128, 0);
                $this->SetFillColor(255, 128, 0);
                $this->Cell(75,5,"Acabados",1,0,'C');
                $this->SetDrawColor(0, 0, 0);
                $this->SetFillColor(0, 0, 0);
                $this->Cell(55,5,"",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->SetFont('Arial','',8);
                $this->Cell(75,5,"1er. Acabado: $nomAcabado1",'RL',0,'');
                $this->Cell(55,5,"",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(75,5,"2do. Acabado: $nomAcabado2",'RL',0,'');
                $this->Cell(55,5,"",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(75,5,"3er. Acabado: $nomAcabado3",'RL',0,'');
                $this->Cell(55,5,"",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->SetFont('Arial','',8);
                $this->Cell(75,5,"4to. Acabado: $nomAcabado4",'RL',0,'');
                $this->Cell(55,5,"",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(75,5,"5to. Acabado: $nomAcabado5",'RL',0,'');
                $this->Cell(55,5,"",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(75,5,"6to. Acabado: $nomAcabado6",'RLB',0,'');
                $this->Cell(55,5,"",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
//                $this->Ln();
//                $this->Cell(75,5,"Laminado: $nomLaminado",'RLB',0,'');
//                $this->Cell(55,5,"",0,0,'C');
//                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(130,5,"",0,0,'C');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->SetFont('Arial','B',8);
                $this->SetDrawColor(255, 128, 0);
                $this->SetFillColor(255, 128, 0);
                $this->Cell(100,5,"Adicionales",1,0,'C');
                $this->SetDrawColor(0, 0, 0);
                $this->SetFillColor(0, 0, 0);
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->SetFont('Arial','',8);
                $this->Cell(100,5,"$a1_desc",'LRB',0,'');
                $this->Cell(30,5,"",0,0,'');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(100,5,"$a2_desc",'LRB',0,'');
                $this->Cell(30,5,"",0,0,'');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(100,5,"$a3_desc",'LRB',0,'');
                $this->Cell(30,5,"",0,0,'');
                
                $this->Ln();
                $this->SetFont('Arial','',8);
                $this->Cell(100,5,"$a4_desc",'LRB',0,'');
                $this->Cell(30,5,"",0,0,'');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(100,5,"$a5_desc",'LRB',0,'');
                $this->Cell(30,5,"",0,0,'');
                $this->Cell(10,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(100,5,"$a6_desc",'LRB',0,'');
                $this->Cell(30,5,"",0,0,'');
                
                $this->Ln();
                $this->Cell(130,5,"",0,0,'C');
                
                $this->Ln();
                $this->SetFont('Arial','B',8);
                $this->Cell(190,5,"Observaciones",1,1,'C');
                $this->SetFont('Arial','',6);
                $this->MultiCell(190,3,"$observaciones",1,1,'J');
            }
    }
}

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetY(7);
$pdf->SetX(5);
$pdf->SetFont('Arial','',8);
$pdf->Tabla();

$orProd=$_REQUEST['orprod'];
$Folio=$_REQUEST['FOLIO'];
$trabajo=$_REQUEST['trabajo'];
$fecha=date("d-m-Y");
                
$URL="http://192.168.2.209/com.cotizadorAdmin/pdf/ordenproduccion/$orProd-$Folio-$trabajo-$fecha.pdf";
$clientes="UPDATE or_produccion SET URL='$URL' WHERE FOLIO=$Folio";
$consulta=mysql_query($clientes);

$pdf->Output("ordenproduccion/$orProd-$Folio-$trabajo-$fecha.pdf");
echo "<script language='javascript'>window.open('ordenproduccion/$orProd-$Folio-$trabajo-$fecha.pdf', '_self');</script>";//paral archivo pdf generado exit;