<?php
require('fpdf.php');
class PDF extends FPDF
{

    function Tabla()
    {
        include '../modelo/conexion.php';

        $Folio=$_REQUEST['FOLIO'];
        
        $clientes="SELECT * FROM v_ord_prod where FOLIO=$Folio";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );        
        $consulta=sqlsrv_query($conn,$clientes,$params,$options);
        $num= sqlsrv_num_rows($consulta);
        	
            if ( $num >0)
            {
                while ($row =sqlsrv_fetch_array($consulta,SQLSRV_FETCH_ASSOC)) 
                {                
                    $folio=$row["FOLIO"];
                    $FECHA_HORA=$row["FECHA_HORA"];
                    $fentrega=$row["FECHA_ENTREGA"];
                    $orProd=$row["ID_PRODUCTION"];
                    $matrx=$row["OR_MATRIX"];
                    
                    $trabajo=$row["TRABAJO"];
                    $cliente=$row["CLIENTE"];
                    
                    $cantidad=$row["CANTIDAD"];
                    $ancho=$row["ANCHO"];
                    $alto=$row["ALTO"];
                    $medianil_ancho=$row["MEDIANIL_ANCHO"];
                    $madianil_alto=$row["MEDIANIL_ALTO"];
                    
                    $totAncho=$row["TOTAL_ANCHO"];
                    $totAlto=$row["TOTAL_ALTO"];
                    
                    $MAT_ESPECIAL=$row["MAT_ESPECIAL"];
                    $nomMaterial1=$row["NOMBRE_MATERIAL"];
                    if ($MAT_ESPECIAL=="on")
                    {
                        $nomMaterial="Material Especial: ".$nomMaterial1;
                    }
                    else
                    {
                        $nomMaterial="Material: ".$nomMaterial1;
                    }
                    

                    $titMat=$row["TIPO"];
                    if ($titMat==R)
                    {
                        $titMat1="MATERIAL RIGIDO";
                    }
                    else if ($titMat==F)
                    {
                        $titMat1="MATERIAL FLEXIBLE";
                    }
                    
                    $medida=$row["M_MEDIDA"];
                    $Ancho=$row["M_ANCHO"];
                    $Alto=$row["M_ALTO"];
                    $Entran=$row["M_ENTRA"];
                    $Aprox=$row["M_APROV"];
                    $Orientacion=$row["M_ORIENTA"];
                    
                    $cantidad2=$row["RES_CANT"];
                    $txtcantidad=$row["TIT_CANT_MAT"];
                    
                    
                    
                    $resolucion=$row["RESOLUCION"];
                    //$imp_pasadas=$row["IMP_PASADAS"];
                    
                    /*$barnizc=$row["BARNIZ"];
                    if ($barnizc=="on")
                    {
                        $barniz="Si";
                        $barniz_pasadas=$row["BARNIZ_PASADAS"];
                        $barniz_pasadas_txt="Pasadas: ".$barniz_pasadas;
                    }
                    else
                    {
                        $barniz="No";
                        $barniz_pasadas="";
                        $barniz_pasadas_txt="";
                    }*/
                    
                    $blancoc=$row["BLANCO"];
                    if ($blancoc==on)
                    {
                        $blanco="Si";
                    }
                    else
                    {
                        $blanco="No";
                    }
                    
                    $id_Acabado1=$row["ID_ACABADO1"];
                    $acabado1="SELECT * FROM acabados where ID_ACABADO=$id_Acabado1";
                    $consultaAcabado1=sqlsrv_query($conn,$acabado1);
                        while ($row1 =sqlsrv_fetch_array($consultaAcabado1,SQLSRV_FETCH_ASSOC)) 
                        { 
                            $nomAcabado1=$row1["DESCRIPCION"];                           
                        }
                    $id_Acabado2=$row["ID_ACABADO2"];    
                    $acabado2="SELECT * FROM acabados where ID_ACABADO=$id_Acabado2";
                    $consultaAcabado2=sqlsrv_query($conn,$acabado2);
                        while ($row2 =sqlsrv_fetch_array($consultaAcabado2,SQLSRV_FETCH_ASSOC)) 
                        {                     
                        $nomAcabado2=$row2["DESCRIPCION"];                        
                        }  
                    $id_Acabado3=$row["ID_ACABADO3"];     
                    $acabado3="SELECT * FROM acabados where ID_ACABADO=$id_Acabado3";
                    $consultaAcabado3=sqlsrv_query($conn,$acabado3);
                        while ($row3 =sqlsrv_fetch_array($consultaAcabado2,SQLSRV_FETCH_ASSOC)) 
                        {                     
                            $nomAcabado3=$row3["DESCRIPCION"];
                        }                     
                    $id_Acabado4=$row["ID_ACABADO4"];
                    $acabado4="SELECT * FROM acabados where ID_ACABADO=$id_Acabado4";
                    $consultaAcabado4=sqlsrv_query($conn,$acabado4);
                        while ($row4 =sqlsrv_fetch_array($consultaAcabado2,SQLSRV_FETCH_ASSOC)) 
                        {                     
                            $nomAcabado4=$row4["DESCRIPCION"];
                        }
                    $id_Acabado5=$row["ID_ACABADO5"];
                    $acabado5="SELECT * FROM acabados where ID_ACABADO=$id_Acabado5";
                    $consultaAcabado5=sqlsrv_query($conn,$acabado5);
                        while ($row5 =sqlsrv_fetch_array($consultaAcabado2,SQLSRV_FETCH_ASSOC)) 
                        {                     
                            $nomAcabado5=$row5["DESCRIPCION"];
                        }
                    $id_Acabado6=$row["ID_ACABADO6"];
                    $acabado6="SELECT * FROM acabados where ID_ACABADO=$id_Acabado6";
                    $consultaAcabado6=sqlsrv_query($conn,$acabado6);
                        while ($row6 =sqlsrv_fetch_array($consultaAcabado2,SQLSRV_FETCH_ASSOC)) 
                        {                     
                            $nomAcabado6=$row6["DESCRIPCION"];
                        }
                    
    //                $id_Laminado=$row["ID_LAMINADO");
    //                $laminado="SELECT * FROM laminado_plotter where ID_LAMINADO=$id_Laminado";
    //                $consultaLaminado=mysql_query($laminado);
    //                $nomLaminado=mysql_result($consultaLaminado,0,"DESCRIPCION");
                    
                    $a1_desc=$row["A1_DESC"];
                    $a2_desc=$row["A2_DESC"];
                    $a3_desc=$row["A3_DESC"];
                    $a4_desc=$row["A4_DESC"];
                    $a5_desc=$row["A5_DESC"];
                    $a6_desc=$row["A6_DESC"];
                    $observaciones=$row["OBSERVACIONES"];
                    
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
                    
                    /*$this->Ln();
                    $this->SetFont('Arial','',8);
                    $this->Cell(41,5,"Impresion Pasadas: $imp_pasadas",'RL',0,'');
                    $this->Cell(89,5,"",0,0,'');
                    $this->Cell(10,5,"",0,0,'');
                    
                    $this->Ln();
                    $this->Cell(16,5,"Barniz: $barniz",'L',0,'');
                    $this->Cell(25,5,"$barniz_pasadas_txt",'R',0,'');
                    $this->Cell(89,5,"",0,0,'');
                    $this->Cell(10,5,"",0,0,'');*/
                    
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