$(document).ready(function()
{
    //var MedEspecial = "";
    //replace(',', "") -> se sustituyo por la siguiente replace(/,/gi,'')
    //se sustituyo la funcion currency, se comentaron las anteriores
    
    //--------------------------------------------------------------------------
    //         CALCULAR LA CANTIDAD TOTAL DE ANCHO Y ALTO DE LAS PZAS
    //--------------------------------------------------------------------------

    $.totalAncho = function()
    {
        if ($("#ancho").value == "")
        {
            $("#ancho").val(0);
        }
        else if ($("#medancho").value == "")
        {
            $("#medancho").val(0);
        }
        else
        {
            parseFloat($("#totancho").val(parseFloat($("#ancho").val())+parseFloat($("#medancho").val())));
        }
    }
    
    $.totalAlto = function()
    {
        if ($("#alto").value == "")
        {
            $("#alto").val(0);
        }
        else if ($("#medalto").value == "")
        {
            $("#medalto").val(0);
        }
        else 
        {
            parseFloat($("#totalto").val(parseFloat($("#alto").val()) + parseFloat($("#medalto").val())));
        }	
    }
    
    //--------------------------------------------------------------------------
    //                  Calcular costo de medidas especial
    //--------------------------------------------------------------------------
    $("#mat_especial").click(function(){
        $("#dialog_mat_especial").modal('open');
    });

    $("#limpiar").click(function(){
        $.limpiar_form();
    });

    $("#aceptar7").click(function(){
        if($("#proveedor_form_mat").val() == "")
        {
            $("#dialogoerror").html("");
            $("#dialogoerror").html('<center><span style="color:red;">El campo de PROVEEDOR no puede quedar vacio</span></center>');
            $("#dialogoerror").modal("open");
        }
        else
        {
            $.mat_espacial();
            $("#dialog_mat_especial").modal("close");
        }
    });

    $("#cancelar6").click(function(){
        $("#dialog_mat_especial").dialog("close");
        
        $("#mat_especial").prop("checked", false);
        $("#div_medida_especial").hide();
        $("#div_material").show();
        $("#div_medidas").show();
    });
    
    $.mat_espacial = function()
    {
        $("#medida_especial").empty("<option>");
        
        var materal_especial=$("#form_mat_especial_mat").serialize();
        $.post("modelo/nuevo_mat_especial.php",materal_especial,
            function(data)
            {
                if(data.validacion=="true")
                {
                    $('#medida_especial').append($('<option>',
                    {
                        checked: true,
                        value: data.idMat,
                        text: data.Nombre
                    }));
                    
                    if (data.Tipo == "R")
                    {
                        var mattipo = "MATERIAL RIGIDO";
                    }
                    else if (data.Tipo == "F")
                    {
                        var mattipo = "MATERIAL FLEXIBLE";
                    }
                    else if (data.Tipo == "P")
                    {
                        var mattipo = "MATERIAL FOTOGRAFICO";
                    }
                    
                    $("#titMat2").html(mattipo);
                    
                    MedEspecial = data.idMat;
                    $.med_especial();
                    //$("#dialogoguardar2").html('<br/><center>Se dio de alta correctamente el material especial '+data.Nombre+'</center>');
                    //$("#dialogoguardar2").dialog("open");
                }
                if(data.validacion=="false")
                {
                    $("#dialog_mat_especial").modal("open");
                    $("#dialogoerror").html("");
                    $("#dialogoerror").html('<center><span style="color:red;">Verifica que esten llenos los sig. campos: <b>Nombre</b>, <b>Ancho</b>, <b>Alto</b> e <b>importe</b></span></center>');
                    $("#dialogoerror").modal("open");
                    
                    $("#mat_especial").prop("checked", false);
                    $("#div_medida_especial").hide();
                    $("#div_material").show();
                    $("#div_medidas").show();
                }
            },"json"
        );
    }
    
    $.med_especial = function()
    {
        var medidaEsp = "medidaEsp="+ MedEspecial;
        //alert(medidaEsp);
        $.post("modelo/mat_especial.php", medidaEsp,
        function(data)
            {
                if(data.validacion=="true")
                {
                    for(var i=0; i<data.rows.length; i++)
                    {
                        var id_medidas = "1";
                        var Ancho = parseFloat(data.rows[i].ANCHO);
                        var Alto = parseFloat(data.rows[i].ALTO);
                        var tipo=data.rows[i].TIPO;
                        var precio=data.rows[i].IMPORTE;
                        //alert(id_medidas + " " + Ancho + " " + Alto + " " + tipo + " " + precio);
                        $.costomedida(id_medidas, Ancho, Alto, tipo, precio);
                    }
                }
                if(data.validacion=="false")
                {
                    //alert("Error");
                    //no hay otra condicion...
                }
            },"json"
        );
    }
    
    $.limpiar_form = function()
    {
        $("#nom_form_mat").val("");
        $("#ancho_form_mat").val("");
        $("#alto_form_mat").val("");
        $("#material_form_mat").val("F");
        $("#importe_form_mat").val("");
        $("#proveedor_form_mat").val("");
        $("#traslucido_form_mat_no").prop("checked", true);
        $("#corte_form_mat").val("N");
    }
    
    //--------------------------------------------------------------------------
    //                      Calcular costo de medidas
    //--------------------------------------------------------------------------
    
    $.tabla_medidas = function()
    {
        var id_material=$('#material').val();
        var v_id_material="Id_Material="+id_material;
        $.post('modelo/medidas.php',v_id_material,
            function(data)
            {
                if(data.validacion=="true")
                {
                    for(var i=0; i<data.rows.length; i++)
                    {
                        var tipo=data.rows[i].M_Tipo;
                        var precio=data.rows[i].Importe;
                        var id_medidas=$("#medidas").val();
                        
                        if(id_medidas==0)
                        {
                            //$.clear();
                            //alert(id_medidas + " " + tipo + " " + precio);
                            var id_medidas = "0";
                            var Ancho = "0";
                            var Alto = "0";
                            var tipo = "0";
                            var precio = "0";
                            $.costomedida(id_medidas, Ancho, Alto, tipo, precio);
                        }
                        else if(id_medidas==1)
                        {
                            var Ancho = parseFloat(data.rows[i].ANCHO1);
                            var Alto = parseFloat(data.rows[i].ALTO1);
                            var id_medidas = data.rows[i].Medida_Mat_1;
                            //alert(id_medidas + " " + Ancho + " " + Alto + " " + tipo + " " + precio);
                            $.costomedida(id_medidas, Ancho, Alto, tipo, precio);
                        }
                        else if(id_medidas==2)
                        {
                            var Ancho = parseFloat(data.rows[i].ANCHO2);
                            var Alto = parseFloat(data.rows[i].ALTO2);
                            var id_medidas = data.rows[i].Medida_Mat_2;
                            //alert(id_medidas + " " + Ancho + " " + Alto + " " + tipo + " " + precio);
                            $.costomedida(id_medidas, Ancho, Alto, tipo, precio);
                        }
                        else if(id_medidas==3)
                        {
                            var Ancho = parseFloat(data.rows[i].ANCHO3);
                            var Alto = parseFloat(data.rows[i].ALTO3);
                            var id_medidas = data.rows[i].Medida_Mat_3;
                            //alert(id_medidas + " " + Ancho + " " + Alto + " " + tipo + " " + precio);
                            $.costomedida(id_medidas, Ancho, Alto, tipo, precio);
                        }
                        else if(id_medidas==4)
                        {
                            var Ancho = parseFloat(data.rows[i].ANCHO4);
                            var Alto = parseFloat(data.rows[i].ALTO4);
                            var id_medidas = data.rows[i].Medida_Mat_4;
                            //alert(id_medidas + " " + Ancho + " " + Alto + " " + tipo + " " + precio);
                            $.costomedida(id_medidas, Ancho, Alto, tipo, precio);
                        }
                        else if(id_medidas==5)
                        {
                            var Ancho = parseFloat(data.rows[i].ANCHO5);
                            var Alto = parseFloat(data.rows[i].ALTO5);
                            var id_medidas = data.rows[i].Medida_Mat_5;
                            //alert(id_medidas + " " + Ancho + " " + Alto + " " + tipo + " " + precio);
                            $.costomedida(id_medidas, Ancho, Alto, tipo, precio);
                        }
                    }
                }
                if(data.validacion=="false")
                {
                    //no hay otra condicion...
                }
            },"json"
        );
        return false;
    }
    
    $.costomedida = function(id_medidas, Ancho, Alto, tipo, precio)
    {
        var id_medidas = id_medidas;
        var Ancho = Ancho;
        var Alto = Alto;
        var tipo = tipo;
        var precio = precio;
        
        //alert(id_medidas + " " + Ancho + " " + Alto + " " + tipo + " " + precio);
        
        var totAncho=$("#totancho").val();
        var totAlto=$("#totalto").val();
        var cantidad = $("#cantidad").val();
        var cantidad2 = 0;
        var entran = 0;
        var textoEntran = "entran";
        var valor = 0;
        var valor1 = 0;
        var resAncho = 0;
        var resAlto = 0;
        var resAncho2 = 0;
        var resAlto2 = 0;
        var orientacionAncho = 0;
        var orientacionAlto = 0;
        var aprovech = 0;
        var porcentaje = 0;
        var anchom = 0;
        var altom = 0;
        var anchoMat = 0;
        var entranAncho = 0;
        var entranAlto = 0;
        var a_lo_ancho = 0;
        var a_lo_alto = 0;
        
        //alert(id_medidas + " " + Ancho + " " + Alto + " " + tipo + " " + precio);
        
        if(id_medidas == "0")
        {
            $('#m_medida').val("1");
            $('#m_ancho').val("0");
            $('#m_alto').val("0");
            $('#m_entra').val("0");
            $('#m_aprov').val("0");
            $('#m_orienta').val("N/A");
            $("#resCant").val("0");
            $("#titCantMat").html('');
            $("#resPrecio").val("0");
        }
        else
        {
            if (tipo== "R")
            {
                //Calcular a lo ancho/ancho...
                resAncho = (Ancho / parseFloat(totAncho));
                resAlto = (Alto / parseFloat(totAlto));

                //Calcular a lo alto/alto...
                resAncho2 = (Ancho / parseFloat(totAlto));
                resAlto2 = (Alto / parseFloat(totAncho));

                //Calcular cuantas piezas entran a lo ancho y a lo alto...
                orientacionAncho = (parseInt(resAncho) * parseInt(resAlto));
                orientacionAlto = (parseInt(resAncho2) * parseInt(resAlto2));

                //Validar con que orientaci�n entran m�s...
                if ( orientacionAncho > orientacionAlto )
                {
                    entran = orientacionAncho;
                    textoEntran = "A lo ancho";

                } 
                else if ( orientacionAncho < orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto"; 
                }
                else if ( orientacionAncho == orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto";
                }							

                //Obtener el porcentaje de Aprovechamiento...
                aprovech = (( parseFloat(totAncho) * parseFloat(totAlto) * parseInt(entran) ) / (Ancho * Alto)) * 100;
                porcentaje = aprovech.toFixed(2);

                //Cuentas Cantidad y Precio
                cantidad2 = (cantidad / entran);
                $("#resCant").val(Math.ceil(cantidad2));
                $("#titCantMat").html('Pzas.');
                
                anchom = (Ancho/100);
                altom = (Alto/100);
                valor = (anchom * altom * $("#resCant").val() * precio * 1.1);
                
                $("#resPrecio").val(currency(valor));
            }
            else if (tipo== "F")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(Ancho / totAncho);
                entranAlto = parseInt(Ancho / totAlto);	 

                a_lo_ancho = Math.ceil(cantidad / parseInt(Ancho / totAncho))*totAlto;
                a_lo_alto = Math.ceil(cantidad / parseInt(Ancho / totAlto))*totAncho;

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    var res22 = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_ancho));
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    var res22 = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_alto));
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    var res22 = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_alto));
                }
                else
                {
                    //no hay otra condicion...
                }

                //Cuentas Cantidad y Precio
                if (a_lo_ancho < a_lo_alto)
                {
                    anchoMat = parseFloat(Ancho)/100;
                    a_lo_ancho = parseFloat(a_lo_ancho)/100;
                    cantidad = parseFloat(anchoMat) * parseFloat(a_lo_ancho);
                    cantidad = cantidad / anchoMat;
                    cantidad = cantidad.toFixed(2);
                }
                else
                {
                    anchoMat = parseFloat(Ancho)/100;
                    a_lo_alto = parseFloat(a_lo_alto)/100;
                    cantidad = parseFloat(anchoMat) * parseFloat(a_lo_alto);
                    cantidad = cantidad / anchoMat;
                    cantidad = cantidad.toFixed(2);
                }

                $("#resCant").val(cantidad);
                $("#titCantMat").html('m.');

                valor = (precio * cantidad);
                valor = (valor * (Ancho / 100)) * 1.1;
                
                $("#resPrecio").val(currency(valor));
            }
            else if (tipo== "P")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(Ancho / totAncho);
                entranAlto = parseInt(Ancho / totAlto);	 

                a_lo_ancho = Math.ceil(cantidad / parseInt(Ancho / totAncho))*totAlto;
                a_lo_alto = Math.ceil(cantidad / parseInt(Ancho / totAlto))*totAncho;

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    var res22 = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_ancho));
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    var res22 = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_alto));
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    var res22 = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_alto));
                }
                else
                {
                    //no hay otra condicion...
                }

                //Cuentas Cantidad y Precio
                if (a_lo_ancho < a_lo_alto)
                {
                    anchoMat = parseFloat(Ancho)/100;
                    a_lo_ancho = parseFloat(a_lo_ancho)/100;
                    cantidad = parseFloat(anchoMat) * parseFloat(a_lo_ancho);
                    cantidad = cantidad / anchoMat;
                    cantidad = cantidad.toFixed(2);
                }
                else
                {
                    anchoMat = parseFloat(Ancho)/100;
                    a_lo_alto = parseFloat(a_lo_alto)/100;
                    cantidad = parseFloat(anchoMat) * parseFloat(a_lo_alto);
                    cantidad = cantidad / anchoMat;
                    cantidad = cantidad.toFixed(2);
                }

                $("#resCant").val(cantidad);
                $("#titCantMat").html('m.');

                valor = (precio * cantidad);
                valor = (valor * (Ancho / 100)) * 1.1;
                
                $("#resPrecio").val(currency(valor));
            }

            $('#m_medida').val(id_medidas);
            $('#m_ancho').val(Ancho);
            $('#m_alto').val(Alto);
            $('#m_entra').val(entran);
            $('#m_aprov').val(porcentaje);
            $('#m_orienta').val(textoEntran);
            $.calculos();
        }
    }
    
    //--------------------------------------------------------------------------
    //               FUNCI�N PARA CALCULAR LA RESOLUCION 720 
    //--------------------------------------------------------------------------

    $.resolucion720 = function()
    {
        var tinta = "0";
        var tipo = "0";
        var Traslucido = "0";
        var resolucion= "720";
        var costoTraslucido = "0";
        var ancho = $("#totancho").val();
        var alto = $("#totalto").val();
        var cantidad = $("#cantidad").val();
        var material = $("#material").val();
        //var PasadasImpresio = $("#pasadas_imp").val();

        if($("#mat_especial").prop("checked") == true)
        {
            var medidaEsp = "medidaEsp="+MedEspecial;
            $.post("modelo/mat_especial.php", medidaEsp,
            function(data)
                {
                    if(data.validacion=="true")
                    {
                        for(var i=0; i<data.rows.length; i++)
                        {
                            Traslucido=data.rows[i].medidaEspecial;
                            tipo=data.rows[i].TIPO;

                            if (Traslucido == 1) 
                            {
                                tinta = "4";
                                var id="id="+tinta;
                                $.post("modelo/tintas.php",id,
                                    function(data)
                                    {
                                        if(data.validacion_tinta=="true")
                                        {
                                            for(var i=0; i<data.rowdos.length; i++)
                                            {
                                                costoTraslucido = data.rowdos[i].baja;

                                                if (tipo == "R")
                                                {
                                                    tinta = "1";
                                                }
                                                else if (tipo == "F")
                                                {
                                                    tinta = "2";
                                                }
                                                else if (tipo == "P")
                                                {
                                                    tinta = "5";
                                                }

                                                var id="id="+tinta;
                                                $.post("modelo/tintas.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_tinta=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                //--Variables de la Base de Datos...
                                                                var idTintaBD=data.rowdos[i].id_Tinta;
                                                                var tintaBD=data.rowdos[i].tinta;
                                                                var costoBajaBD=data.rowdos[i].baja;
                                                                var costoAltaBD=data.rowdos[i].alta;

                                                                tinta = "6";
                                                                var id="id="+tinta;
                                                                $.post("modelo/tintas.php",id,
                                                                    function(data)
                                                                    {
                                                                        if(data.validacion_tinta=="true")
                                                                        {
                                                                            for(var i=0; i<data.rowdos.length; i++)
                                                                            {
                                                                                //--Variables de la Base de Datos...
                                                                                var costoImpBaja=data.rowdos[i].baja;
                                                                                var costoImpAlta=data.rowdos[i].alta;

                                                                                //alert ("Data: " + data + " Tinta: " + tinta + " Resolucion: " + resolucion + " Ancho: " + ancho + " Alto: " + alto + " Cantidad: " + cantidad + " Costo Translucido: " + costoTraslucido + " ID Tinta: " + idTintaBD + " Tinta: " + tintaBD + " Costo Baja: " + costoBajaBD + " Costo Alta: " + costoAltaBD);
                                                                                calcTinta(resolucion, ancho, alto, cantidad, costoTraslucido, costoBajaBD, costoAltaBD, costoImpBaja, costoImpAlta);
                                                                                //PasadasImpresio
                                                                            }
                                                                        }
                                                                    },"json"
                                                                );
                                                                return false;
                                                            }
                                                        }
                                                    },"json"
                                                );
                                                return false;
                                            }
                                        }
                                    },"json"
                                );
                                return false;
                            }
                            else
                            {
                                if (tipo == "R")
                                {
                                    tinta = "1";
                                }
                                else if (tipo == "F")
                                {
                                    tinta = "2";
                                }
                                else if (tipo == "P")
                                {
                                    tinta = "5";
                                }

                                var id="id="+tinta;
                                $.post("modelo/tintas.php",id,
                                    function(data)
                                    {
                                        if(data.validacion_tinta=="true")
                                        {
                                            for(var i=0; i<data.rowdos.length; i++)
                                            {
                                                //--Variables de la Base de Datos...
                                                var idTintaBD=data.rowdos[i].id_Tinta;
                                                var tintaBD=data.rowdos[i].tinta;
                                                var costoBajaBD=data.rowdos[i].baja;
                                                var costoAltaBD=data.rowdos[i].alta;

                                                tinta = "6";
                                                var id="id="+tinta;
                                                $.post("modelo/tintas.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_tinta=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                //--Variables de la Base de Datos...
                                                                var costoImpBaja=data.rowdos[i].baja;
                                                                var costoImpAlta=data.rowdos[i].alta;

                                                                //alert ("Data: " + data + " Tinta: " + tinta + " Resolucion: " + resolucion + " Ancho: " + ancho + " Alto: " + alto + " Cantidad: " + cantidad + " Costo Translucido: " + costoTraslucido + " ID Tinta: " + idTintaBD + " Tinta: " + tintaBD + " Costo Baja: " + costoBajaBD + " Costo Alta: " + costoAltaBD);
                                                                calcTinta(resolucion, ancho, alto, cantidad, costoTraslucido, costoBajaBD, costoAltaBD, costoImpBaja, costoImpAlta);
                                                                //PasadasImpresio
                                                            }
                                                        }
                                                    },"json"
                                                );
                                                return false;
                                            }
                                        }
                                    },"json"
                                );
                                return false;
                            }
                        }
                    }
                    if(data.validacion=="false")
                    {
                        alert("Error");
                        //no hay otra condicion...
                    }
                },"json"
            );
        }
        else
        {
            var id_material=material;
            var v_id_material="Id_Material="+id_material;
            $.post("modelo/medidas.php",v_id_material,
                function(data)
                {
                    if(data.validacion=="true")
                    {
                        for(var i=0; i<data.rows.length; i++)
                        {
                            Traslucido=data.rows[i].Traslucido;
                            tipo=data.rows[i].M_Tipo;
                            //alert(Traslucido + " " + tipo);

                            if (Traslucido == 1)
                            {
                                tinta = "4";
                                var id="id="+tinta;
                                $.post("modelo/tintas.php",id,
                                    function(data)
                                    {
                                        if(data.validacion_tinta=="true")
                                        {
                                            for(var i=0; i<data.rowdos.length; i++)
                                            {
                                                costoTraslucido = data.rowdos[i].baja;

                                                if (tipo == "R")
                                                {
                                                    tinta = "1";
                                                }
                                                else if (tipo == "F")
                                                {
                                                    tinta = "2";
                                                }
                                                else if (tipo == "P")
                                                {
                                                    tinta = "5";
                                                }

                                                var id="id="+tinta;
                                                $.post("modelo/tintas.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_tinta=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                //--Variables de la Base de Datos...
                                                                var idTintaBD=data.rowdos[i].id_Tinta;
                                                                var tintaBD=data.rowdos[i].tinta;
                                                                var costoBajaBD=data.rowdos[i].baja;
                                                                var costoAltaBD=data.rowdos[i].alta;

                                                                tinta = "6";
                                                                var id="id="+tinta;
                                                                $.post("modelo/tintas.php",id,
                                                                    function(data)
                                                                    {
                                                                        if(data.validacion_tinta=="true")
                                                                        {
                                                                            for(var i=0; i<data.rowdos.length; i++)
                                                                            {
                                                                                //--Variables de la Base de Datos...
                                                                                var costoImpBaja=data.rowdos[i].baja;
                                                                                var costoImpAlta=data.rowdos[i].alta;

                                                                                //alert ("Data: " + data + " Tinta: " + tinta + " Resolucion: " + resolucion + " Ancho: " + ancho + " Alto: " + alto + " Cantidad: " + cantidad + " Costo Translucido: " + costoTraslucido + " ID Tinta: " + idTintaBD + " Tinta: " + tintaBD + " Costo Baja: " + costoBajaBD + " Costo Alta: " + costoAltaBD);
                                                                                calcTinta(resolucion, ancho, alto, cantidad, costoTraslucido, costoBajaBD, costoAltaBD, costoImpBaja, costoImpAlta);
                                                                                //PasadasImpresio
                                                                            }
                                                                        }
                                                                    },"json"
                                                                );
                                                                return false;
                                                            }
                                                        }
                                                    },"json"
                                                );
                                                return false;
                                            }
                                        }
                                    },"json"
                                );
                                return false;
                            }
                            else
                            {
                                if (tipo == "R")
                                {
                                    tinta = "1";
                                }
                                else if (tipo == "F")
                                {
                                    tinta = "2";
                                }
                                else if (tipo == "P")
                                {
                                    tinta = "5";
                                }

                                var id="id="+tinta;
                                $.post("modelo/tintas.php",id,
                                    function(data)
                                    {
                                        if(data.validacion_tinta=="true")
                                        {
                                            for(var i=0; i<data.rowdos.length; i++)
                                            {
                                                //--Variables de la Base de Datos...
                                                var idTintaBD=data.rowdos[i].id_Tinta;
                                                var tintaBD=data.rowdos[i].tinta;
                                                var costoBajaBD=data.rowdos[i].baja;
                                                var costoAltaBD=data.rowdos[i].alta;

                                                tinta = "6";
                                                var id="id="+tinta;
                                                $.post("modelo/tintas.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_tinta=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                //--Variables de la Base de Datos...
                                                                var costoImpBaja=data.rowdos[i].baja;
                                                                var costoImpAlta=data.rowdos[i].alta;

                                                                //alert ("Data: " + data + " Tinta: " + tinta + " Resolucion: " + resolucion + " Ancho: " + ancho + " Alto: " + alto + " Cantidad: " + cantidad + " Costo Translucido: " + costoTraslucido + " ID Tinta: " + idTintaBD + " Tinta: " + tintaBD + " Costo Baja: " + costoBajaBD + " Costo Alta: " + costoAltaBD);
                                                                calcTinta(resolucion, ancho, alto, cantidad, costoTraslucido, costoBajaBD, costoAltaBD, costoImpBaja, costoImpAlta);
                                                                //PasadasImpresio
                                                            }
                                                        }
                                                    },"json"
                                                );
                                                return false;
                                            }
                                        }
                                    },"json"
                                );
                                return false;
                            }
                        }
                    }
                },"json"
            );
            return false;
        }
    }
    
    //--------------------------------------------------------------------------
    //              FUNCI�N PARA CALCULAR LA RESOLUCION 1440 
    //--------------------------------------------------------------------------

    $.resolucion1440 = function()
    {
        var tinta = "0";
        var tipo = "0";
        var Traslucido = "0";
        var resolucion= "1440";
        var costoTraslucido = "0";
        var ancho = $("#totancho").val();
        var alto = $("#totalto").val();
        var cantidad = $("#cantidad").val();
        var material = $("#material").val();
        //var PasadasImpresio = $("#pasadas_imp").val();
        
        if($("#mat_especial").prop("checked") == true)
        {
            var medidaEsp = "medidaEsp="+MedEspecial;
            $.post("modelo/mat_especial.php", medidaEsp,
            function(data)
                {
                    if(data.validacion=="true")
                    {
                        for(var i=0; i<data.rows.length; i++)
                        {
                            Traslucido=data.rows[i].medidaEspecial;
                            tipo=data.rows[i].TIPO;

                            if (Traslucido == 1) 
                            {
                                tinta = "4";
                                var id="id="+tinta;
                                $.post("modelo/tintas.php",id,
                                    function(data)
                                    {
                                        if(data.validacion_tinta=="true")
                                        {
                                            for(var i=0; i<data.rowdos.length; i++)
                                            {
                                                costoTraslucido = data.rowdos[i].baja;

                                                if (tipo == "R")
                                                {
                                                    tinta = "1";
                                                }
                                                else if (tipo == "F")
                                                {
                                                    tinta = "2";
                                                }
                                                else if (tipo == "P")
                                                {
                                                    tinta = "5";
                                                }

                                                var id="id="+tinta;
                                                $.post("modelo/tintas.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_tinta=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                //--Variables de la Base de Datos...
                                                                var idTintaBD=data.rowdos[i].id_Tinta;
                                                                var tintaBD=data.rowdos[i].tinta;
                                                                var costoBajaBD=data.rowdos[i].baja;
                                                                var costoAltaBD=data.rowdos[i].alta;

                                                                tinta = "6";
                                                                var id="id="+tinta;
                                                                $.post("modelo/tintas.php",id,
                                                                    function(data)
                                                                    {
                                                                        if(data.validacion_tinta=="true")
                                                                        {
                                                                            for(var i=0; i<data.rowdos.length; i++)
                                                                            {
                                                                                //--Variables de la Base de Datos...
                                                                                var costoImpBaja=data.rowdos[i].baja;
                                                                                var costoImpAlta=data.rowdos[i].alta;

                                                                                //alert ("Data: " + data + " Tinta: " + tinta + " Resolucion: " + resolucion + " Ancho: " + ancho + " Alto: " + alto + " Cantidad: " + cantidad + " Costo Translucido: " + costoTraslucido + " ID Tinta: " + idTintaBD + " Tinta: " + tintaBD + " Costo Baja: " + costoBajaBD + " Costo Alta: " + costoAltaBD);
                                                                                calcTinta(resolucion, ancho, alto, cantidad, costoTraslucido, costoBajaBD, costoAltaBD, costoImpBaja, costoImpAlta);
                                                                                //PasadasImpresio
                                                                            }
                                                                        }
                                                                    },"json"
                                                                );
                                                                return false;
                                                            }
                                                        }
                                                    },"json"
                                                );
                                                return false;
                                            }
                                        }
                                    },"json"
                                );
                                return false;
                            }
                            else
                            {
                                if (tipo == "R")
                                {
                                    tinta = "1";
                                }
                                else if (tipo == "F")
                                {
                                    tinta = "2";
                                }
                                else if (tipo == "P")
                                {
                                    tinta = "5";
                                }

                                var id="id="+tinta;
                                $.post("modelo/tintas.php",id,
                                    function(data)
                                    {
                                        if(data.validacion_tinta=="true")
                                        {
                                            for(var i=0; i<data.rowdos.length; i++)
                                            {
                                                //--Variables de la Base de Datos...
                                                var idTintaBD=data.rowdos[i].id_Tinta;
                                                var tintaBD=data.rowdos[i].tinta;
                                                var costoBajaBD=data.rowdos[i].baja;
                                                var costoAltaBD=data.rowdos[i].alta;

                                                tinta = "6";
                                                var id="id="+tinta;
                                                $.post("modelo/tintas.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_tinta=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                //--Variables de la Base de Datos...
                                                                var costoImpBaja=data.rowdos[i].baja;
                                                                var costoImpAlta=data.rowdos[i].alta;

                                                                //alert ("Data: " + data + " Tinta: " + tinta + " Resolucion: " + resolucion + " Ancho: " + ancho + " Alto: " + alto + " Cantidad: " + cantidad + " Costo Translucido: " + costoTraslucido + " ID Tinta: " + idTintaBD + " Tinta: " + tintaBD + " Costo Baja: " + costoBajaBD + " Costo Alta: " + costoAltaBD);
                                                                calcTinta(resolucion, ancho, alto, cantidad, costoTraslucido, costoBajaBD, costoAltaBD, costoImpBaja, costoImpAlta);
                                                                //PasadasImpresio
                                                            }
                                                        }
                                                    },"json"
                                                );
                                                return false;
                                            }
                                        }
                                    },"json"
                                );
                                return false;
                            }
                        }
                    }
                    if(data.validacion=="false")
                    {
                        alert("Error");
                        //no hay otra condicion...
                    }
                },"json"
            );
        }
        else
        {
            var id_material=$("#material").val();
            var v_id_material="Id_Material="+id_material;
            $.post("modelo/medidas.php",v_id_material,
                function(data)
                {
                    if(data.validacion=="true")
                    {
                        for(var i=0; i<data.rows.length; i++)
                        {
                            Traslucido=data.rows[i].Traslucido;
                            tipo=data.rows[i].M_Tipo;

                            if (Traslucido == 1) 
                            {
                                tinta = "4";
                                var id="id="+tinta;
                                $.post("modelo/tintas.php",id,
                                    function(data)
                                    {
                                        if(data.validacion_tinta=="true")
                                        {
                                            for(var i=0; i<data.rowdos.length; i++)
                                            {
                                                costoTraslucido = data.rowdos[i].baja;

                                                if (tipo == "R")
                                                {
                                                    tinta = "1";
                                                }
                                                else if (tipo == "F")
                                                {
                                                    tinta = "2";
                                                }
                                                else if (tipo == "P")
                                                {
                                                    tinta = "5";
                                                }

                                                var id="id="+tinta;
                                                $.post("modelo/tintas.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_tinta=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                //--Variables de la Base de Datos...
                                                                var idTintaBD=data.rowdos[i].id_Tinta;
                                                                var tintaBD=data.rowdos[i].tinta;
                                                                var costoBajaBD=data.rowdos[i].baja;
                                                                var costoAltaBD=data.rowdos[i].alta;

                                                                tinta = "6";
                                                                var id="id="+tinta;
                                                                $.post("modelo/tintas.php",id,
                                                                    function(data)
                                                                    {
                                                                        if(data.validacion_tinta=="true")
                                                                        {
                                                                            for(var i=0; i<data.rowdos.length; i++)
                                                                            {
                                                                                //--Variables de la Base de Datos...
                                                                                var costoImpBaja=data.rowdos[i].baja;
                                                                                var costoImpAlta=data.rowdos[i].alta;

                                                                                //alert ("Data: " + data + " Tinta: " + tinta + " Resolucion: " + resolucion + " Ancho: " + ancho + " Alto: " + alto + " Cantidad: " + cantidad + " Costo Translucido: " + costoTraslucido + " ID Tinta: " + idTintaBD + " Tinta: " + tintaBD + " Costo Baja: " + costoBajaBD + " Costo Alta: " + costoAltaBD);
                                                                                calcTinta(resolucion, ancho, alto, cantidad, costoTraslucido, costoBajaBD, costoAltaBD, costoImpBaja, costoImpAlta);
                                                                                //PasadasImpresio
                                                                            }
                                                                        }
                                                                    },"json"
                                                                );
                                                                return false;
                                                            }
                                                        }
                                                    },"json"
                                                );
                                                return false;
                                            }
                                        }
                                    },"json"
                                );
                                return false;
                            }
                            else
                            {
                                if (tipo == "R")
                                {
                                    tinta = "1";
                                }
                                else if (tipo == "F")
                                {
                                    tinta = "2";
                                }
                                else if (tipo == "P")
                                {
                                    tinta = "5";
                                }

                                var id="id="+tinta;
                                $.post("modelo/tintas.php",id,
                                    function(data)
                                    {
                                        if(data.validacion_tinta=="true")
                                        {
                                            for(var i=0; i<data.rowdos.length; i++)
                                            {
                                                //--Variables de la Base de Datos...
                                                var idTintaBD=data.rowdos[i].id_Tinta;
                                                var tintaBD=data.rowdos[i].tinta;
                                                var costoBajaBD=data.rowdos[i].baja;
                                                var costoAltaBD=data.rowdos[i].alta;

                                                tinta = "6";
                                                var id="id="+tinta;
                                                $.post("modelo/tintas.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_tinta=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                //--Variables de la Base de Datos...
                                                                var costoImpBaja=data.rowdos[i].baja;
                                                                var costoImpAlta=data.rowdos[i].alta;

                                                                //alert ("Data: " + data + " Tinta: " + tinta + " Resolucion: " + resolucion + " Ancho: " + ancho + " Alto: " + alto + " Cantidad: " + cantidad + " Costo Translucido: " + costoTraslucido + " ID Tinta: " + idTintaBD + " Tinta: " + tintaBD + " Costo Baja: " + costoBajaBD + " Costo Alta: " + costoAltaBD);
                                                                calcTinta(resolucion, ancho, alto, cantidad, costoTraslucido, costoBajaBD, costoAltaBD, costoImpBaja, costoImpAlta);
                                                                //PasadasImpresio
                                                            }
                                                        }
                                                    },"json"
                                                );
                                                return false;
                                            }
                                        }
                                    },"json"
                                );
                                return false;
                            }

                        }
                    }
                },"json"
            );
            return false;
        }
    }
    
    $.resolucion0 = function()
    {
        var tinta="0";
        var resolucion="0";
        var ancho="0";
        var alto="0";
        var cantidad="0";
        //var PasadasImpresio = "1";
        var costoTraslucido="0";
        var idTintaBD="0";
        var tintaBD="0";
        var costoBajaBD="0";
        var costoAltaBD="0";
        var costoImpBaja="0";
        var costoImpAlta="0";

        calcTinta(resolucion, ancho, alto, cantidad, costoTraslucido, costoBajaBD, costoAltaBD, costoImpBaja, costoImpAlta);
        //PasadasImpresio
    }
    
    $.Sandwich = function()
    {
        var tinta = "7";
        var resolucion="Sandwich";
        var ancho = $("#totancho").val();
        var alto = $("#totalto").val();
        var cantidad = $("#cantidad").val();
        //var PasadasImpresio = $("#pasadas_imp").val();
        
        var costoTraslucido="0";
        var costoAltaBD="0";
        var costoImpBaja="0";
        var costoImpAlta="0";
        
        var id="id="+tinta;
        $.post("modelo/tintas.php",id,
            function(data)
            {
                if(data.validacion_tinta=="true")
                {
                    for(var i=0; i<data.rowdos.length; i++)
                    {
                        //--Variables de la Base de Datos...
                        var costoBajaBD=data.rowdos[i].baja;

                        //alert ("Data: " + data + " Tinta: " + tinta + " Resolucion: " + resolucion + " Ancho: " + ancho + " Alto: " + alto + " Cantidad: " + cantidad + " Costo Translucido: " + costoTraslucido + " ID Tinta: " + idTintaBD + " Tinta: " + tintaBD + " Costo Baja: " + costoBajaBD + " Costo Alta: " + costoAltaBD);
                        calcTinta(resolucion, ancho, alto, cantidad, costoTraslucido, costoBajaBD, costoAltaBD, costoImpBaja, costoImpAlta);
                        //PasadasImpresio
                    }
                }
            },"json"
        );
        return false;
    }

    //--------------------------------------------------------------------------
    //      CALCULAR LA TINTA DE LOS MATERIALES RIGIDOS,FLEXIBLES,...ETC.
    //           EN BAJA RESOLUCION (720) Y ALTA RESOLUCION(1440)
    //--------------------------------------------------------------------------

    function calcTinta(resolucion, ancho, alto, cantidad, costoTraslucido, costoBajaBD, costoAltaBD, costoImpBaja, costoImpAlta) //PasadasImpresio
    {
        //--Variables necesarias para la funcion...........
        var resolucion = resolucion;
        var ancho = ancho;
        var alto = alto;
        var cantidad = cantidad;
        var costoTraslucido = costoTraslucido;
        //var PasadasImpresio = PasadasImpresio;
        var costoImpBaja = costoImpBaja;
        var costoImpAlta = costoImpAlta;

        //--Variables de la Base de Datos...
        var costoBajaBD = costoBajaBD;
        var costoAltaBD = costoAltaBD;
        
        //$.imp_pasadas(resolucion, ancho, alto, cantidad, costoTraslucido, costoBajaBD, costoAltaBD)
        
        //alert ("Resolucion: " + resolucion + " Ancho: " + ancho + " Alto: " + alto + " Cantidad: " + cantidad + " Costo Translucido: " + costoTraslucido + " Costo Baja: " + costoBajaBD + " Costo Alta: " + costoAltaBD);
        //if (PasadasImpresio == "1")
        //{
            if (resolucion == "720")
            {
                //Calcular el costo de la tinta de BajaResolucion
                var traslucido = (parseFloat(costoBajaBD) * parseFloat(costoTraslucido));
                var areaImpresion = (parseFloat(ancho)/100) *  (parseFloat(alto)/100) * parseInt(cantidad);
                var valor =  (parseFloat(costoBajaBD) + traslucido) * parseFloat(areaImpresion);

                $("#resTinta").val(currency(valor));
            }
            else if (resolucion == "1440")
            {
                //Calcular el costo de la tinta de AltaResolucion
                var traslucido = (parseFloat(costoAltaBD) * parseFloat(costoTraslucido));
                var areaImpresion = (parseFloat(ancho)/100) *  (parseFloat(alto)/100) * parseInt(cantidad);
                var valor =  (parseFloat(costoAltaBD) + traslucido) * parseFloat(areaImpresion);

                $("#resTinta").val(currency(valor));
            }
            else if (resolucion == "0")
            {
                $("#resTinta").val("0");
            }
            else if (resolucion == "Sandwich")
            {
                var areaImpresion = (parseFloat(ancho)/100) *  (parseFloat(alto)/100) * parseInt(cantidad);
                var valor = parseFloat(costoBajaBD) * parseFloat(areaImpresion);

                //$("#pasadas_imp").val("1");
                $("#resTinta").val(currency(valor));
            }
        //}
        //else if (PasadasImpresio == "2")
        //{
            if (resolucion == "720")
            {
                //Calcular el costo de la tinta de BajaResolucion
                var traslucido = (parseFloat(costoBajaBD) * parseFloat(costoTraslucido));
                var areaImpresion = (parseFloat(ancho)/100) *  (parseFloat(alto)/100) * parseInt(cantidad);
                var valor2 =  ((parseFloat(costoBajaBD) + traslucido) * parseFloat(areaImpresion)) * parseFloat(costoImpBaja);
                var valor =  ((parseFloat(costoBajaBD) + traslucido) * parseFloat(areaImpresion)) + parseFloat(valor2);

                $("#resTinta").val(currency(valor));
            }
            else if (resolucion == "1440")
            {
                //Calcular el costo de la tinta de AltaResolucion
                var traslucido = (parseFloat(costoAltaBD) * parseFloat(costoTraslucido));
                var areaImpresion = (parseFloat(ancho)/100) *  (parseFloat(alto)/100) * parseInt(cantidad);
                var valor2 =  ((parseFloat(costoAltaBD) + traslucido) * parseFloat(areaImpresion)) * parseFloat(costoImpAlta);
                var valor =  ((parseFloat(costoAltaBD) + traslucido) * parseFloat(areaImpresion)) + parseFloat(valor2);

                $("#resTinta").val(currency(valor));
            }
            else if (resolucion == "0")
            {
                $("#resTinta").val("0");
            }
            else if (resolucion == "Sandwich")
            {
                var areaImpresion = (parseFloat(ancho)/100) *  (parseFloat(alto)/100) * parseInt(cantidad);
                var valor = parseFloat(costoBajaBD) * parseFloat(areaImpresion);

                //$("#pasadas_imp").val("1");
                $.mod();
                $("#resTinta").val(currency(valor));
            }
        //}
        
        $.calculos();
    }
    
    //--------------------------------------------------------------------------
    //                 FUNCI�N PARA CALCULAR EL BARNIZ
    //--------------------------------------------------------------------------
    
    /*$.barnizPasadas = function()
    {
        if ($("#barniz").prop("checked") == true) 
        {
            $("#lblPasadas").show();
            $("#barniz_pasadas").show();
            var barniz= '3';
            var id="id="+barniz;
            $.post("modelo/tintas.php",id,
                function(data)
                {
                    if(data.validacion_tinta=="true")
                    {
                        for(var i=0; i<data.rowdos.length; i++)
                        {
                            var ancho = parseInt($("#ancho").val());
                            var alto = parseInt($("#alto").val());
                            var cantidad = parseInt($("#cantidad").val());
                            var pasadas = $("#barniz_pasadas").val();
                            var costoBarniz = data.rowdos[i].baja;

                            var valor = ((ancho / 100) * (alto / 100) * cantidad) * pasadas * costoBarniz;

                            $("#resB").val(currency(valor));
                            $.calculos();
                        }
                    }
                },"json"
            );
            return false;
        }
        else 
        {
            $("#lblPasadas").hide();
            $("#barniz_pasadas").hide();

            $("#resB").val("0");
            $.calculos();
        }
    }*/
    
    //--------------------------------------------------------------------------
    //                  FUNCI�N PARA CALCULAR LA TINTA BLANCO 
    //--------------------------------------------------------------------------

    $.calculoblanco  = function()
    {
        if ($("#blanco").prop("checked") == true) 
        {
            var acabado="2";
            var id="id="+acabado;
            $.post("modelo/acabadosOff.php",id,
                function(data)
                {
                    if(data.validacion_acabados=="true")
                    {
                        for(var i=0; i<data.rowdos.length; i++)
                        {
                            var ancho = parseFloat($("#ancho").val());
                            var alto = parseFloat($("#alto").val());
                            var cantidad = parseInt($("#cantidad").val());
                            var costoBlanco = data.rowdos[i].importe;
                            var valor = ((ancho / 100) * (alto / 100) * cantidad) * costoBlanco;

                            $("#resBlanco").val(currency(valor));
                            $.calculos();
                        }
                    }
                },"json"
            );
            return false;
        }
        else
        {
            $("#resBlanco").val("0");
            $.calculos();
        }
    }
    
    //--------------------------------------------------------------------------
    //              ACABADOS-->CALCULAR LOS COSTOS DE LOS ACABADOS
    //--------------------------------------------------------------------------

    $.acab1 = function()
    {
        var acabado=$("#acab1").val();
        
        if(acabado == 1)
        {
            $("#resAcab1").val("0");
            $("#label-Acab1").html("Acabado 1:");
            $.calculos();
        }
        else
        {
            var id="id="+acabado;
            $.post("modelo/acabados.php",id,
                function(data)
                {
                    if(data.validacion_acabados=="true")
                    {
                        for(var i=0; i<data.rowdos.length; i++)
                        {
                            var unidad = data.rowdos[i].unidad;
                            var Importe = data.rowdos[i].importe;
                            var idAcabado = data.rowdos[i].id_Acabado;
                            var descripcion = data.rowdos[i].descripcion;
                            
                            //alert("Unidad: " + unidad + " Improte: " + Importe + " Id Acabado: " + idAcabado + " Descripcion " + descripcion);
                            
                            if($("#mat_especial").prop("checked") == true)
                            {
                                var medidaEsp = "medidaEsp="+MedEspecial;
                                $.post("modelo/mat_especial.php", medidaEsp,
                                function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            for(var i=0; i<data.rows.length; i++)
                                            {
                                                var corte = data.rows[i].CORTE;
                                                var tipo = data.rows[i].TIPO;
                                                
                                                var broca = 4;
                                                
                                                //alert("Unidad: " + unidad + " Improte: " + Importe + " Id Acabado: " + idAcabado + " Descripcion: " + descripcion + " Corte: " + corte + " Broca: " + broca);
                                                
                                                var id="id="+broca;
                                                $.post("modelo/acabadosoff.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_acabados=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                var numAcabado = '1';
                                                                var costo_broca = data.rowdos[i].importe;
                                                                var costo = Importe;

                                                                calcAcabados(idAcabado, acabado, numAcabado, descripcion, costo, unidad, corte, tipo, costo_broca);
                                                            }
                                                        }
                                                    },"json"
                                                );
                                            }
                                        }
                                        if(data.validacion=="false")
                                        {
                                            alert("Error");
                                            //no hay otra condicion...
                                        }
                                    },"json"
                                );
                            }
                            else
                            {
                                var id_material=$("#material").val();
                                var v_id_material="Id_Material="+id_material;
                                $.post("modelo/medidas.php",v_id_material,
                                    function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            for(var i=0; i<data.rows.length; i++)
                                            {
                                                var corte = data.rows[i].Corte;
                                                var tipo = data.rows[i].M_Tipo;

                                                var broca = 4;
                                                
                                                //alert("Unidad: " + unidad + " Improte: " + Importe + " Id Acabado: " + idAcabado + " Descripcion: " + descripcion + " Corte: " + corte + " Broca: " + broca);
                                                
                                                var id="id="+broca;
                                                $.post("modelo/acabadosoff.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_acabados=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                var numAcabado = '1';
                                                                var costo_broca = data.rowdos[i].importe;
                                                                var costo = Importe;

                                                                calcAcabados(idAcabado, acabado, numAcabado, descripcion, costo, unidad, corte, tipo, costo_broca);
                                                            }
                                                        }
                                                    },"json"
                                                );
                                            }
                                        }
                                    },"json"
                                );
                            }
                        }
                    }
                },"json"
            );
            return false;
        }
    }

    $.acab2 = function()
    {
        var acabado=$("#acab2").val();
        if(acabado == 1)
        {
            $("#resAcab2").val("0");
            $("#label-Acab2").html("Acabado 2:");
            $.calculos();
        }
        else
        {
            var id="id="+acabado;
            $.post("modelo/acabados.php",id,
                function(data)
                {
                    if(data.validacion_acabados=="true")
                    {
                        for(var i=0; i<data.rowdos.length; i++)
                        {
                            var unidad = data.rowdos[i].unidad;
                            var Importe = data.rowdos[i].importe;
                            var idAcabado = data.rowdos[i].id_Acabado;
                            var descripcion = data.rowdos[i].descripcion;
                            
                            if($("#mat_especial").prop("checked") == true)
                            {
                                var medidaEsp = "medidaEsp="+MedEspecial;
                                $.post("modelo/mat_especial.php", medidaEsp,
                                function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            for(var i=0; i<data.rows.length; i++)
                                            {
                                                var corte = data.rows[i].CORTE;
                                                var tipo = data.rows[i].TIPO;
                                                
                                                var broca = 4;
                                                var id="id="+broca;
                                                $.post("modelo/acabadosoff.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_acabados=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                var numAcabado = '2';
                                                                var costo_broca = data.rowdos[i].importe;
                                                                var costo = Importe;

                                                                calcAcabados(idAcabado, acabado, numAcabado, descripcion, costo, unidad, corte, tipo, costo_broca);
                                                            }
                                                        }
                                                    },"json"
                                                );
                                            }
                                        }
                                        if(data.validacion=="false")
                                        {
                                            alert("Error");
                                            //no hay otra condicion...
                                        }
                                    },"json"
                                );
                            }
                            else
                            {
                                var id_material=$("#material").val();
                                var v_id_material="Id_Material="+id_material;
                                $.post("modelo/medidas.php",v_id_material,
                                    function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            for(var i=0; i<data.rows.length; i++)
                                            {
                                                var corte = data.rows[i].Corte;
                                                var tipo = data.rows[i].M_Tipo;

                                                var broca = 4;
                                                var id="id="+broca;
                                                $.post("modelo/acabadosoff.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_acabados=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                var numAcabado = '2';
                                                                var costo_broca = data.rowdos[i].importe;
                                                                var costo = Importe;

                                                                calcAcabados(idAcabado, acabado, numAcabado, descripcion, costo, unidad, corte, tipo, costo_broca);
                                                            }
                                                        }
                                                    },"json"
                                                );
                                            }
                                        }
                                    },"json"
                                );
                            }
                        }
                    }
                },"json"
            );
            return false;
        }
    }

    $.acab3 = function()
    {
        var acabado=$("#acab3").val();
        if(acabado == 1)
        {
            $("#resAcab3").val("0");
            $("#label-Acab3").html("Acabado 3:");
            $.calculos();
        }
        else
        {
            var id="id="+acabado;
            $.post("modelo/acabados.php",id,
                function(data)
                {
                    if(data.validacion_acabados=="true")
                    {
                        for(var i=0; i<data.rowdos.length; i++)
                        {
                            var unidad = data.rowdos[i].unidad;
                            var Importe = data.rowdos[i].importe;
                            var idAcabado = data.rowdos[i].id_Acabado;
                            var descripcion = data.rowdos[i].descripcion;
                            
                            if($("#mat_especial").prop("checked") == true)
                            {
                                var medidaEsp = "medidaEsp="+MedEspecial;
                                $.post("modelo/mat_especial.php", medidaEsp,
                                function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            for(var i=0; i<data.rows.length; i++)
                                            {
                                                var corte = data.rows[i].CORTE;
                                                var tipo = data.rows[i].TIPO;
                                                
                                                var broca = 4;
                                                var id="id="+broca;
                                                $.post("modelo/acabadosoff.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_acabados=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                var numAcabado = '3';
                                                                var costo_broca = data.rowdos[i].importe;
                                                                var costo = Importe;

                                                                calcAcabados(idAcabado, acabado, numAcabado, descripcion, costo, unidad, corte, tipo, costo_broca);
                                                            }
                                                        }
                                                    },"json"
                                                );
                                            }
                                        }
                                        if(data.validacion=="false")
                                        {
                                            alert("Error");
                                            //no hay otra condicion...
                                        }
                                    },"json"
                                );
                            }
                            else
                            {
                                var id_material=$("#material").val();
                                var v_id_material="Id_Material="+id_material;
                                $.post("modelo/medidas.php",v_id_material,
                                    function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            for(var i=0; i<data.rows.length; i++)
                                            {
                                                var corte = data.rows[i].Corte;
                                                var tipo = data.rows[i].M_Tipo;

                                                var broca = 4;
                                                var id="id="+broca;
                                                $.post("modelo/acabadosoff.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_acabados=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                var numAcabado = '3';
                                                                var costo_broca = data.rowdos[i].importe;
                                                                var costo = Importe;

                                                                calcAcabados(idAcabado, acabado, numAcabado, descripcion, costo, unidad, corte, tipo, costo_broca);
                                                            }
                                                        }
                                                    },"json"
                                                );
                                            }
                                        }
                                    },"json"
                                );
                            }
                        }
                    }
                },"json"
            );
            return false;
        }
    }

    $.acab4 = function()
    {
        var acabado=$("#acab4").val();
        if(acabado == 1)
        {
            $("#resAcab4").val("0");
            $("#label-Acab4").html("Acabado 4:");
            $.calculos();
        }
        else
        {
            var id="id="+acabado;
            $.post("modelo/acabados.php",id,
                function(data)
                {
                    if(data.validacion_acabados=="true")
                    {
                        for(var i=0; i<data.rowdos.length; i++)
                        {
                            var unidad = data.rowdos[i].unidad;
                            var Importe = data.rowdos[i].importe;
                            var idAcabado = data.rowdos[i].id_Acabado;
                            var descripcion = data.rowdos[i].descripcion;
                            
                            if($("#mat_especial").prop("checked") == true)
                            {
                                var medidaEsp = "medidaEsp="+MedEspecial;
                                $.post("modelo/mat_especial.php", medidaEsp,
                                function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            for(var i=0; i<data.rows.length; i++)
                                            {
                                                var corte = data.rows[i].CORTE;
                                                var tipo = data.rows[i].TIPO;
                                                
                                                var broca = 4;
                                                var id="id="+broca;
                                                $.post("modelo/acabadosoff.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_acabados=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                var numAcabado = '4';
                                                                var costo_broca = data.rowdos[i].importe;
                                                                var costo = Importe;

                                                                calcAcabados(idAcabado, acabado, numAcabado, descripcion, costo, unidad, corte, tipo, costo_broca);
                                                            }
                                                        }
                                                    },"json"
                                                );
                                            }
                                        }
                                        if(data.validacion=="false")
                                        {
                                            alert("Error");
                                            //no hay otra condicion...
                                        }
                                    },"json"
                                );
                            }
                            else
                            {
                                var id_material=$("#material").val();
                                var v_id_material="Id_Material="+id_material;
                                $.post("modelo/medidas.php",v_id_material,
                                    function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            for(var i=0; i<data.rows.length; i++)
                                            {
                                                var corte = data.rows[i].Corte;
                                                var tipo = data.rows[i].M_Tipo;

                                                var broca = 4;
                                                var id="id="+broca;
                                                $.post("modelo/acabadosoff.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_acabados=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                var numAcabado = '4';
                                                                var costo_broca = data.rowdos[i].importe;
                                                                var costo = Importe;

                                                                calcAcabados(idAcabado, acabado, numAcabado, descripcion, costo, unidad, corte, tipo, costo_broca);
                                                            }
                                                        }
                                                    },"json"
                                                );
                                            }
                                        }
                                    },"json"
                                );
                            }
                        }
                    }
                },"json"
            );
            return false;
        }
    }

    $.acab5 = function()
    {
        var acabado=$("#acab5").val();
        if(acabado == 1)
        {
            $("#resAcab5").val("0");
            $("#label-Acab5").html("Acabado 5:");
            $.calculos();
        }
        else
        {
            var id="id="+acabado;
            $.post("modelo/acabados.php",id,
                function(data)
                {
                    if(data.validacion_acabados=="true")
                    {
                        for(var i=0; i<data.rowdos.length; i++)
                        {
                            var unidad = data.rowdos[i].unidad;
                            var Importe = data.rowdos[i].importe;
                            var idAcabado = data.rowdos[i].id_Acabado;
                            var descripcion = data.rowdos[i].descripcion;
                            
                            if($("#mat_especial").prop("checked") == true)
                            {
                                var medidaEsp = "medidaEsp="+MedEspecial;
                                $.post("modelo/mat_especial.php", medidaEsp,
                                function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            for(var i=0; i<data.rows.length; i++)
                                            {
                                                var corte = data.rows[i].CORTE;
                                                var tipo = data.rows[i].TIPO;
                                                
                                                var broca = 4;
                                                var id="id="+broca;
                                                $.post("modelo/acabadosoff.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_acabados=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                var numAcabado = '5';
                                                                var costo_broca = data.rowdos[i].importe;
                                                                var costo = Importe;

                                                                calcAcabados(idAcabado, acabado, numAcabado, descripcion, costo, unidad, corte, tipo, costo_broca);
                                                            }
                                                        }
                                                    },"json"
                                                );
                                            }
                                        }
                                        if(data.validacion=="false")
                                        {
                                            alert("Error");
                                            //no hay otra condicion...
                                        }
                                    },"json"
                                );
                            }
                            else
                            {
                                var id_material=$("#material").val();
                                var v_id_material="Id_Material="+id_material;
                                $.post("modelo/medidas.php",v_id_material,
                                    function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            for(var i=0; i<data.rows.length; i++)
                                            {
                                                var corte = data.rows[i].Corte;
                                                var tipo = data.rows[i].M_Tipo;

                                                var broca = 4;
                                                var id="id="+broca;
                                                $.post("modelo/acabadosoff.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_acabados=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                var numAcabado = '5';
                                                                var costo_broca = data.rowdos[i].importe;
                                                                var costo = Importe;

                                                                calcAcabados(idAcabado, acabado, numAcabado, descripcion, costo, unidad, corte, tipo, costo_broca);
                                                            }
                                                        }
                                                    },"json"
                                                );
                                            }
                                        }
                                    },"json"
                                );
                            }
                        }
                    }
                },"json"
            );
            return false;
        }
    }

    $.acab6 = function()
    {
        var acabado=$("#acab6").val();
        if(acabado == 1)
        {
            $("#resAcab6").val("0");
            $("#label-Acab6").html("Acabado 6:");
            $.calculos();
        }
        else
        {
            var id="id="+acabado;
            $.post("modelo/acabados.php",id,
                function(data)
                {
                    if(data.validacion_acabados=="true")
                    {
                        for(var i=0; i<data.rowdos.length; i++)
                        {
                            var unidad = data.rowdos[i].unidad;
                            var Importe = data.rowdos[i].importe;
                            var idAcabado = data.rowdos[i].id_Acabado;
                            var descripcion = data.rowdos[i].descripcion;
                            
                            if($("#mat_especial").prop("checked") == true)
                            {
                                var medidaEsp = "medidaEsp="+MedEspecial;
                                $.post("modelo/mat_especial.php", medidaEsp,
                                function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            for(var i=0; i<data.rows.length; i++)
                                            {
                                                var corte = data.rows[i].CORTE;
                                                var tipo = data.rows[i].TIPO;
                                                
                                                var broca = 4;
                                                var id="id="+broca;
                                                $.post("modelo/acabadosoff.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_acabados=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                var numAcabado = '6';
                                                                var costo_broca = data.rowdos[i].importe;
                                                                var costo = Importe;

                                                                calcAcabados(idAcabado, acabado, numAcabado, descripcion, costo, unidad, corte, tipo, costo_broca);
                                                            }
                                                        }
                                                    },"json"
                                                );
                                            }
                                        }
                                        if(data.validacion=="false")
                                        {
                                            alert("Error");
                                            //no hay otra condicion...
                                        }
                                    },"json"
                                );
                            }
                            else
                            {
                                var id_material=$("#material").val();
                                var v_id_material="Id_Material="+id_material;
                                $.post("modelo/medidas.php",v_id_material,
                                    function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            for(var i=0; i<data.rows.length; i++)
                                            {
                                                var corte = data.rows[i].Corte;
                                                var tipo = data.rows[i].M_Tipo;

                                                var broca = 4;
                                                var id="id="+broca;
                                                $.post("modelo/acabadosoff.php",id,
                                                    function(data)
                                                    {
                                                        if(data.validacion_acabados=="true")
                                                        {
                                                            for(var i=0; i<data.rowdos.length; i++)
                                                            {
                                                                var numAcabado = '6';
                                                                var costo_broca = data.rowdos[i].importe;
                                                                var costo = Importe;

                                                                calcAcabados(idAcabado, acabado, numAcabado, descripcion, costo, unidad, corte, tipo, costo_broca);
                                                            }
                                                        }
                                                    },"json"
                                                );
                                            }
                                        }
                                    },"json"
                                );
                            }
                        }
                    }
                },"json"
            );
            return false;
        }
    }

    function calcAcabados(idAcabado, acabado, numAcabado, descripcion, costo, unidad, corte, tipo, costo_broca)
    {
        var idAcabado=idAcabado;
        var acabado = acabado;
        var numAcabado = numAcabado;
        var descripcion = descripcion.slice(0,10);
        var costo= costo;
        var unidad=unidad;
        var corte = corte;
        var tipo = tipo;
        var costo_broca = costo_broca;
        
        //alert("ID Acabado: "+idAcabado+" Acabado: "+acabado+" Num Acabado: "+numAcabado+" Descripcion: "+descripcion+" Costo; "+costo+" Unidad: "+unidad+" Corte: "+corte+" Tipo: "+tipo+" Corte Broca: "+costo_broca);
        var cantidad = parseInt($("#cantidad").val());
        var ancho = parseInt($("#ancho").val());
        var alto = parseInt($("#alto").val());
        var totalancho = parseInt($("#totancho").val());
        var totalalto = parseInt($("#totalto").val());
        var resCant = parseFloat($("#resCant").val().replace(/,/gi,''));
        var resTinta = parseFloat($("#resTinta").val().replace(/,/gi,''));
        var entran = parseInt($("#m_entra").val());
        var orientacion = $("#m_orienta").val();
        //alert("Cantidad: "+cantidad+" Ancho: "+ancho+" Alto: "+alto+" Total Ancho: "+totalancho+" Total Alto: "+totalalto+" Res Cant: "+resCant+" Res Tinta: "+resTinta+" Entran: "+entran+" Orientacion: "+orientacion);
        var valor = 0;
        var res = 0;
        var costoBroca = 0;
        var costentran = 0;
        var resentran = 0;
        var acabentran = 0;
        var perimetro = 0;
        var varuno = 0;
        var rval1 = 0;
        var rval2 = 0;
        var precio_tramo=100;
        
        //Metro Cuadrado
        if(unidad == "M2")
        {
            var area = ((ancho / 100) * (alto / 100)) * cantidad;
            
            if (corte == 'B')
            { 
                res = area * costo;
                costoBroca = res * costo_broca;
                valor = res + costoBroca;
            }
            else if (corte == 'N')
            {
                valor = area * costo;
            }	
            
        }
        //Metro Lineal
        else if(unidad == "ML")
        {
            //DOBLADILLO/JARETA EN CABEZA Y PIE
            if(idAcabado == "4")
            {
                //El Ancho de la pieza POR 2 POR el costo
                valor = (((totalancho / 100) * 2) * cantidad) * costo;
            }
            //Router
            else if (idAcabado == "2")
            {
                //rigido
                if (tipo == 'R')
                {
                    perimetro = (((totalancho / 100) + (totalalto / 100)) * 2);
                                                    //Costo de Acabados
                    rval1 = perimetro * cantidad * costo;
                                    //Cantidad Material
                    rval2 = precio_tramo * resCant;
                    
                    if(rval1>rval2)
                    {
                        //alert("Rigido Mayor Valor1: "+rval1+" valor2: "+rval2+" perimetro: "+perimetro+" cantidad: "+cantidad+" costo: "+costo);
                        valor = rval1;
                    }
                    else
                    {
                        //alert(" Rigido Valor1: "+rval1+" Mayor valor2: "+rval2+" perimetro: "+perimetro+" cantidad: "+cantidad+" costo: "+costo);
                        valor = rval2;
                    }
                }
                else 
                {
                    if (orientacion == "A lo alto")
                    {
                        varuno = 200 / totalancho * entran;
                    }
                    else if (orientacion == "A lo ancho")
                    {
                        varuno = 200 / totalalto * entran;
                    }
                    
                    perimetro = (((ancho / 100) + (alto / 100)) * 2);
                    acabentran = perimetro * varuno * costo;
                    //costentran = acabentran * costo;
                    
                    if (acabentran < precio_tramo)
                    {
                        resentran = precio_tramo;
                        //alert("Flexible Menor  Perimetro: "+perimetro+" Entran: "+varuno+" Router: "+costo+" Resultado: "+acabentran);
                    }
                    else
                    {
                        resentran = acabentran;
                        //alert("Flexible Mayor  Perimetro: "+perimetro+" Entran: "+varuno+" Router: "+costo+" Resultado: "+acabentran);
                    }
                    
                    res = resentran * (resCant / 2);
                    valor = res;
                    //alert("Flexible: "+tipo+" Ancho: "+totalancho+" Alto: "+totalalto+" Entran Uno: "+varuno+" perimetro: "+perimetro+" Entran: "+acabentran+" Costo de entran: "+costentran+" Validacion: "+resentran+" Valor: "+valor);
                }	
            }
            else
            {
                //EL perimetro de la pieza POR el costo
                perimetro = (((ancho /100) + (alto / 100)) * 2) * cantidad;
                valor = perimetro * costo;
            }
        }
        //Por Pieza
        else if(unidad == "PZ")
        {
            if(idAcabado == "12")
            {
                //El costo de la impresion MAS 15%
                var valor = resTinta * 1.15;
            }
            else
            {
                //El costo es unitario
                valor = costo * cantidad;
            }
        }
        else
        {
            $("#dialogoerror").html("");            
            $("#dialogoerror").html('<span style="color:red;">Error El Acabado no cuenta con Unidad</span>');
            $("#dialogoerror").dialog("open");
        }
        
        if(numAcabado == 1)
        {
            $("#resAcab1").val(currency(valor));
            $("#label-Acab1").html(descripcion);
        }
        else if(numAcabado == 2)
        {
            $("#resAcab2").val(currency(valor));
            $("#label-Acab2").html(descripcion);
        }
        else if(numAcabado == 3)
        {
            $("#resAcab3").val(currency(valor));
            $("#label-Acab3").html(descripcion);
        }
        else if(numAcabado == 4)
        {
            $("#resAcab4").val(currency(valor));
            $("#label-Acab4").html(descripcion);
        }
        else if(numAcabado == 5)
        {
            $("#resAcab5").val(currency(valor));
            $("#label-Acab5").html(descripcion);
        }
        else if(numAcabado == 6)
        {
            $("#resAcab6").val(currency(valor));
            $("#label-Acab6").html(descripcion);
        }
        $.calculos();
    }
    
    //--------------------------------------------------------------------------
    //                             Adicionales
    //--------------------------------------------------------------------------
    
