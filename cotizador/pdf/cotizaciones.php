<?php
    header('Content-Type: text/html; charset=UTF-8'); 
    require('fpdf.php');
    class PDF extends FPDF
    {
        function Tabla()
        {
            include 'modelo/conexion.php';

            $Folio=$_REQUEST['FOLIO'];
            $response = new stdClass();
            $rows =array();

            $clientes="SELECT * FROM v_impresion where FOLIO=$Folio";
            //$consulta=mysql_query($clientes);
            //$num= mysql_num_rows($consulta);
            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $consulta = sqlsrv_query($conn,$clientes, $params, $options);
            $num = sqlsrv_num_rows( $consulta );            
        	
            if ( $num >0)
            {
                while($row = sqlsrv_fetch_array($consulta,SQLSRV_FETCH_ASSOC))
                {       
                    $FECHA_HORA=$row["FECHA_HORA"];
                    $trabajo=$row["TRABAJO"];
                    $folio=$row["FOLIO"];
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
                    if ($titMat=="R")
                    {
                        $titMat1="MATERIAL RIGIDO";
                    }
                    else if ($titMat=="F")
                    {
                        $titMat1="MATERIAL FLEXIBLE";
                    }
                    
                    $medida=$row["M_MEDIDA"];
                    $Ancho=$row["M_ANCHO"];
                    $Alto=$row["M_ALTO"];
                    $Entran=$row["M_ENTRA"];
                    $Aprox=$row["M_APROV"];
                    $Orientacion=$row["M_ORIENTA"];
                    
                    $resCant=$row["RES_CANT"];
                    $txtcantidad=$row["TIT_CANT_MAT"];
                    $resPrecio=$row["RES_PRECIO"];
                    
                    $resolucion=$row["RESOLUCION"];
                    //$imp_pasadas=$row["IMP_PASADAS"];
                    
                    //$resTinta=$row["RES_TINTA"];
                    
                    
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
                    
                    //$resB=$row["RES_BARNIZ"];
                    
                    $blancoc=$row["BLANCO"];
                    if ($blancoc=="on")
                    {
                        $blanco="Si";
                    }
                    else
                    {
                        $blanco="No";
                    }
                    
                    $resBlanco=$row["RES_BLANCO"];
                    
                    $id_Acabado1=$row["ID_ACABADO1"];
                    $acabado1="SELECT * FROM acabados where ID_ACABADO=$id_Acabado1";
                    //$consultaAcabado1=mysql_query($acabado1);
                    $consultaAcabado1 = sqlsrv_query($conn,$acabado1);

                    while($row = sqlsrv_fetch_array($consultaAcabado1,SQLSRV_FETCH_ASSOC))
                    {   
                        $nomAcabado1=$row["DESCRIPCION"];
                        if($id_Acabado1==1)
                        {
                            $nomAcabado1_1="Acabado 1";
                        }
                        else
                        {
                            $nomAcabado1_1_1=$row["DESCRIPCION"];
                            $nomAcabado1_1=substr("$nomAcabado1_1_1", 0, 8);
                        }
                    }
                    
                    $resAcab1=$row["RES_ACAB1"];
                    
                    $id_Acabado2=$row["ID_ACABADO2"];
                    $acabado2="SELECT * FROM acabados where ID_ACABADO=$id_Acabado2";
                    //$consultaAcabado2=mysql_query($acabado2);
                    $consultaAcabado2 = sqlsrv_query($conn,$acabado2);

                    while($row = sqlsrv_fetch_array($consultaAcabado2,SQLSRV_FETCH_ASSOC))
                    {                       
                        $nomAcabado2=$row["DESCRIPCION"];
                        if($id_Acabado2==1)
                        {
                            $nomAcabado2_1="Acabado 2";
                        }
                        else
                        {
                            $nomAcabado2_1_1=$row["DESCRIPCION"];
                            $nomAcabado2_1=substr("$nomAcabado2_1_1", 0, 8);
                        }
                    }
                    
                    $resAcab2=$row["RES_ACAB2"];
                    
                    $id_Acabado3=$row["ID_ACABADO3"];
                    $acabado3="SELECT * FROM acabados where ID_ACABADO=$id_Acabado3";
                    //$consultaAcabado3=mysql_query($acabado3];
                    $consultaAcabado3 = sqlsrv_query($conn,$acabado3);

                    while($row = sqlsrv_fetch_array($consultaAcabado3,SQLSRV_FETCH_ASSOC))
                    {                      
                        $nomAcabado3=$row["DESCRIPCION"];
                        if($id_Acabado3==1)
                        {
                            $nomAcabado3_1="Acabado 3";
                        }
                        else
                        {
                            $nomAcabado3_1_1=$row["DESCRIPCION"];
                            $nomAcabado3_1=substr("$nomAcabado3_1_1", 0, 8);
                        }
                    }
                    
                    $resAcab3=$row["RES_ACAB3"];
                    
                    $id_Acabado4=$row["ID_ACABADO4"];
                    $acabado4="SELECT * FROM acabados where ID_ACABADO=$id_Acabado4";
                    //$consultaAcabado4=mysql_query($acabado4];
                    $consultaAcabado4 = sqlsrv_query($conn,$acabado4);

                    while($row = sqlsrv_fetch_array($consultaAcabado4,SQLSRV_FETCH_ASSOC))
                    {                     
                        $nomAcabado4=$row["DESCRIPCION"];
                        if($id_Acabado4==1)
                        {
                            $nomAcabado4_1="Acabado 4";
                        }
                        else
                        {
                            $nomAcabado4_1_1=$row["DESCRIPCION"];
                            $nomAcabado4_1=substr("$nomAcabado4_1_1", 0, 8);
                        }
                    }
                    
                    $resAcab4=$row["RES_ACAB4"];
                    
                    $id_Acabado5=$row["ID_ACABADO5"];
                    $acabado5="SELECT * FROM acabados where ID_ACABADO=$id_Acabado5";
                    //$consultaAcabado5=mysql_query($acabado5);
                    $consultaAcabado5 = sqlsrv_query($conn,$acabado5);

                    while($row = sqlsrv_fetch_array($consultaAcabado5,SQLSRV_FETCH_ASSOC))
                    {                      
                        $nomAcabado5=$row["DESCRIPCION"];
                        if($id_Acabado5==1)
                        {
                            $nomAcabado5_1="Acabado 5";
                        }
                        else
                        {
                            $nomAcabado5_1_1=$row["DESCRIPCION"];
                            $nomAcabado5_1=substr("$nomAcabado5_1_1", 0, 8);
                        }
                    }

                    $resAcab5=$row["RES_ACAB5"];
                    
                    $id_Acabado6=$row["ID_ACABADO6"];
                    $acabado6="SELECT * FROM acabados where ID_ACABADO=$id_Acabado6";
                    //$consultaAcabado6=mysql_query($acabado6];
                    $consultaAcabado6 = sqlsrv_query($conn,$acabado6);

                    while($row = sqlsrv_fetch_array($consultaAcabado6,SQLSRV_FETCH_ASSOC))
                    {                                         
                        $nomAcabado6=$row["DESCRIPCION"];
                        if($id_Acabado6==1)
                        {
                            $nomAcabado6_1="Acabado 6";
                        }
                        else
                        {
                            $nomAcabado6_1_1=$row["DESCRIPCION"];
                            $nomAcabado6_1=substr("$nomAcabado6_1_1", 0, 8);
                        }
                    }

                    $resAcab6=$row["RES_ACAB6"];
                    
    //                $id_Laminado=$row["ID_LAMINADO"];
    //                $laminado="SELECT * FROM laminado_plotter where ID_LAMINADO=$id_Laminado";
    //                $consultaLaminado=mysql_query($laminado];
    //                $nomLaminado=mysql_result($consultaLaminado,0,"DESCRIPCION"];
    //                if($id_Laminado==1)
    //                {
    //                    $nomLaminado_1="Laminado";
    //                }
    //                else
    //                {
    //                    $nomLaminado_1=mysql_result($consultaLaminado,0,"DESCRIPCION"];
    //                }
    //                
    //                $resLamina=$row["RES_LAM"];
                    
                    $a1_desc=$row["A1_DESC"];
                    $a1_desc_1="Adicional 1";
                    $a1_precio=$row["A1_PRECIO"];
                    
                    $resAdic1=$row["RES_ADIC1"];
                    
                    $a2_desc=$row["A2_DESC"];
                    $a2_desc_1="Adicional 2";
                    $a2_precio=$row["A2_PRECIO"];
                    
                    $resAdic2=$row["RES_ADIC2"];
                    
                    $a3_desc=$row["A3_DESC"];
                    $a3_desc_1="Adicional 3";
                    $a3_precio=$row["A3_PRECIO"];
                    
                    $resAdic3=$row["RES_ADIC3"];
                    
                    $a4_desc=$row["A4_DESC"];
                    $a4_desc_1="Adicional 4";
                    $a4_precio=$row["A4_PRECIO"];
                    
                    $resAdic4=$row["RES_ADIC4"];
                    
                    $a5_desc=$row["A5_DESC"];
                    $a5_desc_1="Adicional 5";
                    $a5_precio=$row["A5_PRECIO"];
                    
                    $resAdic5=$row["RES_ADIC5"];
                    
                    $a6_desc=$row["A6_DESC"];
                    $a6_desc_1="Adicional 6";
                    $a6_precio=$row["A6_PRECIO"];
                    
                    $resAdic6=$row["RES_ADIC6"];
                    
                    $observaciones=$row["OBSERVACIONES"];
                    
                    $resSubtotal=$row["RES_SUBTOTAL"];
                    $resMargen=$row["RES_MARGEN"];
                    $porcientoMargen=$row["MARGEN"];
                    $resComision=$row["RES_COMISION"];
                    $porcientoComision=$row["COMISION"];
                    $resPreUnit=$row["RES_PRECIO_UNITARIO"];
                    $resTotal=$row["TOTAL"];
                    $resImprimart=$row["RES_IMPRIMART"];
                    //$total=$row["TOTAL"];
                    
                    $litoc2=$row["LITO2"];
                    if ($litoc2=="on")
                    {
                        $lito2="*";
                    }
                    else
                    {
                        $lito2="";
                    }
                    $litoc3=$row["LITO3"];
                    if ($litoc3=="on")
                    {
                        $lito3="*";
                    }
                    else
                    {
                        $lito3="";
                    }
                    $litoc4=$row["LITO4"];
                    if ($litoc4=="on")
                    {
                        $lito4="*";
                    }
                    else
                    {
                        $lito4="";
                    }
                    $litoc5=$row["LITO5"];
                    if ($litoc5=="on")
                    {
                        $lito5="*";
                    }
                    else
                    {
                        $lito5="";
                    }
                    $litoc6=$row["LITO6"];
                    if ($litoc6=="on")
                    {
                        $lito6="*";
                    }
                    else
                    {
                        $lito6="";
                    }
                    $litoc7=$row["LITO7"];
                    if ($litoc7=="on")
                    {
                        $lito7="*";
                    }
                    else
                    {
                        $lito7="";
                    }
                    $litoc8=$row["LITO8"];
                    if ($litoc8=="on")
                    {
                        $lito8="*";
                    }
                    else
                    {
                        $lito8="";
                    }
    //                $litoc9=$row["LITO9"];
    //                if ($litoc9=="on")
    //                {
    //                    $lito9="*";
    //                }
    //                else
    //                {
    //                    $lito9="";
    //                }
                    $litoc10=$row["LITO10"];
                    if ($litoc10=="on")
                    {
                        $lito10="*";
                    }
                    else
                    {
                        $lito10="";
                    }
                    $litoc11=$row["LITO11"];
                    if ($litoc11=="on")
                    {
                        $lito11="*";
                    }
                    else
                    {
                        $lito11="";
                    }
                    $litoc12=$row["LITO12"];
                    if ($litoc12=="on")
                    {
                        $lito12="*";
                    }
                    else
                    {
                        $lito12="";
                    }
                    $litoc13=$row["LITO13"];
                    if ($litoc13=="on")
                    {
                        $lito13="*";
                    }
                    else
                    {
                        $lito13="";
                    }
                    $litoc14=$row["LITO14"];
                    if ($litoc14=="on")
                    {
                        $lito14="*";
                    }
                    else
                    {
                        $lito14="";
                    }
                    $litoc15=$row["LITO15"];
                    if ($litoc15=="on")
                    {
                        $lito15="*";
                    }
                    else
                    {
                        $lito15="";
                    }
                    $litoc16=$row["LITO16"];
                    if ($litoc16=="on")
                    {
                        $lito16="*";
                    }
                    else
                    {
                        $lito16="";
                    }
                    $litoc17=$row["LITO17"];
                    if ($litoc17=="on")
                    {
                        $lito17="*";
                    }
                    else
                    {
                        $lito17="";
                    }
                    $litoc18=$row["LITO18"];
                    if ($litoc18=="on")
                    {
                        $lito18="*";
                    }
                    else
                    {
                        $lito18="";
                    } 
                    
                    $this->SetFont('Arial','B',11);
                    $this->Cell(190,10,"No. Cotizacion: $folio",0,1,'R');
                    $fecha=date("d-m-Y");
                    $this->Cell(190,10,"Fecha: $FECHA_HORA",0,1,'R');

                    //Encabezado
                    $this->Ln();
                    $this->Cell(200,12,"Trabajo: $trabajo",0,1,'');
                    $this->Cell(150,10,"Cliente: $cliente",0,1,'');
                    $this->Cell(190,10,"$nomMaterial",0,1,'C');
                    //Encabezado

                    //fila 1
                    $this->Ln();
                    $this->SetFont('Arial','',8);
                    $this->Cell(43,5,"",0,0);
                    $this->Cell(87,5,"$titMat1",0,1,'C');
                    //fila 1
                    
                    //fila 2
                        //Columna1
                            $this->Cell(33,5,"Cantidad: $cantidad Pzas.",1,0);
                        //Columna1
                        $this->Cell(10,5,"",0,0);
                        //Columna2
                            $this->Cell(87,5,"Medida Cotizada",0,0,'C');
                        //Columna2
                        $this->Cell(10,5,"",0,0,'');
                        $this->SetTextColor(255, 128, 0);
                        //Columna3
                            $this->Cell(35,5,"MATERIAL",'RLT',0);
                        //Columna3
                        $this->SetTextColor(0, 0, 0);
                    //fila 2

                    //fila 3
                    $this->Ln();
                        //Columna1
                            $this->Cell(33,5,"Ancho: $ancho cm.",1,0);
                        //Columna1
                        $this->Cell(10,5,"",0,0);
                        $this->SetTextColor(255, 128, 0);
                        $this->SetDrawColor(255, 128, 0);
                        //Columna2
                            $this->Cell(13,5,"Medida",1,0,'C');
                            $this->Cell(13,5,"Ancho",1,0,'C');
                            $this->Cell(13,5,"Alto",1,0,'C');
                            $this->Cell(13,5,"Entran",1,0,'C');
                            $this->Cell(15,5,"%Aprox",1,0,'C');
                            $this->Cell(20,5,"Orientacion",1,0,'C');
                        //Columna2
                        $this->SetTextColor(0, 0, 0);
                        $this->SetDrawColor(0, 0, 0);
                        $this->Cell(10,5,"",0,0,'');
                        //Columna3
                            $this->Cell(35,5,"  Cantidad: $resCant $txtcantidad",'RL',0);
                        //Columna3
                    //fila 3

                    //fila 4
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
                    $this->SetDrawColor(0, 0, 0);
                    $this->Cell(35,5,"  Precio: $$resPrecio",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito2",1,0,'C');
                    $this->SetFont('Arial','',8);
                    $this->SetDrawColor(255, 128, 0);
                    //fila 4

                    //fila 5
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
                    $this->SetTextColor(255, 128, 0);
                    $this->SetDrawColor(0, 0, 0);
                    $this->Cell(35,5,"IMPRESION",'RL',0);
                    $this->SetDrawColor(255, 128, 0);
                    $this->SetTextColor(0, 0, 0);
                    //fila 5

                    //fila 6
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
                    $this->SetDrawColor(0, 0, 0);
                    //$this->Cell(35,5,"  Precio: $$resTinta",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito3",1,0,'C');
                    $this->SetFont('Arial','',8);
                    $this->SetDrawColor(255, 128, 0);
                    //fila 6

                    //fila 7
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
                    $this->SetDrawColor(0, 0, 0);
                    //$this->Cell(35,5,"  Barniz: $$resB",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito4",1,0,'C');
                    $this->SetFont('Arial','',8);
                    $this->SetDrawColor(255, 128, 0);
                    //fila 7

                    //fila 8
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
                    $this->Cell(35,5,"  Blanco: $$resBlanco",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito5",1,0,'C');
                    $this->SetFont('Arial','',8);
                    //fila 8

                    //fila 9
                    $this->Ln();
                    $this->Cell(130,5,"",0,0,'C');
                    $this->Cell(10,5,"",0,0,'');
                    $this->SetTextColor(255, 128, 0);
                    $this->Cell(35,5,"ACABADOS",'RL',0);
                    $this->SetTextColor(0, 0, 0);
                    //fila 9

                    //fila 10
                    $this->Ln();
                    $this->SetFont('Arial','B',8);
                    $this->SetDrawColor(255, 128, 0);
                    $this->SetFillColor(255, 128, 0);
                    $this->Cell(41,5,"Tintas",1,0,'C');
                    $this->SetDrawColor(0, 0, 0);
                    $this->SetFillColor(1, 1, 1);
                    $this->Cell(89,5,"",0,0,'');
                    $this->Cell(10,5,"",0,0,'');
                    $this->SetFont('Arial','',8);
                    $this->Cell(35,5,"  $nomAcabado1_1:  $$resAcab1",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito6",1,0,'C');
                    $this->SetFont('Arial','',8);
                    //fila 10

                    //fila 11
                    $this->Ln();
                    $this->SetFont('Arial','',8);
                    $this->Cell(41,5,"Resolucion: $resolucion",'RL',0,'');
                    $this->Cell(89,5,"",0,0,'');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  $nomAcabado2_1:  $$resAcab2",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito7",1,0,'C');
                    $this->SetFont('Arial','',8);
                    //fila 11

                    //fila 12
                    $this->Ln();
                    //$this->Cell(41,5,"Impresion Pasadas: $imp_pasadas",'RL',0,'');
                    $this->Cell(89,5,"",0,0,'');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  $nomAcabado3_1:  $$resAcab3",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito8",1,0,'C');
                    $this->SetFont('Arial','',8);
                    //fila 12

                    //fila 13
                    $this->Ln();
                    //$this->Cell(16,5,"Barniz: $barniz",'L',0,'');
                    //$this->Cell(25,5,"$barniz_pasadas_txt",'R',0,'');
                    $this->Cell(89,5,"",0,0,'');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  $nomAcabado4_1:  $$resAcab4",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito13",1,0,'C');
                    $this->SetFont('Arial','',8);

                    //fila 14
                    $this->Ln();
                    $this->Cell(41,5,"Blanco: $blanco",'RLB',0,'');
                    $this->Cell(89,5,"",0,0,'');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  $nomAcabado5_1:  $$resAcab5",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito14",1,0,'C');
                    $this->SetFont('Arial','',8);
                    //fila 14
                    //fila 13

                    //fila 14.2
                    $this->Ln();
                    $this->Cell(16,5,"",0,0,'');
                    $this->Cell(25,5,"",0,0,'');
                    $this->Cell(89,5,"",0,0,'');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  $nomAcabado6_1:  $$resAcab6",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito15",1,0,'C');
                    $this->SetFont('Arial','',8);
                    $this->SetTextColor(255, 128, 0);
                    $this->Cell(35,5,"",'RL',0,'');
                    $this->SetTextColor(0, 0, 0);
                    //fila 14.2
                    
                    //fila 15
                    $this->Ln();
                    $this->Cell(130,5,"",0,0,'C');
                    $this->Cell(10,5,"",0,0,'');
                    $this->SetTextColor(255, 128, 0);
                    $this->Cell(35,5,"ADICIONALES",'RL',0,'');
                    $this->SetTextColor(0, 0, 0);
                    //fila 15
                    
                    //fila 16
                    $this->Ln();
                    $this->SetFont('Arial','B',8);
                    $this->SetDrawColor(255, 128, 0);
                    $this->SetFillColor(255, 128, 0);
                    $this->Cell(75,5,"Acabados",1,0,'C');
                    $this->SetDrawColor(0, 0, 0);
                    $this->SetFillColor(0, 0, 0);
                    $this->Cell(55,5,"",0,0,'C');
                    $this->Cell(10,5,"",0,0,'');
                    $this->SetFont('Arial','',8);
                    $this->Cell(35,5,"  $a1_desc_1:  $$resAdic1",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito10",1,0,'C');
                    $this->SetFont('Arial','',8);
                    //fila 16

                    //fila 17
                    $this->Ln();
                    $this->SetFont('Arial','',8);
                    $this->Cell(75,5,"1er. Acabado: $nomAcabado1",'RL',0,'');
                    $this->Cell(55,5,"",0,0,'C');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  $a2_desc_1:  $$resAdic2",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito11",1,0,'C');
                    $this->SetFont('Arial','',8);
                    //fila 17

                    //fila 18
                    $this->Ln();
                    $this->Cell(75,5,"2do. Acabado: $nomAcabado2",'RL',0,'');
                    $this->Cell(55,5,"",0,0,'C');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  $a3_desc_1:  $$resAdic3",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito12",1,0,'C');
                    $this->SetFont('Arial','',8);
                    //fila 18

                    //fila 19
                    $this->Ln();
                    $this->Cell(75,5,"3er. Acabado: $nomAcabado3",'RL',0,'');
                    $this->Cell(55,5,"",0,0,'C');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  $a4_desc_1:  $$resAdic4",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito16",1,0,'C');
                    $this->SetFont('Arial','',8);
                    //fila 19

                    //fila 17.2
                    $this->Ln();
                    $this->SetFont('Arial','',8);
                    $this->Cell(75,5,"4to. Acabado: $nomAcabado4",'RL',0,'');
                    $this->Cell(55,5,"",0,0,'C');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  $a5_desc_1:  $$resAdic5",'RL',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito17",1,0,'C');
                    $this->SetFont('Arial','',8);
                    //fila 17.2

                    //fila 18.2
                    $this->Ln();
                    $this->Cell(75,5,"5to. Acabado: $nomAcabado5",'RL',0,'');
                    $this->Cell(55,5,"",0,0,'C');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  $a6_desc_1:  $$resAdic6",'RLB',0);
                    $this->SetFont('Arial','',14);
                    $this->Cell(10,5,"$lito18",1,0,'C');
                    $this->SetFont('Arial','',8);
                    //fila 18.2

                    //fila 19.2
                    $this->Ln();
                    $this->Cell(75,5,"6to. Acabado: $nomAcabado6",'RLB',0,'');
                    $this->Cell(55,5,"",0,0,'C');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  Subtotal:  $$resSubtotal",'RL',0);
                    //fila 19.2

                    //fila 20
                    $this->Ln();
                    $this->Cell(75,5,"",0,0,'');
                    $this->Cell(55,5,"",0,0,'C');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  Margen:  $$resMargen",'RL',0);
                    $this->Cell(10,5,"$porcientoMargen%",1,0,'');
                    //fila 20

                    //fila 21
                    $this->Ln();
                    $this->Cell(130,5,"",0,0,'C');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  Comision:  $$resComision",'RL',0);
                    $this->Cell(10,5,"$porcientoComision%",1,0,'');
                    //fila 21

                    //fila 22
                    $this->Ln();
                    $this->SetFont('Arial','B',8);
                    $this->SetDrawColor(255, 128, 0);
                    $this->SetFillColor(255, 128, 0);
                    $this->Cell(130,5,"Adicionales",1,0,'C');
                    $this->SetDrawColor(0, 0, 0);
                    $this->SetFillColor(0, 0, 0);
                    $this->Cell(10,5,"",0,0,'');
                    $this->SetFont('Arial','B',8);
                    $this->Cell(35,5,"  P. Unitario:  $$resPreUnit",'RL',0);
                    //fila 22

                    //fila 23
                    $this->Ln();
                    $this->SetFont('Arial','',8);
                    $this->Cell(100,5,"$a1_desc",'LRB',0,'');
                    $this->Cell(30,5,"$$a1_precio",'LRB',0,'');
                    $this->Cell(10,5,"",0,0,'');
                    $this->SetFont('Arial','B',8);
                    $this->Cell(35,5,"  Total:  $$resTotal",'RLB',0);
                    $this->SetFont('Arial','',8);
                    //fila 23

                    //fila 24
                    $this->Ln();
                    $this->Cell(100,5,"$a2_desc",1,0,'');
                    $this->Cell(30,5,"$$a2_precio",1,0,'');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"",0,0);
                    //fila 24

                    //fila 25
                    $this->Ln();
                    $this->Cell(100,5,"$a3_desc",1,0,'');
                    $this->Cell(30,5,"$$a3_precio",1,0,'');
                    $this->Cell(10,5,"",0,0,'');
                    $this->Cell(35,5,"  Imprimart:  $$resImprimart",1,0);
                    //fila 25

                    //fila 26
                    $this->Ln();
                    $this->Cell(130,5,"",0,0,'C');
                    $this->Cell(10,5,"",0,0,'');
                    //fila 26

                    //fila 27
                    $this->Ln();
                    $this->SetFont('Arial','B',8);
                    $this->Cell(190,5,"Observaciones",1,1,'C');
                    $this->SetFont('Arial','',6);
                    $this->MultiCell(190,3,"$observaciones",1,1,'J');
                    //fila 27
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

    $Folio=$_REQUEST['FOLIO'];
    $trabajo=$_REQUEST['trabajo'];
    $fecha=date("d-m-Y");
    $pdf->Output("cotizaciones/$Folio-$trabajo-$fecha.pdf");
    echo "<script language='javascript'>window.open('cotizaciones/$Folio-$trabajo-$fecha.pdf', '_self');</script>";//paral archivo pdf generado exit;