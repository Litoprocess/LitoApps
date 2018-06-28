$(document).ready(function()
{
//--------------------------------------------------------------------------
//                  				BOTON ABRIR
//--------------------------------------------------------------------------
	$("#modal-abrir").click(function()
	{
		$('#dialogabrir').modal('open');
	});

	$("#aceptarabrir").click(function()
	{
		var folio2 = $("#folio2").val();
	        $.post("php/abrir.php",{folio2:folio2},
            function(result)
            {
      			if(result.data.length>0){            	
      				$("#foliob").val(result.data[0].FOLIO);
      				$("#cliente").val(result.data[0].CLIENTE);
      				$("#trabajo").val(result.data[0].TRABAJO);
      				$("#cantidad").val(result.data[0].CANTIDAD);
      				$("#ancho").val(result.data[0].ANCHO);
      				$("#alto").val(result.data[0].ALTO);
      				$("#medancho").val(result.data[0].MEDIANIL_ANCHO);
      				$("#medalto").val(result.data[0].MEDIANIL_ALTO);
      				$("#totancho").val("71");
      				$("#totalto").val("56");
      				$("select[id=material]").val(result.data[0].ID_MATERIAL).siblings().addClass("active");
      				$.medidasTabla();
      				id_meterial = result.data[0].ID_MATERIAL;
      				tblmedida = result.data[0].MEDIDA;
      				tblancho = result.data[0].MATANCHO;
      				tblalto = result.data[0].MATALTO;
      				tblentran = result.data[0].MATENTRAN;
      				tblorientacion = result.data[0].ORIENTA;
      				tblaprovecha = result.data[0].APROVECHAMIENTO;
      				tblaloalto="";
      				tblaloancho="";      				
      				$("#medidas"+result.data[0].MEDIDA).html("<td>" + result.data[0].MEDIDA + "</td>" + "<td>" + result.data[0].MATANCHO + "</td>" + "<td>" + result.data[0].MATALTO + "</td>" + "<td>" + result.data[0].MATENTRAN + "</td>" + "<td>" + result.data[0].ORIENTA + "</td>" + "<td>" + result.data[0].APROVECHAMIENTO + "</td>" + "<td>" +" "+ "</td>" + "<td>" + "" + "</td>")
      				$.calculosmaterial(tblmedida, tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto, tblorientacion, tblaprovecha);

      				//EXTRAER RESOLUCION
      				if(result.data[0].RESOLUCION == 720)
      				{
      					$("#720").prop("checked",true);
      					$.resolucion720();
      				}
      				else if(result.data[0].RESOLUCION == 1440)
      				{
						$("#1440").prop("checked",true);
						$.resolucion720();      					
      				}
      				else if(result.data[0].RESOLUCION == 0)
      				{
						$("#0").prop("checked",true);
			        	$("#resTinta").val("0");
			        	$("#porTinta").val("0");
			        	$("#manoObra").val("0");
			        	$.subtotal();						      					
      				}
      				else if(result.data[0].RESOLUCION == "Sandwich")
      				{
      					$("#Sandwich").prop("checked",true);
      					$.Sandwich();
      				}else{
			            $("#resTinta").val("0");
			            $.subtotal();      					
      				}

  					//EXTRAER BLANCO
      				if(result.data[0].BLANCO != 0)
      				{
      					$("#blanco").prop("checked",true);
						$.Blanco();        					
      				} 
      				else 
      				{
			            $("#resBlanco").val("0");
			            $.subtotal();
      				}

      				//EXTRAER ACABADOS
      				if(result.data[0].ID_ACABADO1 > 0)
      				{
      					$("select[id=acab1]").val(result.data[0].ID_ACABADO1).siblings().addClass("active");
      					$.acab1(tblmedida, tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto, tblorientacion, tblaprovecha);
      				}
      				else
      				{
      					$("select[id=acab1]").val("1");
						$.acab1(tblmedida, tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto, tblorientacion, tblaprovecha);      					

      				}
      				if(result.data[0].ID_ACABADO2 > 0)
      				{
      					$("select[id=acab2]").val(result.data[0].ID_ACABADO2).siblings().addClass("active");
      					$.acab2(tblmedida, tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto, tblorientacion, tblaprovecha);
      				}
      				else
      				{
      					$("select[id=acab2]").val("1");
						$.acab2(tblmedida, tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto, tblorientacion, tblaprovecha);      					

      				}      				
      				if(result.data[0].ID_ACABADO3 > 0)
      				{
      					$("select[id=acab3]").val(result.data[0].ID_ACABADO3).siblings().addClass("active");
      					$.acab3(tblmedida, tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto, tblorientacion, tblaprovecha);
      				} 
      				else
      				{
      					$("select[id=acab3]").val("1");
						$.acab3(tblmedida, tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto, tblorientacion, tblaprovecha);      					

      				}      				   
      				if(result.data[0].ID_ACABADO4 > 0)
      				{
      					$("select[id=acab4]").val(result.data[0].ID_ACABADO4).siblings().addClass("active");
      					$.acab4(tblmedida, tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto, tblorientacion, tblaprovecha);
      				}
      				else
      				{
      					$("select[id=acab4]").val("1");
						$.acab4(tblmedida, tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto, tblorientacion, tblaprovecha);      					

      				}      				 
      				if(result.data[0].ID_ACABADO5 > 0)
      				{
      					$("select[id=acab5]").val(result.data[0].ID_ACABADO5).siblings().addClass("active");
      					$.acab5(tblmedida, tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto, tblorientacion, tblaprovecha);
      				} 
      				else
      				{
      					$("select[id=acab5]").val("1");
						$.acab5(tblmedida, tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto, tblorientacion, tblaprovecha);      					

      				}      				
      				if(result.data[0].ID_ACABADO6 > 0)
      				{
      					$("select[id=acab6]").val(result.data[0].ID_ACABADO6).siblings().addClass("active");
      					$.acab6(tblmedida, tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto, tblorientacion, tblaprovecha);
      				}
      				else
      				{
      					$("select[id=acab6]").val("1");
						$.acab6(tblmedida, tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto, tblorientacion, tblaprovecha);      					

      				} 

      				//EXTRAER ADICIONALES
      				if(result.data[0].A1_DESC !="")
      				{
      					$("#adic1").val(result.data[0].A1_DESC).siblings().addClass("active");
      					$("#costoadic1").val(result.data[0].A1_PRECIO).siblings().addClass("active");
      					$.adicional1();
      				}
      				else
      				{
      					$("#adic1").val("").siblings().addClass("active");
      					$("#costoadic1").val("0").siblings().addClass("active"); 
      					$.subtotal();     					
      				}  
      				if(result.data[0].A2_DESC !="")
      				{
      					$("#adic2").val(result.data[0].A2_DESC).siblings().addClass("active");
      					$("#costoadic2").val(result.data[0].A2_PRECIO).siblings().addClass("active");
      					$.adicional2();
      				}
      				else
      				{
      					$("#adic2").val("").siblings().addClass("active");
      					$("#costoadic2").val("0").siblings().addClass("active"); 
      					$.subtotal();     					
      				} 
      				if(result.data[0].A3_DESC !="")
      				{
      					$("#adic3").val(result.data[0].A3_DESC).siblings().addClass("active");
      					$("#costoadic3").val(result.data[0].A3_PRECIO).siblings().addClass("active");
      					$.adicional3();
      				}
      				else
      				{
      					$("#adic3").val("").siblings().addClass("active");
      					$("#costoadic3").val("0").siblings().addClass("active"); 
      					$.subtotal();     					
      				}
      				if(result.data[0].A4_DESC !="")
      				{
      					$("#adic4").val(result.data[0].A4_DESC).siblings().addClass("active");
      					$("#costoadic4").val(result.data[0].A4_PRECIO).siblings().addClass("active");
      					$.adicional4();
      				}
      				else
      				{
      					$("#adic4").val("").siblings().addClass("active");
      					$("#costoadic4").val("0").siblings().addClass("active"); 
      					$.subtotal();     					
      				}   
      				if(result.data[0].A5_DESC !="")
      				{
      					$("#adic5").val(result.data[0].A5_DESC).siblings().addClass("active");
      					$("#costoadic5").val(result.data[0].A5_PRECIO).siblings().addClass("active");
      					$.adicional5();
      				}
      				else
      				{
      					$("#adic5").val("").siblings().addClass("active");
      					$("#costoadic5").val("0").siblings().addClass("active"); 
      					$.subtotal();     					
      				}   
      				if(result.data[0].A6_DESC !="")
      				{
      					$("#adic6").val(result.data[0].A6_DESC).siblings().addClass("active");
      					$("#costoadic6").val(result.data[0].A6_PRECIO).siblings().addClass("active");
      					$.adicional6();
      				}
      				else
      				{
      					$("#adic6").val("").siblings().addClass("active");
      					$("#costoadic6").val("0").siblings().addClass("active"); 
      					$.subtotal();     					
      				}   

					//EXTRAER OBSERVACIONES
      				if(result.data[0].OBSERVACIONES !="")
      				{
      					$("#observaciones").val(result.data[0].OBSERVACIONES).siblings().addClass("active");
      					$("#costoadic6").val(result.data[0].A6_PRECIO).siblings().addClass("active");
      				}					      				    				     				    				       				       				  				     				       				      				      				  				      				

				}
            },"json"
        );
	});
});