//    $("#div_adicionales .txtcostoadic"),change(function()
//    {
//        
//        if()
//        {
//            
//        }
//    });
    
    $.adicional1 = function() 
    {
        if($("#costoadic1").val() == "0")
        {
            $("#resAdic1").val("0");
            $.calculos();
        }
        else
        {
            var adicional = $("#costoadic1").val();
            var valor  = (parseFloat(adicional) * parseInt($("#cantidad").val()));
            
            $("#resAdic1").val(currency(valor));

            //valor = adicional;
            
            //$("#costoadic1").val(currency(adicional));
            $.calculos();
            return false;
        }
    }

    $.adicional2 = function()
    {
        if($("#costoadic2").val() == "0")
        {
            $("#resAdic2").val("0");
            $.calculos();
        }
        else
        {
            var adicional = $("#costoadic2").val();
            var valor  = (parseFloat(adicional) * parseInt($("#cantidad").val()));

            $("#resAdic2").val(currency(valor));

            //valor = adicional;

            //$("#costoadic2").val(currency(adicional));
            $.calculos();
        }
    }

    $.adicional3 = function() 
    {
        if($("#costoadic3").val() == "0")
        {
            $("#resAdic3").val("0");
            $.calculos();
        }
        else
        {
            var adicional = $("#costoadic3").val();
            var valor  = (parseFloat(adicional) * parseInt($("#cantidad").val()));

            $("#resAdic3").val(currency(valor));

            //valor = adicional;

            //$("#costoadic3").val(currency(adicional));
            $.calculos();
        }
    }
    
    $.adicional4 = function() 
    {
        if($("#costoadic4").val() == "0")
        {
            $("#resAdic4").val("0");
            $.calculos();
        }
        else
        {
            var adicional = $("#costoadic4").val();
            var valor  = (parseFloat(adicional) * parseInt($("#cantidad").val()));
            
            $("#resAdic4").val(currency(valor));

            //valor = adicional;
            
            //$("#costoadic4").val(currency(adicional));
            $.calculos();
            return false;
        }
    }

    $.adicional5 = function()
    {
        if($("#costoadic5").val() == "0")
        {
            $("#resAdic5").val("0");
            $.calculos();
        }
        else
        {
            var adicional = $("#costoadic5").val();
            var valor  = (parseFloat(adicional) * parseInt($("#cantidad").val()));

            $("#resAdic5").val(currency(valor));

            //valor = adicional;

            //$("#costoadic5").val(currency(adicional));
            $.calculos();
        }
    }

    $.adicional6 = function() 
    {
        if($("#costoadic6").val() == "0")
        {
            $("#resAdic6").val("0");
            $.calculos();
        }
        else
        {
            var adicional = $("#costoadic6").val();
            var valor  = (parseFloat(adicional) * parseInt($("#cantidad").val()));

            $("#resAdic6").val(currency(valor));

            //valor = adicional;

            //$("#costoadic6").val(currency(adicional));
            $.calculos();
        }
    }
    
    //--------------------------------------------------------------------------
    //                                Subtotal
    //--------------------------------------------------------------------------
    
    $.subtotal = function() 
    {
        var resPrecio = parseFloat($("#resPrecio").val().replace(/,/gi,''));
        var resTinta = parseFloat($("#resTinta").val().replace(/,/gi,''));
        //var resBarniz = parseFloat($("#resB").val().replace(/,/gi,''));
        var resBlanco = parseFloat($("#resBlanco").val().replace(/,/gi,''));
        var resAcab1 = parseFloat($("#resAcab1").val().replace(/,/gi,''));
        var resAcab2 = parseFloat($("#resAcab2").val().replace(/,/gi,''));
        var resAcab3 = parseFloat($("#resAcab3").val().replace(/,/gi,''));
        var resAcab4 = parseFloat($("#resAcab4").val().replace(/,/gi,''));
        var resAcab5 = parseFloat($("#resAcab5").val().replace(/,/gi,''));
        var resAcab6 = parseFloat($("#resAcab6").val().replace(/,/gi,''));
        var resLamina = parseFloat($("#resLamina").val().replace(/,/gi,''));
        var resAdic1 = parseFloat($("#resAdic1").val().replace(/,/gi,''));
        var resAdic2 = parseFloat($("#resAdic2").val().replace(/,/gi,''));
        var resAdic3 = parseFloat($("#resAdic3").val().replace(/,/gi,''));
        var resAdic4 = parseFloat($("#resAdic4").val().replace(/,/gi,''));
        var resAdic5 = parseFloat($("#resAdic5").val().replace(/,/gi,''));
        var resAdic6 = parseFloat($("#resAdic6").val().replace(/,/gi,''));

        var value = parseFloat(resPrecio)+parseFloat(resTinta)+parseFloat(resAcab1)+parseFloat(resAcab2)+parseFloat(resAcab3)+parseFloat(resAcab4)+parseFloat(resAcab5)+parseFloat(resAcab6)+parseFloat(resBlanco)+parseFloat(resLamina)+parseFloat(resAdic1)+parseFloat(resAdic2)+parseFloat(resAdic3)+parseFloat(resAdic4)+parseFloat(resAdic5)+parseFloat(resAdic6); //parseFloat(resBarniz)
        $("#resSubtotal").val(currency(value));
    }

    //--------------------------------------------------------------------------
    //                            CALCULAR EL MARGEN
    //--------------------------------------------------------------------------

    $.margen = function()
    {
        var resSubtotal = parseFloat($("#resSubtotal").val().replace(/,/gi,''));
        var margen = parseFloat($("#porcientoMargen").val());

        var valor = (margen/100) * resSubtotal;
        $("#resMargen").val(currency(valor));
    }

    //--------------------------------------------------------------------------
    //                          CALCULAR COMISION
    //--------------------------------------------------------------------------

    $.comision = function()
    {
        var resSubtotal = parseFloat($("#resSubtotal").val().replace(/,/gi,''));
        var resMargen = parseFloat($("#resMargen").val().replace(/,/gi,''));
        var comision = parseFloat($("#porcientoComision").val());
        
        var sum = (resSubtotal + resMargen);
        var com = (comision/100);
        
        var valor = (sum / (1 - com)) - sum;
        
        $("#resComision").val(currency(valor));
    }

    //--------------------------------------------------------------------------
    //CALCULAR TOTAL
    //--------------------------------------------------------------------------
    
    $.total = function()
    {
        var resSubtotal = parseFloat($("#resSubtotal").val().replace(/,/gi,''));        
        var resMargen = parseFloat($("#resMargen").val().replace(/,/gi,''));
        var resComision = parseFloat($("#resComision").val().replace(/,/gi,''));
        var cantidad = parseInt($("#cantidad").val());

        var valor = (resSubtotal + resMargen + resComision);
        var valor2 = valor / cantidad;
        $("#resTotal").val(currency(valor));
        $("#resPreUnit").val(currency(valor2));
    }
		
    //--------------------------------------------------------------------------
    //                      CALCULAR PRECIO UNITARIO
    //--------------------------------------------------------------------------

    $.precioUnitario = function()
    {
        //var resTotal = parseFloat($("#resTotal").val().replace(',', ""));
        //var cantidad = parseInt($("#cantidad").val());

        //var valorunitario = resTotal;
        //$("#resPreUnit").val(currency(valorunitario));
    }

    //--------------------------------------------------------------------------
    //                     CALCULAR EL COSTO IMPRIMART
    //--------------------------------------------------------------------------

    $.recalcular = function()
    {
        $("#resImprimart").val(currency("0"));
        $('resLito').val(currency("0"));
        $.costoImprimart();
    }


    $.costoImprimart = function()
    {
        if($("#lito2").prop('checked'))
        {
            var  resPrecio = 0;
            var  resPreciolito = parseFloat($("#resPrecio").val().replace(/,/gi,''));
        }
        else
        {
            var  resPrecio = parseFloat($("#resPrecio").val().replace(/,/gi,''));
            var  resPreciolito = 0;
        }

        if($("#lito3").prop('checked'))
        {
            var  resTinta = 0;
            var  resTintalito = parseFloat($("#resTinta").val().replace(/,/gi,''));
        }
        else
        {
            var  resTinta = parseFloat($("#resTinta").val().replace(/,/gi,''));
            var  resTintalito = 0;
        }

        /*if($("#lito4").prop('checked'))
        {
            var  resBarniz = 0;
            var  resBarnizlito = parseFloat($("#resB").val().replace(/,/gi,''));
        }
        else
        {
            var  resBarniz = parseFloat($("#resB").val().replace(/,/gi,''));
            var  resBarnizlito = 0;
        }*/

        if($("#lito5").prop('checked'))
        {
            var  resBlanco = 0;
            var  resBlancolito = parseFloat($("#resBlanco").val().replace(/,/gi,''));
        }
        else
        {
            var  resBlanco = parseFloat($("#resBlanco").val().replace(/,/gi,''));
            var  resBlancolito = 0;
        }

        if($("#lito6").prop('checked'))
        {
            var  resAcab1 = 0;
            var  resAcab1lito = parseFloat($("#resAcab1").val().replace(/,/gi,''));
        }
        else
        {
            var  resAcab1 = parseFloat($("#resAcab1").val().replace(/,/gi,''));
            var  resAcab1lito = 0;
        }

        if($("#lito7").prop('checked'))
        {
            var  resAcab2 = 0;
            var  resAcab2lito = parseFloat($("#resAcab2").val().replace(/,/gi,''));
        }
        else
        {
            var  resAcab2 = parseFloat($("#resAcab2").val().replace(/,/gi,''));
            var  resAcab2lito = 0;
        }

        if($("#lito8").prop('checked'))
        {
            var  resAcab3 = 0;
            var  resAcab3lito = parseFloat($("#resAcab3").val().replace(/,/gi,''));
        }
        else
        {
            var  resAcab3 = parseFloat($("#resAcab3").val().replace(/,/gi,''));
            var  resAcab3lito = 0;
        }

        if($("#lito13").prop('checked'))
        {
            var  resAcab4 = 0;
            var  resAcab4lito = parseFloat($("#resAcab4").val().replace(/,/gi,''));
        }
        else
        {
            var  resAcab4 = parseFloat($("#resAcab4").val().replace(/,/gi,''));
            var  resAcab4lito = 0;
        }

        if($("#lito14").prop('checked'))
        {
            var  resAcab5 = 0;
            var  resAcab5lito = parseFloat($("#resAcab5").val().replace(/,/gi,''));
        }
        else
        {
            var  resAcab5 = parseFloat($("#resAcab5").val().replace(/,/gi,''));
            var  resAcab5lito = 0;
        }

        if($("#lito15").prop('checked'))
        {
            var  resAcab6 = 0;
            var  resAcab6lito = parseFloat($("#resAcab6").val().replace(/,/gi,''));
        }
        else
        {
            var  resAcab6 = parseFloat($("#resAcab6").val().replace(/,/gi,''));
            var  resAcab6lito = 0;
        }

        if($("#lito9").prop('checked'))
        {
            var  resLamina = 0;
            var  resLaminalito = parseFloat($("#resLamina").val().replace(/,/gi,''));
        }
        else
        {
            var  resLamina = parseFloat($("#resLamina").val().replace(/,/gi,''));
            var  resLaminalito = 0;
        }

        if($("#lito10").prop('checked'))
        {
            var  resAdic1 = 0;
            var  resAdic1lito = parseFloat($("#resAdic1").val().replace(/,/gi,''));
        }
        else
        {
            var  resAdic1 = parseFloat($("#resAdic1").val().replace(/,/gi,''));
            var  resAdic1lito = 0;
        }

        if($("#lito11").prop('checked'))
        {
            var  resAdic2 = 0;
            var  resAdic2lito = parseFloat($("#resAdic2").val().replace(/,/gi,''));
        }
        else
        {
            var  resAdic2 = parseFloat($("#resAdic2").val().replace(/,/gi,''));
            var  resAdic2lito = 0;
        }

        if($("#lito12").prop('checked'))
        {
            var  resAdic3 = 0;
            var  resAdic3lito = parseFloat($("#resAdic3").val().replace(/,/gi,''));
        }
        else
        {
            var  resAdic3 = parseFloat($("#resAdic3").val().replace(/,/gi,''));
            var  resAdic3lito = 0;
        }

        if($("#lito16").prop('checked'))
        {
            var  resAdic4 = 0;
            var  resAdic4lito = parseFloat($("#resAdic4").val().replace(/,/gi,''));
        }
        else
        {
            var  resAdic4 = parseFloat($("#resAdic4").val().replace(/,/gi,''));
            var  resAdic4lito = 0;
        }

        if($("#lito17").prop('checked'))
        {
            var  resAdic5 = 0;
            var  resAdic5lito = parseFloat($("#resAdic5").val().replace(/,/gi,''));
        }
        else
        {
            var  resAdic5 = parseFloat($("#resAdic5").val().replace(/,/gi,''));
            var  resAdic5lito = 0;
        }

        if($("#lito18").prop('checked'))
        {
            var  resAdic6 = 0;
            var  resAdic6lito = parseFloat($("#resAdic6").val().replace(/,/gi,''));
        }
        else
        {
            var  resAdic6 = parseFloat($("#resAdic6").val().replace(/,/gi,''));
            var  resAdic6lito = 0;
        }

        var pormargen = parseFloat($("#porcientoMargen").val().replace(/,/gi,''));

        var value = (resPrecio + resTinta + resBlanco +resAcab1 +resAcab2 +resAcab3 +resAcab4 +resAcab5 +resAcab6 + resLamina + resAdic1 + resAdic2 + resAdic3 + resAdic4 + resAdic5 + resAdic6); //+ resBarniz

        var valuelito = (resPreciolito + resTintalito + resBlancolito + resAcab1lito + resAcab2lito + resAcab3lito + resAcab4lito + resAcab5lito + resAcab6lito + resLaminalito + resAdic1lito + resAdic2lito + resAdic3lito + resAdic4lito + resAdic5lito + resAdic6lito); //+ resBarnizlito 

        var valueimprimart1 = (value * (pormargen/100)) + value;
        var valueimprimart2 = valueimprimart1 * (90/100);

        $("#resImprimart").val(currency(valueimprimart2));

        $("#resLito").val(currency(valuelito));
    }
    
    //--------------------------------------------------------------------------
    //                             Fromato de Peso
    //--------------------------------------------------------------------------
    
    /*function currency(valor)
    {
        if(!isNaN(valor))
        {
            if(valor != 0)
            {
                var valor = new Number(valor);
                valor = valor.toFixed(2);

                valor = valor.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,');
                valor = valor.split('').reverse().join('').replace(/^[\.]/,'');
                return valor;
            }
        }
        else
        {
            return false;
        }
    }*/
    
