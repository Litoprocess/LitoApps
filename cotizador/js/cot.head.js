var MedEspecial;

$(document).ready(function() 
{    
   $('.modal').modal(); 
      
    /*$("#listado_mat").click(function()
    {
        window.location.href = "listado_mat.php";
    });
    
    $("#inicio").click(function()
    {
        window.location.href = "index.php";
    });
    
    $("#listado_mat_admin").click(function()
    {
        window.location.href = "listado_mat_admin.php";
    });*/
    
    //--------------------------------------------------------------------------
    //                          Boton de Login
    //--------------------------------------------------------------------------
    
    /*$("#login").click(function()
    {
        $("#Log").dialog(
        {
            autoOpen:false,
            resizable: false,
            height:320,
            width:300,
            modal: true,
            show: "blind",
            hide: "puff",
            buttons:
            {
                
                "Login":function()
                {
                    var log=$("#formlogin").serialize();
                    $.post("login/login.php",log,
                        function(data)
                        {
                            if (data.validacion=="true")
                            {
                                window.location="index.php";
                                $("#Log").dialog("close");
                            }
                            if (data.validacion=="false")
                            {
                                $("#mensaje").append('<span style="color:red; font-size:11px;">*Error el Usuario o contraseña son incorrectos*</span>');
                            }
                        },"json"
                    );
                    return false;
                    $("#Log").dialog("close");
                },
                "Cancelar":function()
                {
                    $("#Log").dialog("close");
                }
            }
        });
        
        $("#Log").dialog("open");¨
    });*/
    
    //--------------------------------------------------------------------------
    //                          Boton de Logout
    //--------------------------------------------------------------------------
    
    /*$("#logout").click(function()
    {
        var halgo="";
        $.post("login/logout.php",halgo);
        window.location="index.php";
    });
    
    $("#usuario").change(function()
    {
        $("#mensaje").empty('<div id="mensaje"></div>');
    });
    
    $("#contrasena").change(function()
    {
        $("#mensaje").empty('<div id="mensaje"></div>');
    });*/
    
    //--------------------------------------------------------------------------
    //                            Boton Abrir
    //--------------------------------------------------------------------------

    $.cargar = function()
    {
                    var folio2=$("#folio2").val();
                    var vfolio2="FOLIO2="+folio2;
                    
                    var folio3=$("#folio3").val();
                    var vfolio3="&FOLIO3="+folio3;
                    
                    var folio4=$("#folio4").val();
                    var vfolio4="&FOLIO4="+folio4;
                    
                    var cadena = vfolio2+vfolio3+vfolio4;
                    
                    $.post("modelo/abrir.php",cadena,
                        function(data)
                        {
                            if(data.validacion=="true")
                            {
                                $("#fecha").val(data.rows[0].fecha);
                                
                                if(data.rows[0].ormetrics==0)
                                {
                                    $("#nometrics").val("");
                                }
                                else
                                {
                                    $("#nometrics").val(data.rows[0].ormetrics);
                                }
                                
                                $("#foliob").val(data.rows[0].foliob);
                                $("#cliente").val(data.rows[0].cliente);
                                $("#trabajo").val(data.rows[0].trabajo);
                                
                                $("#cantidad").val(data.rows[0].cantidad);
                                $("#ancho").val(data.rows[0].ancho);
                                $("#alto").val(data.rows[0].alto);
                                $("#medancho").val(data.rows[0].medancho);
                                $("#medalto").val(data.rows[0].medalto);
                                
                                if(data.rows[0].mat_especial=="on")
                                {
                                    $("#mat_especial").prop("checked", true);
                                    $("#div_medida_especial").show();
                                    $("#div_material").hide();
                                    $("#div_medidas").hide();
                                    
                                    MedEspecial = data.rows[0].id_mat_especial;
                                    
                                    var medidaEsp = "medidaEsp="+data.rows[0].id_mat_especial;
                                    $.post("modelo/mat_especial.php", medidaEsp,
                                    function(data)
                                        {
                                            if(data.validacion=="true")
                                            {
                                                for(var i=0; i<data.rows.length; i++)
                                                {
                                                    $("#medida_especial").empty("<option>");
                                                    $('#medida_especial').append($('<option>',
                                                    {
                                                        checked: true,
                                                        value: data.rows[i].medidaEspecial,
                                                        text: data.rows[i].NOMBRE_MATERIAL
                                                    }));
                                                    
                                                    if (data.rows[i].TIPO == "R")
                                                    {
                                                        var mattipo = "MATERIAL RIGIDO";
                                                    }
                                                    else if (data.rows[i].TIPO == "F")
                                                    {
                                                        var mattipo = "MATERIAL FLEXIBLE";
                                                    }
                                                    else if (data.rows[i].TIPO == "P")
                                                    {
                                                        var mattipo = "MATERIAL FOTOGRAFICO";
                                                    }
                                                    
                                                    $("#titMat2").html(mattipo);
                                                    
                                                    $.med_especial();
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
                                    $("#material").val(data.rows[0].material);
                                
                                    $("#medidas").empty("<option>");
                                    var medida = data.rows[0].medida;
                                    
                                    $.tabla_medidas();
                                    $.combo_medidas(medida);
                                }
                                
                                if(data.rows[0].resolucion==720)
                                {
                                    $("#720").prop("checked", true);
                                }
                                else if (data.rows[0].resolucion==1440)
                                {
                                    $("#1440").prop("checked", true);
                                }
                                else if (data.rows[0].resolucion==0)
                                {
                                    $("#0").prop("checked", true);
                                }
                                else if (data.rows[0].resolucion=="Sandwich")
                                {
                                    $("#Sandwich").prop("checked", true);
                                }
                                
                                $("#pasadas_imp").val(data.rows[0].imp_pasadas);

                                if(data.rows[0].barniz=="on")
                                {
                                    $("#barniz").prop("checked", true);
                                    $("#barniz_pasadas").val(data.rows[0].barniz_pasadas);
                                }
                                else
                                {
                                    $("#barniz").prop("checked", false);
                                    $("#barniz").focus();
                                    $("#barniz").blur();
                                }
                                
                                if(data.rows[0].blanco=="on")
                                {
                                    $("#blanco").prop("checked", true);
                                }
                                else
                                {
                                    $("#blanco").prop("checked", false);
                                    $("#blanco").focus();
                                    $("#blanco").blur();
                                }

                                $("#acab1").val(data.rows[0].acab1);
                                $("#acab2").val(data.rows[0].acab2);
                                $("#acab3").val(data.rows[0].acab3);
                                $("#acab4").val(data.rows[0].acab4);
                                $("#acab5").val(data.rows[0].acab5);
                                $("#acab6").val(data.rows[0].acab6);
                                
                                $("#adic1").val(data.rows[0].adic1);
                                $("#costoadic1").val(data.rows[0].costoadic1);

                                $("#adic2").val(data.rows[0].adic2);
                                $("#costoadic2").val(data.rows[0].costoadic2);

                                $("#adic3").val(data.rows[0].adic3);
                                $("#costoadic3").val(data.rows[0].costoadic3);
                                
                                $("#adic4").val(data.rows[0].adic4);
                                $("#costoadic4").val(data.rows[0].costoadic4);

                                $("#adic5").val(data.rows[0].adic5);
                                $("#costoadic5").val(data.rows[0].costoadic5);

                                $("#adic6").val(data.rows[0].adic6);
                                $("#costoadic6").val(data.rows[0].costoadic6);

                                $("#observaciones").val(data.rows[0].observaciones);
                                
                                $("#porcientoMargen").val(data.rows[0].porcientoMargen);
                                $("#porcientoComision").val(data.rows[0].porcientoComision);
                                $("#resTotal2").val(data.rows[0].resTotal2);

                                if(data.rows[0].lito2=="on")
                                {
                                    $("#lito2").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito2").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito3=="on")
                                {
                                    $("#lito3").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito3").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito4=="on")
                                {
                                    $("#lito4").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito4").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito5=="on")
                                {
                                    $("#lito5").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito5").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito6=="on")
                                {
                                    $("#lito6").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito6").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito7=="on")
                                {
                                    $("#lito7").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito7").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito8=="on")
                                {
                                    $("#lito8").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito8").prop("checked", false);
                                }
                               
                                if(data.rows[0].lito9=="on")
                                {
                                    $("#lito9").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito9").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito10=="on")
                                {
                                    $("#lito10").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito10").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito11=="on")
                                {
                                    $("#lito11").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito11").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito12=="on")
                                {
                                    $("#lito12").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito12").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito13=="on")
                                {
                                    $("#lito13").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito13").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito14=="on")
                                {
                                    $("#lito14").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito14").prop("checked", false);
                                }
                               
                                if(data.rows[0].lito15=="on")
                                {
                                    $("#lito15").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito15").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito16=="on")
                                {
                                    $("#lito16").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito16").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito17=="on")
                                {
                                    $("#lito17").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito17").prop("checked", false);
                                }
                                
                                if(data.rows[0].lito18=="on")
                                {
                                    $("#lito18").prop("checked", true);
                                }
                                else
                                {
                                    $("#lito18").prop("checked", false);
                                }
                                
                                $.totalAncho();
                                $.totalAlto();
                                $.resolucion();
                                $.barniz();
                                $.blanco();
                                $.acab1();
                                $.acab2();
                                $.acab3();
                                $.acab4();
                                $.acab5();
                                $.acab6();
                                $.adicional1();
                                $.adicional2();
                                $.adicional3();
                                $.adicional4();
                                $.adicional5();
                                $.adicional6();
                                $.valiAdicional();
                                $.recalcular();
                                $("#li-imprimir2").show();
                                
                                if(data.rows[0].orprod == 0)
                                {
                                    $("#li-imprimirord").show();
                                    $("#orprod").val("");
                                }
                                else
                                {
                                    $("#li-imprimir3").show();
                                    $("#orprod").val(data.rows[0].orprod);
                                }
                                
                                $("#cambios").val("");
                            }
                            if(data.validacion=="false")
                            {
                                //$("#dialogoerror").html('<center><span style="color:red; font-size:20px;">Disculpa los datos ingresados no coinciden</span></center>');
                                //$("#dialogoerror").dialog("open");
                            }
                        },"json"
                    );
                    $("#dialogabrir").modal("close");
                    $("#imprimir2").show();
                    return false;
    }

    $("#folio").change(function()
    {
        $.cargar();
    });

    $("#abrir").click(function()
    {
        $("#dialogabrir").modal("open");
    });
    $("#aceptar").click(function(){
        $.cargar();
    });
    $("#cancelar").click(function()
    {
        $("#dialogabrir").modal("close");
    }); 
    
    //--------------------------------------------------------------------------
    //                            Boton Guardar
    //--------------------------------------------------------------------------
    
    $('#guardar').click(function()
    {
        $("#dialogoguardar").modal("open");
    });
    
            $("#aceptar3").click(function(){
                $("#dialogo_datosguardados").modal("close");
            });               
    
    $("#actualizar").click(function(){
                if($("#mat_especial").prop("checked") == true)
                {
                    $("#dialogoguardar").dialog("close");
                    $.update();
                }
                else
                {
                    if($("#material").val() == "0")
                    {
                        $("#dialogoguardar").dialog("close");
                        $("#dialogoerror").html('<br/><center><span style="color:red;">Primero selecciona un material</span></center>');
                        $("#dialogoerror").dialog("open");
                    }
                    else
                    {
                        $("#dialogoguardar").dialog("close");
                        $.update();
                    }
                }
    });

    $("#guardarnuevo").click(function(){
        if($("#mat_especial").prop("checked") == true)
        {
            $("#dialogoguardar").dialog("close");
            $.guardar();
        }
        else
        {
            if($("#material").val() == "0")
            {
                $("#dialogoguardar").dialog("close");
                $("#dialogoerror").html('<br/><center><span style="color:red;">Primero selecciona un material</span></center>');
                $("#dialogoerror").dialog("open");
            }
            else
            {
                $("#dialogoguardar").dialog("close");
                $.guardar();
            }
        }
    });

    $("#cancelar2").click(function(){
        $("#dialogoguardar").modal("close");
    });
    
    /*$("#dialogoguardar2").dialog(
    {
        autoOpen:false,
        resizable: false,
        height:210,
        width:350,
        modal: true,
        show: "blind",
        hide: "puff",
        buttons:
        {
            "Aceptar":function()
            {
                $("#dialogoguardar2").dialog("close");
            }
        }
    });*/
    
    $.update = function()
    {
        var cadena=$("#form1").serialize();
        $.post("modelo/update.php",cadena,
            function(data)
            {
                if(data.validacion=="true")
                {
                    $("#dialogoguardar2").modal("open");
                    $("#cambios").val("");
                    $("#li-imprimir2").show();
                    var orprod=$("#orprod").val();
                    if (orprod!=="")
                    {
                        $("#li-imprimirord").hide();
                        $("#li-imprimir3").show();
                    }
                    else
                    {
                        $("#li-imprimirord").show();
                        $("#li-imprimir3").hide();
                    }
                }
                if(data.validacion=="false")
                {
                    $("#dialogoerror").modal("open");
                }
            },"json"
        );
    }
    
    $.guardar = function()
    {
        var cadena=$("#form1").serialize();
        $.post("modelo/guardar.php",cadena,
            function(data)
            {
                if(data.validacion=="true")
                {
                    $("#foliob").val(data.folio);
                    var vfolio=(data.folio);
                    $("#orprod").val("");
                    $("#dialogo_datosguardados").modal("open");
                    $("#cambios").val("");
                    $("#li-imprimirord").show();
                    $("#li-imprimir2").show();
                    $("#li-imprimir3").hide();
                }
                if(data.validacion=="false")
                {
                    $("#dialogoerror").modal("open");
                }
            },"json"
        );
    }
    
    //--------------------------------------------------------------------------
    //                  Boton Genrar Orden de Produccion
    //--------------------------------------------------------------------------
    
    $("#imprimirord").click(function()
        {
            $.Generar_OrdProduc();
        }
    );
    
    //Dialogo de generacionde No. de Orden
    $("#aceptar4").click(function(){
        $.impresionOrden();
        $("#dialogo_or_production").modal("close");
    });


    //Dialogo de generacionde No. de Orden
    
    $.Generar_OrdProduc = function()
    {
        var foliob=$("#foliob").val();
        var dato="foliob="+foliob;
        $.post("modelo/ordproduction.php",dato,
            function(data)
            {
                if(data.validacion=="true")
                {
                    $("#orprod").val(data.orprod);
                    var vorprod=(data.orprod);
                    
                    $("#dialogo_or_production").modal("open");
                    
                    var orprod=$("#orprod").val();
                }
                if(data.validacion=="false")
                {
                    $("#dialogoerror").html("");
                    $("#dialogoerror").html('<span style="color:red;">Error los datos no se han guardado o ya se genero la orden de produccion</span>');
                    $("#dialogoerror").dialog("open");
                }
            },"json"
        );
    }

    //Dialogo de Fecha_limite y Or_Metrix
            $("#aceptar5").click(function(){
                $.UpdateionOrden();
                $("#dialogo_imp_orden").dialog("close");
            });

            $("#cancelar4").click(function(){
                $("#dialogo_imp_orden").dialog("close");
            });

    //Dialogo de Fecha_limite y Or_Metrix
    
    $.impresionOrden = function()
    {
        $("#dialogo_imp_orden").modal("open");
        $("#imprimirord").hide();
        $("#li-imprimir3").show();
    }
    
    $.UpdateionOrden = function()
    {
        var foliob=$("#foliob").val();
        var fentrega=$("#fentrega").val();
        var ormetrix=$("#matrix").val();
        $("#nometrics").val(ormetrix);
        
        var dato="foliob="+foliob+"&fentrega="+fentrega+"&ormetrix="+ormetrix;
        
        $.post("modelo/ordproduction_update.php",dato,
            function(data)
            {
                if(data.validacion=="true")
                {
                    $.metrix();
                }
                if(data.validacion=="false")
                {
                    $("#dialogoerror").html("");   
                    $("#dialogoerror").html('<span style="color:red;">Error los datos no se han guardado o ya se genero la orden de produccion</span>');
                    $("#dialogoerror").modal("open");
                }
            },"json"
        );
    }
    
    //--------------------------------------------------------------------------
    //                 Boton Imprimir Orden de Produccion
    //--------------------------------------------------------------------------
    
    $("#imprimir3").click(function()
        {
            $.dialogometrix();
        }
    );
    
    $.metrix = function()
    {
        var cadena=$("#form1").serialize();
        var folio=$("#foliob").val();
        var vfolio="FOLIO="+folio;
        $.post("modelo/metrix.php",vfolio,
            function(data)
            {
                if(data.validacion=="true")
                {
                    $("#matrix").val(data.rows[0].matrix);
                    $("#fentrega").val(data.rows[0].fentrega);
                    
                    $.post("modelo/imp_cot_comp.php",cadena,
                        function(data)
                        {
                            if(data.validacion=="true")
                            {
                                var titCantMat1=$("#titCantMat").html();
                                var titCantMat="&titCantMat="+titCantMat1;
                                var cadena=$("#form1").serialize()+titCantMat;
                                $.post("modelo/imp_cot_update.php",cadena,
                                    function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            $.impOrdProduc();
                                        }
                                        if(data.validacion=="false")
                                        {
                                            $("dialogoerror").html("");
                                            $("#dialogoerror").html('<span style="color:red;">Error de update</span>');
                                            $("#dialogoerror").modal("open");
                                        }
                                    },"json"
                                );
                            }
                            if(data.validacion=="false")
                            {
                                var titCantMat1=$("#titCantMat").html();
                                var titCantMat="&titCantMat="+titCantMat1;
                                var cadena=$("#form1").serialize()+titCantMat;
                                $.post("modelo/imp_cot_insert.php",cadena,
                                    function(data)
                                    {
                                        if(data.validacion=="true")
                                        {
                                            $.impOrdProduc();
                                        }
                                        if(data.validacion=="false")
                                        {
                                            $("#dialogoerror").html("");
                                            $("#dialogoerror").html('<span style="color:red;">Error de insert</span>');
                                            $("#dialogoerror").modal("open");
                                        }
                                    },"json"
                                );
                            }
                        },"json"
                    );
                }
                if(data.validacion=="false")
                {
                    $("#dialogoerror").html("");
                    $("#dialogoerror").html('<span style="color:red;">Error el folio no existe<br/>Primero genera la orden de produccion</span>');
                    $("#dialogoerror").dialog("open");
                }
            },"json"
        );
    }
    
    $.dialogometrix = function()
    {
        var folio=$("#foliob").val();
        var vfolio="FOLIO="+folio;
        $.post("modelo/metrix.php",vfolio,
            function(data)
            {
                if(data.validacion=="true")
                {
                    $("#matrix").val(data.rows[0].matrix);
                    $("#fentrega").val(data.rows[0].fentrega);
                    $.impresionOrden();
                }
                if(data.validacion=="false")
                {
                    $("dialogoerror").html("");
                    $("#dialogoerror").html('<span style="color:red;">Error el folio no existe<br/>Primero genera la orden de produccion</span>');
                    $("#dialogoerror").open("open");
                }
            },"json"
        );
    }
    
    $.impOrdProduc = function()
    {
        var foliob=$("#foliob").val();
        var orprod=$("#orprod").val();
        var trabajo=$("#trabajo").val();

        window.open ("pdf/ordenproduccion.php?FOLIO="+foliob+"&orprod="+orprod+"&trabajo="+trabajo);
    }
    
    //--------------------------------------------------------------------------
    //                          Boton Imprir cotizacion
    //--------------------------------------------------------------------------

    $("#imprimir2").click(function()
    {
        $.actmedida();
    });
    
    $.actmedida = function()
    {
        var cadena=$("#form1").serialize();
        $.post("modelo/imp_cot_comp.php",cadena,
            function(data)
            {
                if(data.validacion=="true")
                {
                    var titCantMat1=$("#titCantMat").html();
                    var titCantMat="&titCantMat="+titCantMat1;
                    var cadena=$("#form1").serialize()+titCantMat;
                    $.post("modelo/imp_cot_update.php",cadena,
                        function(data)
                        {
                            if(data.validacion=="true")
                            {
                                $.impCot();
                            }
                            if(data.validacion=="false")
                            {
                                $("#dialogoerror").html("");
                                $("#dialogoerror").html('<span style="color:red;">Error de update</span>');
                                $("#dialogoerror").modal("open");
                            }
                        },"json"
                    );
                }
                if(data.validacion=="false")
                {
                    var titCantMat1=$("#titCantMat").html();
                    var titCantMat="&titCantMat="+titCantMat1;
                    var cadena=$("#form1").serialize()+titCantMat;
                    $.post("modelo/imp_cot_insert.php",cadena,
                        function(data)
                        {
                            if(data.validacion=="true")
                            {
                                $.impCot();
                            }
                            if(data.validacion=="false")
                            {
                                $("#dialogoerror").html("");
                                $("#dialogoerror").html('<span style="color:red;">Error de insert</span>');
                                $("#dialogoerror").modal("open");
                            }
                        },"json"
                    );
                }
            },"json"
        );
    }
    
    $.impCot = function()
    {
        var foliob=$("#foliob").val();
        var trabajo=$("#trabajo").val();

        window.open ("pdf/cotizaciones.php?FOLIO="+foliob+"&trabajo="+trabajo);
    }
    
    //--------------------------------------------------------------------------
    //                               Limpiar
    //--------------------------------------------------------------------------
    
            $("#aceptar6").click(function(){
                $("#dialogolimpiar").modal("close");
                $.borrar(); 
            });

            $("#cancelar5").click(function(){
                $("#dialogolimpiar").modal("close");
            });

    
    $("#limpiar").click(function()
        {
            $("#dialogolimpiar").modal("open");
        }
    );
    
    $.borrar = function()
    {
        location.reload();
        location.reload();
    }

    //--------------------------------------------------------------------------
    //                         Nuevo Material
    //--------------------------------------------------------------------------

    /*$("#nuevo").click(function()
    {
        window.location.href = "registromaterial.php";
    });
    
    $("#guardar_mat").click(function()
    {
        if($("#nom_form").val() == "" || $("#ancho1_form").val() == "0" || $("#alto1_form").val() == "0" || $("#importe_form").val() == "0")
        {
            $("#dialogoerror").html("");
            $("#dialogoerror").html('<center><span style="color:red;">Falta algun dato importante verifica que el Nombre, Ancho1, Alto1 e Importe tangan algun valor valido</span></center>');
            $("#dialogoerror").dialog("open");
        }
        else
        {
            $.insert_mat();
        }
    });
    
    $.insert_mat = function()
    {
        var materal=$("#formnuevomat").serialize();
        $.post("modelo/nuevo_mat.php",materal,
            function(data)
            {
                if(data.validacion=="true")
                {
                    $("#dialogoguardar2").html('<br/><center>El registro se actualizo correctamente</center>');
                    $("#dialogoguardar2").dialog("open");
                    window.location.href = "registromaterial.php";
                }
                if(data.validacion=="false")
                {
                    $("#dialogoerror").html('<span style="color:red;">Error los datos no se han guardado</span>');
                    $("#dialogoerror").dialog("open");
                }
            },"json"
        );
    }

    //--------------------------------------------------------------------------
    //                         Actualizar Material
    //--------------------------------------------------------------------------
    
    $("#actualizar").click(function()
    {
        $.update_mat();
    });
    
    
    $.update_mat = function()
    {
        var materal=$("#fromEdit").serialize();
        $.post("modelo/update_mat.php",materal,
            function(data)
            {
                if(data.validacion=="true")
                {
                    $("#dialogoguardar2").html('<br/><center>El registro se actualizo correctamente</center>');
                    $("#dialogoguardar2").dialog("open");
                }
                if(data.validacion=="false")
                {
                    $("#dialogoerror").html('<span style="color:red;">Error los datos no se han guardado</span>');
                    $("#dialogoerror").dialog("open");
                }
            },"json"
        );
    }*/
});