//    function format(input)
//    {
//        var num = input.value.replace(/\./g,'');
//        if(!isNaN(num))
//        {
//            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
//            num = num.split('').reverse().join('').replace(/^[\.]/,'');
//            input.value = num;
//        }
//        else
//        {
//            alert('Solo se permiten numeros');
//            input.value = input.value.replace(/[^\d\.]*/g,'');
//        }
//    }
    
//    function currency(valor, decimals, separators)
//    {
//        decimals = (decimals >= 0) ? parseInt(decimals, 0) : 2;
//        separators = separators || [',', "'", '.'];
//        
//        var number = (parseFloat(valor) || 0).toFixed(decimals);
//        
////        if (number.length <= (7 + decimals))
////            //alert("7");
////            return number.replace('.', separators[separators.length - 1], separators[separators.length - 4]);
//        if (number.length <= (4 + decimals))
//            //alert("4");
//            return number.replace('.', separators[separators.length - 1]);
//        
//        var parts = number.split(/[-.]/);
//        
//        valor = parts[parts.length > 1 ? parts.length - 2 : 0];
//        
//        var result = valor.substr(valor.length - 3, 3) + (parts.length > 1 ?
//            separators[separators.length - 1] + parts[parts.length - 1] : '');
//        var start = valor.length - 6;
//        var idx = 0;
//        
//        while (start > -3)
//        {
//            result = (start > 0 ? valor.substr(start, 3) : valor.substr(0, 3 + start))
//                + separators[idx] + result;
//            idx = (++idx) % 2;
//            start -= 3;
//        }
//        
//        return (parts.length == 3 ? '-' : '') + result;
//    }

function currency(value, decimals, separators) {
    decimals = decimals >= 0 ? parseInt(decimals, 0) : 2;
    separators = separators || [',', ",", '.'];
    var number = (parseFloat(value) || 0).toFixed(decimals);
    if (number.length <= (4 + decimals))
        return number.replace('.', separators[separators.length - 1]);
    var parts = number.split(/[-.]/);
    value = parts[parts.length > 1 ? parts.length - 2 : 0];
    var result = value.substr(value.length - 3, 3) + (parts.length > 1 ?
        separators[separators.length - 1] + parts[parts.length - 1] : '');
    var start = value.length - 6;
    var idx = 0;
    while (start > -3) {
        result = (start > 0 ? value.substr(start, 3) : value.substr(0, 3 + start))
            + separators[idx] + result;
        idx = (++idx) % 2;
        start -= 3;
    }
    return (parts.length == 3 ? '-' : '') + result;
}

});